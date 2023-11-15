@extends('layouts.dashboard.app')

@section('title', 'Author Management')

@section('breadcrumb')
<x-dashboard.breadcrumb title="Author Management" page="Author Management" active="Authors" route="{{ route('author.index') }}" />
@endsection

@section('content')
<div class="card card-height-100 table-responsive">
    <!-- cardheader -->
    <div class="card-header border-bottom-dashed align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Author</h4>
        <div class="flex-shrink-0">
            <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form-add-author">
                <i class="ri-add-line"></i>
                Add
            </button>
        </div>
    </div>
    <!-- end cardheader -->
    <!-- Hoverable Rows -->
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Bio</th>
                <th scope="col" class="col-1"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $author->name }}</td>
                <td>{{ $author->bio }}</td>
                <td>
                    <div class="dropdown">
                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-form-edit-author-{{ $author->id }}">
                                    Edit
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('modal-form-delete-author-{{ $author->id }}').submit()">
                                    Delete
                                </a>
                            </li>
                        </ul>

                        @include('components.form.modal.author.edit')
                        @include('components.form.modal.author.delete')
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <th colspan="5" class="text-center">No data to display</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="card-footer py-4">
        <nav aria-label="..." class="pagination justify-content-end">
            {{ $authors->links() }}
        </nav>
    </div>
</div>

@include('components.form.modal.author.add')
@endsection
