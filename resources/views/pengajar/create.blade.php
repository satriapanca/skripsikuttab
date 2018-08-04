@extends('app')

@section('title', 'Tambah Data Pengajar')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('pengajar.store') }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Input</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nama">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Jabatan</label>
						<div class="col-sm-9">
							<select name="jabatan" class="form-control">
								@foreach($vJabatan as $j)
									<option value="{{ $j->id }}">{{ $j->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Nomer Induk Pegawai</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nip">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Jenis Kelamin</label>
						<div class="col-sm-9">
							<div class="radio">
								<label>
									<input type="radio" name="jenis_kelamin" value="0" checked="true">
									Pria
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="jenis_kelamin" value="1">
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
									<input type="text" class="form-control" name="tempat_lahir">
								</div>
								<div class="col-sm-6">
									<div class="input-group date">
										<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
										<input type="text" id="tanggal_lahir" class="form-control" name="tanggal_lahir" readonly="true" value="1970-01-02">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">No. Telepon</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="no_telepon">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<textarea name="alamat" rows="5" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<a href="{{ route('pengajar.index') }}" class="btn btn-danger">Batalkan</a>
					<button type="submit" class="btn btn-primary">Tambahkan Data</button>
				</div>
			</div>
		</form>

	</div>
</div>
@endsection

@section('custom_css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('custom_js')
<script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$(document).ready(function () {
	$('#tanggal_lahir').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		startDate: new Date('1970-01-02'),
		endDate: new Date('2038-01-18'),
		defaultViewDate: { year: 1970, month: 0, day: 1 },
		disableTouchKeyboard: true
	});
});
</script>
@endsection