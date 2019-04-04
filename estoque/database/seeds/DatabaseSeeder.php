<?php

use Illuminate\Database\Seeder;
use estoque\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call('CategoriaTableSeeder');
    }
}

class CategoriaTableSeeder extends Seeder {

	public function run()
	{
		Categoria::create(['nome' => 'ELETRODOMESTICO']);
		Categoria::create(['nome' => 'ELETRONICA']);
		Categoria::create(['nome' => 'BRINQUEDO']);
		Categoria::create(['nome' => 'ESPORTES']);		
	}

}
