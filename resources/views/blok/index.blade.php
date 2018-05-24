@extends('layouts.members')

@section('content')


	<a href="{{ route('members.blok.create') }}"><button class="btn btn-success">Tambah Blok</button></a><br /><br />

	@include('messages._success')

	<table class="table table-bordered table-striped">
		<thead>
			<th colspan="5"><h4>Senarai Blok</h4></th>
		</thead>
		<tr>
			<td><center><strong>Bil</strong></center></td>
			<td><center><strong>Blok</strong></center></td>
			<td><center><strong>Fasa Pengambilan</strong></center></td>
			<td><center><strong>Lokaliti</strong></center></td>
			<td><center><strong>Pilihan</strong></center></td>
		</tr>

		@forelse ($blocks as $block)
		    <tr>
				<td><center>{{ $loop->iteration }}</td>
				<td><center>{{ $block->nama }}</td>
				<td><center>{{ $block->fasa->nama }}</td>
				<td><center>{{ $block->lokaliti->nama }}</td>
				
				<td><center>					
					<a href="{{ route('members.blok.show', ['id' => $block->id]) }}"><button class="btn btn-info">Kemaskini</button></a>
					<a href="{{ route('members.blok.hapus', ['id' => $block->id]) }}" onclick="return myFunction();"><button class="btn btn-danger">Hapus</button></a>
				</center></td>
					<script>
						function myFunction()
						{
							if(!confirm("Are You Sure to delete this data from the system?"))
							event.preventDefault();
						}
					</script>			
			</tr>	
		@empty
		    <tr>
		    	<td colspan="5"><font color="red">No Data</font></td>
		    </tr>
		@endforelse

		@if($blocks->count() >= 10 || $blocks->count() <= 10)
			<tr>
				<td colspan="5" align="center">{{ $blocks->render() }}</td>
			</tr>
		@endif

	</table>

@endsection