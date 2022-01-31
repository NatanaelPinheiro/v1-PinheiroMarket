@extends('layout.main')
@section('title', 'Pinheiro Market')
@section('content')

<div id="update-profile-area" class="margin-top-section uniform-form">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h2 class="secondary-color">Seu Perfil</h2>

				<form method="POST" action="/user/profile/update">
					@csrf
					@method('PUT')
					<div class="mb-3">
						<label for="user_id">Id:</label>
						<input type="number" name="user_id" id="user_id" class="form-control" placeholder="id do usuário" value="{{$user->id}}" disabled>
					</div>
					<div class="mb-3">
						<label for="name">Nome:</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="nome do usuário" value="{{$user->name}}">
						@error('name')
						<div class="alert alert-danger mt-3">{{ $message }}</div>
						@enderror
					</div>
					<div class="mb-3">
						<label for="email">E-mail:</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="email do usuário" value="{{$user->email}}">
						@error('email')
						<div class="alert alert-danger mt-3">{{ $message }}</div>
						@enderror
					</div>

					<input type="submit" name="update_btn" class="update_btn" class="bg-accent-color primary-color" value="Atualizar"><br>
				</form>

				<form action="/user/profile/delete/{{$user->id}}" method="POST">
					@csrf
					@method('DELETE')
					<a href="/user/profile/delete/{{$user->id}}"
						onclick="event.preventDefault();
						this.closest('form').submit();" class="btn btn-danger">
						Deletar conta
					</a>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

@endsection

