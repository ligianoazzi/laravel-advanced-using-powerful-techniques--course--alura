@extends('principal')

@section('conteudo')
		<h1>Product Detail | {{$p->nome}}</h1>
		<table class="table">
			<tr>
				<th>Name</th>
				<th>Value</th>
				<th>Description</th>
				<th>Quantity</th>
			</tr>

			<tr>
				<td> {{ $p->nome }} </td>
				<td> {{ $p->valor }} </td>
				<td> {{ $p->descricao or 'do not have description' }} </td>
				<td> {{ $p->quantidade }} </td>
			</tr>			


		</table>
@endsection
