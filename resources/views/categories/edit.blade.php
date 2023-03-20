@extends('app')
@section('content')
<h1>Edit Category</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name', $category->name) }}">
        @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="is_publish">Is Publish</label>
        <select name="is_publish" class="form-control">
            <option value="1" {{ old('is_publish', $category->is_publish) ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !old('is_publish', $category->is_publish) ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
