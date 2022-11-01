@extends('layouts.app')

@section('content')
    <div class="u-body">
        <h1 class="h2 font-weight-semibold mb-4">Cake</h1>

        <div class="card mb-4">
            <header class="card-header d-flex align-items-center">
                <h2 class="h3 card-header-title">Cakes</h2>
                <ul class="list-inline ml-auto mb-0">
                    <li class="list-inline-item mr-3">
                        <a class="btn btn-primary" data-toggle="modal" href="#createNewCake">Create New Recipe</a>
                    </li>
                </ul>
            </header>

            <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Pict</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $cake)
                                <tr>
                                    <td>
                                        <img class="u-avatar--xs img-fluid rounded-circle mr-2"
                                            src="{{ asset('storage/cake/thumbnail/' . $cake->thumbnail) }}"
                                            alt="Cake Thumbnail">
                                    </td>
                                    <td>{{ $cake->name }}</td>
                                    <td>{{ $cake->description }}</td>
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
                                                        href="{{ route('cakes.edit', $cake->id) }}">
                                                        <i class="fa fa-edit mr-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('cakes.destroy', $cake->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit"
                                                            class="btn btn-danger btn-flat align-items-center py-2 px-3">
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
@include('pages.cake.cakeCreate')
