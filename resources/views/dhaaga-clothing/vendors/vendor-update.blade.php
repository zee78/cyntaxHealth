@extends('layouts.master')
@section('css')
<!---Select2 css-->
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
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
    <h2 class="main-content-title tx-24 mg-b-5">Vendors</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Vendors</li>
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
          <h6 class="card-title mb-1">Update Vendors</h6>
        </div>
        <div class="mt-3 mb-3">
          <form  id="formVendorUpdate">
            @csrf
            <div class="">
              <div class="row">
                <!-- ***************** eployee first name  -->
                <input type="hidden" id="venderId" value="{{ $getSingleData->id }}">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-label">Vendors Type: <span class="tx-danger">*</span></label>
                    <select name="vendor_type" class="form-control">
                      <option value="{{ $getSingleData->vendor_type }}" selected="">{{ $getSingleData->vendor_type }}</option>
                      <option value="chemicals">fabric</option>
                      <option value="glassware">laces</option>
                      <option value="containers">accessories</option>
                      <option value="equipment">bags </option>
                    </select>
                  </div>
                </div>
                <!-- ****************** employee last name *************** -->
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-label">Vendor Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="vendor_name" value="{{ $getSingleData->vendor_name }}" placeholder="Enter Vendor Name" required="" type="text">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-label">Products purchased : <span class="tx-danger">*</span></label>
                    {{-- <input class="form-control" name="product_purchased" placeholder="Enter product" required="" type="text"> --}}
                    <input type="text" class="form-control form-control-tags-input" data-role="tagsinput"  name="product_purchased" value="{{$getSingleData->purchased_products}}" id="team_members"placeholder="purchased products" />
                  </div>
                </div>
                <!-- ***************** eployee email  -->
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-label">Contact Detail: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="phoneNo" value="{{ $getSingleData->phoneNo }}" placeholder="Enter Contact Detail" required="" type="text">
                  </div>
                </div>
                <!-- ****************** employee phone number *************** -->
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="form-label">Address: <span class="tx-danger">*</span></label>
                    <textarea cols="10" rows="3" class="form-control" name="address" placeholder="Address">{{ $getSingleData->address }}</textarea>
                  </div>
                </div>
              </div>
              <button class="btn ripple btn-primary pd-x-20" type="submit">Add Vendors</button>
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
<script src="{{ URL::asset('assets/CustomJs/DhaagaClothings/vendors/vendor-update.js')}}"></script>
@endsection