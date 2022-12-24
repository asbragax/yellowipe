@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">@auth{{ __('Dashboard') }}@endauth @guest {{ __('Login') }} @endguest</div>

                <div class="card-body">
                    @auth 
                    
                        <div class="col-sm-12 text-center">
                            <img src="{{'assets/img/favicon.png'}}" alt="Logo Yellow Ipe" class="img-fluid">
                        </div>
                        <h2 class="text-center">{{ __('Você está logado! Esta é a página inicial, por favor escolha um dos menus acima para começar a navegar.') }}</h2>

                    @endauth
                    @guest
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Lembrar-me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 text-end offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Entrar
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    @endguest


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
