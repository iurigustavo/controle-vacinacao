<?php
    /**
     * @var Vacina $model
     */

    use App\Models\Vacina;

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
        {!! Form::open(['url' => route('vacinas.store'), 'id' => 'validate']) !!}
        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('descricao','Descrição',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('descricao',$model->descricao, [ 'id' => 'nome','class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {!! Form::submit('Salvar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
            <a href="{!! route('vacinas.index') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection