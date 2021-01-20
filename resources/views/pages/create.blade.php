@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('page.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('page.store') }}" method="POST" >
        @csrf

        <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" class="form-control" placeholder="Name">
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tittle:</strong>
                    <input type="text" name="tittle" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Catagory:</strong>
                    <select name="catagory_id" class="form-control">
                       <option value="">--- Select Designation ---</option>
                       @foreach ($catagories as $catagoy)
                           <option value="{{ $catagoy->id }}">{{ $catagoy->name  }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea class="form-control" style="height:50px" name="body"
                        placeholder="description"></textarea>
                </div>
            </div>   
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection


@section('script')

<script type="text/javascript" src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        height : "400"
        
    });
</script>



@endsection