{{-- Extends layout --}}
@extends('adminlte::page')


{{-- Content --}}
@section('content')
    <div class="card card-custom gutter-b">
        <iframe id="painelVacinometroSaude" height="3700px"
                src="{{route('vacinometro')}}"
                width="100%" style="border: none"></iframe>
    </div>
@endsection