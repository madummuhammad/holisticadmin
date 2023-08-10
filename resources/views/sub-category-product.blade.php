@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Sub Kategori Produk</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 col-12">
										<a data-target="#modal-add" data-toggle="modal" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></a>
										<div class="modal fade" id="modal-add">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="card card-primary">
														<div class="card-header">
															<h3 class="card-title">Tambah Sub Kategori Produk</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('category/product/sub')}}" method="POST" >
															@csrf
															<div class="card-body">
																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Sub Kategori</label>
																	<input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"  value="{{old('name')}}">
																	@error('name')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Parent Kategori</label>
																	<select type="text" class="form-control  @error('parent') is-invalid @enderror" name="parent"  value="{{old('parent')}}">
																		@foreach($parent as $value)
																		<option value="{{$value->id}}">{{$value->name}}</option>
																		@endforeach
																	</select>
																	@error('name')
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
											<th>No</th>
											<th>Nama</th>
											<th>Kategori Induk</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php $no=1; @endphp
										@foreach($category as $key => $value)
										@if($value->can_be_deleted==1)
										<tr>
											<td>
												{{$no++}}
											</td>
											<td>{{$value->name}}</td>
											<td>{{$value->parent->name}}</td>
											<td>
												<div class="btn-group btn-group-sm">
													<button data-target="#modal-edit{{$value->id}}"  class="btn btn-info" data-toggle="modal"><i class="far fa-edit"></i></button>
													<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-sm{{$value->id}}"><i class="fas fa-trash"></i></a>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="modal-sm{{$value->id}}" wire:ignore.self>
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<form action="{{url('category/product/sub')}}/{{$value->id}}" method="POST">
														@csrf
														@method('delete')
														<div class="modal-header">
															<h4 class="modal-title">Konfirmasi hapus</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Anda akan menghapus ini?</p>
														</div>
														<div class="modal-footer justify-content-between">
															<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-danger" >Hapus</button>

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
															<h3 class="card-title">Edit Sub Kategori Produk</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('category/product/sub')}}/{{$value->id}}" method="POST" >
															@csrf
															@method('patch')
															<div class="card-body">
																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Sub Kategori</label>
																	<input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"  value="{{$value->name}}">
																	@error('name')
																	<div class="invalid-feedback">
																		{{$message}}
																	</div>
																	@enderror
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Parent Kategori</label>
																	<select type="text" class="form-control  @error('parent') is-invalid @enderror" name="parent"  value="{{$value->parent_id}}">
																		@foreach($parent as $parent_value)
																		<option value="{{$parent_value->id}}" @if($value->parent_id==$parent_value->id) selected @endif>{{$parent_value->name}}</option>
																		@endforeach
																	</select>
																	@error('name')
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
										@endif
										@endforeach
										@foreach($category as $key => $value)
										@if($value->can_be_deleted==0)
										<tr>
											<td>
												{{$no++}}
											</td>
											<td>{{$value->name}}</td>
											<td>{{$value->parent->name}}</td>
											<td>
											</td>
										</tr>
										@endif
										@endforeach
									</tbody>
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
@endsection