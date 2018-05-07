@extends('layouts.members')


@section('content')

<h1>Menu Wilayah</h1>

<hr />

<a href="{{ route('wilayah.create') }}" class="btn btn-warning"><b>Tambah Maklumat Wilayah Baru</b></a>
<a href="{{ route('setting.index') }}" class="btn btn-warning" style="float: right;"><b>Menu Utama</b></a>

<hr />

<table class="table table-bordered table-striped">
	<tr>
		<td><center>Bil</td>
		<td><center>Wilayah</td>
		<td><center>Kod Wilayah</td>
		<td><center>Daerah</td>
		<td><center>Pilihan</td>
	</tr>

	@foreach($wilayah as $territory)
	<tr>
		<td><center>{{ $loop->iteration }}</td>
		<td><center>{{ $territory->nama }}</td>
		<td><center>{{ $territory->kod }}</td>
		<td><center>{{ $territory->daerah->nama }}</td>

		
		<td><center>
				{!! Form::open(['route' => ['wilayah.destroy', $territory->id], 'method' => 'delete', 'onclick'=>'return myFunction();']) !!}
					{!! Form::submit('Buang', ['class' => 'btn btn-danger']) !!}{!! Form::close() !!}
				{!! Form::open(['route' => ['wilayah.show', $territory->id], 'method' => 'get']) !!}
					{!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}{!! Form::close() !!}

					<script>
						function myFunction()
						{
							if(!confirm("Are You Sure to Delete this Wilayah data from the system?"))
							event.preventDefault();
						}
					</script>			
	</tr>
	@endforeach

</table>

@endsection