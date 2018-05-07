@extends('layouts.members')

@section('content')

<h1>Kemaskini Maklumat Negeri</h1>

<hr />

{!! Form::model($state, ['route' => ['negeri.update', $state->id], 'method' => 'PATCH']) !!}

	<div class="form-group row">
		{!! Form::label('nama', 'Nama Negeri',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('nama', null, ['class' => 'form-control col-sm-6' ]) !!}
	</div>

	<div class="form-group row">
		{!! Form::label('kod', 'Kod Negeri',['class'	=>	'form control col-sm-2']) !!}
		{!! Form::text('kod', null, ['class' => 'form-control col-sm-6']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}
		&nbsp<a href="{{ route('negeri.index') }}" class="btn btn-info">Kembali</a>
	</div>


{!! Form::close() !!}
<hr />
@endsection