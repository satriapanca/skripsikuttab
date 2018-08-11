@extends('app')

@section('title', 'Data Santri')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<div class="box box-defautl">
			<div class="box-header">
				<h3 class="box-title">Tabel Santri</h3>
				<a href="{{ route('santri.create') }}" class="btn btn-xs btn-info">Tambah Data</a>
				<div class="box-tools">
			<form class="form" action="{{ route('santri.cari') }}" method="get">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="q" class="form-control pull-right" placeholder="Pencarian Nama">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
				</div>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th width="50">No</th>
								<th>NIS</th>
								<th>Nama</th>
								<th>Kelas</th>
								<th>Tanggal Buat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if($vData->count())
								@php $no = ($vData->currentpage()-1) * $vData->perpage() + 1 @endphp
								@foreach($vData as $r)
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $r->nis }}</td>
										<td>{{ $r->nama }}</td>
										<td>{{ $r->kelas->nama_kelas }}</td>
										<td>{{ Carbon\Carbon::parse($r->created_at)->format('Y-m-d') }}</td>
										<td>
											<a href="{{ route('santri.edit', ['id' => $r->id]) }}" class="btn btn-xs btn-success">Edit</a>
											<a href="{{ route('santri.destroy', ['id' => $r->id]) }}" class="btn btn-xs btn-danger on-deleted" data-method="delete" data-confirm="Apakah anda yakin menghapus data ini?" data-token="{{ csrf_token() }}">Hapus</a>
										</td>
									</tr>
									@php $no++ @endphp
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
			<div class="box-footer">{{ $vData->links() }}</div>
		</div>
	</div>
</div>
@endsection