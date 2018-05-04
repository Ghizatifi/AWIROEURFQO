<table class=" table table-bordered table-hover table-striped table-condensed" id="student-info">
	<caption>{{$classes[0]->programe }}</caption>
	<thead>
		<tr>
			<th>#</th>
			<th> Student ID </th>
			<th> Name </th>
			<th> Sex </th>
			<th> Birth Date </th>
		</tr>
	</thead>
	<tbody>
		@foreach($classes as $key =>$c)


		<tr>
			<td>{{ ++$key}}</td>
			<td>{{sprintf("%05d",$c->id_eleves) }}</td>
			<td>{{ $c->nom }}</td>
			<td>{{ $c->sexe }}</td>
			<td>{{ $c->prenom }}</td>
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
