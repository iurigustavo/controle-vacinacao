<?php
/**
 * @var \App\Models\Agenda $agenda
 */
?>
@extends('adminlte::front')

{{-- Content --}}
@section('content')
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Agendamento de Vacinação</h5>
                </div>
                <div class="card-body">
                    @if($agenda->podeAgendar())
                        <p class="card-text">Olá, para fazer o agendamento da vacinação segue abaixo clique no botão logo abaixo</p>
                        <a href="{{route('agendamento.dadosPessoais')}}" class="btn btn-primary">Fazer o Agendamento</a>
                    @else
                        <p class="card-text">Não tem agenda aberta no momento</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>

@endsection