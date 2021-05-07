<?php
    /**
     * @var \App\Models\Agenda $model
     */

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
            {!! Form::open(['url' => route('agendas.update',$model->id), 'id'=>'validate', 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('agendas.store'), 'id' => 'validate']) !!}
        @endif
        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('data','Data',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('data',$model->data, [ 'id' => 'data','class' => 'form-control validate[required] maskData']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('periodo','Periodo',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('periodo',$model->periodo, [ 'id' => 'periodo','class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('quantidade','Quantidade',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('quantidade',$model->quantidade, [ 'id' => 'quantidade','class' => 'form-control validate[required,custom[integer]]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('faixa_etaria_min','Faixa Etária Mínima',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('faixa_etaria_min',$model->faixa_etaria_min, [ 'id' => 'faixa_etaria_min','class' => 'form-control validate[required,custom[integer]]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('faixa_etaria_max','Faixa Etária Máxima',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('faixa_etaria_max',$model->faixa_etaria_max, [ 'id' => 'faixa_etaria_max','class' => 'form-control validate[required,custom[integer]]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('local_id','Local da Vacina',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::select('local_id',[NULL=>'Selecione uma opção']+$listaLocais ,$model->local_id, [ 'id' => 'local_id', 'class' => 'form-control select2 validate[required]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('habilitado','Habilitado?',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::select('habilitado',['0'=>'Não', 1 => 'Sim'] ,$model->habilitado, [ 'id' => 'habilitado', 'class' => 'form-control validate[required]']) !!}
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