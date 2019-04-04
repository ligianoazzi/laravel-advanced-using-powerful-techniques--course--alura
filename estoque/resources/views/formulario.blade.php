@extends('principal')

@section('conteudo')

<?php if ($errors->all()) { ?>
<div class="alert alert-danger">
<ul>
		@foreach($errors->all() as $error )
	<li>

			{{$error}}

	</li>
		@endforeach
</ul>	

</div>
<?php } ?>

<div>
	<h1>Insert form</h1>
</div>

<form  action="/produtos/adiciona" method="post">

	<input type="hidden" name="_token" value=" {{ csrf_token() }} ">

	<div class="form-group">
		<label> Name </label>
		<input name="nome" class="form-control">
	</div>

	<div class="form-group">
		<label> Price </label>
		<input name="valor" class="form-control">
	</div>

	<div class="form-group">
		<label> Quantity </label>
		<input name="quantidade" class="form-control">
	</div>

	<div class="form-group">
		<label> Size </label>
		<input name="tamanho" class="form-control">
	</div>	

	<div class="form-group">
		<label> Category </label>
		<select name="categoria_id" class="form-control">
			<option value="">Choose category</option>

			@foreach($categorias as $c)
			<option value="{{$c->id}}">{{$c->nome}}</option>
			@endforeach
		</select>	
	</div>	

	<div class="form-group">
		<label> Description </label>
		<input name="descricao" class="form-control">
	</div>

	<button class="btn btn-primary" type="submit">Insert</button>

</form>

@stop