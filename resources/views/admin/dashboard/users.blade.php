@extends('layout.main')
@section('title', 'Pinheiro Market | Dashboard')
@section('content')

<div id="dashboard-users-area" class="dashboard margin-top-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="secondary-color mb-4">Dashboard</h2>
                
                <h3 class="secondary-color">Todos os usuários</h3>
                
                @if(count($users) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <div id="user-status" class="@if($user->getPermissionNames()[0] == 'admin') admin @endif"> 
                                    {{$user->getPermissionNames()[0]}}
                                </div>
                            </td>
                            <td class="action-links">
                                <form action="/admin/dashboard/users/edit/{{$user->id}}" method="GET">
                                    @csrf
                                    <a href="/admin/dashboard/users/edit/{{$user->id}}"   class="btn btn-primary" 
                                       onclick="event.preventDefault();
                                       this.closest('form').submit();
                                     ">
                                         <i class="bi bi-pencil"></i>
                                         Editar
                                     </a>
                                    
                                </form>

                                <form action="/admin/dashboard/users/delete/{{$user->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/admin/dashboard/users/delete/{{$user->id}}" 
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
                <p>Não há nenhum usuário.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection