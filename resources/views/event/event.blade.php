@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Event</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">List Event</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 col-12">
										<a href="{{url('event/add')}}" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></a>
									</div>
								</div>
								@if(session('success'))
								<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
									{{session('success')}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endif
								<table class="table table-bordered table-striped" id="example2">
									<thead>
										<tr>
											<th>No</th>
											<th>Slug</th>
											<th>Title</th>
											<!-- <th>Content</th> -->
											<th>Image</th>
											<!-- <th>Admin</th> -->
											<th>Written At</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php $no=1 @endphp
										@foreach($event as $value)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$value->slug}}</td>
											<td>{{$value->title}}</td>
											<td>
												<img style="width: 80px; height: 80px; object-fit: cover;" src="{{$value->image}}" alt="">
											</td>
											<td>{{$value->writen_at}}</td>
											<td>
												<div class="btn-group btn-group-sm">
													<a href="{{url('event/edit')}}/{{$value->id}}" class="btn btn-info"><i class="far fa-edit"></i></a>
													<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete{{$value->id}}"><i class="fas fa-trash"></i></a>
												</div>
											</td>
											<div class="modal fade" id="modal-delete{{$value->id}}" wire:ignore.self>
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<form action="{{url('event')}}/{{$value->id}}" method="POST">
															@csrf
															@method('delete')
															<div class="modal-header">
																<h4 class="modal-title">Delete Confirmation</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<p>Surely delete the data?</p>
															</div>
															<div class="modal-footer justify-content-between">
																<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																<button type="submit" class="btn btn-danger" >Delete</button>

															</div>
														</form>
													</div>
												</div>
											</div>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Slug</th>
											<th>Title</th>
											<!-- <th>Content</th> -->
											<th>Image</th>
											<!-- <th>Admin</th> -->
											<th>Written At</th>
											<th>Action</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
@include('layouts.datatable')
<script>
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});
</script>
@endsection