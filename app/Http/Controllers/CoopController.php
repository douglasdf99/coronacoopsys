<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCoopRequest;
use App\Http\Requests\UpdateCoopRequest;
use App\Models\Area;
use App\Models\Canais;
use App\Models\Coop;
use App\Models\CoopCanais;
use App\Models\CoopProduto;
use App\Models\Produto;
use App\Models\Ramo;
use App\Repositories\CoopRepository;
use App\Http\Controllers\AppBaseController;
use DemeterChain\C;
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
     $this->preencheAjuda();
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
        return 'scritp rodu limpo';
    }

    function preencheCoop() {
      $tudo = DB::table('coop2ok')->get();
      foreach ($tudo as $coop){
        if ($coop->cnpj){
          $has = Coop::where('cnpj',$coop->cnpj)->first();
          if (!$has){
            $nova = new Coop();
            $nova->cnpj = $coop->cnpj;
            $nova->razao = $coop->razao;
            $nova->nome = $coop->nome;
            $nova->site = $coop->site;
            $nova->email = $coop->email;
            $nova->telefone = $coop->telefone;
            $nova->endereco = $coop->endereco;
            $nova->numero = $coop->numero;
            $nova->complemento = $coop->complemento;
            $nova->bairro = $coop->bairro;
            $nova->cidade = $coop->cidade;
            $estado = DB::table('coopestados2ok')->where('cnpj', $coop->cnpj)->first();
            $nova->estado = $estado->uf;
            $hasRamo = Ramo::where('descricao',$coop->ramo)->first();
            if ($hasRamo) {
              $nova->ramo_id = $hasRamo->id;
            }
            else{
              $ramo = Ramo::create(['descricao' => $coop->ramo]);
              $nova->ramo_id = $ramo->id;
            }
            $nova->save();
          }
        }
      }
    }


    function preencheProdutoCoop() {
      $tudo = DB::table('ramocategoria2ok')->get();
      foreach ($tudo as $prod){
        $has = Coop::where('cnpj',$prod->cnpj)->first();
        if ($has){
          $produto= new CoopProduto ();
          $produto->coop_id = $has->id;
          $produto->descricao = $prod->produto;
          $produto->tipo = $prod->oferta;

          $ramo = Ramo::where('descricao',$prod->ramo)->first();
          if (!$ramo) {
            $ramo = Ramo::create(['descricao' => $prod->ramo]);
          }
          $categoria = Produto::where('descricao',$prod->categoria)->first();
          if ($categoria) {
            $produto->produto_id = $categoria->id;
          }
          else{
            $categoria = Produto::create(['descricao' => $prod->categoria]);
            $produto->produto_id = $categoria->id;
          }
          $categoria->ramo_id = $ramo->id;
          $categoria->save();

          $produto->save();
        }
      }
    }
    function preencheCanais()
    {
      $tudo = DB::table('coopcanais2ok')->get();
      foreach ($tudo as $prod) {
        $has = Coop::where('cnpj', $prod->cnpj)->first();
        if ($has) {
            $canp = new CoopCanais();
            $canp->coop_id = $has->id;

            $canal = Canais::where('descricao', $prod->canal)->first();
            if ($canal) {
              $confere = CoopCanais::where('canai_id', $canal->id)->where('coop_id', $has->id)->first();
              if (!$confere) {
                $canp->canai_id = $canal->id;
                $canp->save();
              }
            }
            else {
              $canal = Canais::create(['descricao' => $prod->canal]);
              $canp->canai_id = $canal->id;
              $canp->save();
            }
          }
        }
      }
    function preencheContato()
    {
      $tudo = DB::table('coopcontato2ok')->get();
      foreach ($tudo as $prod) {
        $has = Coop::where('cnpj', $prod->cnpj)->first();
        if ($has) {
          $has->contato_nome = $prod->nome;
          $has->contato_telefone= $prod->telefone;
          $has->contato_email = $prod->email;
          $has->contato_cargo = $prod->cargo;
          $has->save();
          }
        }
      }
    function preencheAjuda()
    {
      $tudo = DB::table('coopocb2ok')->get();
      foreach ($tudo as $prod) {
        $has = Coop::where('cnpj', $prod->cnpj)->first();
        if ($has) {
          $has->ajuda = $prod->ocb;
          $has->save();
          }
        }
      }

    function preencheAreas() {
      $tudo = DB::table('coopareas2ok')->get();
      foreach ($tudo as $prod){
        $has = Coop::where('cnpj',$prod->cnpj)->first();
        if ($has){
          $area = new Area();
          $area->coop_id = $has->id;
          $area->tipo = $prod->tipo;
          if ($prod->tipo == 'Estadual'){
            $area->estado = $prod->area;
          }
          if ($prod->tipo == 'Municipal'){
            $area->cidade = $prod->area;
            $area->estado = $has->estado;
          }
          $area->save();
        }
      }
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
