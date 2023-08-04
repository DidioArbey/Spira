@extends('layout')
@section('title', 'Editar user')
@section('parentPageTitle', 'Users')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="body table content-edit">
            <h3>Editar usuario</h3>
            <form method="POST" class="form-horizontal" action="/auth/updateUser/{{ $course->id }}">
                @csrf
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label for="name">Nombre</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                        <input name="name" type="text" id="name" class="form-control" value="{{ $course->name }}">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label for="hourly_intensity">Intensidad horaria</label>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label for="email">email</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                        <input name="email" type="text" id="email" class="form-control"
                            value="{{ $course->name }}">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label for="passorword">Contraseña</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                        <input name="name" type="password" id="password" class="form-control"
                            value="{{ $course->name }}">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label for="id_profile">Perfil</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                        <select name="id_profile" class="form-control show-tick ms select2" data-placeholder="Select"
                            id="id_profile">
                            @foreach ($profiles as $profile)
                                @if ($user->id_profile == $profile->id)
                                    <option value="{{ $profile->id }}" selected>{{ $profile->name }}</option>
                                @else
                                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <button class="btn-action">editar </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="body table content-edit">
            <h3>Cursos asignados</h3>
            <a class="btn-add" href="javascript:void(0);" data-toggle="modal" data-target="#assign-course">
                <img class="img-actions"src="{{ asset('assets/images/icons/plus.svg') }}" alt="add">
                Asignar curso
            </a>
            <div class="table-responsive">
                <table id="tables" class="table dt-responsive nowrap data-auto-refresh" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Cod</th>
                            <th class="text-center">Curso</th>
                            <th class="text-center">Intensidad horaria</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assign_courses as $assign_course)
                            <tr>
                                <th scope="row" class="text-center">{{ $assign_course->id }}</th>
                                <td>{{ $assign_course->name }}</td>
                                <td> {{$assign_course->assign_course}} </td>
                                <td class="text-center">
                                    <button onclick="deleteAssignCourse({{  $assign_course->id}})"class="btn btn-raised btn-danger waves-effect" data-type="confirm">delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <div class="modal fade" id="assign-course" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="title-modal" id="largeModalLabel">Asignar cursos</h2>
                </div>
                <div class="modal-body">
                    <div class="body">
                        <form method="POST" class="form-horizontal" action="/auth/updateUser/{{ $course->id }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="id_course">Asignar curso</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                                        <select name="id_course" class="form-control show-tick ms select2" data-placeholder="Select" id="id_course">
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                        <button class="btn-action">editar </button>
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
@stop
<script>
    function deleteAssignCourse(id) {
        swal({
                title: "¿Está seguro de eliminar el curso asignado?",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: 'get',
                        url: '/auth/deleteAssignCourse/' + id,
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
</script>
