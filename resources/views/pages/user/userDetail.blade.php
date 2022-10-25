@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h2 class="h3 card-header-title">Detail {{ $user->name }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                    novalidate="novalidate">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input id="name" class="form-control form-pill" type="text" placeholder="Input Name"
                            value="{{ old('name', $user->name) }}" aria-describedby="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control form-pill" type="email"
                            placeholder="Input Email Address" value="{{ old('email', $user->email) }}"
                            aria-describedby="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created date</label>
                        <input id="created_at" class="form-control form-pill" type="text" disabled
                            value="{{ old('created_at', $user->created_at) }}" aria-describedby="created_at">
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Updated date</label>
                        <input id="updated_at" class="form-control form-pill" type="text" disabled
                            value="{{ old('updated_at', $user->updated_at) }}" aria-describedby="updated_at">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="form-control form-pill" form="#">
                            <option value="admin">Administrator</option>
                            <option value="user" selected>User</option>
                        </select>
                    </div>
                    <div class="card-footer">
                        <a type="button" class="btn btn-text" href="{{ route('users.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
