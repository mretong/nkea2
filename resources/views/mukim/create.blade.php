@extends('layouts.members')

@section('content')

<h1>Tambah Mukim</h1>
<hr />


{!! Form::open(['route' => 'mukim.store']) !!}

	<div class="form-group row">
		{!! Form::label('nama', 'Nama Mukim', ['class'=>'form control col-sm-2']) !!}
		{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('daerah', 'Daerah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_daerah',$daerah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('wilayah', 'Wilayah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_wilayah',$wilayah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>


	<div class="form-group">
		{!! Form::submit('Tambah Mukim', ['class' => 'btn btn-primary']) !!}
		[<a href="{{ route('mukim.index') }}">Kembali</a>]
	</div>

{!! Form::close() !!}

<hr />
@endsection