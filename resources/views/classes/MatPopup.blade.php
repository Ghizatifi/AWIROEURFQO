
<div class="modal fade" id="academic-choose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xs" >
<section class="panel panel-default">
			<header class="panel-heading">		</header>
<form  action="{{ route('matRegister') }}" method="POST" class="form-horizontal" id="form-view-class">
				{{ csrf_field() }}
				<input type="hidden" name="classe_id" id="classe_id">
				<div class="panel-body" >
					<div class="form-group">
       			<div class="col-sm-6" >
								<label for="acdemic-year"> La matiere </label>
									<div class="input-group">
       						 <input type="text" name="nom" id="nom" class="form-control" required>
				          </div>
						</div>
						<div class="col-sm-6" >
							<label for="acdemic-year"> Categorie </label>
						  	<div class="input-group">
							  	<select class="form-control" name="id_categ" id="id_categ">
					
								  </select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-program"></span>
								</div>
							</div>
						</div>					
			</div>
		</div>
		
        <div class="panel-footer">
					<button value="submit" class="btn btn-primary btn-save"> Enregistrer  <i class="fa fa-save"></i></button>
				</div>

	</form>
	{{----------------}}
	
</section>



  </div></div>