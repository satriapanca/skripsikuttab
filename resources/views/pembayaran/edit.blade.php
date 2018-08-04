@extends('app')

@section('title', 'Pembayaran')

@section('contents')
<form action="{{ route('pembayaran.update', ['id' => $data['id']]) }}" class="form form-horizontal" method="post">
<div class="row">
	<div class="col-sm-12">
		
			{{ csrf_field() }}
			@method('PATCH')
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Form Pembayaran</h3>
				</div>
				<div class="box-body">
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Nomer Induk Santri</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nis" value="{{ $data['nis'] }}" readonly="true">
							<input type="hidden" name="id_santri" value="{{ $data['id'] }}">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-2">Nama Santri</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nama" value="{{ $data['nama'] }}" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-2">Kelas</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="kelas" value="{{ $data['nama_kelas'] }}" readonly="true">
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
										<input type="text" id="tanggal_lahir" class="form-control" readonly="true" name="tgl_pembayaran" value="{{ date('Y-m-d') }}">
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
							@if($data_pem->count() > 0)
						       @php $no = 1; @endphp
							   @foreach ($data_pem as $row)
									<tr>
										<td>{{ $no }}</td>
										<td>{{ Carbon\Carbon::parse($row->tgl_pembayaran)->format('d M Y') }}</td>
										<td>{{ $row->jenis->namapembayaran }}</td>
										<td>{{ $row->jenis->jumlah }}</td>
									</tr>
									@php $no++ @endphp
								@endforeach
							@endif
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
					<table id="tableid" class="table table-hover">
						<thead>
							<tr>
								<th width="50">No</th>
								<th>Tanggal</th>
								<th>Pembayaran</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data_note) > 0)
						       @php $no = 1; @endphp
							   @foreach($data_note as $row)
									<tr>
										<td>{{ $no }}</td>
										<td>{{ Carbon\Carbon::parse($row['tgl_pembayaran'])->format('d M Y') }}</td>
										<td>{{ $row['jenis_pembayaran'] }}</td>
										<td id="jumlah{{ $no }}">{{ $row['jumlah'] }}</td>
									</tr>
									@php $no++; @endphp
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		
	</div>
	                <div class="form-group">
						<label for="" class="label-control col-sm-8">Bayar</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="bayar" id="bayar">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-8">Total</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="total" id="total" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label-control col-sm-8">Kembali</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="kembali" disabled>
						</div>
						<div class="col-sm-2">
						<button type="submit" class="btn btn-primary">Cetak</button>
						</div>
					</div>
</div>
</form>
@endsection

@section('custom_js')
<script>
var bayar = document.getElementById('bayar');
var total = document.getElementById('total');
var kembali = document.getElementById('kembali');
var table = document.getElementById('tableid').getElementsByTagName('tbody')[0], jumlah = 0;

for (var i = 0; i < table.rows.length; i++) {
	jumlah = jumlah + parseInt(table.rows[i].cells[3].innerHTML);
}

total.value = jumlah;
bayar.onkeyup = function() {
	kembali.value = parseInt(this.value) - parseInt(total.value);
};

</script>
@endsection