@extends('layouts.members')

@section('content')


	<a href="{{ route('members.ptj.create') }}"><button class="btn btn-success">Tambah PTJ</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="4"><h4>Senarai PTJ</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Nama</strong></center></td>
			<td><center><strong>Kod</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($ptjs as $ptj)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $ptj->nama }}</td>
				<td><center>{{ $ptj->kod }}</td>
				
				<td><center>
					<a href="{{ route('members.ptj.show', ['id' => $ptj->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.ptj.hapus', ['id' => $ptj->id]) }}" onclick="return myFunction();"><button class="btn btn-danger">Hapus</button></a>
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

		@if($ptjs->count() > 10)
			<tr>
				<td colspan="4" align="center">{{ $ptjs->render() }}</td>
			</tr>
		@endif

	</table>

@endsection