@extends('layouts.app')

@section('content')
    <div class="u-body">
        <h1 class="h2 font-weight-semibold mb-4">Drinks</h1>

        <div class="card mb-4">
            <header class="card-header d-flex align-items-center">
                <h2 class="h3 card-header-title">Milkshake</h2>
                <ul class="list-inline ml-auto mb-0">
                    <li class="list-inline-item mr-3">
                        <a class="btn btn-primary" data-toggle="modal" href="#createNewJuice">Create New Recipe</a>
                    </li>
                </ul>
            </header>

            <div class="card-body">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('drink/juices') ? 'active' : '' }}"
                            href="{{ route('drink.juice') }}" role="tablist">
                            Juice
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('drink/coffes') ? 'active' : '' }}"
                            href="{{ route('drink.coffe') }}" role="tablist">
                            Coffe
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('drink/milkshakes') ? 'active' : '' }}" href="{{ route('drink.milkshake') }}"
                            role="tablist">
                            Milkshake
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('drink/squashs') ? 'active' : '' }}" href="{{ route('drink.squash') }}"
                            role="tablist">
                            Squash
                        </a>
                    </li>
                </ul>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <hr>
                        <thead>
                            <tr>
                                <th scope="col">Pict</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $drink)
                                <tr>
                                    <td>
                                        <img class="u-avatar--xs img-fluid rounded-circle mr-2"
                                            src="{{ asset('storage/drink/thumbnail/' . $drink->thumbnail) }}"
                                            alt="drink Thumbnail">
                                    </td>
                                    <td>{{ $drink->name }}</td>
                                    <td>{{ $drink->description }}</td>
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
                                                        href="{{ route('drink.edit', $drink->id) }}">
                                                        <i class="fa fa-edit mr-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('drink.destroy', $drink->id) }}">
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
@include('pages.drink.juice.juiceCreate')
