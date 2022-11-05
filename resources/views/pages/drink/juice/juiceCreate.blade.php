<!-- Vertically Centered Modals -->
<div class="modal fade" id="createNewJuice" tabindex="-1" role="dialog" aria-labelledby="createNewDrinkJuice"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('drink.store') }}" method="POST" enctype="multipart/form-data"
                    novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="name">Drink Name</label>
                        <input id="name" type="text"
                            class="form-control form-pill @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" placeholder="Input Food Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control form-pill @error('category') is-invalid @enderror" required autocomplete="category">
                            <option value="juice">Juice</option>
                            <option value="coffee and tea">Coffee</option>
                            <option value="milk">MIlkshake</option>
                            <option value="squash">Squash</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Thumbnail </label>
                        <input id="thumbnail" type="file"
                            class="form-control form-pill @error('thumbnail') is-invalid @enderror" name="thumbnail"
                            value="{{ old('thumbnail') }}" required autocomplete="thumbnail"
                            placeholder="Chooise Thumbnail">
                        @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description </label>
                        <input id="description" type="text"
                            class="form-control form-pill @error('description') is-invalid @enderror" name="description"
                            value="{{ old('description') }}" required autocomplete="description"
                            placeholder="Input Description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="ingredient">Ingredient </label>
                        <textarea id="ingredient" type="text"
                            class="form-control @error('ingredient') is-invalid @enderror" name="ingredient"
                            value="{{ old('ingredient') }}" required autocomplete="ingredient"
                            placeholder="Input Ingredients"></textarea>
                        @error('ingredient')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="step">Steps</label>
                        <textarea id="step" type="text"
                            class="form-control @error('step') is-invalid @enderror" name="step"
                            value="{{ old('step') }}" required autocomplete="step" placeholder="Input steps"></textarea>
                        @error('step')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-text" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Vertically Centered Modals -->
