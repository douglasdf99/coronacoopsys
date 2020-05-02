<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRamoAPIRequest;
use App\Http\Requests\API\UpdateRamoAPIRequest;
use App\Models\Ramo;
use App\Repositories\RamoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RamoController
 * @package App\Http\Controllers\API
 */

class RamoAPIController extends AppBaseController
{
    /** @var  RamoRepository */
    private $ramoRepository;

    public function __construct(RamoRepository $ramoRepo)
    {
        $this->ramoRepository = $ramoRepo;
    }

    /**
     * Display a listing of the Ramo.
     * GET|HEAD /ramos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
      $this->ramoRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      if ( $request->input('page') )
        $ramos = $this->ramoRepository->paginate($limit = 5, $columns = ['*']);
      else
        $ramos = $this->ramoRepository->all();


        return $this->sendResponse($ramos->toArray(), 'Ramos retrieved successfully');
    }

    /**
     * Store a newly created Ramo in storage.
     * POST /ramos
     *
     * @param CreateRamoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRamoAPIRequest $request)
    {
        $input = $request->all();

        $ramo = $this->ramoRepository->create($input);

        return $this->sendResponse($ramo->toArray(), 'Ramo saved successfully');
    }

    /**
     * Display the specified Ramo.
     * GET|HEAD /ramos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ramo $ramo */
        $ramo = $this->ramoRepository->find($id);

        if (empty($ramo)) {
            return $this->sendError('Ramo not found');
        }

        return $this->sendResponse($ramo->toArray(), 'Ramo retrieved successfully');
    }

    /**
     * Update the specified Ramo in storage.
     * PUT/PATCH /ramos/{id}
     *
     * @param int $id
     * @param UpdateRamoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRamoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ramo $ramo */
        $ramo = $this->ramoRepository->find($id);

        if (empty($ramo)) {
            return $this->sendError('Ramo not found');
        }

        $ramo = $this->ramoRepository->update($input, $id);

        return $this->sendResponse($ramo->toArray(), 'Ramo updated successfully');
    }

    /**
     * Remove the specified Ramo from storage.
     * DELETE /ramos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ramo $ramo */
        $ramo = $this->ramoRepository->find($id);

        if (empty($ramo)) {
            return $this->sendError('Ramo not found');
        }

        $ramo->delete();

        return $this->sendSuccess('Ramo deleted successfully');
    }
}
