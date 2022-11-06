@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card">
            <header class="card-header d-flex align-items-center">
                <h2 class="h3 card-header-title">Recipe {{ $cake->name }}</h2>

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
                <div class="d-flex align-items-center justify-content-center">
                    <img class="u-avatar--md rounded img-fluid mr-2"
                        src="{{ asset('storage/cake/thumbnail/' . $cake->thumbnail) }}" alt="cake Thumbnail">
                </div>
                <br>
                <h5 class="h4 card-title"><b>{{ $cake->name }}</b></h5>
                <p>{{ $cake->description }}</p>
                <hr>
                <b>Ingredients</b>
                <p>{{ $cake->ingredient }}</p>
                <b>Steps</b>
                <p>{{ $cake->step }}</p>
            </div>

            <footer class="card-footer d-flex align-items-center">
                <div class="ml-auto">
                    <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                </div>
            </footer>
        </div>
    </div>
@endsection
