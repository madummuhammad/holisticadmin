@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Booked</h1>
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
								<h3 class="card-title">Booked</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-4">
										
										<div class="form-group">
											<label>Date Filter</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="far fa-calendar-alt"></i>
													</span>
												</div>
												<input type="text" name="date" class="form-control float-right" id="bookedFilter">
											</div>
										</div>
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
											<th>Name</th>
											<th>Service</th>
											<th>Date</th>
											<th>Time</th>
											<th>Action</th>
											<th>Crud</th>
										</tr>
									</thead>
									<tbody>
										@php $no=1 @endphp
										@foreach($book as $value)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$value->by_user->first_name}} {{$value->by_user->last_name}}</td>
											<td>{{$value->service->name}}</td>
											<td>{{explode(' ',$value->date)[0]}}</td>
											<td>{{date('H:i',strtotime($value->time_from))}} - {{date('H:i',strtotime($value->time_to))}}</td>
											<td>
												<div class="btn-group btn-group-sm">
													<button data-target="#modal-accept{{$value->id}}"  class="btn btn-info" data-toggle="modal">Accept</button>
													<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-reject{{$value->id}}">Reject</a>
												</div>
											</td>
											<td>
												<div class="btn-group btn-group-sm">
													<button data-target="#modal-edit{{$value->id}}"  class="btn btn-info" data-toggle="modal"><i class="far fa-edit"></i></button>
													<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete{{$value->id}}"><i class="fas fa-trash"></i></a>
												</div>
											</td>
											<div class="modal fade" id="modal-delete{{$value->id}}" wire:ignore.self>
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<form action="{{url('booked')}}/{{$value->id}}" method="POST">
															@csrf
															@method('delete')
															<div class="modal-header">
																<h4 class="modal-title">Delete Confirmatoin</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<p>Surely delete booked?</p>
															</div>
															<div class="modal-footer justify-content-between">
																<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																<button type="submit" class="btn btn-danger" >Delete</button>

															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="modal fade" id="modal-accept{{$value->id}}" wire:ignore.self>
												<div class="modal-dialog modal-dialog-centered modal-sm">
													<div class="modal-content">
														<form action="{{url('booked/accept')}}/{{$value->id}}" method="POST">
															@csrf
															@method('POST')
															<div class="modal-header">
																<h4 class="modal-title">Accept</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<p>Accept booked service?</p>
															</div>
															<div class="modal-footer justify-content-between">
																<button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button>
																<button type="submit" class="btn btn-primary" >Accept</button>

															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="modal fade" id="modal-reject{{$value->id}}" wire:ignore.self>
												<div class="modal-dialog modal-dialog-centered modal-sm">
													<div class="modal-content">
														<form action="{{url('booked/reject')}}/{{$value->id}}" method="POST">
															@csrf
															@method('POST')
															<div class="modal-header">
																<h4 class="modal-title">Reject</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<p>Reject booked service?</p>
															</div>
															<div class="modal-footer justify-content-between">
																<button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button>
																<button type="submit" class="btn btn-danger" >Reject</button>

															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="modal fade" id="modal-edit{{$value->id}}">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="card card-primary">
															<div class="card-header">
																<h3 class="card-title">Edit Booked</h3>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="{{url('booked')}}/{{$value->id}}" method="POST">
																@method('patch')
																@csrf
																<div class="card-body">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Date</label>
																		<input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{date('Y-m-d', strtotime($value->date))}}">
																		@error('date')
																		<div class="invalid-feedback">
																			{{$message}}
																		</div>
																		@enderror
																	</div>
																	<div class="row">
																		<div class="col-6">
																			<div class="form-group">
																				<label for="exampleInputEmail1">From</label>
																				<input type="time" class="form-control @error('time_from') is-invalid @enderror" name="time_from" value="{{$value->time_from}}">
																				@error('time_from')
																				<div class="invalid-feedback">
																					{{$message}}
																				</div>
																				@enderror
																			</div>
																		</div>
																		<div class="col-6">
																			<div class="form-group">
																				<label for="exampleInputEmail1">To</label>
																				<input type="time" class="form-control @error('time_to') is-invalid @enderror" name="time_to" value="{{$value->time_to}}">
																				@error('time_to')
																				<div class="invalid-feedback">
																					{{$message}}
																				</div>
																				@enderror
																			</div>
																		</div>
																	</div>

																</div>
																<div class="card-footer">
																	<button type="submit" class="btn btn-primary">Submit</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Service</th>
											<th>Date</th>
											<th>Time</th>
											<th>Action</th>
											<th>Crud</th>
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
	var dataTable=$('#example2').DataTable({
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