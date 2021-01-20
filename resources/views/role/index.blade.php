@extends('layouts.dashboard')

@section('content')
<div align="right">
	<a href="{{ route('role.create') }}" class="btn btn-success btn-sm">Add</a>
</div>
<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
	<tr>
		<th width="10%">id</th>
		<th width="35%">Role Name</th>	
		<th width="35%">Role Description</th>		
		<th width="30%">Action</th>
	</tr>
	@foreach($data as $row)
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->description }}</td>			
			<td>
				
				<form action="{{ route('role.destroy', $row->id) }}" method="post">
					<a href="{{ route('role.show', $row->id) }}" class="btn btn-primary">Show</a>
					<a href="{{ route('role.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                    {{ csrf_field() }}
       {{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>








@endsection