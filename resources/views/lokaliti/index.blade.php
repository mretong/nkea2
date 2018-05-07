@extends('layouts.members')
@section('content')

<h1>Lokaliti Menu</h1>
<hr />
<a href=" {{ route('lokaliti.create') }} " class="btn btn-warning"><b>Tambah Lokaliti Baru</b></a>
<a href="{{ route('setting.index') }}" class="btn btn-warning" style="float: right;"><b>Menu Utama</b></a>
<hr />

<table class="table table-bordered table-striped">
	<tr>
		<td><center>Bil</td>
		<td><center>Nama Lokaliti</td>
		<td><center>Kod Lokaliti</td>
		<td><center>Wilayah</td>
		<td><center>Pilihan</td>
	</tr>

	@foreach($lokaliti as $ptj)
	<tr>
		<td><center>{{ $loop->iteration }}</td>
		<td><center>{{ $ptj->nama }}</td>
		<td><center>{{ $ptj->kod }}</td>
		<td><center>{{ $ptj->wilayah->nama }}</td>

		<td><center>
				{!! Form::open(['route' => ['lokaliti.destroy', $ptj->id], 'method' => 'delete', 'onclick'=>'return myFunction();']) !!}
					{!! Form::submit('Buang', ['class' => 'btn btn-danger']) !!}{!! Form::close() !!}
				{!! Form::open(['route' => ['lokaliti.show', $ptj->id], 'method' => 'get']) !!}
					{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}{!! Form::close() !!}

					<script>
						function myFunction()
						{
							if(!confirm("Are You Sure to Delete this data from the system?"))
							event.preventDefault();
						}
					</script>		
	</tr>
	@endforeach
	<tr>
		<td colspan="5" align="center">{!! $lokaliti->render() !!}</td>
	</tr>
</table>

@endsection