@extends('app')

@section('title', 'Tambah Data Kategori')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('kategori.store') }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Input</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Kategori Mapel</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="namakategori">
						</div>
					</div>
				<div class="box-footer">
					<a href="{{ route('kategori.index') }}" class="btn btn-danger">Batalkan</a>
					<button type="submit" class="btn btn-primary">Tambahkan Data</button>
				</div>
			</div>
		</form>

	</div>
</div>
@endsection