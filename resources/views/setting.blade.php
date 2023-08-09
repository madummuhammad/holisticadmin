@extends('layouts.app')
@section('content')
@php $seg2=request()->segment(2); @endphp
<div>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Setting</h1>
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