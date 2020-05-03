<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCanaisAPIRequest;
use App\Http\Requests\API\UpdateCanaisAPIRequest;
use App\Models\Canais;
use App\Repositories\CanaisRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CanaisController
 * @package App\Http\Controllers\API
 */

class CanaisAPIController extends AppBaseController
{
    /** @var  CanaisRepository */
    private $canaisRepository;

    public function __construct(CanaisRepository $canaisRepo)
    {
        $this->canaisRepository = $canaisRepo;
    }

    /**
     * Display a listing of the Canais.
     * GET|HEAD /canais
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
      $this->canaisRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      if ( $request->input('page') )
        $canais = $this->canaisRepository->paginate($limit = 10, $columns = ['*']);
      else
        $canais = $this->canaisRepository->all();


        return $this->sendResponse($canais->toArray(), 'Canais retrieved successfully');
    }

    /**
     * Store a newly created Canais in storage.
     * POST /canais
     *
     * @param CreateCanaisAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCanaisAPIRequest $request)
    {
        $input = $request->all();

        $canais = $this->canaisRepository->create($input);

        return $this->sendResponse($canais->toArray(), 'Canais saved successfully');
    }

    /**
     * Display the specified Canais.
     * GET|HEAD /canais/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Canais $canais */
        $canais = $this->canaisRepository->find($id);

        if (empty($canais)) {
            return $this->sendError('Canais not found');
        }

        return $this->sendResponse($canais->toArray(), 'Canais retrieved successfully');
    }

    /**
     * Update the specified Canais in storage.
     * PUT/PATCH /canais/{id}
     *
     * @param int $id
     * @param UpdateCanaisAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCanaisAPIRequest $request)
    {
        $input = $request->all();

        /** @var Canais $canais */
        $canais = $this->canaisRepository->find($id);

        if (empty($canais)) {
            return $this->sendError('Canais not found');
        }

        $canais = $this->canaisRepository->update($input, $id);

        return $this->sendResponse($canais->toArray(), 'Canais updated successfully');
    }

    /**
     * Remove the specified Canais from storage.
     * DELETE /canais/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Canais $canais */
        $canais = $this->canaisRepository->find($id);

        if (empty($canais)) {
            return $this->sendError('Canais not found');
        }

        $canais->delete();

        return $this->sendSuccess('Canais deleted successfully');
    }
}
