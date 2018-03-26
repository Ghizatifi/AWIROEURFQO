@extends('layout.master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-list-alt"></i>  CHERCHER UN ELEVE  </h1>
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
			<th>Nom </th>
			<th>Prenom </th>
			<th>Sexe </th>
			<th>Date de naissance</th>
			<th> Niveau </th>
			<th>Classe </th>
			<th>Action</th>
		</thead>
		





	</table>
</div>
<div class="footer">
	
</div>
 </div>
@endsection