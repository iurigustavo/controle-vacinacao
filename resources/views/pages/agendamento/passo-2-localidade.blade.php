<?php
    /**
     * @var \App\Models\Local[] $listaLocais
     * @var \App\Models\Pessoa  $pessoa
     */
?>
@extends('adminlte::front')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Passo 2/4 - Local de Vacinação</h3>
                    <br>
                    <div class="progress progress-sm active">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            <span class="sr-only">50% Completo</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['url' => route('agendamento.postLocalidade'), 'id' => 'validate']) !!}
                <div class="card-body">
                    <div class="callout callout-info">
                        <h5>Pessoa: {{$pessoa->nome}} ({{$pessoa->cpf}})</h5>
                    </div>

                    <div class="form-group">
                        <h3>Selecione o Local</h3>
                        @foreach($listaLocais as $local)
                            <div class="card position-relative custom-control custom-radio">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success text-md">
                                        {{$local->total_vagas - $local->total_vagas_preenchidas}} vaga(s)
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input class="custom-control-input" type="radio" id="local{{$local->id}}" name="local_id" value="{{$local->id}}">
                                    <label for="local{{$local->id}}" class="custom-control-label">
                                        <p>
                                            Local: {{$local->descricao}}
                                            <br>
                                            Vagas: {{$local->total_vagas_preenchidas}}/{{$local->total_vagas}}
                                            <br>

                                        </p>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    {!! Form::submit('Próximo Passo',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
                    <a href="{!! route('agendamento.dadosPessoais') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection