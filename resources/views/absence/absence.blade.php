@extends('layout.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-th-list"></i>  CHERCHER UN ELEVE  </h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Accueil</a> </li>
			<li><i class="fa fa-male"></i><a href=""> Eleves</a> </li>
			<li><i class="fa fa-search"></i><a href=""> Chercher un eleve</a> </li>
		</ol>
	</div>
</div>


{{-------------------}}
<div class="panel panel-default">
<div class="panel-body">

	<div class="col-sm-3" >
		<label for="acdemic-year"> Anne scolaire </label>
		<div class="input-group">
			<select class="form-control" name="academic_id" id="academic_id">
				@foreach($annees as $A)
				<option value="{{$A->id_annee}}">{{$A->annee}}</option>

				@endforeach
			</select>
			<div class="input-group-addon" >
				<span class="fa fa-plus" id="add-more-year" ></span>
			</div>
		</div>
	</div>

	<div class="col-sm-3" >
		<label for="acdemic-year"> Programme </label>
		<div class="input-group">
		<select class="form-control" name="program_id" id="program_id">
				@foreach($program as $key=> $p)
				<option value="{{$p->is_programm}}">{{$p->programe}}</option>

				@endforeach
			</select>
			<div class="input-group-addon" >
				<span class="fa fa-plus" id="add-more-program"></span>
			</div>
		</div>
	</div>


	<div class="col-sm-3" >
		<label for="acdemic-year"> Matiere </label>
		<div class="input-group">
		<select class="form-control" name="program_id" id="program_id">
				@foreach($matiere as $key=> $p)
				<option value="{{$p->is_programm}}">{{$p->matiere}}</option>

				@endforeach
			</select>
			<div class="input-group-addon" >
				<span class="fa fa-plus" id="add-more-program"></span>
			</div>
		</div>
	</div>


	<div class="col-sm-3" >
		<label for="acdemic-year"> Niveau </label>
		<div class="input-group">
		<select class="form-control" name="level_id" id="level_id">
			<select class="form-control" name="program_id" id="program_id">

			</select>
			</select>
			<div class="input-group-addon" >
				<span class="fa fa-plus" id="add-more-level"></span>
			</div>
		</div>
	</div>

 <div class="col-sm-4" >
		<label for="groub"> Groupe </label>
		<div class="input-group">
			<select class="form-control" name="group_id" id="group_id">
				@foreach($groups as $g)
				<option value="{{$g->id_groupe}}">{{$g->groupe}}</option>

				@endforeach
			</select>
			<div class="input-group-addon" >
				<span class="fa fa-plus" id="add-more-group"></span>
			</div>
		</div>
	</div>

	<!-- <form action="" method="GET" id="=form-search">
		<table>
			<tr>
				<td>
					<input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Saiair ID ou le nom">
				</td>
			</tr>

       </table>
	</form> -->


</div>

<div class="panel-body">
	<table class="table  table-condensed table-hover table-striped table-bordered ">
		<thead>
			<th>N<sup>o</sup></th>
			<th>Photo </th>
			<th>Nom Complet </th>
			<th>Email </th>
			<th>Classe </th>
			<th>Absence</th>
		</thead>

<tbody>

			@foreach($eleve as $art)
			<tr>
			<td> {{ $art->id_eleve }}</td>

            <td><img src="{{ asset('storage/'.$art->photo) }}" height="50" width="50"></td>
 			<td> {{ $art->nom }} {{ $art->prenom }}</td>
			<td> {{ $art->email }} </td>
			<td> {{ $art->programe }}  </td>

			<td>
				<label>
					<input type="checkbox" name="absence" id="absence" value="0" required>

				</label>
			</td>

		</tr>
			@endForeach
		</tbody>
	</table>
</div>
<div class="footer">

</div>
 </div>
@endsection
