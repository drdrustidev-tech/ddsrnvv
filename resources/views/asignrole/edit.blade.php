@extends('layouts.dashboard')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('asignrole.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('asignrole.update', $data->id) }}" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PUT') }}
<div class="form-group row">
  <label class="col-md-2 text-right">User Name</label>
  <div class="col-md-10">
     <input type="text" name="name" value="{{ $data->name }}"class="form-control input-lg" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right">User Email</label>
  <div class="col-md-10">
     <input type="text" name="name" value="{{ $data->email }}"class="form-control input-lg" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-2 text-right" for="department_id">Assigned Roles:</label>
  <div class="col-md-10">

  @foreach($allroles as $role)

  @if ($data->roles->contains($role->id) )
        
        <label class="checkbox-inline">
    <input type="checkbox" id="division_id" name="roles_id[]" value="{{$role->id}}" checked > 
    {{$role->name}} </label>
		
	@else
  <label class="checkbox-inline">
    <input type="checkbox" id="division_id" name="roles_id[]" value="{{$role->id}}" > 
    {{$role->name}} </label>
	@endif
        
    @endforeach  
  
  </div>
</div> 
 
 
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
 </div>

</form>

@endsection