@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
					{{ __('Produkty') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-sm-12 col-md-6">
                        <div class="btn-group">
                            <a class="btn btn-block btn-success" href="{{ route('admin.products.create') }}">Dodaj</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped" style="margin-top: 10px;">
                            <thead>
                                <tr>
                                    <th style="width: 1%">{{ __('Id') }}</th>
                                    <th>{{ __('Nazwa') }}</th>
                                    <th>{{ __('Cena') }}</th>
                                    <th style="width: 10%">{{ __('Opcje') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td style="width: 1%">{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success" href="{{ route('admin.products.edit', $product) }}">
                                                    {{ __('Edytuj') }}
                                                </a>
                                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">{{ __('Delete') }}</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
