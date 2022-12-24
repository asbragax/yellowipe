@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/bower/dataTables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Lista de pacientes cadastrados
                    <a href="{{route('pacientes.create')}}" class="btn btn-sm btn-success float-end">Cadastrar paciente</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tblPacientes">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telemóvel</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientes as $paciente)
                                    <tr>
                                        <th scope="row">{{$paciente->name}}</th>
                                        <td>{{$paciente->phone}}</td>
                                        <td>{{$paciente->email}}</td>
                                        <td>{{$paciente->address}}</td>
                                        <td>
                                            <form action="{{route('pacientes.destroy', ['paciente' => $paciente->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('pacientes.edit', ['paciente' => $paciente->id])}}" class="btn btn-warning btn-sm btn-icon"><i class="fa fa-edit"></i></a>
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
        $('#tblPacientes').DataTable({
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
