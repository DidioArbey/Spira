@extends('layout')
@section('title', 'List courses')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/courses.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop


@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="body table content-edit">
            <a class="btn-add" href="javascript:void(0);" data-toggle="modal" data-target="#add-course">
                <img class="img-actions"src="{{ asset('assets/images/icons/plus.svg') }}" alt="add">
                Crear curso
            </a>

            <div class="table-responsive">
                <table id="tables" class="table dt-responsive nowrap data-auto-refresh" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Cod</th>
                            <th class="text-center">Curso</th>
                            <th class="text-center">Intensidad Horaria</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <th scope="row" class="text-center">{{ $course->id }}</th>
                                <td>{{ $course->name }}</td>
                                <td> {{$course->hourly_intensity}} </td>
 
                                <td class="text-center">
								   {{-- <a href="{{ route('course.edit', ['id' => $course->id]) }}" class="btn-actions"><img class="img-actions-table" src="{{ asset('assets/images/icons/edit.svg') }}" alt="edit"></a> --}}
                                   <a onclick="deleteCourse({{ $course->id }})" class="button">Delete</a>   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--Create Course-->
<div class="modal fade" id="add-course" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="title-modal" id="largeModalLabel">Crear curso</h2>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form id="form-course" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            {{-- <input name="type_course_id" value="1" type="hidden", id="type_course_id"> --}}
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                                <input name="name" type="text" id="name" class="form-control">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="hourly_intensity">Intensidad horaria</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                                <input name="hourly_intensity" type="number" id="hourly_intensity" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-save store-course">Crear</button>
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
    <script src="{{ asset('assets/js/courses/courses.js') }}"></script>
{{-- @stop --}}

{{-- @section('page-script') --}}
<script type="text/javascript">
function deleteCourse(id) {
    swal({
            title: "¿Está seguro de eliminar el curso de la ruta de aprendizaje?",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type: 'get',
                    url: '/auth/delateCourse/' + id,
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
    $(".store-course").click(function() {
        $.ajax({
            type: 'post',
            url: '/auth/storeCourse',
            data: new FormData($('#form-course')[0]),
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            success: function(data) {
                $('#add-course').modal('hide');
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
@stop
{{-- @endsection --}}