@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Editar paciente</div>
                <div class="card-body">
                    <form method="POST" class="form-horizontal" action="{{route('pacientes.update', ['paciente'=>$paciente->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                    
                            <div class="col-sm-5 mb-2">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$paciente->name}}" required>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$paciente->phone}}" required>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{$paciente->email}}" required>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label for="address" class="form-label">Endereço</label>
                                <textarea name="address" class="form-control" id="address" rows="3">{{$paciente->address}}</textarea>
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
