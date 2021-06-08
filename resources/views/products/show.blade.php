@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card p-5">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $product->product_thumbnail }}" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="/storage/{{ $product->product_thumbnail }}" class="rounded-circle w-100" style="max-width: 40px;">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $product->id }}">
                                    <span class="text-dark">{{ $product->product_name }}</span>
                                </a>
                                <a href="#" class="pl-3">Follow</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p>
                        {{ $product->product_name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
