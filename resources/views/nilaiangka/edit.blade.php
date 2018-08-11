@extends('app')

@section('title', 'Nilai Angka UTS')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('kelas.store') }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Input Nilai UTS</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="" class="label-control col-sm-2">Kelas</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_kelas" value="{{ $vKelas->nama_kelas }}" readonly="true">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Guru Kelas</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama" value="{{ $vKelas->pengajar->nama }}" readonly="true">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Tahun Ajaran</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="thnakademik" value="{{ $vKelas->thnakademik }}" readonly="true">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Mata Pelajaran</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="thnakademik" value="{{ $vPelajaran->namapelajaran }}" readonly="true">
						</div>
					</div>
					<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama Santri</th>
								<th>Nilai UTS</th>
							</tr>
						</thead>
						<tbody>
                                @foreach($vSantri as $v)
									<tr>
                                        <td>{{ $v->nis }}</td>
										<td>{{ $v->nama }}</td>
										<td></td>
									</tr>
								@endforeach
						</tbody>
					</table>
				</div>
			</div>
				</div>
			</div>
		</form>

	</div>
</div>
@endsection