@extends('layout.main')
@section('title', 'Pinheiro Market')
@section('content')

<div id="slider">
    <div class="container-fluid">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-bg w-100 d-block">
                        <img src="img/project/banner2.jpg" alt="Supermercado">
                    </div>
                    <div class="carousel-caption d-md-block">
                        <h2 class="carousel-title">Pinheiro Market</h2>
                        <p>Aqui, você encontra produtos de qualidade com o melhor custo-benefício do mercado!</p>

                        @guest
                        <a href="/register" class="btn bg-accent-color primary-color">Registrar-se</a>
                        @endguest
                        @auth
                        <a href="#products-area" class="btn bg-accent-color primary-color">Explorar</a>
                        @endauth
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-bg w-100 d-block">
                        <img src="img/project/banner3.jpg" alt="Supermercado">
                    </div>

                    <div class="carousel-caption d-md-block">
                        <h2>Pinheiro Market</h2>
                        <p>A <span>Pinheiro Market</span> foi fundada em 1992 e domina o mercado desde então.</p>
                        @guest
                        <a href="/register" class="btn bg-accent-color primary-color">Registrar-se</a>
                        @endguest
                        @auth
                        <a href="#products-area" class="btn bg-accent-color primary-color">Explorar</a>
                        @endauth
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<div id="products-area" class="margin-top-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title secondary-color">Produtos</h3>
            </div>
            <livewire:search>
            </div>
        </div>
    </div>

    @endsection