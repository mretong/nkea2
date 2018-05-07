@extends('layouts.members')

@section('content')

<h1>Tambah Lokaliti</h1>
<hr />


{!! Form::open(['route' => 'lokaliti.store']) !!}

	<div class="form-group row">
		{!! Form::label('nama', 'Nama PPK', ['class'=>'form control col-sm-2']) !!}
		{!! Form::text('nama','',['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('kod', 'Kod PPK', ['class'=>'form control col-sm-2']) !!}
		{!! Form::text('kod','',['class'=>'form-control col-sm-6']) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('wilayah', 'Wilayah', ['class'=>'form control col-sm-2']) !!}
		{!! Form::select('id_wilayah',$wilayah, null, ['class'=>'form-control col-sm-6']) !!}
	</div>


	<div class="form-group">
		{!! Form::submit('Tambah Lokaliti', ['class' => 'btn btn-primary']) !!}
		[<a href="{{ route('lokaliti.index') }}">Kembali</a>]
	</div>

{!! Form::close() !!}

<hr />
@endsection