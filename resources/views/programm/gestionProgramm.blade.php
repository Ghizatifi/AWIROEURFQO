@extends('layout.master')

@section('content')
@include('programm.popup.annee')
@include('programm.popup.group')
@include('programm.popup.time')
@include('programm.popup.niveau')
@include('programm.popup.periode')
@include('programm.popup.matiere')






<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Classe</h3>
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
			<form  action="{{ route('createclasses') }}" method="POST" class="form-horizontal" id="form-crete-class">
				{{ csrf_field() }}
				<input type="hidden" name="active" id="active" value="1">
				<input type="hidden" name="id_classe" id="id_classe">

				<div class="panel-body" >
					<div class="form-group">


						<div class="col-sm-3" >
							<label for="acdemic-year"> Anne scolaire </label>
							<div class="input-group">
								<select class="form-control" name="id_annee" id="academic_id">
								@foreach($annees as $A)
									<option value="{{$A->id_annee}}">{{$A->annee}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-year" ></span>
								</div>
							</div>
						</div>

						<div class="col-sm-4" >
							<label for="acdemic-year"> Programme </label>
							<div class="input-group">
							<select class="form-control" name="id_program" id="program_id">
								@foreach($program as $key=> $p)
									<option value="{{$p->id_programm}}">{{$p->nom}}</option>

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
							<select class="form-control" name="id_niveau" id="level_id">
								<select class="form-control" name="program_id" id="program_id">

								</select>
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-level"></span>
								</div>
							</div>
						</div>

	         <div class="col-sm-3" >
							<label for="groub"> Groupe </label>
							<div class="input-group">
								<select class="form-control" name="id_group" id="group_id">
								@foreach($groups as $g)
									<option value="{{$g->id_group}}">{{$g->groupe}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-group"></span>
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
			Infos Classe
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
			showClassInfo();

$("#form-crete-class #program_id").on('change',function(e){

		var id_programm =$(this).val();
		var level = $('#level_id');
		$(level).empty();
		$.get("{{route('showLevel')}}",{id_programm:id_programm},function(data){
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
///////////////////////////////////////////////////////////////////////
function MergeCommonRows(table){

	var firstColumnBrakes =[];
	$.each(table.find('th'),function(i){
		var previous = null,cellToExtend =null ,rowspan = 1;
		table.find("td:nth-child("+ i +")").each(function(index ,e){
			var jthis= $(this),content = jthis.text();
			if (previous == content && content!== "" && $.inArray(index, firstColumnBrakes) === -1) {
				jthis.addClass('hidden');
				cellToExtend.attr("rowspan", (rowspan=rowspan+1));


			}
			else{
				if (i == 1) firstColumnBrakes.push(index);
				rowspan=1;
				previous = content;
				cellToExtend=jthis;


			}

		});
	});
	$('td.hidden').remove();
}
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

////////////////////////////////////////======ADD AClass===////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$('#form-crete-class').on('submit',function(e){
	e.preventDefault();
	var data = $(this).serialize();

	var url = $(this).attr('action');
	$.post(url,data,function(data){
		showClassInfo(data.academic_id);
	});
	$(this).trigger('reset');

});

//////////////////////////////////////////////// addAclass in table
function showClassInfo(){
var data = $('#form-crete-class').serialize();

	//var academic_id= $('#academic_id').val();
	$.get("{{ route('showClassInformation') }}",data,function(data){
			$('#add-class-info').empty().append(data);
			MergeCommonRows($('#table-class-info'))


	})

	/////////////////////////////////////////////////////////////deletClass////////////////////////////////////////////////////
$(document).on('click','.del-class',function(e){
	id_classe = $(this).val();
	$.post("{{ route('deletClass') }}" ,{id_classe:id_classe},function(data){
			showClassInfo($('#academic_id').val());

	})
})

}///////////////////////////////////////////////////////////////updateClass/////////////////////////////////////////////
$('.update-class').on('click',function(e){
	e.preventDefault();
	var data =$('#form-crete-class').serialize(data);
	$.post("{{ route('updateClass') }}",data,function(dta){
					showClassInfo(data.academic_id);

	})
})

</script>

@endsection


add-more-year
