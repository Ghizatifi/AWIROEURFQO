<div class="panel panel-default" style=" margin-top:-18px">
	<div class="panel-heading"> La liste des paiements </div>
	<div class="panel-body">
		<div class="table-responsive">
			<table  style="border-collapse: collapse;" class="table-hover table-bordered" id="list-student-fee">
				<thead>
					<tr>
						<th style="text-align: center;">N<sup>0</sup></th>
						<th >Programme</th>
						<th >Niveau</th>
						<th style="text-align: center;">Frais</th>
						<!-- <th style="text-align: center;">Montant</th> -->
						<!-- <th style="text-align: center;">Discount</th> -->
						<!-- <th style="text-align: center;">Paye</th> -->
						<th style="text-align: center;">Paye</th>
						<th style="text-align: center;">Reste</th>

						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody id="tbody-student-fee">
					@foreach($readstudentFee as $key=>$var)
					<tr data-id="" id="feeId">
						<td style="text-align: center;">{{$key+1}}</td>
						<td style="text-align: center;"> {{$var->programe}}</td>

						<td style="text-align: center;">{{$var->niveau}}</td>
						<td style="text-align: center;">{{number_format($var->school_fee,2)}} dh</td>
						<td style="text-align: center;">{{number_format($var->student_amount,2)}} dh</td>
						<!-- <td style="text-align: center; color: BlueViolet  ">{{ number_format($readstudentTrans->where('id_frais_etudiant',$var->id_frais_etudiant)->sum('paye'),2) }} dh
							<input type="hidden" name="b" id="b">
						</td> -->
						<td style="text-align: center; color: red">{{ number_format($var->school_fee - $readstudentTrans->where('id_frais_etudiant',$var->id_frais_etudiant)->sum('paye'),2) }} dh
							<input type="hidden" name="b" id="b">

							<!-- <input type="hidden" name="c" id="c"> -->
							<!-- <input type="text" name="b" id="b"> -->

						</td>
						<td style="text-align: center; width: 115px; ">
							<!-- <a href="#" class="btn btn-success btn-sfee-edit" title="Edit" data-id-update-student-fee="{{$var->id_frais_etudiant}}" >
								<i class="fa fa-edit"></i> </a> -->
									<button type="button" class="btn-xs btn-paid" value="{{ $var->student_amount - $readstudentTrans->where('id_frais_etudiant',$var->id_frais_etudiant)->sum('paid') }}" data-id-paid="{{$var->id_frais_etudiant}}">
											<i class="fa fa-usd" title="Complete"></i></button>


									<button class="btn-xs accordion-toggle" data-toggle="collapse" data-target="#demo{{$key}}" title="Partial"> <span class="fa fa-eye"></span> </button>
								</td>
							</tr>
							<tr>
								<td colspan="9" class="hidenRow">
									@include('payements.list.ListTransaction')

								</td>
	           @endforeach
							</tr>
						</tbody>
					</table>
				</div>

			</div>
			<div class="panel-footer" style="height: 40px;"></div>
		</div>
