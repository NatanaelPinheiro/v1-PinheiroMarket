<div>
    <input type="text" wire:model="searchProduct" placeholder="Procure um produto" id="search-input" />
    
    <select name="food_category" id="category" wire:model="category">
        <option value="all" selected>Todos</option>
        <option value="basics">Alimentos básicos</option>
        <option value="frozen">Congelados</option>
        <option value="flourAndGrains">Farinhas e grãos</option>
        <option value="condiment">Condimentos</option>
        <option value="mornings">Matinais</option>
        <option value="bakery">Padaria</option>
        <option value="pastas">Massas</option>
        <option value="goodies">Guloseimas</option>
    </select>



    <div class="card-section row">
        @forelse($products as $product)

        <div class="card bg-shadow-color col-md-3">
            <img src="/img/products/{{$product->image}}" alt="{{$product->name}}">

            <div class="card-body">
                <div class="card-title">{{$product->name}}</div>
                <div class="card-text">
                    @if($product->discount !== 'none')
                    <span class="discount">{{$product->discount}} de desconto!</span>
                    <h5 class="mt-3">
                        <livewire:calculate-discount :price="$product->price" :discount="$product->discount"  :wire:key="$product->id">
                        </h5>
                        @else
                        <h5 class="mt-3">R$ {{$product->price}} <span>/unidade</span></h5>
                        @endif
                        <p>- {{$product->brand}}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/product/show/{{$product->id}}" class="btn bg-accent-color primary-color">
                        <i class="bi bi-eye"></i>Ver mais
                    </a>
                </div> 
            </div>

            @empty
            @if(count($products) == 0 && isset($search))
            <p class="msg-cant-find">
                Não foi possível encontrar: {{$search}}. 
                <a href="/">Clique aqui</a> para ver todos.
            </p>
            @else
            <p class="msg-cant-find">Não há produtos disponíveis.</p>
            @endif
            @endforelse

        </div>

    </div>
