<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoopProdutoAPIRequest;
use App\Http\Requests\API\UpdateCoopProdutoAPIRequest;
use App\Models\CoopProduto;
use App\Repositories\CoopProdutoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CoopProdutoController
 * @package App\Http\Controllers\API
 */

class CoopProdutoAPIController extends AppBaseController
{
    /** @var  CoopProdutoRepository */
    private $coopProdutoRepository;

    public function __construct(CoopProdutoRepository $coopProdutoRepo)
    {
        $this->coopProdutoRepository = $coopProdutoRepo;
    }

    /**
     * Display a listing of the CoopProduto.
     * GET|HEAD /coopProdutos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $coopProdutos = $this->coopProdutoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($coopProdutos->toArray(), 'Coop Produtos retrieved successfully');
    }

    /**
     * Store a newly created CoopProduto in storage.
     * POST /coopProdutos
     *
     * @param CreateCoopProdutoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCoopProdutoAPIRequest $request)
    {
        $input = $request->all();

        $coopProduto = $this->coopProdutoRepository->create($input);

        return $this->sendResponse($coopProduto->toArray(), 'Coop Produto saved successfully');
    }

    /**
     * Display the specified CoopProduto.
     * GET|HEAD /coopProdutos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CoopProduto $coopProduto */
        $coopProduto = $this->coopProdutoRepository->find($id);

        if (empty($coopProduto)) {
            return $this->sendError('Coop Produto not found');
        }

        return $this->sendResponse($coopProduto->toArray(), 'Coop Produto retrieved successfully');
    }

    /**
     * Update the specified CoopProduto in storage.
     * PUT/PATCH /coopProdutos/{id}
     *
     * @param int $id
     * @param UpdateCoopProdutoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoopProdutoAPIRequest $request)
    {
        $input = $request->all();

        /** @var CoopProduto $coopProduto */
        $coopProduto = $this->coopProdutoRepository->find($id);

        if (empty($coopProduto)) {
            return $this->sendError('Coop Produto not found');
        }

        $coopProduto = $this->coopProdutoRepository->update($input, $id);

        return $this->sendResponse($coopProduto->toArray(), 'CoopProduto updated successfully');
    }

    /**
     * Remove the specified CoopProduto from storage.
     * DELETE /coopProdutos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CoopProduto $coopProduto */
        $coopProduto = $this->coopProdutoRepository->find($id);

        if (empty($coopProduto)) {
            return $this->sendError('Coop Produto not found');
        }

        $coopProduto->delete();

        return $this->sendSuccess('Coop Produto deleted successfully');
    }
}
