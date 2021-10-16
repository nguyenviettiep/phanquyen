@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">name user</th>
                            <th scope="col">email</th>
                            <th scope="col">password</th>
                            <th scope="col">role</th>
                            <th scope="col">permission</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email }}</td>
                                <td>{{$user->password}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    <a href="{{url('phan-quyen/'.$user->id)}}" class="btn btn-success">
                                        actionrole
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        actionrole
                                    </a>
                                </td>
                               
                              </tr>
                            @endforeach
                         
                         
                        </tbody>
                      </table>
                </div>
        </div>
    </div>
</div>
@endsection
