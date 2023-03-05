@extends('layouts.admin')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Aktualizacja produktu') }}</h3>
        </div>
        <form method="post" action="{{ route('admin.products.update', $product) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>{{ __('Nazwa') }}</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label>{{ __('Cena') }}</label>
                    <input type="number" step="any" class="form-control" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label >{{ __('Opis') }}</label>
                    <textarea id="summernote" name="description">{{$product->description}}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    @section('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
    @endsection
@endsection
