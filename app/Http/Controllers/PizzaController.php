<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['store', 'create']);
    }
    
    public function index(){
        $pizzas = Pizza::all();
    
        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    public function show($id){
        $pizza = Pizza::findorFail($id);
        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(){
        // Logic to store the new pizza in the database
        // For example, you can use the request data to create a new Pizza model instance
        $pizza = new Pizza();
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');
        $pizza->save();
    
        // You need to add the actual logic to store the pizza in the database
    
        // Redirect to the home page or any other page after storing the pizza
        return redirect('/')->with('mssg','Thanks for your order');
    }
    
    public function destroy($id){
        $destroypizza=Pizza::findOrFail($id);
        $destroypizza->delete();
        return redirect('/pizzas');
    }

}
