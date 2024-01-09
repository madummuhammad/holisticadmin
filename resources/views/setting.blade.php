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
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Ganti Password</h1>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<form action="{{url('setting/change_password')}}" method="POST">
								@method('patch')
								@csrf
								<div class="card-body">
									@if(session('success'))
									<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
										{{session('success')}}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									@endif
									<div class="mb-1">Password Lama</div>
									<div class="input-group">
										<input type="password" class="form-control @error('password') is-invalid @enderror"  value="" name="password" id="password">
										<div class="input-group-append" style="cursor:pointer">
											<div class="input-group-text">
												<span id="password-toggle" class="fas fa-eye"></span>
											</div>
										</div>
										@error('password')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>

									<div class="mb-1">Password Baru</div>
									<div class="input-group">
										<input type="password" class="form-control @error('new_password') is-invalid @enderror" value="" name="new_password" id="new_password">
										<div class="input-group-append" style="cursor:pointer">
											<div class="input-group-text">
												<span id="new-password-toggle" class="fas fa-eye"></span>
											</div>
										</div>
									@error('new_password')
									<div class="invalid-feedback">
										{{$message}}
									</div>
									@enderror
									</div>

									<div class="mb-1">Konfirmasi Password Baru</div>
									<div class="input-group">
										<input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" value="" name="new_password_confirmation" id="new_password_confirmation">
										<div class="input-group-append" style="cursor:pointer">
											<div class="input-group-text">
												<span id="new-password-confirm-toggle" class="fas fa-eye"></span>
											</div>
										</div>
										@error('new_password_confirmation')
										<div class="invalid-feedback">
											{{$message}}
										</div>
										@enderror
									</div>

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
	document.addEventListener('DOMContentLoaded', function () {
		const passwordInput = document.getElementById('password');
		const newPasswordInput = document.getElementById('new_password');
		const newPasswordConfirmInput = document.getElementById('new_password_confirmation');
		const passwordToggle = document.getElementById('password-toggle');
		const newPasswordToggle = document.getElementById('new-password-toggle');
		const newPasswordConfirmToggle = document.getElementById('new-password-confirm-toggle');

		function togglePasswordVisibility(inputElement, toggleElement) {
			if (inputElement.type === 'password') {
				inputElement.type = 'text';
				toggleElement.classList.remove('fa-eye');
				toggleElement.classList.add('fa-eye-slash');
			} else {
				inputElement.type = 'password';
				toggleElement.classList.remove('fa-eye-slash');
				toggleElement.classList.add('fa-eye');
			}
		}

		passwordToggle.addEventListener('click', function () {
			togglePasswordVisibility(passwordInput, passwordToggle);
		});

		newPasswordToggle.addEventListener('click', function () {
			togglePasswordVisibility(newPasswordInput, newPasswordToggle);
		});

		newPasswordConfirmToggle.addEventListener('click', function () {
			togglePasswordVisibility(newPasswordConfirmInput, newPasswordConfirmToggle);
		});
	});
</script>
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