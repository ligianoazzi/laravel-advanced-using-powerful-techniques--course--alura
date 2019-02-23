<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto; // calling for the model




class ProdutoController extends Controller
{
    public function lista(){

   	 //$produtos = DB::select('select * from produtos');
    	$produtos = Produto::all();
   	 return view('listagem')->with('produtos', $produtos);

    }

    public function mostra(){
    	$id = Request::route('id');

		//$produto = DB::select('select * from produtos where id = ?', [$id]);
		$produto = Produto::find($id);


    	if(empty($produto)){
    		return "This product does not exist";
    	}
	   	//return view('detalhes')->with('p', $produto[0]);
	   	return view('detalhes')->with('p', $produto); // is not more a array

    }

    public function novo(){
    	return view('formulario');
    }

	public function adiciona(){

		/*$nome = Request::input('nome');
		$quantidade = Request::input('quantidade');
		$valor = Request::input('valor');
		$descricao = Request::input('descricao');*/

		// $table = 'nome_of_the_table';

		$produto = new Produto();
		$produto->nome = Request::input('nome');
		$produto->quantidade = Request::input('quantidade');
		$produto->valor = Request::input('valor');
		$produto->descricao = Request::input('descricao');

		$produto->timestamps = false; // in the others versions of Laravel, can be different


		try {

			//DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?, ?, ?, ?)', array($nome, $quantidade, $valor, $descricao));
			$produto->save();			

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
