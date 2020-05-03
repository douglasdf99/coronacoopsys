<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCanaisRequest;
use App\Http\Requests\UpdateCanaisRequest;
use App\Repositories\CanaisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CanaisController extends AppBaseController
{
    /** @var  CanaisRepository */
    private $canaisRepository;

    public function __construct(CanaisRepository $canaisRepo)
    {
        $this->canaisRepository = $canaisRepo;
    }

    /**
     * Display a listing of the Canais.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $canais = $this->canaisRepository->all();

        return view('canais.index')
            ->with('canais', $canais);
    }

    /**
     * Show the form for creating a new Canais.
     *
     * @return Response
     */
    public function create()
    {
        return view('canais.create');
    }

    /**
     * Store a newly created Canais in storage.
     *
     * @param CreateCanaisRequest $request
     *
     * @return Response
     */
    public function store(CreateCanaisRequest $request)
    {
        $input = $request->all();

        $canais = $this->canaisRepository->create($input);

        Flash::success('Canais saved successfully.');

        return redirect(route('canais.index'));
    }

    /**
     * Display the specified Canais.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $canais = $this->canaisRepository->find($id);

        if (empty($canais)) {
            Flash::error('Canais not found');

            return redirect(route('canais.index'));
        }

        return view('canais.show')->with('canais', $canais);
    }

    /**
     * Show the form for editing the specified Canais.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $canais = $this->canaisRepository->find($id);

        if (empty($canais)) {
            Flash::error('Canais not found');

            return redirect(route('canais.index'));
        }

        return view('canais.edit')->with('canais', $canais);
    }

    /**
     * Update the specified Canais in storage.
     *
     * @param int $id
     * @param UpdateCanaisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCanaisRequest $request)
    {
        $canais = $this->canaisRepository->find($id);

        if (empty($canais)) {
            Flash::error('Canais not found');

            return redirect(route('canais.index'));
        }

        $canais = $this->canaisRepository->update($request->all(), $id);

        Flash::success('Canais updated successfully.');

        return redirect(route('canais.index'));
    }

    /**
     * Remove the specified Canais from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $canais = $this->canaisRepository->find($id);

        if (empty($canais)) {
            Flash::error('Canais not found');

            return redirect(route('canais.index'));
        }

        $this->canaisRepository->delete($id);

        Flash::success('Canais deleted successfully.');

        return redirect(route('canais.index'));
    }
}
