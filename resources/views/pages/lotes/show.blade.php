<?php
    /**
     * @var Lote $model
     */

    use App\Models\Lote;

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
            {!! Form::open(['url' => route('vacinas.lotes.update',[$model->vacina_id,$model->id]), 'id'=>'validate', 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('vacinas.lotes.store',['vacina' => $model->vacina_id]), 'id' => 'validate']) !!}
        @endif
        <div class="card-body">
            {!! Form::hidden('vacina_id',$model->vacina_id) !!}
            <div class="form-group row">
                {!! Form::label('vacina','Vacina',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('vacina',$model->vacina->descricao, [ 'id' => 'vacina','class' => 'form-control validate[required]', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('descricao','Descrição',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('descricao',$model->descricao, [ 'id' => 'nome','class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('data_vencimento','Data de Vencimento do Lote',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('data_vencimento', \App\Http\Helpers\DateUtils::DataParaString($model->data_vencimento), [ 'id' => 'data_vencimento','class' => 'form-control maskData']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('quantidade','Quantidade',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('quantidade',$model->quantidade, [ 'id' => 'nome','class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {!! Form::submit('Salvar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
            <a href="{!! route('vacinas.show',$model->vacina_id) !!}" class="btn btn-light-primary font-weight-bolder text-uppercase">Voltar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection