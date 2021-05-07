<?php
    /**
     * @var \App\Models\Pessoa $pessoa
     */
?>
@extends('adminlte::front')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Consulta de Agendamento</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['url' => route('agendamento.consulta'), 'id' => 'validate', 'method' => 'get']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('cpf','CPF') !!}
                        {!! Form::text('cpf',NULL, [ 'id' => 'cpf','class' => 'form-control maskCpf validate[required]', 'placeholder' => 'CPF']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('data_nascimento','Data de Nascimento') !!}
                        {!! Form::text('data_nascimento',NULL, [ 'id' => 'data_nascimento','class' => 'form-control maskData validate[required]', 'placeholder' => 'Data de Nascimento']) !!}
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {!! Form::submit('Consultar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
                    <a href="{!! route('agendamento.index') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        @if($pessoa->agendamentos->count())
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agendamentos</h3>
                    </div>
                    <div class="card-body">
                        @foreach($pessoa->agendamentos as $agendamento)
                            <div class="callout callout-info">
                                <h5>Pessoa: {{$pessoa->nome}} ({{$pessoa->cpf}})</h5>
                                <h5>Local: {{$agendamento->local->descricao}} - {{$agendamento->local->endereco}}</h5>
                                <h5>Data: {{ \App\Http\Helpers\DateUtils::DataParaString($agendamento->agenda->data)}} - {{$agendamento->agenda->periodo}}</h5>
                                <a href="{{route('agendamento.confirmacao.show',['cpf' => $pessoa->cpf, 'id' => base64_encode($agendamento->id)])}}">Visualizar</a>
                            </div>
                        @endforeach
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        @elseif(request()->has('cpf'))
            <div class="col-md-12">
                <div class="callout callout-danger">
                    Não possui nenhum agendamento
                </div>
            </div>
        @endif
    </div>
@endsection