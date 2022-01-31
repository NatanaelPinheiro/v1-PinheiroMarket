<!doctype html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>

		@livewireStyles

		<!-- Google Fonts - Lato -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<!-- BOOTSTRAP JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<!-- BOOTSTRAP ICONS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-lg bg-primary-color">
				<div class="container">
					<a href="/" class="navbar-brand secondary-color">Pinheiro Market</a>

					<button class="navbar-toggler"
					type="button" 
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" 
					aria-controls="navbarSupportedContent" 
					aria-expanded="false" 
					aria-label="Toggle navigation">
					<i class="bi bi-list"></i>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item me-4" >
							<a href="/" class="nav-link active secondary-color" aria-current="page">Início</a>
						</li>

						@can('user')
						<li class="nav-item me-4">
							<a href="/user/cart" class="nav-link secondary-color">
								<i class="bi bi-cart"></i>
							Carrinho</a>
						</li>
						@endcan
						@can('admin')
						<li class="nav-item me-4">
							<a href="/admin/create" class="nav-link secondary-color">
								<i class="bi bi-plus-circle"></i>
							Adicionar produtos</a>
						</li>

						<li class="nav-item dropdown me-4">
							<a class="nav-link dropdown-toggle secondary-color" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-sliders"></i>
								Dashboard
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item secondary-color" href="/admin/dashboard/products">Produtos</a></li>
								<li><a class="dropdown-item secondary-color" href="/admin/dashboard/users">Usuários</a></li>
							</ul>
						</li>
						@endcan

						@auth


						<li class="nav-item dropdown me-4">
							<a class="nav-link dropdown-toggle secondary-color" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-gear"></i>
								Mais
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li>
									<a href="/user/profile" class="dropdown-item secondary-color">Perfil</a>
								</li> 
								<li>
									<form action="/logout" method="POST">
										@csrf
										<a href="/logout" class="dropdown-item secondary-color" onclick="event.preventDefault();
										this.closest('form').submit();">
									Sair</a>

								</form>
							</li>
						</ul>
					</li>							
					@endauth
					@guest
					<li class="nav-item me-4">
						<a href="/login" class="nav-link secondary-color">
							<i class="bi bi-box-arrow-in-right"></i>
						Login</a>
					</li>
					<li class="nav-item me-4">
						<a href="/register" class="nav-link secondary-color">
							<i class="bi bi-box-arrow-in-right"></i>
						Registro</a>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
</header>
@if(session('msg'))
<p class="msg">{{session('msg')}}</p>
@elseif(session('msg-error'))
<p class="msg-error">{{session('msg-error')}}</p>
@endif

@yield('content')

<footer>
	<div id="footer">
		<div class="container">
			<p>All rights deserved Pinheiro Market &copy; {{date('Y')}}</p>
		</div>
	</div>
</footer>

@livewireScripts
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
@stack('scripts')
</body>
</html>