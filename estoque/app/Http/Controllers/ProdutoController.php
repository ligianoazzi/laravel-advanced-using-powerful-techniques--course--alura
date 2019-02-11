<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
class ProdutoController extends Controller
{
    public function lista(){

   	 $produtos = DB::select('select * from produtos');
   	 return view('listagem')->with('produtos', $produtos);

    }

    public function mostra(){
    	$id = Request::route('id');

		$produto = DB::select('select * from produtos where id = ?', [$id]);
    	if(empty($produto)){
    		return "This product does not exist";
    	}
	   	return view('detalhes')->with('p', $produto[0]);

    }

    public function novo(){
    	return view('formulario');
    }

	public function adiciona(){

		$nome = Request::input('nome');
		$quantidade = Request::input('quantidade');
		$valor = Request::input('valor');
		$descricao = Request::input('descricao');

		try {

			DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?, ?, ?, ?)', array($nome, $quantidade, $valor, $descricao));

			//return redirect('/produtos')->withInput(Request::only('nome'));
			return redirect()
			->action('ProdutoController@lista')
			->withInput(Request::only('nome'));

		}catch (customException $e) {
		 
		 	echo $e->errorMessage();

		}

	}

	public function getJson(){
		$produtos = DB::select('select * from produtos');
		return $produtos;
	}

}
