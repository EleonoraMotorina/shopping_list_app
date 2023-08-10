@extends('layouts.app')

@section('content')

<h1>Shopping List</h1>
<a href="{{ route('shopping-list.create') }}" class="btn btn-primary">Add Item</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shoppingListItems as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>
                <a href="{{ route('shopping-list.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('shopping-list.destroy', $item->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger delete-button" data-item-id="{{ $item->id }}">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<p>Total Amount: {{ $totalAmount ?? '' }}</p>

<script type="module" src="{{ asset('assets/@vitejs/index.js') }}"></script>


@endsection