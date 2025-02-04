@extends('layouts.admin')

@section('content')
    <h1>Blog Posts</h1>
    
    @if(session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; gap: 1rem;">
        <a href="{{ route('admin.posts.create') }}">Create New Post</a>
        <a href="{{ route('admin.categories.create') }}">Create New Category</a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
