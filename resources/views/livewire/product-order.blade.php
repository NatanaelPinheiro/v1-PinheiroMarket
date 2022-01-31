<div>
    <div class="row">
        <select name="food_category" id="category" wire:model="category" class="dashboard_select">
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

        <select name="order_asc_desc" id="order_asc_desc" wire:model="order_asc_desc" class="dashboard_select">
            <option value="default" selected>Padrão</option>
            <option value="qty_asc">Menor Estoque</option>
            <option value="qty_desc">Maior Estoque</option>
            <option value="price_asc">Menor preço</option>
            <option value="price_desc">Maior preço</option>
        </select>
    </div>

    @if(count($products) > 0)
    <table class="table">
        <thead>
            <tr>
                <th class="prod-number">#</th>
                <th>Nome</th>
                <th>Qty.</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="prod-number">{{$loop->index + 1}}</td>
                <td>
                    <a href="/product/show/{{$product->id}}">{{$product->name}}
                    </a>
                </td>
                <td>{{$product->qty}}</td>
                <td>
                    <livewire:calculate-discount :price="$product->price" :discount="$product->discount" :wire:key="$product->id">
                    </td>
                    <td>
                        <form action="/admin/dashboard/products/edit/{{$product->id}}" method="GET">
                            @csrf
                            <a href="/admin/dashboard/products/edit/{{$product->id}}" class="btn btn-primary" 
                              onclick="event.preventDefault();
                              this.closest('form').submit();
                              ">
                              <i class="bi bi-pencil"></i>
                              Editar
                          </a>
                      </form>

                      <form action="/admin/dashboard/products/delete/{{$product->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="/admin/dashboard/products/delete/{{$product->id}}" 
                         class="btn btn-danger" 
                         onclick="event.preventDefault();
                         this.closest('form').submit();
                         ">
                         <i class="bi bi-trash"></i>
                         Deletar
                     </a>
                 </form>
             </td>
         </tr>
         @endforeach
     </tbody>
 </table>
 @else

 <p>Não há nenhum produto. <a href="/admin/create">Clique aqui</a> para adicionar.</p>

 @endif
</div>
