<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('', 'PagesController@index')->name('home')->middleware('auth');
    Route::get('/home', 'PagesController@index')->name('home')->middleware('auth')->name('home');
    Route::get('/vacinometro', 'PagesController@vacinometro')->name('vacinometro');
    Route::get('/pessoasVacinadas', 'PagesController@pessoasVacinadas')->name('pessoasVacinadas');

    Auth::routes([
        'login'    => TRUE,
        'logout'   => TRUE,
        'register' => FALSE,
        'reset'    => TRUE,   // for resetting passwords
        'confirm'  => FALSE,  // for additional password confirmations
        'verify'   => FALSE,  // for email verification
    ]);


    Route::group(['middleware' => ['auth']], function () {
        Route::resource('usuarios', 'UsuariosController')->except('edit')->middleware('role:admin');
        Route::resource('locais', 'LocaisController')->except('edit')->middleware('role:admin');
        Route::resource('cargos', 'CargosController')->except('edit')->middleware('role:admin');
        Route::resource('vacinas', 'VacinasController')->except('edit')->middleware('role:admin');
        Route::resource('vacinas.lotes', 'LotesController')->except('edit', 'index')->middleware('role:admin');
        Route::resource('audits', 'AuditsController')->only('index')->middleware('role:admin');

        Route::get('perfil', 'PerfilController@show')->name('perfil');
        Route::put('updatePerfil', 'PerfilController@update')->name('perfil.update');

        Route::get('vacinacoes/verificar', 'VacinacoesController@verificar')->name('vacinacoes.verificar')->middleware('role:admin|digitacao');
        Route::resource('vacinacoes', 'VacinacoesController')->except('edit')->middleware('role:admin|digitacao');
        Route::resource('vacinacoes.doses', 'DosesController')->except('edit')->middleware('role:admin|digitacao');

        Route::view('relatorios/geral', 'pages.relatorios.geral', ['page_title' => 'Emissão de relatório geral'])->name('relatorios.geral.view')->middleware('role:admin|externo');
        Route::get('relatorios/geral/gerar', 'RelatoriosController@geral')->name('relatorios.geral.gerar')->middleware('role:admin|externo');
    });



