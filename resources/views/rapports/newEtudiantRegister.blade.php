@extends('layout.master')

@section('content')
    {!! Charts::assets() !!}


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-file-text-o"></i> NOUVELLE INSCRIPTION D'ÉTUDIANTS</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Acceuil</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Etudiants</a> </li>
			<li><i class="fa fa-home"></i><a href=""> Statistque</a> </li>
		</ol>
	</div>
</div>





{{-------------------}}
<div class="panel panel-default">

<div class="panel-heading">
	<b><i class="fa fa-dashboard"></i> Details </b>

</div>
<div class="panel-body" style="padding-bottom: 4px">
	<b></b>
<div class="show-student-info">

		{!! $chart->render() !!}


	</div>

</div>
 </div>



@endsection
