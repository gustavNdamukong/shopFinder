<?php

//hack filter repeated users based on their IDs
//$ids = [];

/*'user' => $user,
            'usersRoles' => $usersRoles,
            'allRoles' => $roles
*/
?>

@extends('layouts.master')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align:center;"><h1>Create a new user</h1></div>
                    <div class="card-body">
                        <form action="{{url("/admin/save_user/") }}" method="POST">
                            @csrf
                            <div class="form-text form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" value="" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" value="" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="password_confirmation">Confirm password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control" />
                            </div>

                            @foreach($allRoles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}" class="form-control" />
                                    <label>{{$role->name}}</label>

                                </div>
                            @endforeach
                            <a href="{{ url('admin/users') }}" class="btn btn-sm btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary float-left">Create user</button>
                        </form>
                    </div>
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->

@endsection

