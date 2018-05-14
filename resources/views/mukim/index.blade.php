@extends('layouts.members')

@section('content')


	<a href="{{ route('members.mukim.create') }}"><button class="btn btn-success">Tambah Mukim</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai Mukim</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Nama</strong></center></td>
			<td><center><strong>Daerah</strong></center></td>
			<td><center><strong>Wilayah</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($stays as $stay)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $stay->nama }}</td>
				<td><center>{{ $stay->daerah->nama }}</td>
				<td><center>{{ $stay->wilayah->nama }}</td>
				
				<td><center><a href="{{ route('members.mukim.hapus', ['id' => $stay->id]) }}"><button class="btn btn-danger">Hapus</button></a></center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="4"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($stays->count() > 10)
			<tr>
				<td colspan="4" align="center">{{ $stays->render() }}</td>
			</tr>
		@endif

	</table>

@endsection