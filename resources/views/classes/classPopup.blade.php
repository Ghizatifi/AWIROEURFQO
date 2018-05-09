
<div class="modal fade" id="academic-choose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-xs" >

<section class="panel panel-default">
			<header class="panel-heading">
				Les information academique
			</header>
			<form  action="#" method="POST" class="form-horizontal" id="form-view-class">
				{{ csrf_field() }}
				<input type="hidden" name="id_classe" id="id_classe">

				<div class="panel-body" >
					<div class="form-group">


						<div class="col-sm-6" >
							<label for="acdemic-year"> Annee scolaire </label>
							<div class="input-group">
         <select class="form-control" name="id_annee" id="id_annee">
							@foreach($annees as $A)
									<option value="{{$A->id_annee}}">{{$A->annee}}</option>
									@endforeach
										</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-academic" ></span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" >
							<label for="acdemic-year"> Programme </label>
							<div class="input-group">
                <select class="form-control" name="id_programm" id="id_programm">
  								@foreach($program as $key=> $p)
  									<option value="{{$p->id_programm}}">{{$p->programe}}</option>

  									@endforeach
  								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-program"></span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" >
							<label for="acdemic-year"> Niveau </label>
							<div class="input-group">
            <select class="form-control" name="id_niveau" id="id_niveau">
              @foreach($niveau as $g)
                <option value="{{$g->id_niveau}}">{{$g->niveau}}</option>

                @endforeach
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-level"></span>
								</div>
							</div>
						</div>


						<div class="col-sm-6" >
							<label for="acdemic-year"> Groupe </label>
							<div class="input-group">
                <div class="input-group " >
                  <select class="form-control" name="id_group" id="id_group">
                  @foreach($group as $g)
                    <option value="{{$g->id_group}}">{{$g->groupe}}</option>

                    @endforeach
                  </select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-shift"></span>
								</div>
							</div>
						</div>









			</div>
		</div>

	</form>
	{{----------------}}
	<form accept="#" method="get" id="form-multi-class">
	<div class="panel panel-default ">
		<div class="panel panel-heading">
			details d'Informations

			<button class="btn btn-info btn-xs pull-right" id="btn-go" style="margin-top: 5px">OK </button>
		</div>
		<div class="panel panel-body" id="add-class-info" style="overflow-y: auto; height: 250px">

		</div>
	</div>
</form>
</section>



  </div></div>
