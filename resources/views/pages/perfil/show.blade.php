<?php
    /**
     * @var User $model
     */

    use App\Models\User;

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
            {!! Form::open(['url' => route('perfil.update'), 'id'=>'validate', 'method' => 'put']) !!}
        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('name','Nome',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('name',$model->name, [ 'id' => 'name','class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('email','E-Mail',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('email',$model->email, [ 'id' => 'email','class' => 'form-control validate[required,custom[email]]']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('password','Senha',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::password('password',[ 'id' => 'password','class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('enabled','Ativado',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::select('enabled', ['1' => 'Ativado','0' => 'Desativado'],$model->enabled, ['id' => 'enabled', 'class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {!! Form::submit('Salvar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
            <a href="{!! route('usuarios.index') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
        </div>
        {!! Form::close() !!}
    </div>

@endsection