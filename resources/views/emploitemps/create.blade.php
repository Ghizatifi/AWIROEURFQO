@extends('layout.master')

@section('content')


<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Plannings</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="index.html">Acceuil</a></li>
			<li><i class="icon_document_alt"></i>Planning</li>
			<li><i class="fa fa-plus"></i>Creer un emploi du temps</li>

		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
    <div class="panel-group" id="accordion" >
      <div class="panel panel-default " >
        <div class="panel-heading">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;" > Choisir la classe </a>
          <a href="#" class="pull-right" id="show-class-info"  ><i class="fa fa-plus"></i></a>
        </div>
        <div class="panel-collapse  collapse in" id="collapse1" >
          <div class="panel-body academic-detail"><p></p></div>

        </div>


      </div>
    </div>
		<section class="panel panel-default">
			<!-- <header class="panel-heading">
		  Emploi du temps
			</header> -->
			<table class="table table-border">

						<thead>
								  <th>Jour</th>
									<th>Matiere</th>
									<th>Professeur</th>
									<th>Salle</th>
									<th>Horaire</th>
									<th><a href="#" class="addRow"><i class="fa fa-plus" ></i></a></th>


						</thead>
<tbody>
<tr>
<td>
	<select class="form-control" name="id_jour" id="id_jour">
		@foreach($jour as $A)
			<option value="{{$A->id_jour}}">{{$A->jour}}</option>

			@endforeach
		</select>
	</td>
	<td>
		<select class="form-control" name="id_matiere" id="id_matiere">
			@foreach($matiere as $A)
				<option value="{{$A->id_matiere}}">{{$A->matiere}}</option>

				@endforeach
		</select>
		</td>
		<td>
			<select class="form-control" name="id_prof" id="id_prof">
				@foreach($prof as $A)
					<option value="{{$A->id_prof}}">{{$A->nom}}</option>

					@endforeach
			</select>
			</td>

				<td>
					<select class="form-control" name="id_salle" id="id_salle">
						@foreach($salle as $A)
							<option value="{{$A->id_salle}}">{{$A->salle}}</option>

							@endforeach

						</select>
					</td>
					<td>
						<select class="form-control" name="id_horaire" id="id_horaire">
							@foreach($horaire as $A)
								<option value="{{$A->id_horaire}}">{{$A->heure}}</option>

								@endforeach
						</select>
						</td>

						<td>
      <a href="#" class="btn btn-danger remove">x<i class="fa fa-trash"/></a>
						</td>
</tr>
</tbody>



		<form  action="{{ route('createprog') }}" method="POST" class="form-horizontal" id="form-crete-class">
				{{ csrf_field() }}
				<input type="hidden" name="active" id="active" value="1">
				<input type="hidden" name="id_classe" id="id_classe">
	<!-- 
				<div class="panel-body" >
					<div class="form-group">
						<div class="col-sm-2" >
							<label for="acdemic-year"> Jour </label>
							<div class="input-group">
							<select class="form-control" name="id_jour" id="id_jour">
								@foreach($jour as $A)
									<option value="{{$A->id_jour}}">{{$A->jour}}</option>

									@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-program"></span>
								</div>
							</div>
						</div>

						<div class="col-sm-2" >
							<label for="acdemic-year"> Matiere </label>
							<div class="input-group">
								<select class="form-control" name="id_matiere" id="id_matiere">
                  @foreach($matiere as $A)
                    <option value="{{$A->id_matiere}}">{{$A->matiere}}</option>

                    @endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-year" ></span>
								</div>
							</div>
						</div>


						<div class="col-sm-2" >
							<label for="acdemic-year"> Professeur </label>
							<div class="input-group">
								<select class="form-control" name="id_prof" id="id_prof">
									@foreach($prof as $A)
										<option value="{{$A->id_prof}}">{{$A->nom}}</option>

										@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-year" ></span>
								</div>
							</div>
						</div>


						<div class="col-sm-2" >
							<label for="acdemic-year"> Salle </label>
							<div class="input-group">
							<select class="form-control" name="id_salle" id="id_salle">
								@foreach($salle as $A)
									<option value="{{$A->id_salle}}">{{$A->salle}}</option>

									@endforeach

								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-level"></span>
								</div>
							</div>
						</div>

	         <div class="col-sm-2" >
							<label for="groub"> Horaire </label>
							<div class="input-group">
								<select class="form-control" name="id_horaire" id="id_horaire">
									@foreach($horaire as $A)
										<option value="{{$A->id_horaire}}">{{$A->heure}}</option>

										@endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-group"></span>
								</div>
							</div>
						</div>
				</div>-->

				<div class="panel-footer" >
					<button type="submit" class=" btn btn-primary btn-sm">
						Créer le palnning
 					</button>

				</div>
			</div>
		</div>

	</form>
</table>

	<div class="panel panel-default ">
		<div class="panel panel-heading">
			Le plannings
		</div>
		<div class="panel panel-body" id="add-prog-info">

		</div>
	</div>
</section>
</div>



</div>

@include('classes.classPopup')

@endsection

@section('script')
@include('script.scriptClassPopup')

<script type="text/javascript">

showProgInfo();



$(document).on('click','#class-edite',function(e){
	e.preventDefault();
	$('#id_classe').val($(this).data('id'));
	$('.academic-detail p').text($(this).text());
	$('#academic-choose').modal('hide');

})




/////////////////////




////////////////////////////////////////////////////call class///////////


function showProgInfo(){
	var data = $('#form-view-class').serialize();
	//console.log(data);
	$.get("{{ route('displayEmplois') }}",data,function(data){
			$('#add-prog-info').empty().append(data);
			$('td#hidden').addClass('hidden');
			$('th#hidden').addClass('hidden');

			MergeCommonRows($('#table-class-info'))


	})

}

/////////////////////




////////////////////////////////////////////////////call class///////////


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


//////////////////add rows///////////////////////
$('.addRow').on('click',function(){
	addRow();
});

function addRow(){
	var addRow='<tr>'+
	'<td>'+
		'<select class="form-control" name="id_jour" id="id_jour">'+
			'@foreach($jour as $A)'+
				'<option value="{{$A->id_jour}}">{{$A->jour}}</option>'+

				'@endforeach'+
		'	</select>'+
		'</td>'+
	'	<td>'+
			'<select class="form-control" name="id_matiere" id="id_matiere">'+
				'@foreach($matiere as $A)'+
				'	<option value="{{$A->id_matiere}}">{{$A->matiere}}</option>'+

				'	@endforeach'+
		'	</select>'+
			'</td>'+
		'	<td>'+
				'<select class="form-control" name="id_prof" id="id_prof">'+
				'	@foreach($prof as $A)'+
						'<option value="{{$A->id_prof}}">{{$A->nom}}</option>'+

					'	@endforeach'+
				'</select>'+
				'</td>'+

					'<td>'+
						'<select class="form-control" name="id_salle" id="id_salle">'+
							'@foreach($salle as $A)'+
								'<option value="{{$A->id_salle}}">{{$A->salle}}</option>'+

								'@endforeach'+

							'</select>'+
						'</td>'+
						'<td>'+
							'<select class="form-control" name="id_horaire" id="id_horaire">'+
								'@foreach($horaire as $A)'+
									'<option value="{{$A->id_horaire}}">{{$A->heure}}</option>'+

									'@endforeach'+
							'</select>'+
							'</td>'+

							'<td>'+
	'<a href="#" class="btn btn-danger remove">x<i class="fa fa-trash"/></a>'+
							'</td>'+
	'</tr>';
$('tbody').append(addRow);
}


$('.remove').live('click',function(){
	$(this).parent().parent().remove();
});
</script>

@endsection
