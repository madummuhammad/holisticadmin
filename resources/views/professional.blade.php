@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Praktisi</h1>
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
								<h3 class="card-title">Daftar praktisi</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 col-12">
										<a data-target="#modal-add" data-toggle="modal" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></a>
										<div class="modal fade" id="modal-add">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="card card-primary">
														<div class="card-header">
															<h3 class="card-title">Tambah praktisi</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('professional')}}" method="POST">
															@csrf
															<div class="card-body">
																<div class="form-group">
																	<label for="exampleInputEmail1">Email</label>
																	<input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
																	@error('email')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Depan</label>
																	<input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name"  value="{{old('first_name')}}">
																	@error('first_name')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Belakang</label>
																	<input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  value="{{old('last_name')}}">
																	@error('last_name')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">No Hp</label>
																	<input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"  value="{{old('no_hp')}}">
																	@error('no_hp')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputPassword1">Password</label>
																	<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{old('password')}}" id="exampleInputPassword1">
																	@error('password')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Negara</label>
																	<input type="text" class="form-control @error('country') is-invalid @enderror" name="country"  value="{{old('country')}}">
																	@error('country')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
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
											<th>ID</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Negara</th>
											<th>No Hp</th>
											<th>Forgot Password</th>
											<th>Password</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($users as $user)
										<tr>
											<td>{{$user->user_id}}</td>
											<td>{{$user->first_name}} {{$user->last_name}}</td>
											<td>{{$user->email}}
											</td>
											<td>{{$user->country}}</td>
											<td>{{$user->no_hp}}</td>
											<td>
												@if($user->forgot_password_status)
												<span class="badge badge-warning">
													Requested
												</span>
												@endif
											</td>
											<td>{{$user->password_text}}</td>
											<td>
												<div class="btn-group btn-group-sm">
													<button data-target="#modal-edit{{$user->id}}"  class="btn btn-info" data-toggle="modal"><i class="far fa-edit"></i></button>
													<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-sm{{$user->id}}"><i class="fas fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="modal-sm{{$user->id}}" wire:ignore.self>
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<form action="{{url('professional')}}/{{$user->id}}" method="POST">
														@csrf
														@method('delete')
														<div class="modal-header">
															<h4 class="modal-title">Konfirmasi hapus</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Anda akan menghapus {{$user->first_name}} {{$user->last_name}}?</p>
														</div>
														<div class="modal-footer justify-content-between">
															<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-danger" >Hapus</button>

														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal fade" id="modal-edit{{$user->id}}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="card card-primary">
														<div class="card-header">
															<h3 class="card-title">Edit Praktisi</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('professional')}}/{{$user->id}}" method="POST">
															@method('patch')
															@csrf
															<div class="card-body">
																<div class="form-group">
																	<label for="exampleInputEmail1">Email</label>
																	<input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
																	@error('email')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Depan</label>
																	<input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name"  value="{{$user->first_name}}">
																	@error('first_name')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Belakang</label>
																	<input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"  value="{{$user->last_name}}">
																	@error('last_name')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">No Hp</label>
																	<input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"  value="{{$user->no_hp}}">
																	@error('no_hp')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputPassword1">Password</label>
																	<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{$user->password_text}}" id="exampleInputPassword1">
																	@error('password')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Negara</label>
																	<input type="text" class="form-control @error('country') is-invalid @enderror" name="country"  value="{{$user->country}}">
																	@error('country')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
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
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th>ID</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Negara</th>
											<th>No Hp</th>
											<th>Forgot Password</th>
											<th>Password</th>
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