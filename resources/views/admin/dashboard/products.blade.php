@extends('layout.main')
@section('title', 'Pinheiro Market | Dashboard')
@section('content')


<div id="dashboard-products-area" class="dashboard margin-top-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="secondary-color mb-4">Dashboard</h2>
                <h3 class="secondary-color">Todos os produtos</h3>
                
                <livewire:product-order></livewire:product-order>

            </div>
        </div>
    </div>
</div>


@endsection