<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	public function produtos(){

		return $this->hasMany('estoque\Produto'); 
		// Categoria tem vários Produtos
		// isto seria igual a criar o relacionamento no mysql? a chave estrangeira?
		// não, ele vai precisar criar uma migration pra isso

	}

}
