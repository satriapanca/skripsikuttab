@extends('app')

@section('title', 'Pembayaran')

@section('contents')
<form action="{{ route('pembayaran.store') }}" class="form form-horizontal" method="post">
<div class="row">
	<div class="col-sm-12">
		
			{{ csrf_field() }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Pembayaran</h3>
				</div>
				<div class="box-body">
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Nomer Induk Santri</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nis" value="{{ old('nis', $datanis->nis) }}">
							<input type="hidden" name="id_santri" value="{{ $datanis->id }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-2">Nama Santri</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nama" value="{{ old('nama', $datanis->nama) }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-2">Kelas</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="kelas" value="{{ old('kelas', $datanis->kelas->nama_kelas) }}">
						</div>
					</div>
					<div class="form-group">
					<label for="" class="label-control col-sm-2">Pembayaran</label>
					  	<div class="col-sm-3">
							<select name="jenis_pembayaran" class="form-control">
								@foreach($vJenis as $j)
									<option value="{{ $j->id }}">{{ $j->namapembayaran }}</option>
								@endforeach
							</select>
						</div>
					<label for="" class="label-control col-sm-1">Tanggal</label>
					   <div class="col-sm-2">
									<div class="input-group date">
										<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
										<input type="text" id="tanggal_lahir" class="form-control" name="tgl_pembayaran" readonly="true" value="{{ date('Y-m-d') }}">
									</div>
						</div>
						<button type="submit" class="btn btn-primary">Bayar</button>
					</div>
					<div class="box-header">
				    <h3 class="box-title">Data Pembayaran Santri</h3>
			    </div>
					<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th width="50">No</th>
								<th>Tanggal</th>
								<th>Pembayaran</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
						       @php $no = 1; @endphp
									<tr>
										<td>{{ $no++ }}</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
						</tbody>
					</table>
				</div>
			</div>
				</div>
				<div class="box-header">
				    <h3 class="box-title">Nota Pembayaran</h3>
			    </div>
					<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th width="50">No</th>
								<th>Tanggal</th>
								<th>Pembayaran</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
						       @php $no = 1; @endphp
									<tr>
										<td>{{ $no++ }}</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
						</tbody>
					</table>
				</div>
			</div>
		
	</div>
	                <div class="form-group">
						<label for="" class="label-control col-sm-8">Bayar</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="bayar">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-8">Total</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="total">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-8">Kembali</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="jumlah">
						</div>
						<div class="col-sm-2">
						<a href="#" class="btn btn-primary">Cetak</a>
						</div>
					</div>
</div>
</form>
@endsection