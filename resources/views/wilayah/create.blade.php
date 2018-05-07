@extends('layouts.members')

@section('content')

<h1>Tambah Wilayah</h1>
<hr />


{!! Form::open(['route' => 'wilayah.store']) !!}

	<div class="form-group row">
		{!! Form::label('nama', 'Nama Wilayah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('kod', 'Kod Wilayah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('daerah', 'Daerah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_daerah',$daerah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>


	<div class="form-group">
		{!! Form::submit('Tambah Wilayah', ['class' => 'btn btn-primary']) !!}
		[<a href="{{ route('wilayah.index') }}">Kembali</a>]
	</div>

{!! Form::close() !!}

<hr />
@endsection