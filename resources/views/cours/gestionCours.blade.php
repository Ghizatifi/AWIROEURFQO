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
			<li><i class="icon_document_alt"></i>Classe</li>
			<li><i class="fa fa-plus"></i>Ajouter une classe</li>

		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<section class="panel panel-default">
			<header class="panel-heading">
				Gestion des classes
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

						<div class="col-sm-3" >
							<label for="acdemic-year"> Periode </label>
							<div class="input-group">
         <select class="form-control" name="shift_id" id="shift_id">
									@foreach($periode as $s)
									<option value="{{$s->id_periode}}">{{$s->periode}}</option>

									@endforeach
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
									@foreach($time as $t)
									<option value="{{$t->id_time}}">{{$t->time}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-time"></span>
								</div>
							</div>
						</div>




					

				</div>


				<div class="panel-footer" >
					<button type="submit" class=" btn btn-primary btn-sm">
						Créer la classe
 					</button>
					<button type="button" class=" btn btn-success btn-sm update-class">
					   Modifier la classe
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

$("#form-crete-class #program_id").on('change',function(e){

		var id_matiere =$(this).val();
		var level = $('#level_id');
		$(level).empty();
		$.get("{{route('showLevel')}}",{id_matiere:id_matiere},function(data){
			$.each(data,function(i,l){
				$(level).append($("<option/>",{
					value : l.level_id,
					text  :  l.niveau,

				}));
			});
			showClassInfo();

		});
	});



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

  /////////////////////////////////////////////////////////////////Niveau///////////////////////////////////////////////
$('#add-more-level').on('click',function(){

 	var programs= $('#program_id option');
 	var program= $('#form-level-create').find('#programs_id');
 	$(program).empty();
 	$.each(programs,function(i,pro){
 		$(program).append($("<option/>",{
 			value : $(pro).val(),
 			text  :  $(pro).text(),

 		}));
 	});
 	$('#level-show').modal('show');

 });

//////
$('#form-level-create').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();
	var url = $(this).attr('action');
	$.post(url,data,function(data){
		
		$('#level_id').append($("<option/>",{
			value : data.id_niveau,
			text  :  data.niveau

		}));  
		$('#programs_id').val("");
		$('#new_level').val("");    
		$('#description').val("");

	});
});
 /////////

     ////////////////////////////////////==============///////////shift/////////////////////////////////////////////////

    $('#add-more-shift').on('click',function(){
    	$('#shift-show').modal();
    });


//////////

$('.btn-save-shift').on('click',function(){
	var periode = $('#new_shift').val();
	$.post("{{route('postInsertshift')}}",{periode:periode},function(data){
		$('#shift_id').append($("<option/>",{
			value : data.id_periode,
			text  :  data.shift

		}));    	
		$('#new_shift').val("");
	});
});


////////////////////////////////////////======time===/////////////////////////////////////////////////

$('#form-time-create').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();
	$.post("{{ route('postInserttime') }}",data,function(data){
		
		$('#time_id').append($("<option/>",{
			value : data.time_id,
			text  :  data.time

		}));
	});

	$(this).trigger('reset');

});
$('#add-more-time').on('click',function(e){

	$('#time-show').modal('show');


});



$('#form-group-create').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();
	$.post("{{ route('postInsertgroup') }}",data,function(data){
		
		$('#group_id').append($("<option/>",{
			value : data.id_group,
			text  :  data.groupe

		}));
	});

	$(this).trigger('reset');

});
$('#add-more-group').on('click',function(e){

	$('#group-show').modal('show');


});

</script>

@endsection


add-more-year
