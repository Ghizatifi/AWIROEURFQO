@extends('layout.master')

@section('content')

<div class="row">
	
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Creer une matiere</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Acceuil </a></li>
			<li><i class="fa fa-maxcdn"></i> matiere</li>
			<li><i class="fa fa-plus" ></i> enregistrer une matiere </li>

		</ol>
	</div>
</div>
<div class="row">
	
	<div class="col-lg-12">

		<div class="panel-group" id="accordion" >

			<div class="panel panel-default " >
				<div class="panel-heading">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;" > Ajouter une matiere </a>
					<a href="#" class="pull-right" id="show-class-info"  ><i class="fa fa-plus"></i></a>
				</div>
				<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-mat" ></span>
								</div>


			</div>
		</div>


{{-------------------}}
<div class="panel panel-default">
<div class="panel-body">
	<form action="" method="POST" id="=form-search">
		<table>
			<tr>
				<td>
					<input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Saiair ID ou le nom">
				</td>
			</tr>
	
       </table>
	</form>

<div class="panel panel-default ">
		<div class="panel panel-heading">
			Les information sur les matieres
		</div>
		<div class="panel panel-body" id="add-class-info">
			
		</div>
	</div>
</div>


<div class="footer">
	
</div>
 </div>

 @include('classes.MatPopup')
@endsection
@section('script')

		<script type="text/javascript">

	$('#form-multi-class #btn-go').addClass('hidden');
$('#show-class-info').on('click',function(e){
	e.preventDefault();
		$('#academic-choose').modal('show');

	});

			$( "#dob" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd'


	});
	$(document).on('click','#class-edite',function(e){
		e.preventDefault();
		$('#classe_id').val($(this).data('id'));
		$('.academic-detail p').text($(this).text());
		$('#academic-choose').modal('hide');

	})

//////////////////////////////////////////////// addAclass in table

  
</script>



@endsection