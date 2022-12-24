@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Cadastrar novo paciente</div>
                <div class="card-body">
                    <form method="POST" class="form-horizontal" action="{{route('pacientes.store')}}">
                        @csrf
                        <div class="row">
                            <h6>Campos obrigatórios (*)</h6>
                            <div class="col-sm-5 mb-2">
                                <label for="name" class="form-label">Nome*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-3 mb-2">
                                <label for="phone" class="form-label">Telefone*</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"  value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4 mb-2">
                                <label for="email" class="form-label">E-mail*</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label for="address" class="form-label">Endereço</label>
                                <textarea name="address" class="form-control" id="address" rows="3"></textarea>
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
{{Html::script('assets/bower/jquery-3.6.3.min/index.js')}}
<script>
    $(document).ready(function () {
        //
    });
</script>
@endsection
