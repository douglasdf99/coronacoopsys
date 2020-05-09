<?php

namespace App\Http\Controllers;

use App\Mail\ContatoEmail;
use App\Mail\Rastreio;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function enviar(Request $request)
    {
      $data = [
        'nome' => $request->nome,
        'email' => $request->email,
        'mensagem' => $request->mensagem
      ];

      Mail::to('nucleo@ocb.coop.br')->send(new ContatoEmail($data));
      //Mail::to('douglasmatosbsi@gmail.com')->send(new ContatoEmail($data));
      return response()->json(['message' => 'email enviado com sucesso'], 200);

    }
}
