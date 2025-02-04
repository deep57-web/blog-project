@extends('layouts.admin')

@section('content')
    <h1>Create New Category</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Category Name:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <div>
            <label for="meta_title">Meta Title:</label><br>
            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}">
        </div>
        <br>
        <div>
            <label for="meta_description">Meta Description:</label><br>
            <textarea name="meta_description" id="meta_description" rows="3">{{ old('meta_description') }}</textarea>
        </div>
        <br>
        <button type="submit">Save Category</button>
    </form>
@endsection
