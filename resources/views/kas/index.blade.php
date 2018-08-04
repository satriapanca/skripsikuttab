@extends('app')

@section('title', 'Data Kas')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<div class="box box-defautl">
			<div class="box-header">
				<h3 class="box-title">Tabel Kas</h3>
				<a href="{{ route('kelas.create') }}" class="btn btn-xs btn-info">Tambah Data</a>
				<div class="box-tools">
					{{ $vData->links() }}
					{{-- <ul class="pagination pagination-sm no-margin pull-right">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul> --}}
				</div>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th width="50">No</th>
								<th>Kode</th>
								<th>Tanggal</th>
								<th>Keterangan</th>
                                <th>Kas Masuk</th>
								<th>Kas Keluar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if($vData->count())
								@php $no = ($vData->currentpage()-1) * $vData->perpage() + 1 @endphp
								@php $totalmasuk = 0; $totalkeluar = 0; @endphp
								@foreach($vData as $r)
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $r->kode }}</td>
										<td>{{ Carbon\Carbon::parse($r->tanggal)->format('Y-m-d') }}</td>
										<td>{{ $r->keterangan }}</td>
                                        <td>{{ $r->masuk }}</td>
										<td>{{ $r->keluar }}</td>
										<td>
											<a href="{{ route('kelas.edit', ['id' => $r->id]) }}" class="btn btn-xs btn-success">Edit</a>
											<a href="{{ route('kelas.destroy', ['id' => $r->id]) }}" class="btn btn-xs btn-danger on-deleted" data-method="delete" data-confirm="Apakah anda yakin menghapus data ini?" data-token="{{ csrf_token() }}">Hapus</a>
										</td>
									</tr>
									@php $totalmasuk += $r->masuk; $totalkeluar += $r->keluar; @endphp
									@php $no++ @endphp
								@endforeach
								<tr>
									<td colspan="4" align="right"><b>Total</b></td>
									<td>{{ $totalmasuk }}</td>
									<td>{{ $totalkeluar }}</td>
									<td>#</td>
								</tr>
								<tr>
									<td colspan="4" align="right"><b>Saldo</b></td>
									<td></td>
									<td></td>
									<td>{{ $totalmasuk-$totalkeluar }}</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
			<div class="box-footer"></div>
		</div>
	</div>
</div>
@endsection
