<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
	<input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">				</td>
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
			<th>Modifier</th>
			<th>supprimer</th>
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
			<!-- <td>
				<a href="/profs/{{$art->id_prof}}/edit" class="btn btn-primary a-btn-slide-text">
			 <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> -->
			 <!-- <span><strong>Edit</strong></span> -->
	    <!-- </a> -->

			 <td>
				 	<a href="/profs/{{$art->id_prof}}/edit">
				 <button class="btn btn-primary btn-xs" >
				 <span class="glyphicon glyphicon-pencil"></span>
			 </button></a></td>
					 <form action="{{action('ProfController@destroy', $art->id_prof)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <!-- <button class="btn btn-danger" type="submit">Supprimer</button> -->
										<td><p data-placement="top" data-toggle="tooltip" title="Delete">
											<button type="submit" class="btn btn-danger btn-xs" >
												<span class="glyphicon glyphicon-trash"></span>
											</button>
										</p></td>

            </form>
		</tr>
			@endForeach
		</tbody>

	</table>
</div>
<div class="footer">

</div>
 </div>
@endsection
<script>

</script>
