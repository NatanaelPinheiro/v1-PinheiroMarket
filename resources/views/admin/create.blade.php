@extends('layout.main')
@section('title', 'Pinheiro Market | Adicionar Produto')
@section('content')

<div id="add-products-area" class="margin-top-section uniform-form">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h2 class="secondary-color">Adicione um produto</h2>

				<form id="add-products-area-form" method="POST" action="/admin/store" enctype="multipart/form-data">
					@csrf

					<div class="mb-3">
						<label for="category">Categoria:</label>
						<select name="food_category" id="category" class="form-select" autofocus>
							<option selected disabled>Categoria</option>
							<option value="basics">Alimentos básicos</option>
							<option value="frozen">Congelados</option>
							<option value="flourAndGrains">Farinhas e grãos</option>
							<option value="condiment">Condimentos</option>
							<option value="mornings">Matinais</option>
							<option value="bakery">Padaria</option>
							<option value="pastas">Massas</option>
							<option value="goodies">Guloseimas</option>
						</select>
						@error('food_category')
						<div class="alert alert-danger mt-3">{{ $message }}</div>
						@enderror
					</div>

					<div class="mb-3">
						<div class="row">
							<div class="col-md-6">
								<label for="name">Nome:</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="nome do produto" value="{{old('name')}}">
								@error('name')
								<div class="alert alert-danger mt-3">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-6">
								<label for="brand">Marca:</label>
								<input type="text" name="brand" id="brand" class="form-control" placeholder="marca do produto" value="{{old('brand')}}" autocomplete="brand">
								@error('brand')
								<div class="alert alert-danger mt-3">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="price">Preço:</label>
						<input type="text" name="price" id="price" class="form-control" placeholder="preço do produto" value="{{old('price')}}">
						@error('price')
						<div class="alert alert-danger mt-3">{{ $message }}</div>
						@enderror
					</div>

					<div class="mb-3">
						<div class="row">
							<div class="col-md-6">
								<label for="installment">Parcelas:</label>
								<select name="installment" id="installment" class="form-select">
									<option disabled selected>Parcelamento</option>
									<option value="1x">1x</option>
									<option value="2x">2x</option>
									<option value="3x">3x</option>
									<option value="5x">5x</option>
									<option value="10x">10x</option>
								</select>
								@error('installment')
								<div class="alert alert-danger mt-3">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-6">
								<label for="discount">Desconto:</label>
								<select name="discount" id="discount" class="form-select">
									<option disabled selected>Desconto</option>
									<option value="none">Nenhum</option>
									<option value="5%">5 %</option>
									<option value="10%">10 %</option>
									<option value="20%">20 %</option>
									<option value="30%">30 %</option>
									<option value="40%">40 %</option>
									<option value="50%">50 %</option>
								</select>
								@error('discount')
								<div class="alert alert-danger mt-3">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="qty">Quantidade:</label>
						<input type="number" min="1" name="qty" id="qty" class="form-control" placeholder="quantidade disponível" value="{{old('qty')}}">
						@error('qty')
						<div class="alert alert-danger mt-3">{{ $message }}</div>
						@enderror
					</div>

					<div class="mb-3">
						<label for="description">Descrição:</label>
						<textarea name="description" id="product-description" class="form-control" rows="5"placeholder="de 30 a 300 caracteres.">{{old('description')}}</textarea>
						@error('description')
						<div class="alert alert-danger mt-3">{{ $message }}</div>
						@enderror
					</div>

					<div class="mb-3">
						<label for="image">Imagem do produto:</label>
						<input type="file" name="image" id="image" class="form-control-file" placeholder="Imagem do produto">
						@error('image')
						<div class="alert alert-danger mt-3">{{ $message }}</div>
						@enderror
					</div>

					<input type="submit" name="store-submit" id="store-submit" value="Adicionar" class="bg-accent-color primary-color">
				</form>
			</div>
		</div>
	</div>
</div>
</div>

@endsection

@push('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#product-description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
