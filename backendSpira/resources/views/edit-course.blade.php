@extends('layout')
@section('title', 'Editar Curso')
@section('parentPageTitle', 'Cursos')

@section('content')
     <form method="POST" class="form-horizontal" action="/auth/updateCourse/{{ $course->id }}">
         @csrf
         <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label for="name">Nombre</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                        <input name="name" type="text" id="name" class="form-control"
                            value="{{ $course->name }}">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label for="hourly_intensity">Intensidad horaria</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 form-group">
                        <input name="hourly_intensity" type="text" id="hourly_intensity" class="form-control"
                            value="{{ $course->hourly_intensity }}">
                    </div>
            </form>

@stop
@section('page-script')
@stop