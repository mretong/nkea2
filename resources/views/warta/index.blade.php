@extends('layouts.members')

@section('content')


	<a href="{{ route('members.warta.create') }}"><button class="btn btn-success">Tambah Warta</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Warta</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Blok</strong></center></td>
			<td><center><strong>No. Warta</strong></center></td>
			<td><center><strong>Tarikh Warta</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($warrants as $warrant)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $warrant->blok->nama }}</td>
				<td><center>{{ $warrant->no_warta }}</td>
				<td><center>{{ $warrant->tarikh_warta->format('d/m/Y') }}</td>
				
				<td><center>					
					<a href="{{ route('members.warta.show', ['id' => $warrant->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.warta.hapus', ['id' => $warrant->id]) }}"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
								
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($warrants->count() > 10)
			<tr>
				<td colspan="5" align="center">{{ $warrants->render() }}</td>
			</tr>
		@endif

	</table>

@endsection