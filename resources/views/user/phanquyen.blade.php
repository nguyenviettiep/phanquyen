@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                        User: {{$users->name}}
                    </div>
                    @foreach ($role as $key=>$r)
                    <form action="{{url('/insert_roles',[$users->id])}}" method="post">
                        @method('post')
                        <div class="form-check form-check-inline">
                            @if (isset($all_column_roles))
                            <input type="radio" name="role" class="form-check-input" value="{{$r->name}}" id={{$r->name}}  
                            {{$r->id==$all_column_roles->id?'checked':''}}
                            >
                            <label for="{{$r->id}}" class="form-check-label">{{$r->name}}</label>
                            @else  
                            <input type="radio" class="form-check-input" value="{{$r->name}}" id={{$r->name}} 
                            >
                            <label for="{{$r->id}}" name="role"   class="form-check-label"  >{{$r->name}}</label>
                            @endif
                          
                        </div>
                        @endforeach
                    
                        <input type="submit" class="btn btn-success" value="cấp quyền">

                        @csrf
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
