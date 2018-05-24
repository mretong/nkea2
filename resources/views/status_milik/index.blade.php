@extends('layouts.members')

@section('content')


	<a href="{{ route('members.status_milik.create') }}"><button class="btn btn-success">Tambah Status Milik</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai Status Milik</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Status</strong></center></td>
			<td><center><strong>Kod</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($owned as $own)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $own->nama }}</td>
				<td><center>{{ $own->kod }}</td>
				
				<td><center>
					<a href="{{ route('members.status_milik.show', ['id' => $own->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.status_milik.hapus', ['id' => $own->id]) }}" onclick="return myFunction();"><button class="btn btn-danger">Hapus</button></a>
					<script>
						function myFunction()
						{
							if(!confirm("Are You Sure to delete this data from the system?"))
							event.preventDefault();
						}
					</script>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="4"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($owned->count() > 10)
			<tr>
				<td colspan="4" align="center">{{ $owned->render() }}</td>
			</tr>
		@endif

	</table>

@endsection