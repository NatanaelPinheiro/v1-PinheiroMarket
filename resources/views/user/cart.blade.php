@extends('layout.main')
@section('title', 'Pinheiro Market - Cart')
@section('content')

<div id="user-cart-area" class="margin-top-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="secondary-color mb-4">Carrinho</h2>
                <h3 class="secondary-color">Produtos salvos</h3>
            </div>

            @if(count($products) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>
                            <a href="/product/show/{{$product->id}}">{{$product->name}}
                            </a>
                        </td>
                        <td>
                            <livewire:calculate-discount :price="$product->price" :discount="$product->discount" :wire:key="$product->id">
                            </td>
                            <td>
                                <form action="#" method="GET">
                                    @csrf
                                    <a href="#" class="btn btn-primary" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();
                                    ">
                                    <i class="bi bi-bag"></i>
                                    Comprar
                                </a>
                            </form>

                            <form action="/user/cart/remove/{{$product->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="/user/cart/remove/{{$product->id}}" 
                                    class="btn btn-danger" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();
                                    ">
                                    <i class="bi bi-trash"></i>
                                    Remover
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else

            <p>Você não salvou nenhum produto. <a href="/#products-area">Clique aqui</a> para ver todos.</p>

            @endif               
        </div>
    </div>
</div>
</div>

@endsection