@extends('layout.main')
@section('title', 'Pinheiro Market | '.$product->name)
@section('content')

<div id="show-products-area" class="margin-top-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/img/products/{{$product->image}}" alt="{{$product->name}}">
            </div>
            <div class="col-md-6">
                <h2 class="secondary-color">{{$product->name}}</h2>

                <p class="secondary-info">produzido por {{$product->brand}}</p>

                <div class="price-box">
                    @if($product->discount !== 'none')
                    <div class="row">
                        <h5 class="price-before-discount">
                            R$ {{$product->price}}
                            <span>/unidade</span>
                        </h5>
                        <span class="discount">
                            {{$product->discount}} de desconto
                        </span>
                    </div>

                    <h3 class="price">
                        @livewire('calculate-discount', [
                        'price' => $product->price,
                        'discount' => $product->discount,
                        ])
                    </h3>
                    @else
                    <h3 class="price">
                        R$ {{$product->price}}
                        <span>/unidade</span>
                    </h3>
                    @endif 
                    @if($product->installment !== '1x')
                    <p class="installment_portion">Ou até 
                        <b>
                            {{$product->installment}} de R$ 
                            <livewire:calculate-installment :prod_price="$product->price" :prod_installment="$product->installment"></livewire:calculate-installment>.
                        </b> 
                    </p>
                    @endif
                </div> 


                <p class="secondary-info">Categoria: {{$product->food_category}}</p>
                <p class="secondary-info">{{$product->qty}} disponíveis</p>

                <p class="product-description">{!! $product->description !!}</p>

                @guest
                <form action="/product/save/{{$product->id}}" method="POST">
                    @csrf
                    <a href="/product/save/{{$product->id}}" class="btn bg-accent-color primary-color form-control" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        >
                        <i class="bi bi-cart-plus"></i>
                        Carrinho

                    </a>
                </form>
                @endguest
                @can('user')
                <form action="/product/save/{{$product->id}}" method="POST">
                    @csrf
                    <a href="/product/save/{{$product->id}}" class="btn bg-accent-color primary-color form-control" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        >
                        <i class="bi bi-cart-plus"></i>
                        Carrinho

                    </a>
                </form>
                @endcan
                @can('admin')
                <form action="/admin/dashboard/products/edit/{{$product->id}}" method="GET">
                    @csrf
                    <a href="/admin/dashboard/products/{{$product->id}}" class="btn bg-accent-color primary-color form-control" 
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        >
                        <i class="bi bi-pencil"></i>
                        Editar

                    </a>
                </form>
                @endcan
            </div>
        </div>
    </div>
</div>

@endsection