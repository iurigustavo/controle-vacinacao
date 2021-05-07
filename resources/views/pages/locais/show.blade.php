<?php
    /**
     * @var Local $model
     */

    use App\Models\Local;

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
        @if($model->id > 0)
            {!! Form::open(['url' => route('locais.update',$model->id), 'id'=>'validate', 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('locais.store'), 'id' => 'validate']) !!}
        @endif
        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('descricao','Descrição',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('descricao',$model->descricao, [ 'id' => 'descricao','class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('endereco','Endereço',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('endereco',$model->endereco, [ 'id' => 'endereco','class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            {!! Form::submit('Salvar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
            <a href="{!! route('locais.index') !!}" class="btn btn-light-primary font-weight-bolder text-uppercase">Voltar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection