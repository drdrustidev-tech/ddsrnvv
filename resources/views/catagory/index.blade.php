@extends('layouts.dashboard')

@section('content')
<div align="right">
	<a href="{{ route('catagory.create') }}" class="btn btn-success btn-sm">Add</a>
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
		<th width="35%">Catagory Name</th>		
		<th width="30%">Action</th>
	</tr>
	@foreach($data as $row)
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->name }}</td>			
			<td>
				
				<form action="{{ route('catagory.destroy', $row->id) }}" method="post">
					<a href="{{ route('catagory.show', $row->id) }}" class="btn btn-primary">Show</a>
					<a href="{{ route('catagory.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                    {{ csrf_field() }}
       {{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>








@endsection