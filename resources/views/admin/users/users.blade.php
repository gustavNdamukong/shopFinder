<?php

//filter repeated users based on their IDs
$ids = [];

?>

@extends('layouts.master')

@section('content')


    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header" style="text-align:center;">
                            <h1>Users</h1>
                        </div>
                        <a href="{{ url('admin/create_user') }}">
                            <button class="btn btn-sm btn-default">Create new user</button>
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col" colspan="2" style="text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if(!in_array($user->id, $ids))
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{  $user->name }}</td>
                                <td>{{  $user->email }}</td>
                                <td>{{  implode(',',$roles[$user->id]) }}</td>
                                <td>
                                    <a href="{{ url("/admin/edit_users/{$user->id}/") }}">
                                        <button type="button" class="btn btn-primary float-left">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route("adminusers.destroy", $user->id) }}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        @if($user->id == Auth::user()->id)
                                        <a href="#" class="btn btn-sm btn-default float-left">N/A</a>
                                        @else
                                        <button type="submit" onclick="confirmDelete(event, this.form)" class="btn btn-sm btn-warning float-left">Delete</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                                <?php $ids[] = $user->id; ?>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->

    @endsection

    @section('rawJS')
        <script type="text/javascript">

            function confirmDelete(e, form)
            {
                e.preventDefault();
                let conf = confirm('Are you sure you want to delete this user?');
                if (conf == false)
                {
                    return false;
                }
                else
                {
                    form.submit();
                }
            }
        </script>
    @endsection

