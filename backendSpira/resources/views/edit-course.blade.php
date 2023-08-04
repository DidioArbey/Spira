@extends('layout')
@section('title', 'Editar Curso')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="body table">
        <h3>Editar curso</h3>
        <form method="POST" class="form-horizontal" action="/auth/updateCourse/{{ $course[0]->id }}">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                    <label for="name">Nombre</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                    <input name="name" type="text" id="name" class="form-control" value="{{ $course[0]->name }}">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                    <label for="hourly_intensity">Intensidad horaria</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                    <input name="hourly_intensity" type="text" id="hourly_intensity" class="form-control"
                        value="{{ $course[0]->hourly_intensity }}">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <button class="btn btn-raised btn-primary  waves-effect">editar </button>
            </div>
        </form>
    </div>
</div>


@stop
@section('page-script')
@stop
