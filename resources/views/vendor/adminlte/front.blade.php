@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('resources.resources.css') as $style)
        <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach
    @stack('css')
    @yield('css')
@stop

@section('classes_body', 'layout-top-nav')

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{route('agendamento.index')}}" class="navbar-brand">
                    <img src="/vendor/adminlte/dist/img/AdminLTELogo.png" alt="{{env('APP_NAME')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('agendamento.index')}}" class="nav-link">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('agendamento.consulta')}}" class="nav-link">Consultar Agendamento</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @if(!empty($page_title))
                        <h1 class="m-0 text-dark">{{$page_title}}</h1>
                    @endif
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="container">
                    @yield('content')
                </div>
            </div>

        </div>

        @include('adminlte::partials.footer.footer')

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop
@section('adminlte_js')
    {{-- Global Theme JS Bundle (used by all pages)  --}}
    @foreach(config('resources.resources.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    @include('sweetalert::alert')
    @stack('datatables')
    @stack('js')
    @yield('js')
    <script>
        jQuery(document).ready(function () {
            jQuery("#validate").validationEngine();
        });
    </script>
@stop


