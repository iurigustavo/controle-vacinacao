{{-- Extends layout --}}
@extends('layout.default')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- Content --}}
@section('content')
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    {!! $data['title'] !!} <i class="mr-2"></i>
                    <small class="">{!! $data['subTitle'] !!}</small>
                </h3>


            </div>
            <div class="card-toolbar">
                <div class="btn-group">
                    @if(isset($data['btnCancelar']))

                        <a href="{!! route($data['btnCancelar'])!!}">
                            <button type="button" class="btn btn-light-success font-weight-bold mr-2">
                                <i class="fa fa-backward"></i>Cancelar
                            </button>
                        </a>

                    @else

                        <a href="javascript:history.back(-1)">
                            <button type="button" class="btn btn-light-success font-weight-bold mr-2">
                                <i class="fa fa-backward"></i>Cancelar
                            </button>
                        </a>

                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            @include($data['ViewFormulario'])
        </div>
    </div>


@endsection