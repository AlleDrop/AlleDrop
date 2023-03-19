<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProducerRequest;
use App\Http\Requests\Product\UpdateProducerRequest;


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
    public function store(StoreProducerRequest $request)
    {
        $name = $request->all();
        Producer::create($name);
        return redirect()->route('admin.producers.index');
    }
    public function create()
    {
        return view('admin.producers.create');
    }
    public function edit(Producer $producer)
    {

        return view('admin.producers.edit')->with('producer', $producer);
    }

    public function update(UpdateProducerRequest $request, Producer $producer)
    {
        $producer->update($request->validated());
        return redirect()->route('admin.producers.index');
    }
    public function destroy(Producer $producer)
    {
        $producer->delete();
        return redirect()->route('admin.producers.index');
    }
}
