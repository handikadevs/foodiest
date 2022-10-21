@extends('layouts.app')

@section('content')
    <div class="u-body">
        <h1 class="h2 font-weight-semibold mb-4">Users Management</h1>

        <div class="card mb-4">
            <header class="card-header d-flex align-items-center">
                <h2 class="h3 card-header-title">Users</h2>
                <ul class="list-inline ml-auto mb-0">
                    <li class="list-inline-item mr-3">
                        <a class="btn btn-info" data-toggle="modal" href="#createNewUser">Create New User</a>
                    </li>
                </ul>
            </header>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>admin</td>
                                    <td class="text-center">
                                        <a id="actions1Invoker" class="link-muted" href="#!" aria-haspopup="true"
                                            aria-expanded="false" data-toggle="dropdown">
                                            <i class="fa fa-sliders-h"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right dropdown" style="width: 150px;"
                                            aria-labelledby="actions1Invoker">
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <a class="d-flex align-items-center link-muted py-2 px-3"
                                                        href="{{ route('users.edit', $user->id) }}">
                                                        <i class="fa fa-edit mr-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button"
                                                            class="btn btn-danger btn-flat align-items-center py-2 px-3"
                                                            onclick="return confirm('Delete selected item?')">
                                                            <i class="fa fa-trash mr-2"></i> Remove
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
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
@include('pages.user.userCreate')
