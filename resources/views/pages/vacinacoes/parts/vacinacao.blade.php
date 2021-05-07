<?php
    /**
     * @var Pessoa $model
     */

    use App\Models\Pessoa;

?>

@if($model->id > 0)
    {!! Form::open(['url' => route('vacinacoes.update',$model->id), 'id'=>'validate', 'method' => 'put']) !!}
@else
    {!! Form::open(['url' => route('vacinacoes.store'), 'id' => 'validate']) !!}
@endif
<div class="form-group row">
    {!! Form::label('nome','Nome Completo',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('nome',$model->nome, [ 'id' => 'nome','class' => 'form-control validate[required]']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('cpf','CPF',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('cpf',$model->cpf, [ 'id' => 'cpf','class' => 'form-control maskCpf validate[required]']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('cns','CNS',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('cns',$model->cns, [ 'id' => 'cns','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('data_nascimento','Data de Nascimento',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('data_nascimento',\App\Http\Helpers\DateUtils::DataParaString($model->data_nascimento), [ 'id' => 'data_nascimento','class' => 'form-control maskData validate[required]']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('sexo','Gênero Biológico',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::select('sexo',[null=>'Selecione uma opção','Masculino' => 'Masculino' ,'Feminino' => 'Feminino'],$model->sexo, [ 'id' => 'sexo','class' => 'form-control validate[required]']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('raca_id','Raça/Etnia',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::select('raca_id',[null=>'Selecione uma opção']+$listaRacas,$model->raca_id, [ 'id' => 'raca_id','class' => 'form-control validate[required]']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('telefone','Telefone',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('telefone',$model->telefone, [ 'id' => 'telefone','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('end_rua','Endereço',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('end_rua',$model->end_rua, [ 'id' => 'end_rua','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('end_numero','Número',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('end_numero',$model->end_numero, [ 'id' => 'end_numero','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('end_bairro','Bairro',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('end_bairro',$model->end_bairro, [ 'id' => 'end_bairro','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('end_cep','CEP',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('end_cep',$model->end_cep, [ 'id' => 'end_bairro','class' => 'form-control maskCep']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('end_cidade','Cidade',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('end_cidade',$model->end_cidade, [ 'id' => 'end_cidade','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('end_uf','Estado',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::select('end_uf',[null=>'Selecione uma opção']+$estadosBrasileiros,$model->end_uf, [ 'id' => 'end_uf','class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="card-footer">
    {!! Form::submit('Salvar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
    <a href="{!! route('vacinacoes.index') !!}" class="btn btn-light-primary font-weight-bolder text-uppercase">Voltar</a>
</div>

{!! Form::close() !!}