<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Editor;
use App\Http\Middleware\Administrador;


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




/* Grupo de rotas autenticadas */

Route::middleware(['auth'])->group(function () {
    /* Manager Dashboard  */
    route::get('admin/painel', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);



    /* User */
    Route::get('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
    Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show']);
    Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit']);
    Route::put('admin/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update']);
    Route::get('admin/user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy']);
    /* end user */

    /* configuration */
    Route::get('admin/configuration/show', ['as' => 'admin.configuration.show', 'uses' => 'Admin\ConfigurationController@show']);

    Route::get('admin/configuration/edit/{id}', ['as' => 'admin.configuration.edit', 'uses' => 'Admin\ConfigurationController@edit']);
    Route::put('admin/configuration/update/{id}', ['as' => 'admin.configuration.update', 'uses' => 'Admin\ConfigurationController@update']);
    /* end configuration */


    Route::get('admin/registro-empresas/index', ['as' => 'admin.registro.index', 'uses' => 'Admin\RegistroEmpresaController@index']);
    Route::get('admin/registro-empresas/negar/{id}', ['as' => 'admin.registro.negar', 'uses' => 'Admin\RegistroEmpresaController@negar']);
    Route::get('admin/registro-empresas/aprovar/{id}', ['as' => 'admin.registro.aprovar', 'uses' => 'Admin\RegistroEmpresaController@aprovar']);
    Route::get('admin/registro-empresas/pendente/{id}', ['as' => 'admin.registro.pendente', 'uses' => 'Admin\RegistroEmpresaController@pendente']);


    Route::get('admin/categorias/index', ['as' => 'admin.categorias.index', 'uses' => 'Admin\CategoriasVagasController@index']);
    Route::get('admin/categorias/create', ['as' => 'admin.categorias.create', 'uses' => 'Admin\CategoriasVagasController@create']);

    Route::post('admin/categorias/store', ['as' => 'admin.categorias.store', 'uses' => 'Admin\CategoriasVagasController@store']);
    Route::get('admin/categorias/edit/{id}', ['as' => 'admin.categorias.edit', 'uses' => 'Admin\CategoriasVagasController@edit']);
    Route::put('admin/categorias/update/{id}', ['as' => 'admin.categorias.update', 'uses' => 'Admin\CategoriasVagasController@update']);
    Route::get('admin/categorias/delete/{id}', ['as' => 'admin.categorias.delete', 'uses' => 'Admin\CategoriasVagasController@destroy']);



    Route::get('admin/minhas-inscricoes/index', ['as' => 'admin.inscricoesUsuario.index', 'uses' => 'Admin\InscricoesClienteController@index']);
    Route::get('admin/minhas-inscricoes/delete/{id}', ['as' => 'admin.inscricoesUsuario.delete', 'uses' => 'Admin\InscricoesClienteController@destroy']);
    Route::post('admin/minhas-inscricoes/cadastrar', ['as' => 'admin.inscricoesUsuario.cadastrar', 'uses' => 'Admin\InscricoesClienteController@inscricao']);

    Route::get('admin/perfil/index', ['as' => 'admin.perfil.index', 'uses' => 'Admin\PerfilController@index']);
    Route::get('admin/perfil/show/{id}', ['as' => 'admin.perfil.show', 'uses' => 'Admin\PerfilController@show']);
    Route::get('admin/perfil/create', ['as' => 'admin.perfil.create', 'uses' => 'Admin\PerfilController@create']);
    Route::post('admin/perfil/store', ['as' => 'admin.perfil.store', 'uses' => 'Admin\PerfilController@store']);
    Route::get('admin/perfil/edit/{id}', ['as' => 'admin.perfil.edit', 'uses' => 'Admin\PerfilController@edit']);
    Route::put('admin/perfil/update/{id}', ['as' => 'admin.perfil.update', 'uses' => 'Admin\PerfilController@update']);
    Route::get('admin/perfil/delete/{id}', ['as' => 'admin.perfil.delete', 'uses' => 'Admin\PerfilController@destroy']);


    Route::get('admin/inscritos/index', ['as' => 'admin.inscritos.index', 'uses' => 'Admin\InscritosController@index']);
    Route::get('admin/inscritos/curriculo/{id}', ['as' => 'admin.inscritos.curriculo', 'uses' => 'Admin\InscritosController@curriculo']);
    Route::get('admin/inscritos/show/{id}', ['as' => 'admin.inscritos.show', 'uses' => 'Admin\InscritosController@show']);

    Route::post('admin/inscritos/filtrar', ['as' => 'admin.inscritos.filtrar', 'uses' => 'Admin\InscritosController@filtar']);

    Route::get('admin/inscritos/negar/{id}', ['as' => 'admin.inscritos.negar', 'uses' => 'Admin\InscritosController@negar']);
    Route::get('admin/inscritos/aprovar/{id}', ['as' => 'admin.inscritos.aprovar', 'uses' => 'Admin\InscritosController@aprovar']);
    Route::get('admin/inscritos/pendente/{id}', ['as' => 'admin.inscritos.pendente', 'uses' => 'Admin\InscritosController@pendente']);

    Route::get('admin/inscritos/create', ['as' => 'admin.inscritos.create', 'uses' => 'Admin\InscritosController@create']);
    Route::post('admin/inscritos/store', ['as' => 'admin.inscritos.store', 'uses' => 'Admin\InscritosController@store']);
    Route::get('admin/inscritos/edit/{id}', ['as' => 'admin.inscritos.edit', 'uses' => 'Admin\InscritosController@edit']);
    Route::put('admin/inscritos/update/{id}', ['as' => 'admin.inscritos.update', 'uses' => 'Admin\InscritosController@update']);
    Route::get('admin/inscritos/delete/{id}', ['as' => 'admin.inscritos.delete', 'uses' => 'Admin\InscritosController@destroy']);


    Route::get('admin/perfil-empresa/index', ['as' => 'admin.perfilEmpresa.index', 'uses' => 'Admin\EmpresaController@index']);
    Route::get('admin/perfil-empresa/show/{id}', ['as' => 'admin.perfilEmpresa.show', 'uses' => 'Admin\EmpresaController@show']);
    Route::get('admin/perfil-empresa/create', ['as' => 'admin.perfilEmpresa.create', 'uses' => 'Admin\EmpresaController@create']);
    Route::post('admin/perfil-empresa/store', ['as' => 'admin.perfilEmpresa.store', 'uses' => 'Admin\EmpresaController@store']);
    Route::get('admin/perfil-empresa/edit/{id}', ['as' => 'admin.perfilEmpresa.edit', 'uses' => 'Admin\EmpresaController@edit']);
    Route::put('admin/perfil-empresa/update/{id}', ['as' => 'admin.perfilEmpresa.update', 'uses' => 'Admin\EmpresaController@update']);
    Route::get('admin/perfil-empresa/delete/{id}', ['as' => 'admin.perfilEmpresa.delete', 'uses' => 'Admin\EmpresaController@destroy']);

    Route::get('admin/publicar-vagas/index', ['as' => 'admin.publicarVagas.index', 'uses' => 'Admin\PublicarVagaController@index']);
    Route::get('admin/publicar-vagas/show/{id}', ['as' => 'admin.publicarVagas.show', 'uses' => 'Admin\PublicarVagaController@show']);
    Route::get('admin/publicar-vagas/create', ['as' => 'admin.publicarVagas.create', 'uses' => 'Admin\PublicarVagaController@create']);
    Route::post('admin/publicar-vagas/store', ['as' => 'admin.publicarVagas.store', 'uses' => 'Admin\PublicarVagaController@store']);
    Route::get('admin/publicar-vagas/edit/{id}', ['as' => 'admin.publicarVagas.edit', 'uses' => 'Admin\PublicarVagaController@edit']);
    Route::put('admin/publicar-vagas/update/{id}', ['as' => 'admin.publicarVagas.update', 'uses' => 'Admin\PublicarVagaController@update']);
    Route::get('admin/publicar-vagas/delete/{id}', ['as' => 'admin.publicarVagas.delete', 'uses' => 'Admin\PublicarVagaController@destroy']);
    Route::get('admin/publicar-vagas/GetSubCatAgainstMainCatEdit/{id}', ['as' => 'admin.publicarVagas', 'uses' => 'Admin\PublicarVagaController@GetSubCatAgainstMainCatEdit']);

    Route::get('admin/buscar-emprego/detalhes/{id}', ['as' => 'admin.buscar.detalhes', 'uses' => 'Admin\ProcurarEmpregoController@detalhes']);
    Route::get('admin/buscar-emprego/index', ['as' => 'admin.buscar.index', 'uses' => 'Admin\ProcurarEmpregoController@index']);
    Route::get('admin/buscar-emprego/show/{id}', ['as' => 'admin.buscar.show', 'uses' => 'Admin\ProcurarEmpregoController@show']);
    Route::get('admin/buscar-emprego/create', ['as' => 'admin.buscar.create', 'uses' => 'Admin\ProcurarEmpregoController@create']);
    Route::post('admin/buscar-emprego/store', ['as' => 'admin.buscar.store', 'uses' => 'Admin\ProcurarEmpregoController@store']);

    /**registro de actividades */
    Route::get('admin/registro-atividades/detalhes/{id}', ['as' => 'admin.registroActividades.detalhes', 'uses' => 'Admin\RegistroActividadeController@show']);

    Route::get('admin/Vagas-Publicadas/index', ['as' => 'admin.vagasPublicadas.index', 'uses' => 'Admin\VagasPublicadasController@index']);

    Route::get('admin/Vagas-Publicadas/delete/{id}', ['as' => 'admin.vagasPublicadas.delete', 'uses' => 'Admin\VagasPublicadasController@destroy']);


    Route::get('admin/empresas/index', ['as' => 'admin.empresas.index', 'uses' => 'Admin\EmpresasController@index']);
    Route::get('admin/empresas/show/{id}', ['as' => 'admin.empresas.show', 'uses' => 'Admin\EmpresasController@show']);
    Route::get('admin/empresas/create', ['as' => 'admin.empresas.create', 'uses' => 'Admin\EmpresasController@create']);
    Route::post('admin/empresas/store', ['as' => 'admin.empresas.store', 'uses' => 'Admin\EmpresasController@store']);



    //relatorio
    Route::get('admin/relatorio/vagas', ['as' => 'admin.relatorio.vagas', 'uses' => 'Admin\RelatorioController@vaga']);

    Route::get('admin/relatorio/inscritos', ['as' => 'admin.relatorio.inscritos', 'uses' => 'Admin\RelatorioController@inscritos']);

    Route::middleware('Editor')->group(function () {
        /* gallery */
        Route::get('admin/gallery/index', ['as' => 'admin.gallery.index', 'uses' => 'Admin\GalleryController@list']);
        Route::get('admin/gallery/show/{id}', ['as' => 'admin.gallery.show', 'uses' => 'Admin\GalleryController@show']);

        Route::get('admin/gallery/create', ['as' => 'admin.gallery.create', 'uses' => 'Admin\GalleryController@create']);
        Route::post('admin/gallery/store', ['as' => 'admin.gallery.store', 'uses' => 'Admin\GalleryController@store']);

        Route::get('admin/gallery/edit/{id}', ['as' => 'admin.gallery.edit', 'uses' => 'Admin\GalleryController@edit']);
        Route::put('admin/gallery/update/{id}', ['as' => 'admin.gallery.update', 'uses' => 'Admin\GalleryController@update']);

        Route::get('admin/gallery/delete/{id}', ['as' => 'admin.gallery.delete', 'uses' => 'Admin\GalleryController@destroy']);
        /* end gallery */

        /* imageGallery */
        Route::get('admin/imageGallery/create/{id}', ['as' => 'admin.imageGallery.create', 'uses' => 'Admin\ImageGalleryController@create']);
        Route::post('admin/imageGallery/store/{id}', ['as' => 'admin.imageGallery.store', 'uses' => 'Admin\ImageGalleryController@store']);

        Route::get('admin/imageGallery/delete/{id}', ['as' => 'admin.imageGallery.delete', 'uses' => 'Admin\ImageGalleryController@destroy']);
        /* E


        /* slideshow */
        Route::get('admin/slideshow/index', ['as' => 'admin.slideshow.index', 'uses' => 'Admin\SlideShowController@list']);
        Route::get('admin/slideshow/show/{id}', ['as' => 'admin.slideshow.show', 'uses' => 'Admin\SlideShowController@show']);

        Route::get('admin/slideshow/create', ['as' => 'admin.slideshow.create', 'uses' => 'Admin\SlideShowController@create']);
        Route::post('admin/slideshow/store', ['as' => 'admin.slideshow.store', 'uses' => 'Admin\SlideShowController@store']);

        Route::get('admin/slideshow/edit/{id}', ['as' => 'admin.slideshow.edit', 'uses' => 'Admin\SlideShowController@edit']);
        Route::put('admin/slideshow/update/{id}', ['as' => 'admin.slideshow.update', 'uses' => 'Admin\SlideShowController@update']);

        Route::get('admin/slideshow/delete/{id}', ['as' => 'admin.slideshow.delete', 'uses' => 'Admin\SlideShowController@destroy']);
        /* end slideshow */


        /* news */
        Route::get('admin/news/index', ['as' => 'admin.news.index', 'uses' => 'Admin\NewsController@list']);
        Route::get('admin/news/show/{id}', ['as' => 'admin.news.show', 'uses' => 'Admin\NewsController@show']);

        Route::get('admin/news/create', ['as' => 'admin.news.create', 'uses' => 'Admin\NewsController@create']);
        Route::post('admin/news/store', ['as' => 'admin.news.store', 'uses' => 'Admin\NewsController@store']);

        Route::get('admin/news/edit/{id}', ['as' => 'admin.news.edit', 'uses' => 'Admin\NewsController@edit']);
        Route::put('admin/news/update/{id}', ['as' => 'admin.news.update', 'uses' => 'Admin\NewsController@update']);

        Route::get('admin/news/delete/{id}', ['as' => 'admin.news.delete', 'uses' => 'Admin\NewsController@destroy']);
        /* end news */





        /* senra */
        Route::get('admin/senra/show', ['as' => 'admin.senra.show', 'uses' => 'Admin\SenraController@show']);

        Route::get('admin/senra/edit/{id}', ['as' => 'admin.senra.edit', 'uses' => 'Admin\SenraController@edit']);
        Route::put('admin/senra/update/{id}', ['as' => 'admin.senra.update', 'uses' => 'Admin\SenraController@update']);
        /* end senra */

        /* about */
        Route::get('admin/about/show', ['as' => 'admin.about.show', 'uses' => 'Admin\AboutController@show']);
        Route::get('admin/about/edit/{id}', ['as' => 'admin.about.edit', 'uses' => 'Admin\AboutController@edit']);
        Route::put('admin/about/update/{id}', ['as' => 'admin.about.update', 'uses' => 'Admin\AboutController@update']);
        /* end about */
    });
});
