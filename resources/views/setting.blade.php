@extends('layouts.app')
@section('content')
@php $seg2=request()->segment(2); @endphp
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Whatsapp</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<form action="" method="POST">
								@method('patch')
								@csrf
								<div class="card-body">
									<div class="mb-1">Whatsapp</div>
									<input type="number" class="form-control"  value="{{$setting->whatsapp}}" name="whatsapp">
									<button class="btn btn-primary mt-3">Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Payment Information</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<form action="{{url('setting/rek_information')}}" method="POST">
								@method('patch')
								@csrf
								<div class="card-body">
									<!-- <div class="mb-1">Whatsapp</div> -->
									<textarea id="rek_information" name="rek_information">
										{{$setting->rek_information}}
									</textarea>
									<button class="btn btn-primary mt-3">Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Privacy Policy</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<form action="{{url('setting/privacy_policy')}}" method="POST">
								@method('patch')
								@csrf
								<div class="card-body">
									<!-- <div class="mb-1">Whatsapp</div> -->
									<textarea id="summernote" name="privacy_policy">
										{{$setting->privacy_policy}}
									</textarea>
									<button class="btn btn-primary mt-3">Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>About Us</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<form action="{{url('setting/about_us')}}" method="POST">
								@method('patch')
								@csrf
								<div class="card-body">
									<!-- <div class="mb-1">Whatsapp</div> -->
									<textarea id="about_us" name="about_us">
										{{$setting->about_us}}
									</textarea>
									<button class="btn btn-primary mt-3">Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Donation</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<form action="{{url('setting/donation')}}" method="POST">
								@method('patch')
								@csrf
								<div class="card-body">
									<!-- <div class="mb-1">Whatsapp</div> -->
									<textarea id="donation" name="donation">
										{{$setting->donation}}
									</textarea>
									<button class="btn btn-primary mt-3">Ubah</button>
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