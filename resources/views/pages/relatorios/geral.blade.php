@extends('adminlte::page')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Parâmetros
                </h3>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => route('relatorios.geral.gerar'), 'id' => 'validate', 'method'=>'GET', 'target' =>'_new']) !!}
            <div class="form-group row">
                {!! Form::label('data_inicio','Data Início',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('data_inicio',NULL, [ 'id' => 'data_inicio','class' => 'form-control maskData validate[required]']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('data_fim','Data Fim',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('data_fim',NULL, [ 'id' => 'data_fim','class' => 'form-control maskData validate[required]']) !!}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Emitir',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
                <a href="{!! route('locais.index') !!}" class="btn btn-light-primary font-weight-bolder text-uppercase">Voltar</a>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
