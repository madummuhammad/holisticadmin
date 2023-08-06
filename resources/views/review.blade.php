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
								<table class="table table-bordered table-striped" id="example2">
									<thead>
										<tr>
											<th>No</th>
											<th>Service</th>
											<th>Review</th>
											<th>Rating</th>
											<th>Professional</th>
											<th>By User</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php $no=1 @endphp
										@foreach($review as $value)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$value->service->name}}</td>
											<td>{{$value->review}}</td>
											<td>{{$value->star}}</td>
											<td>{{$value->user->first_name}} {{$value->user->last_name}}</td>
											<td>{{$value->by_user->first_name}} {{$value->by_user->last_name}}</td>
											<td>
												<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-sm{{$value->id}}"><i class="fas fa-trash"></i></a>
												<div class="modal fade" id="modal-sm{{$value->id}}" wire:ignore.self>
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<form action="{{url('review')}}/{{$value->id}}" method="POST">
																@csrf
																@method('delete')
																<div class="modal-header">
																	<h4 class="modal-title">Konfirmasi hapus</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<p>Anda akan menghapus data ini?</p>
																</div>
																<div class="modal-footer justify-content-between">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
																	<button type="submit" class="btn btn-danger" >Hapus</button>

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
											<th>Service</th>
											<th>Review</th>
											<th>Rating</th>
											<th>Professional</th>
											<th>By User</th>
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