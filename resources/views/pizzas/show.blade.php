@extends('layouts.app')

@section('content')
<div class="wrapper pizza-details">
    <h1>Order for {{$pizza->name}}</h1>
    <h2>Pizza type: {{$pizza->type}}</h2>
    <h2>Pizza base: {{$pizza->base}}</h2>
    <h2>Extra Toppings:</h2>
    @foreach($pizza->toppings as $topping)
        <h3>{{ $topping }}</h3>
    @endforeach
</div>
<form action="/pizzas/{{ $pizza->id}}" method="POST">
    <!-- {{$pizza->id}} -->
    @csrf
    @method('DELETE')
    <button>Order Complete</button>
</form>
<a href="/pizzas">Back to pizzas</a>
@endsection