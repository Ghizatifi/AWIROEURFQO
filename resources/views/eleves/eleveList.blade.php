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
			<th>Photo </th>
			<th>Nom Complet </th>
			<th>Adresse</th>
			<th>Email </th>
			<th>Classe </th>
			<th>Modifier</th>
			<th>Supprimer</th>

		</thead>

<tbody>

			@foreach($eleve as $art)
			<tr>
			<td> {{ $art->id_eleve }}</td>

            <td><img src="{{ asset('storage/'.$art->photo) }}" height="100" width="100"></td>
 			<td> {{ $art->nom_complet }}</td>
			<td> {{ $art->adresse }}  </td>
			<td> {{ $art->email }} </td>
			<td> {{ $art->programe }}  </td>

			 <td><a href="{{action('EleveController@edit',$art->id_eleve)}}" class="btn btn-primary">Modifier</a>
</td>
			<td>	<a href="#" class="btn btn-danger">Supprimer</a>
			</td>
		</tr>
			@endForeach
		</tbody>





	</table>
</div>
<div class="footer">
	{{ $eleve->render() }}

</div>
 </div>
@endsection
