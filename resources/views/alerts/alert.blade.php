@if (count($errors) > 0)
<div class="col-sm-8 text-center offset-sm-2  ">
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>        
    </div>
</div>    
@endif
@if(Session::has('message'))
<div class="success">
    {{Session::get('message')}}
</div>    
@endif

