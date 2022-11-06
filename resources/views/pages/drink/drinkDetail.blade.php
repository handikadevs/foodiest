@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card">
            <header class="card-header d-flex align-items-center">
                <h2 class="h3 card-header-title">Recipe {{ $drink->name }}</h2>

                <!-- Card Header Icon -->
                <ul class="list-inline ml-auto mb-0">
                    <li class="list-inline-item">
                        <a class="link-muted h3" title="Save Recipe" data-toggle="tooltip" data-placement="top" href="#!">
                            <i class="fa fa-bookmark"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Card Header Icon -->
            </header>

            <div class="card-body">
                <h5 class="h4 card-title">{{ $drink->name }} <i class="text-secondary">{{ $drink->category }}</i></h5>
                <p>{{ $drink->description }}</p>
                <img class="u-avatar--md rounded img-fluid mr-2"
                    src="{{ asset('storage/drink/thumbnail/' . $drink->thumbnail) }}" alt="drink Thumbnail">
                <hr>
                <b>Ingredients</b>
                <p>{{ $drink->ingredient }}</p>
                <b>Steps</b>
                <p>{{ $drink->step }}</p>
            </div>

            <footer class="card-footer d-flex align-items-center">
                <div class="ml-auto">
                    <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                </div>
            </footer>
        </div>
    </div>
@endsection
