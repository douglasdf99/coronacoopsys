<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoopAPIRequest;
use App\Http\Requests\API\UpdateCoopAPIRequest;
use App\Models\Coop;
use App\Repositories\CoopRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CoopController
 * @package App\Http\Controllers\API
 */

class CoopAPIController extends AppBaseController
{
    /** @var  CoopRepository */
    private $coopRepository;

    public function __construct(CoopRepository $coopRepo)
    {
        $this->coopRepository = $coopRepo;
    }

    /**
     * Display a listing of the Coop.
     * GET|HEAD /coops
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
      $this->coopRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      if ( $request->input('page') )
        $coops = $this->coopRepository->paginate($limit = 10, $columns = ['*']);
      else
        $coops = $this->coopRepository->all();

        return $this->sendResponse($coops->toArray(), 'Coops retrieved successfully');
    }

    /**
     * Store a newly created Coop in storage.
     * POST /coops
     *
     * @param CreateCoopAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCoopAPIRequest $request)
    {
        $input = $request->all();

        $coop = $this->coopRepository->create($input);

        return $this->sendResponse($coop->toArray(), 'Coop saved successfully');
    }

    /**
     * Display the specified Coop.
     * GET|HEAD /coops/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Coop $coop */
        $coop = $this->coopRepository->find($id);

        if (empty($coop)) {
            return $this->sendError('Coop not found');
        }

        return $this->sendResponse($coop->toArray(), 'Coop retrieved successfully');
    }

    /**
     * Update the specified Coop in storage.
     * PUT/PATCH /coops/{id}
     *
     * @param int $id
     * @param UpdateCoopAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoopAPIRequest $request)
    {
        $input = $request->all();

        /** @var Coop $coop */
        $coop = $this->coopRepository->find($id);

        if (empty($coop)) {
            return $this->sendError('Coop not found');
        }

        $coop = $this->coopRepository->update($input, $id);

        return $this->sendResponse($coop->toArray(), 'Coop updated successfully');
    }

    /**
     * Remove the specified Coop from storage.
     * DELETE /coops/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Coop $coop */
        $coop = $this->coopRepository->find($id);

        if (empty($coop)) {
            return $this->sendError('Coop not found');
        }

        $coop->delete();

        return $this->sendSuccess('Coop deleted successfully');
    }
}
