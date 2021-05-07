@extends('adminlte::front')

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Passo 1/4 - Dados Pessoais</h3>
                    <br>
                    <div class="progress progress-sm active">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                            <span class="sr-only">25% Completo</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['url' => route('agendamento.postDadosPessoais'), 'id' => 'validate']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('nome','Nome') !!}
                        {!! Form::text('nome',NULL, [ 'id' => 'nome','class' => 'form-control validate[required]', 'placeholder' => 'Nome Completo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cpf','CPF') !!}
                        {!! Form::text('cpf',NULL, [ 'id' => 'cpf','class' => 'form-control maskCpf validate[required]', 'placeholder' => 'CPF']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('data_nascimento','Data de Nascimento') !!}
                        {!! Form::text('data_nascimento',NULL, [ 'id' => 'data_nascimento','class' => 'form-control maskData validate[required]', 'placeholder' => 'Data de Nascimento']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('sexo','Gênero Biológico') !!}
                        {!! Form::select('sexo',[NULL=>'Selecione uma opção','Masculino' => 'Masculino' ,'Feminino' => 'Feminino'],NULL, [ 'id' => 'sexo','class' => 'form-control validate[required]']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('telefone','Telefone') !!}
                        {!! Form::text('telefone',NULL, [ 'id' => 'telefone','class' => 'form-control validate[required]' , 'maxlength' => '20', 'placeholder' => 'Telefone']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('cns','CNS (Carteira Nacional de Saúde)') !!}
                        {!! Form::text('cns',NULL, [ 'id' => 'cns','class' => 'form-control', 'placeholder' => 'Número do CNS']) !!}
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    {!! Form::submit('Próximo Passo',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
                    <a href="{!! route('agendamento.index') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection