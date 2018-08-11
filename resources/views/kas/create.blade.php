@extends('app')

@section('title', 'Tambah Data Kas')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('kas.store') }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Input</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Kode</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="kode">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Tanggal</label>
						<div class="col-sm-9">
                            <div class="input-group date">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
										<input type="text" id="tanggal_lahir" class="form-control" name="tanggal" readonly="true" value="{{ date('Y-m-d')}}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Keterangan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="keterangan">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-3">Kas Masuk</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="masuk">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-3">Kas Keluar</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="keluar">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<a href="{{ route('kas.index') }}" class="btn btn-danger">Batalkan</a>
					<button type="submit" class="btn btn-primary">Tambahkan Data</button>
				</div>
			</div>
		</form>

	</div>
</div>
@endsection