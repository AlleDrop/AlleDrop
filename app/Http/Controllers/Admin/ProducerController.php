<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Producer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    public function index()
    {
        $producers = Producer::paginate(10);
        return view('admin.producers.index')->with(compact('producers'));
    }
    public function store(StoreProductRequest $request)
    {
        Producer::create($request->validate(
            ['name'=>'required']
        ));
        return redirect()->route('admin.producers.index');
    }
    public function create()
    {
        return view('admin.producers.create');
    }

    public function destroy()
    {


    }

    public function show(Product $producer)
    {
        $producer->delete();
        return redirect()->route('admin.producers.index');    }
}
