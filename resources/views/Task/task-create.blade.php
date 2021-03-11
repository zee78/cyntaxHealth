@extends('layouts.master')
@section('css')
<!---Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Datetimepicker css-->
<link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- ****************** custom js file ********************* -->
<link href="{{ URL::asset('assets/css/CustomCss/Rback/roles/role-create.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Purchase Order</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Purchase Order</li>
		</ol>
	</div>
	
</div>
<!-- End Page Header -->
@endsection
@section('content')
<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card custom-card">
			<div class="card-body">
				<div>
					<h6 class="card-title mb-1">Assign Task</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formAssignTaskCreate">
						@csrf
						<div class="">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
                                        <label class="form-label">Task Title: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="taskTitle" placeholder="Task title " required="" type="text">
                                    </div>
									
								</div>
								<!-- ****************** employee last name *************** --> 
								
							</div>
							<div class="row mb-3">
								<div class="col-lg-12 col-md-12">
									<label for="taskDetail"> Task Detail </label>
									<textarea class="form-control" name="taskDetail" id="taskDetail" cols="30" rows="3">

									</textarea>

								</div>

							</div>
							<div class="row">
								

								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">User Name: <span class="tx-danger">*</span></label>
									<select class="form-control select2" name="userName[]" id="userName" multiple>
										<option label="Choose one"></option>
												        
									</select>
								</div>

							    </div>
								<div class="col-md-12 col-lg-6">
									<div class="form-group" style=" padding-top:35px;">
										<label for="allUser">
											<input type="checkbox"  name="allUser" id="allUser"> select all user
										</label>

									</div>

								</div>
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Save</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- End Row -->
</div>
</div>
<!-- End Main Content-->
@endsection
@section('js')
<!-- Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.validate/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.validate/additional-methods.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/notify.js') }}"></script>
<!-- Simple-Datepicker js-->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Jquery-Ui js-->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- ********************** custom js file here *********************** -->
<script src="{{ URL::asset('assets/CustomJs/Task/task-create.js')}}"></script>

@endsection