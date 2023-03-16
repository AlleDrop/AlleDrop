@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
					{{ __('Producenci') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-sm-12 col-md-6">
                        <div class="btn-group">
                            <a class="btn btn-block btn-success" href="{{ route('admin.producers.create') }}">Dodaj</a>
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
                                    <th style="width: 10%">{{ __('Opcje') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($producers as $producer)
                                    <tr>
                                        <td style="width: 1%">{{ $producer->id }}</td>
                                        <td>{{ $producer->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-success" href="{{ route('admin.producers.edit', $producer) }}">
                                                    {{ __('Edytuj') }}
                                                </a>
                                                <form method="DELETE" action="{{ route('admin.producers.destroy', $producer) }}">
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
                    {{ $producers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
