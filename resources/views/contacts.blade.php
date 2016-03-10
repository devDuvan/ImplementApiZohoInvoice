@extends('layouts.main')

@section('content')
	<table class="table">
				<caption class="table-title">Todos los contactos</caption>
				<thead>
					<tr>
						<th><a href="#">Nombre</a></th>
						<th><a href="#">Nombre de la empresa</a></th>
						<th><a href="#">Correo electronico</a></th>
						<th><a href="#">Telefono laboral</a></th>
						<th><a href="#">Cuentas por cobrar</a></th>
						<th><a href="#">Creditos sin usar</a></th>
					</tr>
				</thead>
				<tbody>
					@foreach($contacts as $contact)
					<tr>
						<td>{!!link_to_route('contacts.show', $title = $contact["contact_name"] , $parameters = $contact["contact_id"], $attributes=['class'=>'table-link'])!!}</td>
						<td>{{ $contact["company_name"] }}</td>
						<td>{{ $contact["email"] }}</td>
						<td>{{ $contact["phone"] }}</td>
						<td>{{ $contact["currency_code"]." ".$contact["outstanding_receivable_amount"] }}</td>
						<td>{{ $contact["unused_credits_receivable_amount"] }}</td>
					</tr>
					@endforeach
				</tbody>
	</table>
@stop

