@extends('app')
@section('content')
<h1>List of Categories</h1>

<form action="{{ route('categories.index') }}" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" name="search" placeholder="Search categories..."
            value="{{ request('search') }}">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">Create</a>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Is Publish</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->is_publish ? 'Yes' : 'No' }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}
@endsection
