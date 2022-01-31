@extends('layout.main')
@section('title', 'Pinheiro Market')
@section('content')

<div id="update-products-area" class="margin-top-section uniform-form">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h2 class="secondary-color">Editando: {{$product->name}}</h2>

				<form method="POST" action="/admin/dashboard/products/update/{{$product->id}}" enctype="multipart/form-data" id="update-products-form">
					@csrf
					@method('PUT')
					<div class="mb-3">
						<label for="category">Categoria:</label>
						<select name="food_category" id="food_category" class="form-select">
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
					</div>
					@error('category')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror

					<div class="mb-3">
						<div class="row">
							<div class="col-md-6">
								<label for="name">Nome:</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="nome do produto" value="{{$product->name}}">
								@error('name')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="col-md-6">
								<label for="brand">Marca:</label>
								<input type="text" name="brand" id="brand" class="form-control" placeholder="marca do produto" value="{{$product->brand}}">
								@error('brand')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="price">Preço:</label>
						<input type="text" name="price" id="price" class="form-control" placeholder="preço do produto" value="{{$product->price}}">
					</div>
					@error('price')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror

					<div class="mb-3">
						<div class="row">
							<div class="col-md-6">
								<select name="installment" id="installment" class="form-select">
									<option disabled>Parcelamento</option>
									<option value="1x">1x</option>
									<option value="3x">3x</option>
									<option value="5x">5x</option>
									<option value="10x">10x</option>
								</select>
								@error('installment')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-6">
								<select name="discount" id="discount" class="form-select" selected="{{$product->discount}}">
									<option disabled>Desconto</option>
									<option value="none">Nenhum</option>
									<option value="5%">5 %</option>
									<option value="10%">10 %</option>
									<option value="20%">20 %</option>
									<option value="30%">30 %</option>
									<option value="40%">40 %</option>
									<option value="50%">50 %</option>
								</select>
								@error('discount')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="qty">Quantidade:</label>
						<input type="number" min="1" name="qty" id="qty" class="form-control" placeholder="quantidade disponível" value="{{$product->qty}}">
					</div>
					@error('qty')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror

					<div class="mb-3">
						<label for="description">Descrição:</label>
						<textarea name="description" id="product-description" class="form-control" rows="5" placeholder="de 30 a 300 caracteres.">{!! $product->description !!}</textarea>
					</div>
					@error('description')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror

					<div class="mb-3">
						<label for="image">Imagem:</label>
						<input type="file" name="image" id="image" class="form-control-file" placeholder="Imagem do produto">
						<img src="/img/products/{{$product->image}}" alt="{{$product->name}}" class="image-review">
					</div>
					@error('image')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror

					<input type="submit" name="edit-submit" id="edit-submit" value="Editar" class="bg-accent-color primary-color">
				</form>
			</div>
		</div>
	</div>
</div>
</div>

@endsection

@push('scripts')

@if(isset($product))
<script>
	function setSelectedIndex(s, valsearch){
		for (i = 0; i< s.options.length; i++){ 
			if (s.options[i].value == valsearch){
				s.options[i].selected = true;
				break;
			}
		}
		return;
	}
	setSelectedIndex(document.getElementById("discount"), '{{$product->discount}}');
	setSelectedIndex(document.getElementById("installment"), '{{$product->installment}}');
	setSelectedIndex(document.getElementById("food_category"), '{{$product->food_category}}');

</script>
@endif

<script>
	ClassicEditor
	.create( document.querySelector( '#product-description' ))
	.catch( error => {
		console.error( error );
	});
</script>
@endpush