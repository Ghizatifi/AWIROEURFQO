@extends('layout.master')

@section('content')
@include('cours.popup.annee')
@include('cours.popup.group')
@include('cours.popup.time')
@include('cours.popup.niveau')
@include('cours.popup.periode')
@include('cours.popup.matiere')






<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Cours</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="index.html">Acceuil</a></li>
			<li><i class="icon_document_alt"></i>Matieres</li>
			<li><i class="fa fa-plus"></i>Ajouter une matieres</li>

		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<section class="panel panel-default">
			<header class="panel-heading">
				Manage Courses
			</header>
			<form  action="" method="POST" class="form-horizontal" id="form-crete-class">
				{{ csrf_field() }}
				<input type="hidden" name="active" id="active" value="1">
				<input type="hidden" name="classe_id" id="classe_id">

				<div class="panel-body" >
					<div class="form-group">

						
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
							<label for="acdemic-year"> Matiere </label>
							<div class="input-group">
							<select class="form-control" name="program_id" id="program_id">
									<option value="">-----------</option>
									@foreach($program as $key=> $p)
									<option value="{{$p->id_matiere}}">{{$p->nom}}</option>

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
								<option value=""></option>
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
									
									<option value=""></option>

								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-group"></span>
								</div>
							</div>
						</div>

						<div class="col-sm-3" >
							<label for="acdemic-year"> Periode </label>
							<div class="input-group">
								<select class="form-control" name="shift_id" id="shift_id">
									
									<option value=""></option>

								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-shift"></span>
								</div>
							</div>
						</div>

					
					
	<div class="col-sm-4" >
							<label for="time"> Horaire </label>
							<div class="input-group">
								<select class="form-control" name="time_id" id="time_id">
								
									<option value=""></option>

								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-time"></span>
								</div>
							</div>
						</div>




					

				</div>


				<div class="panel-footer" >
					<button type="submit" class=" btn btn-primary btn-sm">
						Créer la matière
					</button>
					<button type="button" class=" btn btn-success btn-sm update-class">
					   Modifier la matière
					</button>

				</div>
			</div>
		</div>

	</form>
	<div class="panel panel-default ">
		<div class="panel panel-heading">
			Information sur les classes
		</div>
		<div class="panel panel-body" id="add-class-info">
			
		</div>
	</div>
</section>
</div>



</div>
@endsection
@section('script')

<script>

    /////////////////////////////////////////////////////////////////Annee Scolaire////////////////////////////////////////////////
    $('#add-more-year').on('click',function(){
    	$('#academic-year-show').modal();
    });


//////////

$('.btn-save-year').on('click',function(){
	var annee = $('#new_year').val();
	$.post("{{route('postInsertYear')}}",{annee:annee},function(data){
		$('#academic_id').append($("<option/>",{
			value : data.academic_id,
			text  :  data.annee

		}));    	
		$('#new_year').val("");
	});
});


 /////////
 $('#add-more-program').on('click',function(){
 	$('#program-show').modal();
 });


 $('.btn-save-program').on('click',function(){
 	var nom = $('#new_program').val();
 	var description = $('#new_description').val();

 	$.post("{{route('postInsertProgram')}}",{nom:nom,description:description},function(data){
 	$('#program_id').append($("<option/>",{
 			value : data.program_id,
 			text  :  data.nom

 		}));    	
 		$('#new_program').val("");    
 		$('#new_description').val("");
 	});
 });

////////////////////////////////////////////////////////////////Level//////////////////////////////////////////////

 /////////
</script>

@endsection


add-more-year
