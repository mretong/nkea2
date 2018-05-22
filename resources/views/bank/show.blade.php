@extends('layouts.members')

@section('content')


	<a href="{{ route('members.bank.index') }}"><button class="btn btn-success">Senarai Bank</button></a><br /><br />

	@include('messages._formErrors')

	{!! Form::model($bank, ['route' => ['members.bank.show', $bank->id]]) !!}

	<table class="table table-bordered table-striped">
		<tr>
			<thead><th colspan="2"><h4>Kemaskini Bank</h4></th></thead>
		</tr>
		<tr>
			<td width="25%">{!! Form::label('nama', 'Bank', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('nama', null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('kod', 'Singkatan/Kod', ['class'=>'form control col-sm-6']) !!}</td>
			<td>{!! Form::text('kod', null,['class'=>'form-control col-sm-6']) !!}</td>
		</tr>
		<tr>
			<td colspan="2" align="right">{{ Form::submit('Kemaskini', ['class' => 'btn btn-primary']) }}</td>
		</tr>
	{!! Form::close() !!}

@endsection