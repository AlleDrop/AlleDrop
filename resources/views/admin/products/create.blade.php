@extends('layouts.admin')

@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">{{ __('Tworzenie produktu') }}</h3>
        </div>
        <form method="post" action="{{ route('admin.products.store') }}">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="form-group">
                    <label>{{ __('Nazwa') }}</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>{{ __('Cena') }}</label>
                    <input type="number" step="any" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label >{{ __('Opis') }}</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
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
