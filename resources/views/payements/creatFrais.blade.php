<style type="text/css">

.table-fee{
	border: none;
}
.table-fee tr ,td ,th{
	border: none;

}
</style>
<div class="modal fade" id="createFeeOpup" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b><i class="glyphicon glyphicon-apple"></i>Creer les frais de scolarite</b>
				</div>
				<form action="{{ route('createFrais') }}" method="POST" id="formFee">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table-fee">
								<tr>
									<td>Programe</td>
									<td>
										<input type="text" value="{{$status->programe}}" disabled>
										<!-- <input type="text" value="{{$status->programe}}" disabled> -->

									</td>
								</tr>

								<tr>
									<td> <label> Annee Scolaire</label> </td>
									<td>
										<input class="text" value="{{$status->annee}}" disabled >
											<input type="hidden" name="id_annee"  value="{{$status->id_annee}}" >


									</td>

								</tr>

								<!-- <tr>
									<td>Fee Heading</td>
									<td>
										<input type="text" name="fee_heading" id="fee_heading" value="Fees" disabled>
									</td>
								</tr> -->




								<tr>
									<td>Niveau</td>
									<td>
										<input type="text" value="{{$status->niveau}}" disabled>
											<input type="hidden" name="id_niveau"  value="{{$status->id_niveau}}" >
									</td>
								</tr>
								<tr>
									<td> <label> Type de frais </label> </td>
									<td>
										<select class="text" id="id_fraistype" name="id_fraistype" disabled>
											@foreach($fraistype as $f)
												<option value="{{$f->id_fraistype}}">{{$f->type}}</option>
											@endforeach

										</select>
									</td>

								</tr>
								<tr>
									<td>Frais de scolarite (dh)</td>
									<td>
										<input type="text" name="montant" class="form-control" id="montant" autocomplete="off" placeholder="Montant">

									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="Enregistrer">
						<button type="button" class="btn btn-warning pull-right" data-dismiss="modal"> Fermer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
