@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Cadastrar novo atendimento</div>
                <div class="card-body">
                    <form method="POST" class="form-horizontal" action="{{route('atendimentos.store')}}">
                        @csrf
                        <div class="row">
                    
                            <div class="col-sm-6 mb-2">
                                <label for="paciente" class="form-label">Paciente</label>
                                <select name="paciente_id" id="paciente_id" class="form-control select @error('paciente_id') is-invalid @enderror">
                                    @foreach ($pacientes as $paciente)  
                                        <option value="{{$paciente->id}}" {{ (old("paciente_id") == $paciente->id ? "selected":"") }}>{{$paciente->name}}</option>
                                    @endforeach
                                </select>
                                @error('paciente_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="medico" class="form-label">Médico</label>
                                <select name="medico_id" id="medico_id" class="form-control select @error('medico_id') is-invalid @enderror">
                                    @foreach ($medicos as $medico)  
                                        <option value="{{$medico->id}}" {{ (old("medico_id") == $medico->id ? "selected":"") }}>{{$medico->name}}</option>
                                    @endforeach
                                </select>
                                @error('medico_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="date" class="form-label">Data</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{old('date') ? old('date') : date('Y-m-d')}}">
                                @error('date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="time" class="form-label">Hora</label>
                                <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" id="time" min="09:00" max="19:00" value="{{ old('time') }}">
                                @error('time')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label for="time" class="form-label">Descrição</label>
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
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
