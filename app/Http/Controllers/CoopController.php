<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCoopRequest;
use App\Http\Requests\UpdateCoopRequest;
use App\Models\Coop;
use App\Models\CoopProduto;
use App\Models\Produto;
use App\Models\Ramo;
use App\Repositories\CoopRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class CoopController extends AppBaseController
{
    /** @var  CoopRepository */
    private $coopRepository;

    public function __construct(CoopRepository $coopRepo)
    {
        $this->coopRepository = $coopRepo;
    }

    /**
     * Display a listing of the Coop.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $coops = $this->coopRepository->all();

        return view('coops.index')
            ->with('coops', $coops);
    }

    public function teste ()
    {

       $cooperativas = Coop::all();
       foreach ($cooperativas as $coop){
         $tudo = DB::table('tudo')
           ->where('cnpj', '=', $coop->cnpj)
           ->first();
         if ($tudo){
           $ramo = Ramo::where('descricao',$tudo->ramo)->first();
         }
         if ($ramo){
           $coop->ramo_id = $ramo->id;
           $coop->save();
         }

       }
/*
       $produtos = CoopProduto::all();
      foreach ($produtos as $produto) {
        if ( $produto->categoriatable){
          $produto->descricao = $produto->produtotable;
          $empresa = Coop::where('razao', 'like', $produto->empresa)->first();
          if ($empresa){
            $produto->coop_id = $empresa->id;
          }else{
            $empresa = Coop::create(['razao'=>$produto->empresa]);
            $produto->coop_id = $empresa->id;
          }
          $categoria = Produto::where('descricao', 'like', $produto->categoriatable)->first();
          if ($categoria){
            $produto->produto_id = $categoria->id;
          }

        }
        $produto->save();

       }*/
        return $produtos;
    }



    /**
     * Show the form for creating a new Coop.
     *
     * @return Response
     */
    public function create()
    {
        return view('coops.create');
    }

    /**
     * Store a newly created Coop in storage.
     *
     * @param CreateCoopRequest $request
     *
     * @return Response
     */
    public function store(CreateCoopRequest $request)
    {
        $input = $request->all();

        $coop = $this->coopRepository->create($input);

        Flash::success('Coop saved successfully.');

        return redirect(route('coops.index'));
    }

    /**
     * Display the specified Coop.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $coop = $this->coopRepository->with(['ramo', 'coopProdutos.produto','coopCanais.canai','areas'])->find($id);

        if (empty($coop)) {
            Flash::error('Coop not found');

            return redirect(route('coops.index'));
        }

        return view('coops.show')->with('coop', $coop);
    }

    /**
     * Show the form for editing the specified Coop.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $coop = $this->coopRepository->find($id);

        if (empty($coop)) {
            Flash::error('Coop not found');

            return redirect(route('coops.index'));
        }

        return view('coops.edit')->with('coop', $coop);
    }

    /**
     * Update the specified Coop in storage.
     *
     * @param int $id
     * @param UpdateCoopRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoopRequest $request)
    {
        $coop = $this->coopRepository->find($id);

        if (empty($coop)) {
            Flash::error('Coop not found');

            return redirect(route('coops.index'));
        }

        $coop = $this->coopRepository->update($request->all(), $id);

        Flash::success('Coop updated successfully.');

        return redirect(route('coops.index'));
    }

    /**
     * Remove the specified Coop from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $coop = $this->coopRepository->find($id);

        if (empty($coop)) {
            Flash::error('Coop not found');

            return redirect(route('coops.index'));
        }

        $this->coopRepository->delete($id);

        Flash::success('Coop deleted successfully.');

        return redirect(route('coops.index'));
    }
}
