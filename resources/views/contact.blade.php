@extends('layouts.main')

@section('content')
	<section class="information">
	{{ debug($contact) }}
			<h2>{{ $contact["company_name"] }}</h2>
			<section class="data-main">
				<h4 class="information-title">Detalles del contacto principal</h4>
				<div class="row">
					<div class="col">Nombre de la empresa</div>
					<div class="col">{{ $contact["company_name"] }}</div>
				</div>
				<div class="row">
					<div class="col">Nombre</div>
					<div class="col">{{ $contact["contact_persons"][0]["salutation"]."".$contact["contact_persons"][0]["first_name"]."".$contact["contact_persons"][0]["last_name"] }}</div>
				</div>
				<div class="row">
					<div class="col">Correo electrónico</div>
					<div class="col">{{ $contact["contact_persons"][0]["email"] }}</div>
				</div>
				<div class="row">
					<div class="col">Teléfono móvil</div>
					<div class="col">{{ $contact["contact_persons"][0]["phone"] }}</div>
				</div>
				<div class="row">
					<div class="col">Teléfono</div>
					<div class="col">{{ $contact["contact_persons"][0]["mobile"] }}</div>
				</div>
			</section>

			<section class="data-complements">
				<h4 class="information-title">Otros detalles</h4>
				<div class="row">
					<div class="col">Cód. de moneda </div>
					<div class="col">{{ $contact["currency_code"] }}</div>
				</div>

				<div class="row">
					<div class="col">Sitio web </div>
					<div class="col">{{ $contact["website"] }}</div>
				</div>
				
				<div class="row">
					<div class="col">Términos de pago</div>
					<div class="col">{{ $contact["payment_terms_label"] }}</div>
				</div>
			</section>
	</section>
@stop