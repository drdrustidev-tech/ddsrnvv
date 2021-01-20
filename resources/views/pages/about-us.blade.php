@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>About Us</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('page.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

   
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