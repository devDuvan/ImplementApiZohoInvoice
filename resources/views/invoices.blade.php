@extends('layouts.main')

@section('content')
	<table class="table">
				<caption class="table-title">Todas las facturas</caption>
				<thead>
					<tr>
						<th class="data-secundary"><a href="#">Fecha</a></th>
						<th><a href="#">N° de factura</a></th>
						<th class="data-secundary"><a href="#">Número de orden</a></th>
						<th><a href="#">Nombre del cliente</a></th>
						<th><a href="#">Estado</a></th>
						<th><a href="#">Fecha de vencimiento</a></th>
						<th><a href="#">Importe</a></th>
						<th class="data-secundary"><a href="#">Saldo</a></th>
					</tr>
				</thead>
				<tfoot>
			        <tr>
			            <td colspan="9">
				            <ul class="pagination">
								@for ($i = 1; $i < $result["pages"]+1; $i++)
									@if($result["minTotal"]!=0)
										@if($result["page"]==$i)
											<li class="is-active">{!!link_to_route('invoices.index', $title = $i , $parameters = ["page"=>$i,"minTotal"=>$result["minTotal"]], $attributes=[])!!}</a></li>
										@else
											<li>{!!link_to_route('invoices.index', $title = $i , $parameters = ["page"=>$i,"minTotal"=>$result["minTotal"]], $attributes=[])!!}</a></li>
										@endif
									@else
										@if($result["page"]==$i)
											<li class="is-active">{!!link_to_route('invoices.index', $title = $i , $parameters = ["page"=>$i], $attributes=[])!!}</a></li>
										@else
											<li>{!!link_to_route('invoices.index', $title = $i , $parameters = ["page"=>$i], $attributes=[])!!}</a></li>
										@endif
									@endif
									
								@endfor
							</ul>
						</td>
			        </tr>
			    </tfoot>
				<tbody>
					@foreach($result["invoices"] as $invoice)
							<tr>
								<td class="data-secundary">{{ $invoice["date"] }}</td>
								<td>{{ $invoice["invoice_number"] }}</td>
								<td class="data-secundary">{{ $invoice["reference_number"] }}</td>
								<td>{!!link_to_route('contacts.show', $title = $invoice["customer_name"] , $parameters = $invoice["customer_id"], $attributes=['class'=>'table-link'])!!}</td>
								<td>{{ $invoice["due_days"] }}</td>
								<td>{{ $invoice["due_date"] }}</td>
								<td>{{ $invoice["currency_code"]." ".$invoice["total"] }}</td>
								<td class="data-secundary">{{ $invoice["currency_code"]." ".$invoice["balance"] }}</td>
								<td>{!!link_to_route('invoices.show', $title = "Ver detalle" , $parameters = [$invoice["invoice_id"]	], $attributes=['class'=>'button-dark'])!!}</td>
							</tr>
					@endforeach
					
				</tbody>
	</table>



	{!!link_to_route('invoices.index', $title = "Refresh" , $parameters = [], $attributes=['class'=>'button-dark'])!!}
	{!!link_to_route('invoices.index', $title = "Facturas > COP 100.000" , $parameters = ["minTotal"=>"100000"], $attributes=['class'=>'button-dark'])!!}
	<a href="#" class="button-dark" id="ShortData">Mostrar datos principales</a>
	<a href="#" class="button-dark hidden" id="LargeData">Mostrar todos los datos</a>
	{!!Html::Script('js/app.js')!!}
@stop