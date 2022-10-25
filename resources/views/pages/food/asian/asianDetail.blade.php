@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h2 class="h3 card-header-title">Recipe {{ $food->name }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('food.update', $food->id) }}" method="POST" enctype="multipart/form-data"
                    novalidate="novalidate">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <img class="u-avatar--md rounded img-fluid mr-2"
                            src="{{ asset('storage/food/thumbnail/' . $food->thumbnail) }}" alt="Food Thumbnail">
                        <hr>
                        <label for="thumbnail">Edit Thumbnail</label>
                        <input id="thumbnail" class="form-control form-pill" type="file" placeholder="Input thumbnail "
                            value="{{ $food->thumbnail }}" aria-describedby="thumbnail" name="thumbnail" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input id="name" class="form-control form-pill" type="text" placeholder="Input Name"
                            value="{{ old('name', $food->name) }}" aria-describedby="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control form-pill" name="category">
                            <option {{ old('category', $food->category) == 'asian' ? 'selected' : '' }} value="asian">Asian
                            </option>
                            <option {{ old('category', $food->category) == 'chinese' ? 'selected' : '' }} value="chinese">
                                Chinese</option>
                            <option {{ old('category', $food->category) == 'indonesian' ? 'selected' : '' }}
                                value="indonesian">Indonesian</option>
                            <option {{ old('category', $food->category) == 'western' ? 'selected' : '' }} value="western">
                                Western</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="description" class="form-control form-pill" type="text"
                            placeholder="Input description " value="{{ old('description', $food->description) }}"
                            aria-describedby="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="ingredient">Ingredients</label>
                        <textarea id="ingredient" class="form-control" type="text" placeholder="Input ingredient"
                            aria-describedby="ingredient" name="ingredient">{{ old('ingredient', $food->ingredient) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="step">Steps</label>
                        <textarea id="step" class="form-control" type="text" placeholder="Input step " aria-describedby="step"
                            name="step">{{ old('step', $food->step) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created date</label>
                        <input id="created_at" class="form-control form-pill" type="text" disabled
                            value="{{ old('created_at', $food->created_at) }}" aria-describedby="created_at">
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Updated date</label>
                        <input id="updated_at" class="form-control form-pill" type="text" disabled
                            value="{{ old('updated_at', $food->updated_at) }}" aria-describedby="updated_at">
                    </div>
                    <div class="card-footer">
                        <a type="button" class="btn btn-text" href="{{ route('food.asian') }}">Cancel</a>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
