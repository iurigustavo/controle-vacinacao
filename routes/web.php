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

    Route::get('', function () {
        return redirect('/agendamento');
    });
    Route::get('/home', 'PagesController@index')->name('home')->middleware('auth')->name('home');
    Route::get('/vacinometro', 'PagesController@vacinometro')->name('vacinometro');
    Route::get('/pessoasVacinadas', 'PagesController@pessoasVacinadas')->name('pessoasVacinadas');

    Route::group(['middleware' => ['web']], function () {
        Route::get('/agendamento', 'Agendamento\AgendamentoController@index')->name('agendamento.index');
        Route::get('/agendamento/passo/dados-pessoais', 'Agendamento\AgendamentoController@passo1')->name('agendamento.dadosPessoais');
        Route::post('/agendamento/passo/dados-pessoais', 'Agendamento\AgendamentoController@validaPasso1')->name('agendamento.postDadosPessoais');
        Route::get('/agendamento/passo/localidade', 'Agendamento\AgendamentoController@passo2')->name('agendamento.localidade');
        Route::post('/agendamento/passo/localidade', 'Agendamento\AgendamentoController@validaPasso2')->name('agendamento.postLocalidade');
        Route::get('/agendamento/passo/data-periodo', 'Agendamento\AgendamentoController@passo3')->name('agendamento.dataPeriodo');
        Route::post('/agendamento/passo/data-periodo', 'Agendamento\AgendamentoController@validaPasso3')->name('agendamento.postDataPeriodo');
        Route::get('/agendamento/passo/confirmacao', 'Agendamento\AgendamentoController@passo4')->name('agendamento.confirmacao');
        Route::post('/agendamento/passo/confirmacao', 'Agendamento\AgendamentoController@validaPasso4')->name('agendamento.postConfirmacao');
        Route::get('/agendamento/confirmacao/{cpf}/{id}', 'Agendamento\ConsultaController@show')->name('agendamento.confirmacao.show');
        Route::any('/agendamento/consulta/', 'Agendamento\ConsultaController@consulta')->name('agendamento.consulta');
    });

    Auth::routes([
        'login'    => true,
        'logout'   => true,
        'register' => false,
        'reset'    => true,   // for resetting passwords
        'confirm'  => false,  // for additional password confirmations
        'verify'   => false,  // for email verification
    ]);


    Route::group(['middleware' => ['auth']], function () {
        Route::resource('usuarios', 'UsuariosController')->except('edit')->middleware('role:admin');
        Route::resource('locais', 'LocaisController')->except('edit')->middleware('role:admin');
        Route::resource('cargos', 'CargosController')->except('edit')->middleware('role:admin');
        Route::resource('vacinas', 'VacinasController')->except('edit')->middleware('role:admin');
        Route::resource('vacinas.lotes', 'LotesController')->except('edit', 'index')->middleware('role:admin');
        Route::resource('agendas', 'AgendasController')->except('edit')->middleware('role:admin');
        Route::get('agendados/compareceu/{agendado}/{sit}', 'AgendadosController@compareceu')->name('agendados.compareceu')->middleware('role:admin|digitacao');
        Route::get('agendados/aplicar-dose/{agendado}', 'AgendadosController@aplicarDose')->name('agendados.aplicarDose')->middleware('role:admin|digitacao');
        Route::resource('agendados', 'AgendadosController')->only(['show', 'index'])->middleware('role:admin|digitacao');
        Route::resource('audits', 'AuditsController')->only('index')->middleware('role:admin');

        Route::get('perfil', 'PerfilController@show')->name('perfil');
        Route::put('updatePerfil', 'PerfilController@update')->name('perfil.update');

        Route::get('vacinacoes/verificar', 'VacinacoesController@verificar')->name('vacinacoes.verificar')->middleware('role:admin|digitacao');
        Route::resource('vacinacoes', 'VacinacoesController')->except('edit')->middleware('role:admin|digitacao');
        Route::resource('vacinacoes.doses', 'DosesController')->except('edit')->middleware('role:admin|digitacao');

        Route::view('relatorios/geral', 'pages.relatorios.geral', ['page_title' => 'Emissão de relatório geral'])->name('relatorios.geral.view')->middleware('role:admin|externo');
        Route::get('relatorios/geral/gerar', 'RelatoriosController@geral')->name('relatorios.geral.gerar')->middleware('role:admin|externo');
    });



