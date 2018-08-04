@extends('app')

@section('title', 'Pembayaran')

@section('contents')
<div class="row">
	<div class="col-sm-12">
			<div class="box box-success">
				<div class="box-header">
				</div>
				<div class="box-body">
					<form action="pembayaran/search" method="post">
						@csrf
						<div class="form-group">
							<label for="" class="label-control col-sm-3">Masukkan Nomer Induk Santri</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="nis">
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Lanjutkan</button>
						</div>
					</form>
                </div>
                </div>
			</div>
		</form>

	</div>
</div>
@endsection