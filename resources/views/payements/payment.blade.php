@extends('layout.master')

@section('content')

@include('payements.stylesheet.css-pay')

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="col-md-3">
			<form action="{{ route('showStudentPayment') }}" class="search-payment" method="GET">
				<input type="text" name="id_eleve" value="{{$id_eleve}}" placeholder="ID etudiant" class="form-control">
			</form>
		</div>
		<div class="col-md-3">
			<label class="eng-name"> Nom : <b class="student-name">{{ $status->nom." ".$status->prenom }}</b></label>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3" style="text-align: right;">
			<label class="invoice-number"> Recus N<sup>0</sup>: <b></b></label>
		</div>
		<div class="col-md-3" style="text-align: right;">
			<label class="date-invoice">Date: <b>{{ date('d-M-Y') }}</b></label></div>





		</div>
		<form action="" method="POST" id="formPayment">
			{{ csrf_field() }}
			<div class="panel-body">
				<table style="margin-top: -12px">
					<caption class="acadeaicDetails" style="color:blue; font-size:120%;">
					La classe :	&nbsp;{{ $status->programe }}&nbsp;&nbsp;
							{{ $status->niveau }}&nbsp;&nbsp;
								{{ $status->groupe }}


					</caption>
					<thead>
						<tr>
							<th>Programme</th>
		 					<th>Niveau</th>
		 					<th>Frais Scolarite (dh)</th>
		 					<th>Montant (dh)</th>
		 					<!-- <th>Dis(%)</th> -->
		 					<th>Payé (dh)</th>
		 					<th>Montant manque (dh)</th>

						</tr>
					</thead>
					<tr>
						<td>
							<select id="id_programm" name="id_programm" class="d">
								@foreach($program as $p)
								<option value="{{$p->id_programm}}"{{$p->program_id == $status->id_programm ?'selected' : null}}>{{$p->programe}}  </option>
										@endforeach
							</select>
						</td>
						<td>
							<select id="id_niveau" name="id_niveau" class="d">
								@foreach($niveau as $l)
											<option value="{{$l->id_niveau}}" {{$l->id_niveau == $status->id_niveau? 'selected' :null}}>{{$l->niveau}}</option>
									@endforeach
							</select>
						</select>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon create-fee" title="create fee" style="cursor: pointer; color: blue; padding: 0px 3px; padding-right: none;">$</span>
							<input type="text" name="fee" id="Fee" value="" readonly="true" >
						</div>
						<input type="hidden" name="id_frais" id="feeID" value="">
						<input type="hidden" name="id_eleve" id="studentD"  value="" >
						<input type="hidden" name="id_niveau" value="" id="levelID" >
						<input type="hidden" name="id_user" id="userID" value="{{ Auth::id() }}" >
						<input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}" id="TransacDate" >
						<input type="hidden" name="id_frais_etudiant" id="s_fee_id" >

					</td>
					<td>
						<input type="text" name="amount" id="Amount" required class="d">
					</td>
					<!-- <td>
						<input type="text" name="discount" id="Discount" class="d" >
					</td> -->
					<td>
						<input type="text" name="paid" id="Paid" >
					</td>
					<td>
						<input type="text" name="lack" id="Lack" disabled>
					</td>
				</tr>
				<thead>
					<tr>
						<!-- <th colspan="2">Remarck</th> -->
						<th colspan="5">Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<!-- <td colspan="2">
							<input type="text" name="remark" id="remark">
						</td> -->
						<td colspan="5">
							<input type="text" name="description" id="description">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="panel-footer" >
			<input type="submit" id="btn-go" name="btn-go" class="btn-primary btn-payment" value="Enregistrer">
					<a href="" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-print" title="Print"></i>Imprimer</a>
			<input type="button" onclick="this.form.reset()"  class="btn btn-default btn-reset pull-right" value="Reset" >

		</div>
	</form>
</div>

<input type="hidden" name="0" id="disabled">
@endsection

@section('script')

@endsection
