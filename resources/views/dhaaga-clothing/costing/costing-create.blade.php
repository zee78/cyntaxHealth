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
		<h2 class="main-content-title tx-24 mg-b-5">Costing</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Costing</li>
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
					<h6 class="card-title mb-1">Add Costing</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formCostingCreate">
						@csrf
						<div class="">
							<div class="row">
								<div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Code: <span class="tx-danger">*</span></label>
                                        <input type="text" name="code" class="form-control" placeholder="code">
                                    </div>

                                </div>
								<!-- ***************** eployee first name  -->
								<div class="col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <label class="form-label">Type: <span class="tx-danger">*</span></label>
                                        <select name="type" class="form-control">
                                            <option value="women">Women</option>
                                            <option value="kids">Kids</option>
                                            <option value="accessories">Accessories</option>
                                        </select>
                                    </div>
                                </div>
								<!-- ****************** employee last name *************** -->
								
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <label class="form-label">Marketing cost: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="marketing_cost" id="direct_cost" placeholder="marketing cost" required="" type="text">
                                    </div>
                                </div>
								<div class="col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <label class="form-label">Profit %age: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="profit_percentage" placeholder="Profit %age" required="" type="text">
                                    </div>

                                </div>
								<!-- ****************** employee phone number *************** -->
							</div>
							<div class="row">
								<div class="col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <label class="form-label">Profit amount in rs: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="profit_amount" placeholder="Profit amount in rs" required="" type="text">
                                    </div>
                                </div>
								<div class="col-md-6 col-lg-6">
                                
                                    <div class="form-group">
                                        <label class="form-label">GST: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="gst" id="gst" placeholder="GST" required="" type="text">
                                    </div>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <label class="form-label">Total direct cost: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="total_direct_cost" placeholder="Total direct cost" required="" type="text">
                                    </div>
                                </div>
								<div class="col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <label class="form-label">Market retail price: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="market_retail_price" placeholder="Market retail price" required="" type="text">
                                    </div>
                                </div>
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Submit Costing</button>
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
<script src="{{ URL::asset('assets/CustomJs/DhaagaClothings/costing/costing-create.js')}}"></script>
<script>
  $('#direct_cost').keyup(function(){
     var cost = $(this).val();
     var avg_gst = 18/100 * cost;
  //   alert(avg_gst);
     $('#gst').val(avg_gst);
     var avg_mark = 26/100 * cost;
     $('#mark_avg').val(avg_mark);
  });
</script>
@endsection