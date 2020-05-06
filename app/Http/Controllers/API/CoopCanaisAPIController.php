<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoopCanaisAPIRequest;
use App\Http\Requests\API\UpdateCoopCanaisAPIRequest;
use App\Models\CoopCanais;
use App\Repositories\CoopCanaisRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CoopCanaisController
 * @package App\Http\Controllers\API
 */

class CoopCanaisAPIController extends AppBaseController
{
    /** @var  CoopCanaisRepository */
    private $coopCanaisRepository;

    public function __construct(CoopCanaisRepository $coopCanaisRepo)
    {
        $this->coopCanaisRepository = $coopCanaisRepo;
    }

    /**
     * Display a listing of the CoopCanais.
     * GET|HEAD /coopCanais
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $coopCanais = $this->coopCanaisRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($coopCanais->toArray(), 'Coop Canais retrieved successfully');
    }

    /**
     * Store a newly created CoopCanais in storage.
     * POST /coopCanais
     *
     * @param CreateCoopCanaisAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCoopCanaisAPIRequest $request)
    {
        $input = $request->all();

        $coopCanais = $this->coopCanaisRepository->create($input);

        return $this->sendResponse($coopCanais->toArray(), 'Coop Canais saved successfully');
    }

    /**
     * Display the specified CoopCanais.
     * GET|HEAD /coopCanais/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CoopCanais $coopCanais */
        $coopCanais = $this->coopCanaisRepository->find($id);

        if (empty($coopCanais)) {
            return $this->sendError('Coop Canais not found');
        }

        return $this->sendResponse($coopCanais->toArray(), 'Coop Canais retrieved successfully');
    }

    /**
     * Update the specified CoopCanais in storage.
     * PUT/PATCH /coopCanais/{id}
     *
     * @param int $id
     * @param UpdateCoopCanaisAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoopCanaisAPIRequest $request)
    {
        $input = $request->all();

        /** @var CoopCanais $coopCanais */
        $coopCanais = $this->coopCanaisRepository->find($id);

        if (empty($coopCanais)) {
            return $this->sendError('Coop Canais not found');
        }

        $coopCanais = $this->coopCanaisRepository->update($input, $id);

        return $this->sendResponse($coopCanais->toArray(), 'CoopCanais updated successfully');
    }

    /**
     * Remove the specified CoopCanais from storage.
     * DELETE /coopCanais/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CoopCanais $coopCanais */
        $coopCanais = $this->coopCanaisRepository->find($id);

        if (empty($coopCanais)) {
            return $this->sendError('Coop Canais not found');
        }

        $coopCanais->delete();

        return $this->sendSuccess('Coop Canais deleted successfully');
    }
}
