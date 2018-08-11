@extends('app')

@section('title', 'Data Kas')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<div class="box box-defautl">
			<div class="box-header">
				<h3 class="box-title">Tabel Kas</h3>
				<a href="{{ route('kas.create') }}" class="btn btn-xs btn-info">Tambah Data</a>
				<div class="box-tools">
				</div>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Tanggal</th>
								<th>Keterangan</th>
                                <th>Kas Masuk</th>
								<th>Kas Keluar</th>
								<th>Saldo</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
								@php $totalmasuk = 0; $totalkeluar = 0; @endphp	
								@foreach($vData as $r)
									<tr>
										<td>{{ $r->kode }}</td>
										<td>{{ Carbon\Carbon::parse($r->tanggal)->format('Y-m-d') }}</td>
										<td>{{ $r->keterangan }}</td>
                                        <td>{{ $r->masuk }}</td>
										<td>{{ $r->keluar }}</td>
										<td></td>
										<td>
											<a href="{{ route('kas.destroy', ['id' => $r->id]) }}" class="btn btn-xs btn-danger on-deleted" data-method="delete" data-confirm="Apakah anda yakin menghapus data ini?" data-token="{{ csrf_token() }}">Hapus</a>
										</td>
									</tr>
									@php $totalmasuk += $r->masuk; $totalkeluar += $r->keluar; @endphp
									
								@endforeach
								<tr>
									<td colspan="9"><h3>____________________________________________________________________________</h3></td>
								</tr>
								<tr>
									<td colspan="3"><h3>Total</h3></td>
									<td><h3>{{ $totalmasuk }}</h3></td>
									<td><h3>{{ $totalkeluar }}</h3></td>
									<td><h3>{{ $totalmasuk-$totalkeluar }}</h3></td>
								</tr>
							
					
						</tbody>
					</table>
				</div>
			</div>
			<div class="box-footer"></div>
		</div>
	</div>
</div>
@endsection
