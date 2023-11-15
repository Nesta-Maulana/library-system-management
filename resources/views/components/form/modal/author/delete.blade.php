<form action="{{ route('author.destroy', $author->id) }}" method="post" id="modal-form-delete-author-{{ $author->id }}">
    @csrf
    @method('DELETE')
</form>
