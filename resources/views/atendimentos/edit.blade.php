@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Editar atendimento</div>
                <div class="card-body">
                    <form method="POST" class="form-horizontal" action="{{route('atendimentos.update', ['atendimento'=>$atendimento->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                    
                            <div class="col-sm-6 mb-2">
                                <label for="paciente" class="form-label">Paciente</label>
                                <select name="paciente_id" id="paciente_id" class="form-control select">
                                    @foreach ($pacientes as $paciente)  
                                        <option value="{{$paciente->id}}" {{ $paciente->id == $atendimento->paciente->id ? "selected" : "" }} required>
                                            {{$paciente->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="medico" class="form-label">Médico</label>
                                <select name="medico_id" id="medico_id" class="form-control select">
                                    @foreach ($medicos as $medico)  
                                        <option value="{{$medico->id}}" {{ $medico->id == $atendimento->medico->id ? "selected" : "" }} required>
                                            {{$medico->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="date" class="form-label">Data</label>
                                <input type="date" class="form-control" name="date" id="date" value="{{$atendimento->date->format("Y-m-d")}}" required>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="time" class="form-label">Hora</label>
                                <input type="time" class="form-control" name="time" id="time" min="09:00" max="19:00" value="{{$atendimento->time->format("H:i")}}" required>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label for="time" class="form-label">Descrição</label>
                                <textarea name="description" id="description" rows="5" class="form-control" required>{{$atendimento->description}}</textarea>
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
