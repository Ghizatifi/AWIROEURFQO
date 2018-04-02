@extends('layout.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-th-list"></i>  CHERCHER UN PROFESSEUR  </h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Accueil</a> </li>
			<li><i class="fa fa-male"></i><a href=""> Professeur</a> </li>
			<li><i class="fa fa-search"></i><a href=""> Chercher un professeur</a> </li>
		</ol>
	</div>
</div>


{{-------------------}}
<div class="panel panel-default">
<div class="panel-body">
	<form action="" method="GET" id="=form-search">
		<table>
			<tr>
				<td>
					<input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Saiair ID ou le nom">
				</td>
			</tr>
	
       </table>
	</form>


</div>

<div class="panel-body">
	<table class="table  table-condensed table-hover table-striped table-bordered ">
		<thead>
			<th>N<sup>o</sup></th>
			<th>Nom </th>
			<th>Prenom </th>
			<th>Sexe </th>
			<th>Ville</th>
			<th>email </th>

			<th>Action</th>
		</thead>
		
<tbody>

			@foreach($prof as $art)
			<tr>
			<td> {{ $art->id_prof }}</td>
			<td> {{ $art->nom }} </td>
			<td> {{ $art->prenom }} </td>
			<td> {{ $art->sexe }} </td>
			<td> {{ $art->ville }} </td>
			<td> {{ $art->email }} </td>

			<td>
				<a href="#" class="btn btn-info">Edite</a>
                
				<a href="#" class="btn btn-danger">delete</a>
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