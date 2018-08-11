@extends('app')

@section('title', 'Nilai Angka')

@section('contents')
<div class="row">
	<div class="col-sm-12">
		<form action="{{ route('kelas.store') }}" class="form form-horizontal" method="post">
			{{ csrf_field() }}
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Nilai Angka</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="" class="label-control col-sm-2">Kelas</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_kelas" value="{{ $vKelas->nama_kelas }}">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Guru Kelas</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama" value="{{ $vKelas->pengajar->nama }}">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Tahun Ajaran</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="thnakademik" value="{{ $vKelas->thnakademik }}">
						</div>
					</div>
                    <div class="form-group">
						<label for="" class="label-control col-sm-2">Mata Pelajaran</label>
						<div class="col-sm-6">
							<select name="nama" class="form-control">
							@foreach($vPelajaran as $r)
									<option value="{{ $r->id }}">{{ $r->kategori->namakategori }}-{{ $r->namapelajaran }}, {{ $r->sub_pelajaran }}</option>
								@endforeach
							</select>
						</div>
					</div>
					</div>
					<div class="box-footer">
					<a href=""{{ route('nilaiangka.input', ['id' => $r->id]) }}"" class="btn btn-xs btn-success">Input UTS</a>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>
@endsection