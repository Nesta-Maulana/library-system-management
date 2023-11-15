<!-- Modals add menu -->
<div id="modal-form-edit-book-{{ $book->id }}" class="modal fade" tabindex="-1"
    aria-labelledby="modal-form-edit-book-{{ $book->id }}-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('book.update', $book->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-add-book-label">Add Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Book Name" name="name" value="{{$book->name}}">
                        <x-form.validation.error name="name" />
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $book->description }}</textarea>
                        <x-form.validation.error name="description" />
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author</label>
                        <select class="form-control" id="author_id" name="author_id" data-choices data-choices-removeItem>
                            @foreach ($authors as $author)
                            <option value="{{ $author->id }}" @if ($author->id == $book->author_id) selected @endif>{{ $author->name }}</option>
                            @endforeach
                        </select>
                        <x-form.validation.error name="author_id" />
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
