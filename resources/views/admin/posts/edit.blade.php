@extends('layouts.admin')

@section('content')
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
        </div>
        <br>
        <div>
            <label for="description">Description:</label><br>
            <textarea name="description" id="description" rows="5" required>{{ old('description', $post->description) }}</textarea>
        </div>
        <br>
        <div>
            <label for="meta_title">Meta Title:</label><br>
            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title) }}">
        </div>
        <br>
        <div>
            <label for="meta_description">Meta Description:</label><br>
            <textarea name="meta_description" id="meta_description" rows="3">{{ old('meta_description', $post->meta_description) }}</textarea>
        </div>
        <br>
        <div>
            <label for="category_id">Category:</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (old('category_id', $post->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Update Post</button>
    </form>
@endsection
