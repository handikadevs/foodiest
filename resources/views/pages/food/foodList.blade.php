@extends('layouts.app')

@section('content')
    <div class="u-body">
        <h1 class="h2 font-weight-semibold mb-4">Foods</h1>

        <div class="card mb-4">
            <header class="card-header d-flex align-items-center">
                <h2 class="h3 card-header-title">
                    @if (request()->is('food/asians'))
                        Asian foods
                    @elseif (request()->is('food/chineses'))
                        Chinese foods
                    @elseif (request()->is('food/indonesians'))
                        Indonesian foods
                    @elseif (request()->is('food/westerns'))
                        Western foods
                    @endif
                </h2>
                <ul class="list-inline ml-auto mb-0">
                    <li class="list-inline-item mr-3">
                        @if (Auth::user()->hasRole('admin'))
                            <a class="btn btn-primary" data-toggle="modal" href="#createNewAsian">Create New Recipe</a>
                        @endif
                    </li>
                </ul>
            </header>

            <div class="card-body">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('food/asians') ? 'active' : '' }}"
                            href="{{ route('food.asian') }}" role="tablist">
                            Asian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('food/chineses') ? 'active' : '' }}"
                            href="{{ route('food.chinese') }}" role="tablist">
                            Chinese
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('food/indonesians') ? 'active' : '' }}"
                            href="{{ route('food.indonesian') }}" role="tablist">
                            Indonesian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('food/westerns') ? 'active' : '' }}"
                            href="{{ route('food.western') }}" role="tablist">
                            Western
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
                            @foreach ($data as $food)
                                <tr>
                                    <td>
                                        <img class="u-avatar--xs img-fluid rounded-circle mr-2"
                                            src="{{ asset('storage/food/thumbnail/' . $food->thumbnail) }}"
                                            alt="Food Thumbnail">
                                    </td>
                                    <td>{{ $food->name }}</td>
                                    <td>{{ $food->description }}</td>
                                    <td class="text-center">
                                        @if (Auth::user()->hasRole('admin'))
                                            <a id="actions1Invoker" class="link-muted" href="#!" aria-haspopup="true"
                                                aria-expanded="false" data-toggle="dropdown">
                                                <i class="fa fa-sliders-h"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right dropdown" style="width: 150px;"
                                                aria-labelledby="actions1Invoker">
                                                <ul class="list-unstyled mb-0">
                                                    <li>
                                                        <a class="d-flex align-items-center link-muted py-2 px-3"
                                                            href="{{ route('food.show', $food->id) }}">
                                                            <i class="fa fa-eye mr-2"></i> View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="d-flex align-items-center link-muted py-2 px-3"
                                                            href="{{ route('food.edit', $food->id) }}">
                                                            <i class="fa fa-edit mr-2"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('food.destroy', $food->id) }}">
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
                                        @else
                                            <a class="link-muted" href="{{ route('food.show', $food->id) }}">
                                                <i class="fa fa-eye mr-2"></i> View
                                            </a>
                                        @endif
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
@include('pages.food.foodCreate')
