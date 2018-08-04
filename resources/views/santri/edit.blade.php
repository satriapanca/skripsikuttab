@extends('app')

@section('title', 'Edit Data Santri')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('santri.update', $data->id) }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Edit</h3>
				</div>
				<div class="box-body">
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Nomer Induk Santri</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nis" value="{{ $data->nis }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Jenis Kelamin</label>
						<div class="col-sm-9">
							<div class="radio">
								<label>
									<input type="radio" name="gender" value="0"{{ $data->gender == 0 ? ' checked="true"' : '' }}>
									Pria
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="gender" value="1"{{ $data->gender == 1 ? ' checked="true"' : '' }}>
									Wanita
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Tempat/Tanggal Lahir</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
								</div>
								<div class="col-sm-6">
									<div class="input-group date">
										<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
										<input type="text" id="tanggal_lahir" class="form-control" name="tanggal_lahir" readonly="true" value="{{ Carbon\Carbon::parse($data->tanggal_lahir)->format('Y-m-d') }}">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<textarea name="alamat" rows="5" class="form-control">{{ $data->alamat }}</textarea>
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Ayah</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama_ayah" value="{{ $data->nama_ayah }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Ibu</label>
						<div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_ibu" value="{{ $data->nama_ibu}}">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">No. Telepon Ortu</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="no_telp_ortu" value="{{ $data->no_telp_ortu }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Kelas</label>
						<div class="col-sm-9">
							<select name="nama_kelas" class="form-control">
								@foreach($vKelas as $j)
									<option value="{{ $j->id }}"{{ $j->id == $data->kelas_id ? ' selected="selected"' : '' }}>{{ $j->nama_kelas }}</option>
								@endforeach
							</select>
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