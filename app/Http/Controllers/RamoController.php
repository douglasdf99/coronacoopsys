<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRamoRequest;
use App\Http\Requests\UpdateRamoRequest;
use App\Repositories\RamoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RamoController extends AppBaseController
{
    /** @var  RamoRepository */
    private $ramoRepository;

    public function __construct(RamoRepository $ramoRepo)
    {
        $this->ramoRepository = $ramoRepo;
    }

    /**
     * Display a listing of the Ramo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ramos = $this->ramoRepository->all();

        return view('ramos.index')
            ->with('ramos', $ramos);
    }

    /**
     * Show the form for creating a new Ramo.
     *
     * @return Response
     */
    public function create()
    {
        return view('ramos.create');
    }

    /**
     * Store a newly created Ramo in storage.
     *
     * @param CreateRamoRequest $request
     *
     * @return Response
     */
    public function store(CreateRamoRequest $request)
    {
        $input = $request->all();

        $ramo = $this->ramoRepository->create($input);

        Flash::success('Ramo saved successfully.');

        return redirect(route('ramos.index'));
    }

    /**
     * Display the specified Ramo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ramo = $this->ramoRepository->find($id);

        if (empty($ramo)) {
            Flash::error('Ramo not found');

            return redirect(route('ramos.index'));
        }

        return view('ramos.show')->with('ramo', $ramo);
    }

    /**
     * Show the form for editing the specified Ramo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ramo = $this->ramoRepository->find($id);

        if (empty($ramo)) {
            Flash::error('Ramo not found');

            return redirect(route('ramos.index'));
        }

        return view('ramos.edit')->with('ramo', $ramo);
    }

    /**
     * Update the specified Ramo in storage.
     *
     * @param int $id
     * @param UpdateRamoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRamoRequest $request)
    {
        $ramo = $this->ramoRepository->find($id);

        if (empty($ramo)) {
            Flash::error('Ramo not found');

            return redirect(route('ramos.index'));
        }

        $ramo = $this->ramoRepository->update($request->all(), $id);

        Flash::success('Ramo updated successfully.');

        return redirect(route('ramos.index'));
    }

    /**
     * Remove the specified Ramo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ramo = $this->ramoRepository->find($id);

        if (empty($ramo)) {
            Flash::error('Ramo not found');

            return redirect(route('ramos.index'));
        }

        $this->ramoRepository->delete($id);

        Flash::success('Ramo deleted successfully.');

        return redirect(route('ramos.index'));
    }
}
