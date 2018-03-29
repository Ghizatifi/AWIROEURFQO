@extends('layout.master')

@section('content')


<style type="text/css">
.student-photo{
	height: 160px;
	padding-left: 1px;
	padding-right: 1px;
	border: 1px solid #ccc;
	background: #eee;
	width: 140px;
	margin: 0 auto;
}

.photo > input[type='file']{
	display: none;
}
.photo{
	width: 30px;
	height: 30px;
	border-radius: 100%;

}
.student-id{
	background-repeat: repeat-x;
	border-color: #ccc;
	padding: 5px;
	text-align: center;
	background:#eee;
	border-bottom: 1px solid #ccc;
}
.btn-browse{
	border-color: #ccc;
	padding: 5px;
	text-align: center;
	background:#eee;
	border: none;
	border-top: 1px solid #ccc;

}
fieldset{
	margin-top: 5px;

}
fieldset legend{
	display: block;
	width: 100%;
	padding: 0px;
	font-size: 15px;
	line-height: inherit;
	color: #797979;
	border: 0;
	border-bottom: 1px solid #e5e5e5;

}




</style>


<div class="row">
	
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Enregistrer un eleve</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href=""> Acceuil </a></li>
			<li><i class="fa fa-user"></i> professeur</li>
			<li><i class="fa fa-plus" ></i> ajouter un professeur </li>

		</ol>
	</div>
</div>

<div class="row">
	


		<div class="panel panel-default" >
			<div class="panel-heading">
				<b><i class="fa fa-male"></i> Informations personnelle </b>
			</div>

			<div class="panel-body" style="padding-bottom: 4px">
				<form action="/gestion/prof/add-prof" method="POST" id="form-create-student" enctype="multipart/form-data">
{!! csrf_field() !!}
					<input type="hidden" name="classe_id" id="classe_id">
					<input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
					<input type="hidden" name="dateregistred" id="dateregistred" value="{{date('Y-m-d')}}">
					<div class="row">
						<div class="col-lg-9 col-md-9 col-sm-9">



							<div>
								{{-------------first Name----------}}

								<div class="col-md-4">
									<div class="form-group" >
										<label for="lastname">Prenom</label>
										<input type="text" name="nom" id="first_name" class="form-control" required>
									</div>
								</div>
								{{-------Last Name-------}}

								<div class="col-md-4">
									<div class="form-group" >
										<label for="lastname">Nom</label>
										<input type="text" name="prenom" id="last_name" class="form-control" required>
									</div>
								</div>
								{{-------Gender------}}

								<div class="col-md-4">
									<div class="form-group" >
										<fieldset>
											<legend>sexe</legend>
											<table style="width: 100%;margin-top: -14px;" >
												<tr style="border-bottom: 1px solid #ccc">
												<td>
														<label>
															<input type="radio" name="sexe" id="sex" value="1" required>
															Mme
														</label>
													</td>
													<td>
														<label>
															<input type="radio" name="sexe" id="sex" value="0" required>
															Mr
														</label>
													</td>
													
												</tr>
											</table>
										</fieldset>
									</div>
								</div>
							</div>

							{{-------DOB------}}

							<div class="col-md-4">
								<div class="form-group" >
									<label for="dob">Date Naissance</label>
									<div class="input-group">
										<div class="input-group-addon" >
											<i class="fa fa-calender"></i>
										</div>
										<input type="text" name="date_naissance" id="dob" class="form-control" required>

									</div>
								</div>
							</div>
							{{-------National Card------}}




							{{-------phone------}}
							<div class="col-md-4">
								<div class="form-group" >
									<label for="phone">Telephone</label>
									<input type="text" name="telephone" id="phone" class="form-control" required>
								</div>
							</div>

							{{-------Nationality------}}


							<div class="col-md-4">
								<div class="form-group" >
									<label for="nationality">Nationalite</label>
									<input type="text" name="Nationalite" id="nationality" class="form-control" required>
								</div>
							</div>


						</div>




						{{-------photo------}}
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="form-group form-group-login">
								<table style="margin:0 auto;">
									<thead>
										<tr class="info">
											<th class="student-id"></th>
										</tr>

									</thead>
									<tbody>
										<tr>
											<td class="photo">
												<input type="file" name="photo" id="photo"  accept="image/gif, image/jpg, image/jpeg, image/png">
											</td>
										</tr>
										<tr>
											<td style="text-align: center;background:#ddd;">
												<input type="button" name="brows_file" id="brows_file" class="form-control btn-browse" value="Importer">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						{{--------------------------------}}


					</div>
				</div>

				<br>


				{{--------address------}}
				<div class="panel-heading" style="margin-top: -20px">
					<b > <i class="fa fa-home"></i> Address</b>
				</div>
				<div class="panel-body" style=" padding-bottom: 10px; padding-top: 0px">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group" >
								<label for="village" >Ville</label>
								<input type="text" name="ville" id="village" class="form-control">
							</div>
						</div>

			

						<div class="col-md-4">
							<div class="form-group" >
								<label for="district" >Rue</label>
								<input type="text" name="rue" id="district" class="form-control">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group" >
								<label for="province" >Province</label>
								<input type="text" name="province" id="province" class="form-control">
							</div>
						</div>	

					</div>
				</div>
	
				

				<br>


				{{--------experience------}}
				<div class="panel-heading" style="margin-top: -20px">
					<b > <i class="fa fa-home"></i> Information professionnelle</b>
				</div>
				<div class="panel-body" style=" padding-bottom: 10px; padding-top: 0px">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group" >
								<label for="village" >Diplome</label>
								<input type="text" name="diplome" id="diplome" class="form-control">
							</div>
						</div>

			

						<div class="col-md-3">
							<div class="form-group" >
								<label for="district" >Niveau scolaire</label>
								<input type="text" name="niveau_scolaire" id="niveau_scolaire" class="form-control">
							</div>
						</div>

					</div>
				</div>
	
				



				<div class="panel-footer">
        <button type="button" class="btn btn-primary btn-save-prof">Save </button>
				</div>
				
			</form>
		</div></div></div></div>


@endsection






@section('script')

		<script type="text/javascript">






	
	$('#form-multi-class #btn-go').addClass('hidden');
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

	////////////////////////////////browse photo////////////////
	$('#brows_file').on('click',function(){
		$('#photo').click();

	});

	$('#photo').on('change',function(e){
		showFile(this,'#showPhoto');
	})
	//////////////////
	function showFile(fileInput,img,showName){
		if (fileInput.files[0]) {
              var reader = new FileReader();
			reader.onload= function (e){
				$(img).attr('src',e.target.result);

			}
			reader.readAsDataURL(fileInput.files[0]);
		}
		$(showName).text(fileInput.files[0].name)
	};


</script>



@endsection