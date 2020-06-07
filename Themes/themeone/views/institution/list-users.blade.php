@extends($layout)
@section('header_scripts')
<link href="{{CSS}}ajax-datatables.css" rel="stylesheet">
@stop
@section('content')

<div id="page-wrapper">
			<div class="container-fluid">
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="{{PREFIX}}"><i class="mdi mdi-home"></i></a> </li>
							<li>{{ $title }}</li>
						</ol>
					</div>
				</div>
								
				<!-- /.row -->
				<div class="panel panel-custom">
					<div class="panel-heading">
						
						<div class="pull-right messages-buttons">
							 
							<a href="{{URL_USERS_IMPORT}}" class="btn  btn-primary button" >{{ getPhrase('import_excel')}}</a>
							<a href="{{URL_USERS_ADD}}" class="btn  btn-primary button" >
							@if(checkRole(['teacher']))
								{{ getPhrase('add_student')}}
							@else
								{{ getPhrase('add_user')}}
							@endif
							</a>
							 
						</div>
						<h1>{{ $title }}</h1>
					</div>
					<div class="panel-body packages">
						<div> 
						<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
							<thead>
								<tr>
								 	<th>{{ getPhrase('name')}}</th>
									<th>{{ getPhrase('email')}}</th>
									<th>{{ getPhrase('image')}}</th>
									<th>{{ getPhrase('role')}}</th>
									<th>{{ getPhrase('status')}}</th>
									<th>{{ getPhrase('department')}}</th>
									<th>{{ getPhrase('institution Name')}}</th>
									<th>{{ getPhrase('action')}}</th>
									<th>{{ getPhrase('Status')}}</th>
								</tr>
							</thead>
							 
						</table>
						</div>
						 

					</div>

				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
@endsection
 
@section('footer_scripts')
 @include('common.datatables', array('route'=>'inst.dataTable'))
 @include('common.deletescript', array('route'=>URL_USERS_DELETE))

  @include('common.account-status', array('route'=>URL_USERS_STATUS))
@stop