@extends('layouts.members')

@section('content')


	<a href="{{ route('members.pakej.create') }}"><button class="btn btn-success">Tambah Pakej</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai Pakej</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Nama</strong></center></td>
			<td><center><strong>Kod</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($packages as $package)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $package->nama }}</td>
				<td><center>{{ $package->kod }}</td>
				
				<td><center>
					<a href="{{ route('members.pakej.show', ['id' => $package->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.pakej.hapus', ['id' => $package->id]) }}" onclick="return myFunction();"><button class="btn btn-danger">Hapus</button></a>

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

		@if($packages->count() > 10)
			<tr>
				<td colspan="4" align="center">{{ $packages->render() }}</td>
			</tr>
		@endif

	</table>

@endsection