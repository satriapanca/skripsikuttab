@extends('app')

@section('title', 'Tambah Data Santri')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('santri.store') }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Input</h3>
				</div>
				<div class="box-body">
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Nomer Induk Santri</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nis" value="{{ old('nis') }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Jenis Kelamin</label>
						<div class="col-sm-9">
							<div class="radio">
								<label>
									<input type="radio" name="gender" value="0" checked="true">
									Laki-laki
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="gender" value="1">
									Perempuan
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Tempat/Tanggal Lahir</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" name="tempat_lahir">
								</div>
								<div class="col-sm-6">
									<div class="input-group date">
										<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
										<input type="text" id="tanggal_lahir" class="form-control" name="tanggal_lahir" readonly="true" value="2005-01-01">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<textarea name="alamat" rows="5" class="form-control"></textarea>
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Ayah</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama_ayah">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Ibu</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama_ibu">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">No. Telepon Ortu</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="no_telp_ortu">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Kelas</label>
						<div class="col-sm-9">
							<select name="nama_kelas" class="form-control">
								@foreach($vKelas as $j)
									<option value="{{ $j->id }}">{{ $j->nama_kelas }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<a href="{{ route('santri.index') }}" class="btn btn-danger">Batalkan</a>
					<button type="submit" class="btn btn-primary">Tambahkan Data</button>
				</div>
			</div>
		</form>

	</div>
</div>
@endsection