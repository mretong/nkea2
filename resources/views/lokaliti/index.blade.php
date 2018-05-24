@extends('layouts.members')

@section('content')


	<a href="{{ route('members.lokaliti.create') }}"><button class="btn btn-success">Tambah Lokaliti</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Lokaliti</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Nama Lokaliti</strong></center></td>
			<td><center><strong>Kod Lokaliti</strong></center></td>
			<td><center><strong>Wilayah</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($locals as $local)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $local->nama }}</td>
				<td><center>{{ $local->kod }}</td>
				<td><center>{{ $local->wilayah->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.lokaliti.show', ['id' => $local->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.lokaliti.hapus', ['id' => $local->id]) }}" onclick="return myFunction();"><button class="btn btn-danger">Hapus</button></a>
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
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($locals->count() >= 10 || $locals->count() <= 10)
			<tr>
				<td colspan="5" align="center">{{ $locals->render() }}</td>
			</tr>
		@endif

	</table>

@endsection