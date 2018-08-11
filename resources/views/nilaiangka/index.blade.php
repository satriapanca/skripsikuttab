@extends('app')

@section('title', '')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<div class="box box-defautl">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools">
				</div>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
                                <th>No</th>
								<th>Kelas</th>
								<th>Guru Kelas</th>
								<th>Tahun Akademik</th>
								<th>Input Nilai</th>
							</tr>
						</thead>
						<tbody>
                                @php $no = 1; @endphp
                                @foreach($vKelas as $r)
									<tr>
                                        <td>{{ $no }}</td>
										<td>{{ $r->nama_kelas }}</td>
										<td>{{ $r->pengajar->nama }}</td>
										<td>{{ $r->thnakademik }}</td>
										<td>
											<a href="{{ route('nilaiangka.uts') }}" class="btn btn-xs btn-success">UTS</a>
											<a href="{{ route('jenis.edit', ['id' => $r->id]) }}" class="btn btn-xs btn-info">UAS</a>
										</td>
									</tr>
                                @php $no++ @endphp
								@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="box-footer"></div>
		</div>
	</div>
</div>
@endsection