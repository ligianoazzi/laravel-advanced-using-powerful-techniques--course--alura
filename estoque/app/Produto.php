<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
 
	public $timestamps = false; // in the others versions of Laravel, can be different
	protected $fillable = 
		array('nome', 'descricao', 'quantidade', 'tamanho', 'valor', 'categoria_id');

	public function categoria(){

		return $this->belongsTo('estoque\Categoria'); 
		// Produto pertence a Categoria
		// isto seria igual a criar o relacionamento no mysql? a chave estrangeira

	}

}
