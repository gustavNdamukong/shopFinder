
@extends('layouts.master')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align:center;"><h1>Edit user {{ $user->name }}</h1></div>
                    <div class="card-body">
                        <form action="{{url("/admin/users/{$user->id}") }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}

                            <div class="form-text form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control" />

                            </div>

                            <div class="form-text form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" />
                            </div>

                            @foreach($allRoles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}" <?=key_exists($role->id, $usersRoles)? "checked='yes'": ''?> class="form-control" />
                                    <label>{{$role->name}}</label>

                                </div>
                            @endforeach
                            <input type="hidden" value="{{$user->id}}" name="userId" />
                            <a href="{{ url('admin/users') }}" class="btn btn-sm btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary float-left">Save changes</button>
                        </form>
                    </div>
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->

@endsection


