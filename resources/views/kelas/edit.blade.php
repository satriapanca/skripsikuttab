@extends('app')

@section('title', 'Edit Data Kelas')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('kelas.update', $data->id) }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Edit</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama_kelas" value="{{ $data->nama_kelas }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Guru Kelas</label>
						<div class="col-sm-9">
							<select name="nama" class="form-control">
								@foreach($vPengajar as $j)
									<option value="{{ $j->id }}"{{ $j->id == $data->pengajar_id ? ' selected="selected"' : '' }}>{{ $j->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Tahun Ajaran</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="thnakademik" value="{{ $data->thnakademik }}">
						</div>
					</div>

				</div>
				<div class="box-footer">
					<a href="{{ route('kelas.index') }}" class="btn btn-danger">Batalkan</a>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection