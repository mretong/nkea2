@extends('layouts.members')

@section('content')


	<a href="{{ route('members.daerah.create') }}"><button class="btn btn-success">Tambah Daerah</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Daerah</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Daerah</strong></center></td>
			<td><center><strong>Singkatan</strong></center></td>
			<td><center><strong>Negeri</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($districts as $district)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $district->nama }}</td>
				<td><center>{{ $district-> kod }}</td>
				<td><center>{{ $district->negeri->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.daerah.hapus', ['id' => $district->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($districts->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $districts->render() }}</td>
			</tr>
		@endif

	</table>

@endsection