@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Manage Users</div>

                    <table class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">ِAction</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{implode(' : ' , $user->roles()->get()->pluck('name')->toArray())}}</td>
                            @Role('admin')
                            <td>
                                <form action="{{route('users.edit' , $user->id)}}" method="get" class="float-left">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm"> Edit </button>
                                </form>

                                <form action="{{route('users.destroy' , $user->id)}}" method="post" class="float-right">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"> DELETE </button>
                                </form>
                            </td>
                            @endRole
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
