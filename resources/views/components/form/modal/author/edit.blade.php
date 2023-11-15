<!-- Modals add menu -->
<div id="modal-form-edit-author-{{ $author->id }}" class="modal fade" tabindex="-1"
    aria-labelledby="modal-form-edit-author-{{ $author->id }}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('author.update', $author->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-edit-author-{{ $author->id }}-label">Edit User
                        ({{ $author->name }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Role Name" name="name"
                            value="{{ $author->name }}">
                        <x-form.validation.error name="name" />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control">{{ $author->bio }}</textarea>
                        <x-form.validation.error name="bio" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
