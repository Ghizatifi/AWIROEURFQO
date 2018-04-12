<div class="accordion-body collapse {{ $key==0 ? 'in' :null }}" id="demo{{$key}}">
	<table>
		<thead>
			<tr>
				<th style="text-align: center;">Num</th>
				<th>Date d'eperation</th>
				<th>Tuteur</th>
	      <th>Caissier</th>
				<th>Paye (dh)</th>
				<th>Type de paiement</th>
				<!-- <th>Description</th> -->
				<th style="text-align: center">Action</th>
			</tr>

		</thead>
		<tbody>
			@foreach($readstudentTrans as $n =>$st)
			<tr>
				<td>{{++$n}}</td>
				<td>{{ $st->date }} </td>
				<td> {{ $st->nom_Pere }}</td>
					<td> {{ $st->name }}</td>
					<td> {{number_format($var->student_amount,2)}} dh</td>
					<td> {{ $st->type_paiement }}</td>
					<!-- <td>{{ $st->description }}</td> -->
				<td style="text-align: center ;width: 112px;">
					<!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit" title="Edit"></i></a>
					<a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delet"></i></a>
					<a href="" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-print" title="Print"></i></a> -->
				</td>




			</tr>
			@endforeach

		</tbody>
	</table>
</div>
