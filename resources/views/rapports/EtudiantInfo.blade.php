<table class=" table table-bordered table-hover table-striped table-condensed" id="student-info">
	<caption>{{$classes[0]->program }}</caption>
	<thead>
		<tr>
			<th>#</th>
			<th>N etudiant</th>
			<th> Nom complet </th>
			<th> Date de naissance </th>
			<th> Sexe </th>

		</tr>
	</thead>
	<tbody>
		@foreach($classes as $key =>$c)


		<tr>
			<td>{{ ++$key}}</td>

			<td>{{sprintf("%05d",$c->id_eleve) }}</td>
			<td>{{ $c->name }}</td>
			<td>{{ $c->date_naissance }}</td>
				<td>{{ $c->sex }}</td>
		</tr>

		@endforeach
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {
    $('#student-info').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
