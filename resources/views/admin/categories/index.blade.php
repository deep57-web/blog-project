@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    @if(session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.categories.create') }}">Create New Category</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Meta Title</th>
                <th>Meta Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->meta_title }}</td>
                <td>{{ $category->meta_description }}</td>
                <td>{{ $category->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
