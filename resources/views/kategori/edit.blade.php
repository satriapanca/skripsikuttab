@extends('app')

@section('title', 'Edit Data Kategori')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('kategori.update', $data->id) }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Edit</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Kategori Mapel</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="namakategori" value="{{ $data->namakategori }}">
						</div>
					</div>
				<div class="box-footer">
					<a href="{{ route('kategori.index') }}" class="btn btn-danger">Batalkan</a>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection