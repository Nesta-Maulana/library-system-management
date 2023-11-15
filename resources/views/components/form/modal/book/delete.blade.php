<form action="{{ route('book.destroy', $book->id) }}" method="post" id="modal-form-delete-book-{{ $book->id }}">
    @csrf
    @method('DELETE')
</form>
