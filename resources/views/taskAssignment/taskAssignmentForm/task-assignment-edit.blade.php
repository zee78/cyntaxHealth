@extends('layouts.master')
@section('css')
<!---Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Datetimepicker css-->
<link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/css/bootstrap-tagsinput.css')}}" rel="stylesheet">

<!-- ****************** custom js file ********************* -->
<link href="{{ URL::asset('assets/css/CustomCss/Rback/roles/role-create.css')}}" rel="stylesheet">
<style>
    .bootstrap-tagsinput .tag {
   margin-right: 2px;
/* color: white; */
 background-color: #626ed4;
 border-radius: 5px;
 padding-left: 7px;
 padding-right: 7px;
 padding-bottom: 3px;
 color: white;



/* display: inline-block; */
}

.bootstrap-tagsinput input {
color: white !important;

}

.bootstrap-tagsinput {
display: block;
width: 100%;
height: calc(1.5em + 0.75rem + 2px);
padding: 0.375rem 0.75rem 2.0375rem;
font-size: 0.875rem;
font-weight: 400;
line-height: 1.5;
color: white;
background-color: #fff;
background-clip: padding-box;
border-style: none !important;
border-radius: 0.25rem;
-webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.dark-theme .bootstrap-tagsinput {
background-color: #252542 !important;
}

</style>
@endsection
@section('page-header')
<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Task Assignment</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Trend Analysis</li>
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
					<h6 class="card-title mb-1">Task Assignment</h6>

				</div>
				<div class="mt-3 mb-3">
					<form  id="formTaskAssignEdit">
						@csrf
						<div class="">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="form-label">Name of Task: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name_of_task" placeholder="Name of Task" required="" type="text" value="{{ $data->name_of_task }}">
                                    <input type="hidden" value="{{ $data->id }}" id="id">
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Date of task assignment: <span class="tx-danger">*</span></label>
									<input class="form-control fc-datepicker" name="date_of_task_assignment" placeholder="MM/DD/YYYY" required="" type="text" value="{{ $data->date_of_task_assignment }}">
                                </div>
                                </div>

							</div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">

								<div class="form-group">
									<label class="form-label">Nature of Task: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="nature_of_task" placeholder="nature_of_task" required="" type="text" value="{{ $data->nature_of_task }}">


                                </div>
                                </div>
							</div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">

								<div class="form-group">
									<label class="form-label">Description of Task: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="description_of_task" rows="5" required> {{ $data->description_of_task }}"
                                    </textarea>


                                </div>
                                </div>
							</div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="form-label">Deadline for task submission : <span class="tx-danger">*</span></label>
                                    <input class="form-control fc-datepicker" name="deadline_for_task_submission" placeholder="MM/DD/YYYY" required="" type="text" value="{{ $data->deadline_for_task_submission }}">

                                </div>
                                </div>

							</div>

							<button class="btn ripple btn-primary pd-x-20" type="submit">save</button>
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

<script src="{{ URL::asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>

<!-- Simple-Datepicker js-->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Jquery-Ui js-->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- ********************** custom js file here *********************** -->
<script src="{{ URL::asset('assets/CustomJs/taskAssignment/taskAssignmentForm/task-assignment-edit.js')}}"></script>

@endsection
