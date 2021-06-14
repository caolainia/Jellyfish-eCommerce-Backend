@extends('layouts.master')

@section('content')
<div class="container">

  <div class="card">
    <form action="{{ route('store_product') }}" enctype="multipart/form-data" method="post">
      @csrf

      <div class="row">
        <div class="col-8 offset-2">

          <div class="row card-header">
              <h3>Add New Product</h1>
          </div>
          <div class="form-group row">
            <label for="pname" class="col-md-3 col-form-label">Product Name <span style="color:red; font-weight: 900;">*</span></label>

            <input id="pname" type="text" 
                  class="form-control {{ $errors->has('pname') ? ' is-invalid' : '' }}"
                  name="pname" value="{{ old('pname') }}" autocomplete="pname" autofocus>

            @if ($errors->has('pname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('pname') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="pgender" class="col-md-3">Suitable Group <span style="color:red; font-weight: 900;">*</span></label>
            <select class="form-control" id="pgender" name="pgender">
              <option value="0">Females</option>
              <option value="1">Males</option>
              <option selected value="2">Neutral</option>
              <option value="3">Kids</option>
            </select>
          </div>

          <div class="form-group row">
            <label for="pbrand" class="col-md-3 col-form-label">Brand <span style="color:red; font-weight: 900;">*</span></label>

            <select class="form-control" id="pbrand" name="pbrand">
              @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" @if ($brand->id == 1) selected @endif>
                  {{ $brand->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group row">
            <label for="pcolor" class="col-md-3 col-form-label">Color <span style="color:red; font-weight: 900;">*</span></label>

            <select class="form-control" id="pcolor" name="pcolor">
              @foreach ($colors as $color)
                <option value="{{ $color->id }}" @if ($color->id == 1) selected @endif>
                  {{ $color->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group row">
              <label for="poprice" class="col-md-3 col-form-label">Original Price($) <span style="color:red; font-weight: 900;">*</span></label>

              <input id="poprice" type="text" 
                    class="jf-text-input form-control{{ $errors->has('poprice') ? ' is-invalid' : '' }}"
                    name="poprice" value="{{ old('poprice') ? old('poprice') : 0 }}" 
                    autocomplete="poprice" autofocus>

              @if ($errors->has('poprice'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('poprice') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group row">
              <label for="pcprice" class="col-md-3 col-form-label">Current Price($) <span style="color:red; font-weight: 900;">*</span></label>

              <input id="pcprice" type="text" 
                    class="form-control{{ $errors->has('pcprice') ? ' is-invalid' : '' }}"
                    name="pcprice" value="{{ old('pcprice') ? old('pcprice') : 0 }}" autocomplete="pcprice" autofocus>

              @if ($errors->has('pcprice'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('pcprice') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group row">
            <label for="pdescription" class="col-md-3 col-form-label">Product Description</label>

            <textarea id="pdescription" class="jf-textarea form-control"
                      name="pdescription" value="{{ old('pdescription') }}" autocomplete="pdescription" rows="3"></textarea>

          </div>

          <div class="row">
            <label for="pthumbnail" class="col-md-3 col-form-label">Thumbnail <span style="color:red; font-weight: 900;">*</span></label>

            <input type="file" class="jf-file-input" id="pthumbnail" name="pthumbnail">

            @if ($errors->has('pthumbnail'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('pthumbnail') }}</strong>
                </span>
            @endif
          </div>

          <div class="row pt-4">
              <button class="btn btn-primary">Add New Product</button>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>
@endsection
