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

    public function remove($id){
		$produto = Produto::find($id);
		$produto->delete();
   	 	return redirect()->action('ProdutoController@lista');
    }

    public function novo(){
    	return view('formulario');
    }

	public function adiciona(){

		$params = Request::all();
		$produto = new Produto($params);
		$produto->save();


		/*
		it is possible to use also:
		Produto::create(Request::all());

		instead:
		$params = Request::all();
		$produto = new Produto($params);
		$produto->save();
		*/


		return redirect('/produtos')->withInput();

		try {

			$produto->save();			

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
