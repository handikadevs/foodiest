<!-- Vertically Centered Modals -->
<div class="modal fade" id="createNewUser" tabindex="-1" role="dialog" aria-labelledby="createNewUserTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
                    novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input id="name" type="text"
                            class="form-control form-pill @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" placeholder="Input Full Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email"
                            class="form-control form-pill @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" placeholder="Input Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-text" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Vertically Centered Modals -->
