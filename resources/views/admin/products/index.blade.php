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
                                    <th>{{ __('Nazwa') }}</th>
                                    <th>{{ __('Cena') }}</th>
                                    <th>{{ __('Opcje') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a class="btn btn-block btn-success" href="{{ route('admin.products.create') }}">
												{{ __('Edytuj') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info">
                            Showing 1 to 10 of 57 entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
