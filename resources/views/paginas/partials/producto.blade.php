<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('producto', ['product'=> $product->id]) }}
            " class="mas position-absolute text-decoration-none text-white">+</a>
        @if (count($product->images))
            <img src="{{ asset($product->images()->first()->image) }}" class="img-fluid" style="">
        @else
            <img src="{{ asset('images/products/Image_321.png') }}" class="img-fluid" style="">
        @endif
    </div>
    <div class="card-body ps-0">
        <p class="card-text">
            <a href="{{ route('producto', ['product'=> $product->id]) }}" class="text-decoration-none text-dark text-uppercase font-size-17">{{ $product->name }}</a>
        </p>
    </div>
</div>


