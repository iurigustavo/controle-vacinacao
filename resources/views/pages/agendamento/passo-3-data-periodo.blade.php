<?php
    /**
     * @var \App\Models\Local $local
     */
?>
@extends('adminlte::front')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Passo 3/4 - Local de Vacinação</h3>
                    <br>
                    <div class="progress progress-sm active">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                            <span class="sr-only">75% Completo</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['url' => route('agendamento.postDataPeriodo'), 'id' => 'validate']) !!}
                <div class="card-body">
                    <div class="callout callout-info">
                        <h5>Pessoa: {{$pessoa->nome}} ({{$pessoa->cpf}})</h5>
                    </div>
                    <div class="callout callout-info">
                        <h5>Local: {{$local->descricao}} - {{$local->endereco}}</h5>
                    </div>
                    <div class="form-group">
                        <h3>Selecione o Período</h3>
                        @foreach($local->listaAgendasDisponiveis as $agenda)
                            @if($agenda->tem_vaga)
                                <div class="card position-relative custom-control custom-radio">
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-success text-lg">
                                            {{$agenda->total_vagas}} vaga(s)
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input class="custom-control-input" type="radio" id="agenda{{$agenda->id}}" name="agenda_id" value="{{$agenda->id}}">
                                        <label for="agenda{{$agenda->id}}" class="custom-control-label">
                                            <p>
                                                Data: {{\App\Http\Helpers\DateUtils::DataParaString($agenda->data)}}
                                                <br>
                                                Período: {{$agenda->periodo}}
                                                <br>
                                                Restrição: Idade maior que {{$agenda->faixa_etaria_min}} anos
                                                <br>
                                                Vagas: {{$agenda->total_vagas_preenchidas}}/{{$agenda->total_vagas}}
                                                <br>
                                                Local: {{$local->descricao}}

                                            </p>
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    {!! Form::submit('Próximo Passo',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
                    <a href="{!! route('agendamento.localidade') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection