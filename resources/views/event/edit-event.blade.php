@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Edit Event</h1>
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
								<h3 class="card-title">Edit Event</h3>
							</div>
							<form action="{{url('event/edit')}}/{{$event->id}}" method="POST" enctype="multipart/form-data">
								<div class="card-body">
									@if(session('success'))
									<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
										{{session('success')}}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									@endif
									@method('PATCH')
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">						
											<div class="form-group">
												<label for="exampleInputEmail1">Title</label>
												<input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{$event->title}}">
												@error('title')
												<div class="invalid-feedback">
													{{$message}}
												</div>
												@enderror
											</div>
											<div class="form-group">
												<label for="exampleInputFile">Image</label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" name="image"  onchange="updateFilename(this)" id="exampleInputFile">
														<label class="custom-file-label" for="exampleInputFile">Pilih Image</label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-12">						
											<img src="{{$event->image}}" class="img-fluid" alt="">
										</div>
										<div class="col-md-12 mt-3">
											<div class="card card-outline card-info">
												<div class="card-header">
													<h3 class="card-title">
														Content
													</h3>
												</div>
												<div class="card-body">
													<textarea id="summernote" name="content">
														{{$event->content}}
													</textarea>
												</div>
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
		</section>
	</div>
</div>
</div>
@endsection