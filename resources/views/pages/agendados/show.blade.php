{{-- Extends layout --}}
@extends('adminlte::page')

{{-- Content --}}
@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Agendamento: {{$agendamento->id}}
                </h3>
            </div>
        </div>

        <div class="card-body">
            <div class="callout callout-info">
                <h5>Pessoa: {{$agendamento->pessoa->nome}} ({{$agendamento->pessoa->cpf}})</h5>
                <h5>Idade: {{$agendamento->pessoa->getIdade()}}</h5>
                <h5>Telefone: {{$agendamento->pessoa->telefone}}</h5>
                <h5>Sexo: {{$agendamento->pessoa->sexo}}</h5>
            </div>
            <div class="callout callout-info">
                <h5>Local: {{$agendamento->local->descricao}} - {{$agendamento->local->endereco}}</h5>
            </div>
            <div class="callout callout-info">
                <h5>Data: {{ \App\Http\Helpers\DateUtils::DataParaString($agendamento->agenda->data)}} - {{$agendamento->agenda->periodo}}</h5>
            </div>
            <div class="callout callout-info">
                <h5>Situação: {{ $agendamento->compareceu ? 'Confirmado' : 'Não Confirmado'}}</h5>
            </div>
        </div>
        <div class="card-footer">
            <a href="{!! route('agendados.aplicarDose',$agendamento->id) !!}" class="btn btn-info font-weight-bolder text-uppercase">Aplicar Dose</a>
            @if($agendamento->compareceu)
                <a href="{!! route('agendados.compareceu',['agendado' => $agendamento->id,'sit' => 0]) !!}" class="btn btn-warning font-weight-bolder text-uppercase">Não Compareceu</a>
            @else
                <a href="{!! route('agendados.compareceu',['agendado' => $agendamento->id, 'sit' => 1]) !!}" class="btn btn-success font-weight-bolder text-uppercase">Compareceu</a>
            @endif
            <a href="{{ url()->previous() }}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>

        </div>


    </div>
@endsection