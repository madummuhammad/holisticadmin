@extends('layouts.app')
@section('content')
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>FAQ</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 col-12">
						<a data-target="#modal-add" data-toggle="modal" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></a>
						<div class="modal fade" id="modal-add">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Add question</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="{{url('faq/question')}}" method="POST" >
											@csrf
											<div class="card-body">
												<div class="form-group">
													<label for="exampleInputEmail1">Question</label>
													<input type="text" class="form-control  @error('question') is-invalid @enderror" question="question"  value="{{old('question')}}" name="question">
													@error('question')
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
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
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
											<th>Question</th>
											<th>Answer</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php $no=1; @endphp
										@foreach($question as $value)
										<tr>
											<td>
												{{$no++}}
											</td>
											<td>{{$value->question}}</td>
											<td>
												<div>
													@if($value->answer)
													<div>
														{{$value->answer->answer}}
													</div>
													@endif
												</div>
												<a data-target="#modal-add-answer{{$value->id}}" data-toggle="modal" class="btn btn-primary mt-2 btn-sm mb-3"><i class="far fa-edit"></i></a>
												<div class="modal fade" id="modal-add-answer{{$value->id}}">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="card card-primary">
																<div class="card-header">
																	<h3 class="card-title">Edit answer</h3>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<form action="{{url('faq/answer')}}" method="POST" >
																	@method('patch')
																	@csrf
																	<div class="card-body">
																		<div class="form-group">
																			<label for="exampleInputEmail1">Answer</label>
																			<input type="text" name="question_id" value="{{$value->id}}" hidden>
																			@if($value->answer)
																			<input type="text" class="form-control  @error('answer') is-invalid @enderror" name="answer"  value="{{$value->answer->answer}}">
																			@else
																			<input type="text" class="form-control  @error('answer') is-invalid @enderror" name="answer"  value="">
																			@endif
																			@error('answer')
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
											</td>
											<td>
												<button data-target="#modal-edit-question{{$value->id}}"  class="btn btn-info" data-toggle="modal"><i class="far fa-edit"></i></button>
												<a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete-question{{$value->id}}"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
										<div class="modal fade" id="modal-delete-question{{$value->id}}" wire:ignore.self>
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<form action="{{url('faq/question')}}/{{$value->id}}" method="POST">
														@csrf
														@method('delete')
														<div class="modal-header">
															<h4 class="modal-title">Konfirmasi hapus</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Anda akan menghapus?</p>
														</div>
														<div class="modal-footer justify-content-between">
															<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-danger" >Hapus</button>

														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal fade" id="modal-edit-question{{$value->id}}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="card card-primary">
														<div class="card-header">
															<h3 class="card-title">Edit Question</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{url('faq/question')}}/{{$value->id}}" method="POST" >
															@csrf
															@method('patch')
															<div class="card-body">
																<div class="form-group">
																	<label for="exampleInputEmail1">Question</label>
																	<input type="text" class="form-control  @error('question') is-invalid @enderror" name="question"  value="{{$value->question}}">
																	@error('question')
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