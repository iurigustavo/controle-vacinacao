<?php
    /**
     * @var Vacinacao $model
     */

    use App\Models\Vacinacao;

?>
@extends('adminlte::page')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Registro
                </h3>
            </div>
        </div>
        {!! Form::open(['url' => route('vacinacoes.create'), 'id' => 'validate','method'=>'GET']) !!}
        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('cpf','CPF',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('cpf',NULL, [ 'id' => 'cpf','class' => 'form-control maskCpf validate[required]']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {!! Form::submit('Verificar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
            <a href="{!! route('vacinacoes.index') !!}" class="btn btn-light-primary font-weight-bolder text-uppercase">Voltar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection