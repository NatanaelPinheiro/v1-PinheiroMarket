@extends('layout.main')
@section('title', 'Pinheiro Market')
@section('content')

<div id="update-users-area" class="margin-top-section uniform-form">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h2 class="secondary-color">Editando Usuário</h2>

				<form method="POST" action="/admin/dashboard/users/update/{{$user->id}}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="mb-3">
						<label for="user_id">Id:</label>
						<input type="number" name="user_id" id="user_id" class="form-control" placeholder="id do usuário" value="{{$user->id}}" disabled>
					</div>
					<div class="mb-3">
						<label for="name">Nome:</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="nome do usuário" value="{{$user->name}}" disabled>
					</div>
					<div class="mb-3">
						<label for="email">E-mail:</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="email do usuário" value="{{$user->email}}" disabled>
					</div>
					<div class="mb-3">
						<label for="created_at">Data de criação:</label>
						<input type="date" name="created_at" id="created_at" class="form-control" placeholder="data de criação" value="{{date('Y-m-d', strtotime($user->created_at))}}" disabled>
					</div>
					<div class="mb-3">
						<label for="permission">Permissão:</label>
						<input type="text" name="permission" id="permission" class="form-control" placeholder="permissão" value="{{
							$user->getPermissionNames()[0];
						}}" disabled>
					</div>

					@if($user->getPermissionNames()[0] == 'user')
					<input type="submit" name="edit-submit" id="edit-submit" value="Tornar Admin" class="bg-accent-color primary-color">
					@else
					<input type="submit" name="edit-submit" id="edit-submit" value="Tornar User" class="bg-accent-color primary-color">
					@endif
				</form>
			</div>
		</div>
	</div>
</div>
</div>

@endsection
