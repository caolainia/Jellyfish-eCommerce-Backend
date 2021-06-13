@extends('layouts.master')

@section('content')
<div class="row">
  {{-- Products Table --}}
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Products</h4>
        <a href="{{ route('create_product') }}">
          <button type="button" class="btn btn-primary">Add a Product</button>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>Product Name</th>
              <th>SKU</th>
              <th>Original Price</th>
              <th>Current Price</th>
              <th class="text-right">Brand</th>
            </thead>
            <tbody>
              
              @foreach($products as $product)
                <tr class="jf-product-tr" data-href="{{ route('show_product', ['product' => $product->id]) }}">
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->sku }}</td>
                  <td>${{ $product->original_price }}</td>
                  <td>${{ $product->current_price }}</td>
                  <td class="text-right">{{ $product->brand }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection


@section('scripts')

@endsection