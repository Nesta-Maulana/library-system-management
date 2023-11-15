<!-- Modals add menu -->
<div id="modal-form-add-author" class="modal fade" tabindex="-1" aria-labelledby="modal-form-add-author-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('author.store') }}" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-add-author-label">Add Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Author Name" name="name">
                        <x-form.validation.error name="name" />
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
                        <x-form.validation.error name="bio" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
