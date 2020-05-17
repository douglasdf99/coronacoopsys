<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoopAPIRequest;
use App\Http\Requests\API\UpdateCoopAPIRequest;
use App\Models\Area;
use App\Models\Coop;
use App\Models\CoopCanais;
use App\Models\CoopProduto;
use App\Repositories\AreaRepository;
use App\Repositories\CanaisRepository;
use App\Repositories\CoopRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Response;

/**
 * Class CoopController
 * @package App\Http\Controllers\API
 */

class CoopAPIController extends AppBaseController
{
    /** @var  CoopRepository */
    private $coopRepository;
    private $canaisRepository;
    private $areaRepository;
  private $path = 'coop';

    public function __construct(CoopRepository $coopRepo, CanaisRepository $canaisRepo,AreaRepository $areaRepo)
    {
        $this->areaRepository = $areaRepo;
        $this->canaisRepository = $canaisRepo;
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
        $coops = $this->coopRepository->with(['ramo', 'coopProdutos.produto','coopCanais.canai','areas'])->paginate($limit = 10, $columns = ['*']);
      else
        $coops = $this->coopRepository->with(['ramo', 'coopProdutos.produto','coopCanais.canai','areas'])->all();

        return $this->sendResponse($coops->toArray(), 'Coops retrieved successfully');
    }

    public function pesquisa(Request $request)
    {


        $this->coopRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $query = $this->coopRepository->with(['ramo', 'coopProdutos.produto','coopCanais.canai','areas'=> function($query) {
          $query->orderBy('tipo','DESC');
        }]);

        if ($request->cidade !== null or $request->estado !== 'undefined'){
          $query->whereHas('areas', function ($q) use($request){
            $q->where('tipo','Nacional')->orWhere([['tipo','Estadual'],['estado',$request->estado]])->orWhere([['tipo','Municipal'],['cidade',$request->cidade]])->orWhere([['tipo','Municipal'],['estado',$request->estado]])->orWhere([['tipo','Local'],['estado',$request->estado]])->orWhere([['tipo','Local'],['cidade',$request->cidade]]);
          });
        }

      $coops = $query->all();
        $coops2=[];

        foreach ($coops as $coop){
          if (isset($coop->areas->tipo)){
            if ($coop->areas->tipo == 'Local'){
              array_push($coops2,$coop);
            }
          }

        }
        foreach ($coops as $coop){
          if (isset($coop->areas->tipo)){
            if ($coop->areas->tipo == 'Municipal'){
              array_push($coops2,$coop);
            }
          }

        }
        foreach ($coops as $coop){
          if (isset($coop->areas->tipo)){
            if ($coop->areas->tipo == 'Estadual'){
              array_push($coops2,$coop);
            }
          }

        }
        foreach ($coops as $coop){
          if (isset($coop->areas->tipo)){
            if ($coop->areas->tipo == 'Nacional'){
              array_push($coops2,$coop);
            }
          }

        }

      // Get current page form url e.x. &page=1
      $currentPage = LengthAwarePaginator::resolveCurrentPage();

      // Create a new Laravel collection from the array data
      $itemCollection = collect($coops2);
      // Define how many items we want to be visible in each page
      $perPage = 10;

      // Slice the collection to get the items to display in current page
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->values();

      // Create our paginator and pass it to the view
      $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

      $paginatedItems->setPath($request->url());

        return $this->sendResponse($paginatedItems->toArray(), 'Coops retrieved successfully');
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
  public function paginate($items, $perPage = 5, $page = null, $options = [])
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
        $coop = $this->coopRepository->with(['ramo', 'coopProdutos.produto','coopCanais.canai','areas'])->find($id);

        if (empty($coop)) {
            return $this->sendError('Coop not found');
        }

        return $this->sendResponse($coop->toArray(), 'Coop retrieved successfully');
    }

    public function crud(Request $request)
  {
    $input = $request->all();

    if ($request->hasFile('logo') && $request->file('logo')->isValid()) {

      $name = time() .''.Str::kebab($request->nome);
      $extension = $request->logo->extension();

      $nameFile = "{$name}.{$extension}";
      $input['logo'] = 'storage/'.$this->path.'/'.$nameFile;

      $upload = $request->logo->storeAs($this->path, $nameFile);

      if (!$upload)
        return response()->json(['error' => 'Fail_Upload'], 500);
    }
    if ($request->hasFile('catalogo') && $request->file('catalogo')->isValid()) {

      $name = time() .''.Str::kebab($request->nome);
      $extension = $request->catalogo->extension();

      $nameFile = "{$name}.{$extension}";
      $input['catalogo'] = 'storage/'.$this->path.'/'.$nameFile;

      $upload = $request->catalogo->storeAs($this->path, $nameFile);

      if (!$upload)
        return response()->json(['error' => 'Fail_Upload'], 500);
    }

    $coop = $this->coopRepository->create($input);
    foreach ($request->canais as $canal){
      $inputCanal= [
        'coop_id' => $coop->id,
        'canai_id' => $canal
        ];
      CoopCanais::create($inputCanal);
    }
    $inputArea= [
      'tipo' => $request->area,
      'endereco_padrao' => $request->padrao,
      'endereco' => $request->endereco_atuacao,
      'cidade' => $request->cidade,
      'estado'=> $request->estado,
      'coop_id' => $coop->id,
    ];
    Area::create($inputArea);
    foreach ($request->produtos as $produto){
      $inputProduto= [
        'coop_id' => $coop->id,
        'descricao' => $produto,
      ];
      CoopProduto::create($inputProduto);
    }

    return $this->sendResponse($coop->toArray(), 'Coop updated successfully');
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
      if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
        if ($coop->logo) {
          if (Storage::exists("{$coop->logo}"))
            Storage::delete("{$coop->logo}");
        }

        $name = time() .''.Str::kebab($request->nome);
        $extension = $request->logo->extension();

        $nameFile = "{$name}.{$extension}";
        $input['logo'] = 'storage/'.$this->path.'/'.$nameFile;

        $upload = $request->logo->storeAs($this->path, $nameFile);

        if (!$upload)
          return response()->json(['error' => 'Fail_Upload'], 500);
      }
      if ($request->hasFile('catalogo') && $request->file('catalogo')->isValid()) {
        if ($coop->catalogo) {
          if (Storage::exists("{$coop->catalogo}"))
            Storage::delete("{$coop->catalogo}");
        }

        $name = time() .''.Str::kebab($request->nome);
        $extension = $request->catalogo->extension();

        $nameFile = "{$name}.{$extension}";
        $input['catalogo'] = 'storage/'.$this->path.'/'.$nameFile;

        $upload = $request->catalogo->storeAs($this->path, $nameFile);

        if (!$upload)
          return response()->json(['error' => 'Fail_Upload'], 500);
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
