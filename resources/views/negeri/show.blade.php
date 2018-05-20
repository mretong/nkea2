@extends('layouts.members')

@section('content')


	<a href="{{ route('members.negeri.index') }}"><button class="btn btn-success">Senarai Negeri</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($state, ['route' => ['members.negeri.show', $state->id], 'method' => 'post']) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Negeri</h4></th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Nama Negeri', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama', null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Kod Negeri', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod', null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection