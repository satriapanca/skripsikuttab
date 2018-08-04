@extends('app')

@section('title', 'Edit Data Mata Pelajaran')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('pelajaran.update', $data->id) }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Edit</h3>
				</div>
				<div class="box-body">
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Kategori</label>
						<div class="col-sm-9">
							<select name="namakategori" class="form-control">
								@foreach($vKategori as $j)
									<option value="{{ $j->id }}"{{ $j->id == $data->kategori_id ? ' selected="selected"' : '' }}>{{ $j->namakategori }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Mata Pelajaran</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="namapelajaran" value="{{ $data->namapelajaran }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3"></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="sub_pelajaran" value="{{ $data->sub_pelajaran }}">
						</div>
					</div>

				</div>
				<div class="box-footer">
					<a href="{{ route('pelajaran.index') }}" class="btn btn-danger">Batalkan</a>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection