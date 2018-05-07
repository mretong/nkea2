@extends('layouts.members')

@section('content')


	<a href="{{ route('members.negeri.create') }}"><button class="btn btn-success">Tambah Negeri</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai Negeri</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Daerah</strong></center></td>
			<td><center><strong>Negeri</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($states as $state)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $state->nama }}</td>
				<td><center>{{ $state-> kod }}</td>
				
				<td><center><a href="{{ route('members.negeri.hapus', ['id' => $state->id]) }}"><button class="btn btn-danger">Hapus</button></a></center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="4"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($states->count() > 10)
			<tr>
				<td colspan="4" align="center">{{ $states->render() }}</td>
			</tr>
		@endif

	</table>

@endsection