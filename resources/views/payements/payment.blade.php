@extends('layout.master')

@section('content')

@include('payements.stylesheet.css-pay')
@include('payements.creatFrais')

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
			<label class="invoice-number"> Recus N<sup>0</sup> : <b> {{sprintf('%06d',$id_reçus)}}</b></label>
		</div>
		<div class="col-md-3" style="text-align: right;">
			<label class="date-invoice">Date: <b>{{ date('d-M-Y') }}</b></label></div>





		</div>
		<form action="{{ route('savePayment') }}" method="POST" id="formPayment">
			{{ csrf_field() }}
			<div class="panel-body">
				<table style="margin-top: -12px width:100%  border-spacing: 5px;"  >
					<caption class="acadeaicDetails" style="color:#ff00d2; font-size:120%; ">
					La classe :	&nbsp;{{ $status->programe }}&nbsp;&nbsp;
							{{ $status->niveau }}&nbsp;&nbsp;
								{{ $status->groupe }}


					</caption>
					<thead>
						<tr>
							<th>Programs</th>
							<th>Leavel</th>
							<th>School Fee($)</th>
							<!-- <th>Amount ($)</th> -->
							<!-- <th>Dis(%)</th> -->
							<th>Paid($)</th>
							<th>Amount Lack($)</th>

						</tr>
					</thead>
					<tr>
						<td>
							<select id="program_id" name="program_id" class="d">
								@foreach($program as $p)
								<option value="{{$p->id_programm}}"{{$p->program_id == $status->id_programm ?'selected' : null}}>{{$p->programe}}  </option>
										@endforeach
							</select>
						</td>
						<td>
							<select id="level_Id" name="level_id" class="d">
								@foreach($niveau as $l)
											<option value="{{$l->id_niveau}}" {{$l->id_niveau == $status->id_niveau? 'selected' :null}}>{{$l->niveau}}</option>
									@endforeach
							</select>
						</select>
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="fee" id="Fee" value="{{ $fraisEtudiant->montant or null }}" readonly="true" >
							<span class="input-group-addon create-fee" title="create fee" style="cursor: pointer; color: #ff00d2; padding: 0px 3px; padding-right: none;">dh</span>
						</div>
						<input type="hidden" name="id_frais" id="feeID" value="{{$fraisEtudiant->id_frais or null}}">
						<input type="hidden" name="id_eleve" id="studentD"  value="{{$id_eleve}}" >
						<input type="hidden" name="id_niveau" value="{{$status->id_niveau}}" id="levelID" >
						<input type="hidden" name="id_user" id="userID" value="{{ Auth::id() }}" >
						<input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}" id="TransacDate" >
						<input type="hidden" name="id_frais_etudiant" id="id_frais_etudiant" >

					</td>
					<!-- <td>
						<input type="text" name="amount" id="Amount" required class="d">
					</td>
					<td>
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
						<th colspan="2">Remarck</th>
						<th colspan="5">Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="2">
							<input type="text" name="remark" id="remark">
						</td>
						<td colspan="5">
							<input type="text" name="description" id="description">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="panel-footer" >
			<input type="submit" id="btn-go" name="btn-go" class="btn-primary btn-payment" value="{{ count($readstudentTrans)!=0? 'Extra Pay': 'Enregistrer' }}">
					<a href="{{ route('printInvoice',$id_reçus) }}" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-print" title="Print"></i>Imprimer</a>
			<input type="button" onclick="this.form.reset()"  class="btn btn-default btn-reset pull-right" value="Reset" >

		</div>
	</form>
</div>
@if(count($readstudentFee)!=0)
@include('payements.list.ListFraisEtd')
<input type="hidden" name="0" id="disabled">
@endif
@endsection

@section('script')
@include('payements.script.calculFrais')
@include('payements.script.payment')

@endsection
