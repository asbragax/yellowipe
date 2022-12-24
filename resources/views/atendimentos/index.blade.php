@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/bower/dataTables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Lista de atendimentos cadastrados
                    <a href="{{route('atendimentos.create')}}" class="btn btn-sm btn-success float-end">Cadastrar novo atendimento</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tblAtendimentos">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Médico</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atendimentos as $atendimento)
                                    <tr>
                                        <th scope="row">{{$atendimento->date->format("d/m/Y")}}</th>
                                        <td>{{$atendimento->time->format("H:i")}}</td>
                                        <td>{{$atendimento->paciente->name}}</td>
                                        <td>{{$atendimento->medico->name}}</td>
                                        <td>{{$atendimento->description}}</td>
                                        <td>
                                            <form action="{{route('atendimentos.destroy', ['atendimento' => $atendimento->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('atendimentos.edit', ['atendimento' => $atendimento->id])}}" class="btn btn-warning btn-sm btn-icon"><i class="fa fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm btn-icon show_confirm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{Html::script('assets/bower/jquery-3.6.3.min/index.js')}}
{{Html::script('assets/bower/datatables.net/js/jquery.dataTables.min.js')}}
{{Html::script('assets/bower/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tblAtendimentos').DataTable({
            "order": [[ 0, 'asc' ], [ 1, 'asc' ]],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-PT.json'
            }
        });

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Tens certeza que deseja excluir o registro?`,
                text: "Se você deletar este registro, sumirá para sempre.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
