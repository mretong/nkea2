@extends('layouts.members')

@section('content')

<h1>Kemaskini Maklumat Wilayah</h1>

<hr />

{!! Form::model($territory, ['route' => ['wilayah.update', $territory->id], 'method' => 'PATCH']) !!}

	<div class="form-group row">
		{!! Form::label('nama', 'Nama Wilayah',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('nama', null, ['class' => 'form-control col-sm-6' ]) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('kod', 'Kod Wilayah',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('kod', null, ['class' => 'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('daerah', 'Daerah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_daerah',$daerah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}
		[ <a href="{{ route('wilayah.index') }}">Kembali</a> ] 
	</div>


{!! Form::close() !!}
<hr />
@endsection