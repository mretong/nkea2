@extends('layouts.members')

@section('content')


	<a href="{{ route('members.kategori.create') }}"><button class="btn btn-success">Tambah Jenis Pampasan</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai Jenis Pampasan</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Jenis</strong></center></td>
			<td><center><strong>Kod</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($kategori as $kat)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $kat->nama }}</td>
				<td><center>{{ $kat-> kod }}</td>
				
				<td><center>
					<a href="{{ route('members.kategori.show', ['id' => $kat->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.kategori.hapus', ['id' => $kat->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="4"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($kategori->count() > 10)
			<tr>
				<td colspan="4" align="center">{{ $kategori->render() }}</td>
			</tr>
		@endif

	</table>

@endsection