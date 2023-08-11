@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Review</h1>
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
								<h3 class="card-title">Daftar Review</h3>
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
												<input type="text" name="date" class="form-control float-right" id="reservation">
											</div>
										</div>
									</div>									
								</div>
								<table class="table table-bordered table-striped" id="donations">
									<thead>
										<tr>
											<th>No</th>
											<th>User</th>
											<th>Total</th>
											<th>Attachment</th>
											<th>Time</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php $no=1 @endphp
										@foreach($donation as $value)
										<tr>
											<td>{{$no++}}</td>
											
											<td>
												@if($value->user)
												{{$value->user->first_name}} {{$value->user->last_name}}
												@endif
											</td>
											<td>{{$value->total}}</td>
											<td>
												<a target="_blank" href="{{$value->attachment}}">
													<img width="200" src="{{$value->attachment}}" alt="">
												</a>
											</td>
											<td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
											<td>
												@if($value->status=='paid')
												<span class="badge badge-success">Paid</span>
												@endif
												@if($value->status=='unpaid')
												<span class="badge badge-warning">Unpaid</span>
												@endif
												<td>
													<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-sm{{$value->id}}"><i class="fas fa-trash"></i></a>
													<div class="modal fade" id="modal-sm{{$value->id}}" wire:ignore.self>
														<div class="modal-dialog modal-sm">
															<div class="modal-content">
																<form action="{{url('donation')}}/{{$value->id}}" method="POST">
																	@csrf
																	@method('delete')
																	<div class="modal-header">
																		<h4 class="modal-title">Delete Confirmation</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p>Sureley delete the this data?</p>
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																		<button type="submit" class="btn btn-danger" >Delete</button>

																	</div>
																</form>
															</div>
														</div>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>No</th>
												<th>User</th>
												<th>Total</th>
												<th>Attachment</th>
												<th>Time</th>
												<th>Status</th>
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
	var dataTable=$('#donations').DataTable({
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