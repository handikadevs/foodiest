<!-- Vertically Centered Modals -->
<div class="modal fade" id="createNewUser" tabindex="-1" role="dialog" aria-labelledby="createNewUserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input id="name" class="form-control form-pill" type="text"
                        placeholder="Input Name" aria-describedby="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control form-pill" type="email"
                        placeholder="Input Email Address" aria-describedby="email">
                </div>
                <div class="form-group">
                    {{-- <label for="password">Password</label> --}}
                    <input id="password" class="form-control form-pill" type="hidden"
                        placeholder="Input password" aria-describedby="password">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" class="form-control form-pill" form="#">
                        <option value="admin">Administrator</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-text" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- End Vertically Centered Modals -->