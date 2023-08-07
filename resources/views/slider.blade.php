@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Slider {{$type}}</h1>
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
								<table class="table table-bordered table-striped" id="example2">
									<thead>
										<tr>
											<th>Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($banners as $key => $value)
										<tr>
											<td>
												<img class="img-fluid" style="object-position: center;object-fit: cover;" src="{{$value->image}}" alt="">
											</td>
											<td>
												<div class="btn-group btn-group-sm">
													<button data-target="#modal-edit{{$value->id}}"  class="btn btn-info" data-toggle="modal"><i class="far fa-edit"></i></button>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="modal-edit{{$value->id}}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="card card-primary">
														<div class="card-header">
															<h3 class="card-title">Edit Main Banner</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('slider/edit')}}/{{$value->id}}" method="POST" enctype="multipart/form-data">
															@csrf
															<div class="card-body">
																@if ($value->image)
																<img src="{{$value->image}}" width="100" class="img-fluid" id="preview{{$key}}" alt="Preview">
																@else
																<img src="{{ asset('path/to/default/image.jpg') }}" width="100" id="preview{{$key}}" class="img-fluid" alt="Default Image">
																@endif
																<div class="form-group">
																	<label for="exampleInputFile">File input</label>
																	<div class="input-group">
																		<div class="custom-file">
																			<input type="file" class="custom-file-input" name="image" onchange="updateFilename(this)" id="{{$key}}">
																			<label class="custom-file-label" for="exampleInputFile">Pilih file</label>
																		</div>
																	</div>
																</div>
																<input type="text" name="type" value="{{$type}}" hidden>
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
								</table>
							</div>
						</div>
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
															<h3 class="card-title">Tambah Slider</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('slider/add')}}" method="POST" enctype="multipart/form-data">
															@csrf
															<div class="card-body">
																<div class="form-group">
																	<label for="exampleInputFile">File input</label>
																	<div class="input-group">
																		<div class="custom-file">
																			<input type="file" class="custom-file-input" name="image"  onchange="updateFilename(this)" id="exampleInputFile">
																			<label class="custom-file-label" for="exampleInputFile">Pilih file</label>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Caption</label>
																	<input type="text" name="type" value="{{$type}}" hidden>
																	<input type="text" class="form-control  @error('caption') is-invalid @enderror" name="caption"  value="{{old('caption')}}">
																	@error('caption')
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
											<th>Image</th>
											<th>Caption</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($sliders as $key => $value)
										<tr>
											<td>
												<img width="80" height="80" style="object-position: center;object-fit: cover;" src="{{$value->image}}" alt="">
											</td>
											<td>{{$value->caption}}</td>
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
													<form action="{{url('slider/delete')}}/{{$value->id}}" method="POST">
														@csrf
														@method('delete')
														<div class="modal-header">
															<h4 class="modal-title">Konfirmasi hapus</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Anda akan menghapus {{$value->first_name}} {{$value->last_name}}?</p>
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
															<h3 class="card-title">Edit Slider</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('slider/edit')}}/{{$value->id}}" method="POST" enctype="multipart/form-data">
															@csrf
															<div class="card-body">
																@if ($value->image)
																<img src="{{$value->image}}" width="100" class="img-fluid" id="preview{{$key}}" alt="Preview">
																@else
																<img src="{{ asset('path/to/default/image.jpg') }}" width="100" id="preview{{$key}}" class="img-fluid" alt="Default Image">
																@endif
																<div class="form-group">
																	<label for="exampleInputFile">File input</label>
																	<div class="input-group">
																		<div class="custom-file">
																			<input type="file" class="custom-file-input" name="image" onchange="updateFilename(this)" id="{{$key}}">
																			<label class="custom-file-label" for="exampleInputFile">Pilih file</label>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label for="exampleInputEmail1">Caption</label>
																	<input type="text" name="type" value="{{$type}}" hidden>
																	<input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{$value->caption}}">
																	@error('caption')
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
	function updateFilename(input) {
		var filename = input.files[0].name;
		var label = input.nextElementSibling;
		label.innerText = filename;

		console.log(input.id);
		var reader = new FileReader();
		reader.onload = function(e) {
			var preview = document.getElementById('preview'+input.id);
			preview.src = e.target.result;
		};
		reader.readAsDataURL(input.files[0]);
	}
</script>

@endsection