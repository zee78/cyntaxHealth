@extends('layouts.master')
@section('css')
<!---DataTables css-->
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<!---Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
					<!-- Page Header -->
					<div class="page-header">
						<div>
							<h2 class="main-content-title tx-24 mg-b-5">Vendors</h2>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page">List</li>
							</ol>
						</div>
						@if (Auth::id()=='1')
							<div class="btn btn-list">
								<a class="btn ripple btn-secondary" href="{{ url('task/create') }}"><i class="fe fe-download"></i> Add New Task</a>
							</div>
							
						@endif
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
										<h6 class="card-title mb-1">Tasks List</h6>
										<!-- <p class="text-muted card-sub-title">Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.</p> -->
									</div>
									<div class="table-responsive">
										<table class="table" id="tblTask">
											<thead>
												<tr>
													<th >Sr#</th>
													<th >Task Id</th>
													<th >Task Assign by</th>
													<th >Task Title</th>
													<th >Task Detail</th>
													<th >Task Assign To</th>
												
													{{-- <th >Task Status</th> --}}
													<th >Action</th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

				</div>
			</div>
			<!-- End Main Content-->
						<!-- Modal effects -->
			<div class="modal" id="deleteModel">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Alert</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<form id="deleteData" > 
							@csrf
							 @method('DELETE')
						<input type="hidden" name="taskId" id="taskId">
						<div class="modal-body">
							<h6></h6>
							<p>are you sure you want to delete the record ?</p>
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-danger" id="confirmDelete" type="submit"> Delete </button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
					   </form>
					</div>
				</div>
			</div>
			<!-- End Modal effects-->
@endsection
@section('js')
<!-- Data Table js -->
<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<script src="{{ URL::asset('assets/js/modal.js')}}"></script>
<script src="{{ URL::asset('assets/js/notify.js') }}"></script>
<!-- ********************** custom js file here *********************** -->
<script src="{{ URL::asset('assets/CustomJs/Task/tasks-list.js')}}"></script>

@endsection
