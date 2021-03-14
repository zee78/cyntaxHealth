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
		<h2 class="main-content-title tx-24 mg-b-5">Trend Analysis</h2>
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
					<h6 class="card-title mb-1">Update Trend Analysis</h6>
				</div>
				<div class="mt-3 mb-3">
					<form  id="formTrendUpdate">
						@csrf
						<div class="">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Code: <span class="tx-danger">*</span></label>
										<input type="hidden" id="trendId" value="{{ $getSingleData->id }}">
										<input type="text" name="code" value="{{ $getSingleData->code }}" class="form-control" placeholder="Code">
									</div>
								</div>
								<!-- ***************** eployee first name  -->
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Number Sold: <span class="tx-danger">*</span></label>
										<input type="text" name="number_sold" value="{{ $getSingleData->number_sold }}" class="form-control" placeholder="Number sold">
									</div>
								</div>
								<!-- ****************** employee last name *************** -->
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Amount Received: <span class="tx-danger">*</span></label>
										<input class="form-control" name="amount_received" placeholder="Amount Received" value="{{ $getSingleData->amount_received }}" required="" type="text">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Customer Feedback: </label>
										<textarea class="form-control" rows="2" cols="10" name="customer_feedback"> {{ $getSingleData->customer_feedback }}</textarea>
									</div>
								</div>
								<!-- ****************** employee phone number *************** -->
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Submit Trend Analysis</button>
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
<script src="{{ URL::asset('assets/CustomJs/DhaagaClothings/TrendAnalysis/trend-analysis-update.js')}}"></script>
@endsection