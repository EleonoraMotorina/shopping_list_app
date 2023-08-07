{{-- @extends('layouts.app') --}}


@section('content')
<h1>Add Item</h1>
<form action="{{ route('shopping-list.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection