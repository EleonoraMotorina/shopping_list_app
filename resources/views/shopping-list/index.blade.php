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

@endsection

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModal">Confirm deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".delete-button").on("click", function() {
            let itemId = $(this).data("item-id");
            $("#deleteForm").attr("action", "{{ route('shopping-list.index') }}/" + itemId);
        });
    });
</script>