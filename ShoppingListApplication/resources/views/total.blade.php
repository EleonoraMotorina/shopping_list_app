@extends('layouts.app')

@section('content')
<h1>Total Amount</h1>
<p>Total: {{ $totalAmount }}</p>
<a href="{{ route('shopping-list.index') }}" class="btn btn-primary">Back to List</a>
@endsection