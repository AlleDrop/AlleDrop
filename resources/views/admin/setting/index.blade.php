@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('Ustawienia') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        {{-- TODO --}}
                        <form action="{{ route('admin.settings.store') }}">
                            <table id="example1" class="table table-bordered table-striped" style="margin-top: 10px;">
                                <thead>
                                <tr>
                                    <th>{{ __('Nazwa grupy') }}</th>
                                    <th>{{ __('Nazwa') }}</th>
                                    <th>{{ __('Wartość') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $setting)
                                    <tr>
                                        <td>{{ $setting->group_name }}</td>
                                        <td>{{ $setting->name }}</td>
                                        <td>
                                            @if($setting->type == 'text')
                                                <textarea name="{{ $setting->key }}"></textarea>
                                            @elseif($setting->type == 'bool')
                                                <div class="custom-control custom-checkbox">
                                                    <input name="{{ $setting->key }}" type="checkbox" {{ $setting->value ? 'checked' : '' }}>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                <a class="btn btn-block btn-success" href="{{ route('admin.settings.create') }}">Zapisz</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
