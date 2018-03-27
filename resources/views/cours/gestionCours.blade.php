@extends('layout.master')

@section('content')







<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-file-text-o"></i> Cours</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
			<li><i class="icon_document_alt"></i>Course</li>
			<li><i class="fa fa-file-text-o"></i>Manage Courses</li>

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
							<label for="acdemic-year"> Academic Year </label>
							<div class="input-group">
								<select class="form-control" name="" id="">
							
									<option value=""></option>

							
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-academic" ></span>
								</div>
							</div>
						</div>

						<div class="col-sm-3" >
							<label for="acdemic-year"> couress </label>
							<div class="input-group">
								<select class="form-control" name="program_id" id="program_id">
									<option value="">-----------</option>
									
									<option value=""></option>

								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-program"></span>
								</div>
							</div>
						</div>

						<div class="col-sm-3" >
							<label for="acdemic-year"> Level </label>
							<div class="input-group">
								<select class="form-control" name="level_id" id="level_id">
								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-level"></span>
								</div>
							</div>
						</div>


						<div class="col-sm-3" >
							<label for="acdemic-year"> Shift </label>
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
							<label for="time"> Time </label>
							<div class="input-group">
								<select class="form-control" name="time_id" id="time_id">
								
									<option value=""></option>

								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-time"></span>
								</div>
							</div>
						</div>


						<div class="col-sm-4" >
							<label for="batch"> Batch </label>
							<div class="input-group">
								<select class="form-control" name="batche_id" id="batche_id">
								
									<option value=""></option>

								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-batche"></span>
								</div>
							</div>
						</div>



						<div class="col-sm-4" >
							<label for="groub"> Groub </label>
							<div class="input-group">
								<select class="form-control" name="group_id" id="group_id">
									
									<option value=""></option>

								
								</select>
								<div class="input-group-addon" >
									<span class="fa fa-plus" id="add-more-group"></span>
								</div>
							</div>
						</div>



						<div class="col-sm-5" >
							<label for="groub"> Start Date </label>
							<div class="input-group">
								<input type="text" name="start_date" id="start_date" class="form-control" required> 
								
								
								<div class="input-group-addon" >
									<span class="fa fa-calendar"></span>
								</div>
							</div>
						</div>



						<div class="col-sm-5" >
							<label for="groub"> End Date </label>
							<div class="input-group">
								<input type="text" name="end_date" id="end_date" class="form-control" required> 
								
								<div class="input-group-addon" >
									<span class="fa fa-calendar"></span>
								</div>
							</div>
						</div>
					</div>


				</div>


				<div class="panel-footer" >
					<button type="submit" class=" btn btn-default btn-sm">
						Create Couress
					</button>
					<button type="button" class=" btn btn-success btn-sm update-class">
						Update Couress
					</button>

				</div>
			</div>
		</div>

	</form>
	<div class="panel panel-default ">
		<div class="panel panel-heading">
			Class Information
		</div>
		<div class="panel panel-body" id="add-class-info">
			
		</div>
	</div>
</section>
</div>



</div>


@endsection


