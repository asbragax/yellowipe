@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Cadastrar novo usuário</div>
                <div class="card-body">
                    <form method="POST" class="form-horizontal" action="{{ route('users.store') }}">
                        @csrf
                        <div class="row">
                    
                            <div class="col-sm-8 mb-2">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4 mb-2">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="password-confirm" class="form-label">Confirmar Senha</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm">
                            </div>
                            <div class="col-sm-12 text-end mt-2">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
