<?php

namespace App\Http\Controllers;

use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  private $produtoRepository;
  public function __construct(ProdutoRepository $produtoRepo)
  {
    $this->produtoRepository = $produtoRepo;
  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $produtos = $this->produtoRepository->all();
        return view('front.home') ->with('produtos', $produtos);
    }
    public function contato()
    {
      $produtos = $this->produtoRepository->all();
        return view('front.contato');
    }
}
