<?php
    /**
     * @var \App\Models\Agendado $agendamento
     */
?>
@extends('adminlte::front')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Confirmação de Agendamento</h3>
                    <br>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="callout callout-info">
                        <h5>Pessoa: {{$agendamento->pessoa->nome}} ({{$agendamento->pessoa->cpf}})</h5>
                    </div>
                    <div class="callout callout-info">
                        <h5>Local: {{$agendamento->local->descricao}} - {{$agendamento->local->endereco}}</h5>
                    </div>
                    <div class="callout callout-info">
                        <h5>Data: {{ \App\Http\Helpers\DateUtils::DataParaString($agendamento->agenda->data)}} - {{$agendamento->agenda->periodo}}</h5>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" class="btn btn-success font-weight-bolder text-uppercase" onclick="window.print()">Imprimir</button>
                    <a href="{!! route('agendamento.index') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection