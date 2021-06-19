@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card py-5 px-3">
        <div class="row">
            <div class="col-4">
                <img src="{{ $thumbnail }}" class="w-100">
            </div>
            <div class="col-8">
                <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold">
                                <span class="text-dark">{{ $product->product_name }}</span>
                            </div>
                            <div class="jf-tag gold-back ml-2">{{ $gender }}</div>
                        </div>
                        <div class="d-flex align-items-center">
                            
                            <div class="jf-tag cyan-back mr-1">{{ $product->brand->name}}</div>
                            <i class="fas fa-arrow-right mr-1"></i>
                            <div class="jf-tag-flex cyan-back mr-1">{{ $product->series->name}}</div>
                        </div>
                    </div>
                    {{-- color labels --}}
                    <div class="d-flex align-items-center mt-2">
                        @foreach ($product->colors as $color) 
                            <div class="jf-tag mr-1
                                @if ($color->name == "White" || $color->name == "Yellow") black-back @endif "
                                style="border: 1px solid {{$color->hex}}; color: {{$color->hex}}">
                                    {{ $color->name }}
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>

        <hr>
        {{-- begin carousel --}}
        <div class="jf-carousel">
            <ul id="lightslider" class="cs-hidden">
                @foreach ($product->productImages as $image)
                    <li class="jf-ls-li">
                        <img src="{{ URL::to('/') }}/img/{{ $image->image_url}}"/>
                    </li>
                @endforeach;
            </ul>
        </div>
    </div>
</div>
@endsection
