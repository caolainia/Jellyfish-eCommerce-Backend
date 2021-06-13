@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <form action="{{ route('store_product') }}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New Product</h1>
                </div>
                <div class="form-group row">
                    <label for="pname" class="col-md-4 col-form-label">Product Name</label>

                    <input id="pname"
                           type="text"
                           class="form-control{{ $errors->has('pname') ? ' is-invalid' : '' }}"
                           name="pname"
                           value="{{ old('pname') }}"
                           autocomplete="pname" autofocus>

                    @if ($errors->has('pname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Product Thumbnail</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Product</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
