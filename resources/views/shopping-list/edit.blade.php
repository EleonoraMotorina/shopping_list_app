 @extends('layouts.app')
 @section('content')

 <h1>Edit Item</h1>
 <form action="{{ route('shopping-list.update', $shoppingListItem->id) }}" method="POST">
     @csrf
     @method('PUT')
     <div class="form-group">
         <label for="name">Name:</label>
         <input type="text" name="name" class="form-control" value="{{ $shoppingListItem->name }}" required>
         @error('name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
     </div>
     <div class="form-group">
         <label for="price">Price:</label>
         <input type="number" name="price" class="form-control" value="{{ $shoppingListItem->price }}" step="0.01" required>
         @error('price')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
     </div>
     <button type="submit" class="btn btn-primary">Update</button>
 </form>

 @endsection