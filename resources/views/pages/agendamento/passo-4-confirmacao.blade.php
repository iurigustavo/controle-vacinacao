<?php
    /**
     * @var \App\Models\Local $local
     * @var \App\Models\Agenda $agenda
     */
?>
@extends('adminlte::front')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Passo 4/4 - Local de Vacinação</h3>
                    <br>
                    <div class="progress progress-sm active">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            <span class="sr-only">100% Completo</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['url' => route('agendamento.postConfirmacao'), 'id' => 'validate']) !!}
                <div class="card-body">
                    <div class="callout callout-info">
                        <h5>Pessoa: {{$pessoa->nome}} ({{$pessoa->cpf}})</h5>
                    </div>
                    <div class="callout callout-info">
                        <h5>Local: {{$local->descricao}} - {{$local->endereco}}</h5>
                    </div>
                    <div class="callout callout-info">
                        <h5>Data: {{ \App\Http\Helpers\DateUtils::DataParaString($agenda->data)}} - {{$agenda->periodo}}</h5>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    {!! Form::submit('Confirmar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
                    <a href="{!! route('agendamento.dataPeriodo') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection