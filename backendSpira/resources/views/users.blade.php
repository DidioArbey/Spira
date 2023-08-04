@extends('layout')
@section('title', 'List users')
@section('page-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop


@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="body table content-edit">
            <a class="btn-add" href="javascript:void(0);" data-toggle="modal" data-target="#add-user">
                <img class="img-actions"src="{{ asset('assets/images/icons/plus.svg') }}" alt="add">
                Crear usuario
            </a>

            <div class="table-responsive">
                <table id="tables" class="table dt-responsive nowrap data-auto-refresh" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Cod</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Perfil</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row" class="text-center">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td> {{$user->profile_name}} </td>
                                <td class="text-center">
								    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-raised btn-primary btn-round waves-effect" >Edit</a>
                                    <button onclick="deleteUser({{ $user->id }})"class="btn btn-raised btn-danger waves-effect" data-type="confirm">delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--Create User-->
<div class="modal fade" id="add-user" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="title-modal" id="largeModalLabel">Crear curso</h2>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form id="form-user" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <input name="type_user_id" value="1" type="hidden", id="type_user_id">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                                <input name="name" type="text" id="name" class="form-control">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email">email</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                                <input name="email" type="text" id="email" class="form-control">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="passorword">Contraseña</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                                <input name="name" type="password" id="password" class="form-control">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="id_profile">Perfil</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                                <select name="id_profile" class="form-control show-tick ms select2" data-placeholder="Select" id="id_profile">
                                    @foreach($profiles as $profiles)
                                        <option value="{{ $profiles->id }}">{{ $profiles->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-save store-user">Crear</button>
                <button type="button" class="btn-cancel" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@stop
@section('page-script')
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui/sweetalert.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
@stop

@section('page-script')
<script>
function deleteUser(id) {
    swal({
            title: "¿Está seguro de eliminar el curso?",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type: 'get',
                    url: '/auth/delateUser/' + id,
                    success: function(response) {
                        console.log(response);
                        swal({
                            title: "Curso eliminado correctamente!",
                            text: "",
                            type: "success",
                            icon: "success"
                        }).then(function() {
                            window.location.reload();
                        });
                    },
                    error: function() {
                        alert('error!');
                    }
                });
            }
        });
}


$(function() {
    $(".store-user").click(function() {
        $.ajax({
            type: 'post',
            url: '/auth/storeUser',
            data: new FormData($('#form-user')[0]),
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            success: function(data) {
                $('#add-user').modal('hide');
                swal({
                    title: "Datos procesados correctamente!",
                    text: "",
                    type: "success",
                    icon: "success"
                }).then(function() {
                    window.location.reload();
                });
            },
            error: function() {
                alert('error!');
            }
        });
    });
});
</script>
@endsection