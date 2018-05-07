@extends('layouts.members')

@section('content')

<h1>Kemaskini Maklumat Lokaliti</h1>

<hr />

{!! Form::model($ptj, ['route' => ['lokaliti.update', $ptj->id], 'method' => 'PATCH']) !!}

	<div class="form-group row">
		{!! Form::label('nama', 'Nama PPK',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('nama', null, ['class' => 'form-control col-sm-6' ]) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('kod', 'Kod PPK',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('kod', null, ['class' => 'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('wilayah', 'Wilayah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_wilayah',$wilayah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}
		[ <a href="{{ route('lokaliti.index') }}">Kembali</a> ] 
	</div>


{!! Form::close() !!}
<hr />
@endsection