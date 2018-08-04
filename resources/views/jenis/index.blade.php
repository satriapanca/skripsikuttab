@extends('app')

@section('title', 'Data Jenis Pembayaran')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<div class="box box-defautl">
			<div class="box-header">
				<h3 class="box-title">Tabel Jenis Pembayaran</h3>
				<a href="{{ route('jenis.create') }}" class="btn btn-xs btn-info">Tambah Data</a>
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
								<th>Nama Pembayaran</th>
								<th>Jumlah</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if($vData->count())
								@php $no = ($vData->currentpage()-1) * $vData->perpage() + 1 @endphp
								@foreach($vData as $r)
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $r->namapembayaran }}</td>
										<td>{{ $r->jumlah }}</td>
										<td>
											<a href="{{ route('jenis.edit', ['id' => $r->id]) }}" class="btn btn-xs btn-success">Edit</a>
											<a href="{{ route('jenis.destroy', ['id' => $r->id]) }}" class="btn btn-xs btn-danger on-deleted" data-method="delete" data-confirm="Apakah anda yakin menghapus data ini?" data-token="{{ csrf_token() }}">Hapus</a>
										</td>
									</tr>
									@php $no++ @endphp
								@endforeach
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