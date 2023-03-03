@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')

    <link href="/dashboard/public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/dashboard/public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet"
        type="text/css" />

    <div class="content-body">
        <form method="POST" action="{{ route('admin.perfil.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card profile-card">
                                    <div class="card-header flex-wrap border-0 pb-0">
                                        <h3 class="fs-24 text-black font-w600 mr-auto mb-2 pr-3">Editar Perfil</h3>

                                        <button type="submit" class="btn btn-primary btn-rounded mb-2"> Salvar
                                            Alterações</button>

                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-body">

                                        <div class="mb-5">
                                            <div class="title mb-4"><span class="fs-18 text-black font-w600">Informações
                                                    Pessoais</span></div>
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Foto Passe</label>
                                                        <input name="fotoPerfil" type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nome completo</label>
                                                        <input name="nomeCliente"
                                                            value="{{ isset($perfilCliente->nomeCliente) ? Auth::user()->name : Auth::user()->name }}"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Número de BI</label>
                                                        <input type="text" class="form-control" name="bi"
                                                            value="{{ isset($perfilCliente->bi) ? $perfilCliente->bi : old('bi') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Data de Nascimento</label>
                                                        <input name="dataNascimento" type="date" class="form-control"
                                                            placeholder=""
                                                            value="{{ isset($perfilCliente->dataNascimento) ? $perfilCliente->dataNascimento : old('dataNascimento') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nacionalidade</label>
                                                        <input name="nacionalidade" type="texte" class="form-control"
                                                            value="{{ isset($perfilCliente->nacionalidade) ? $perfilCliente->nacionalidade : old('nacionalidade') }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Residência Atual</label>
                                                        <input name="residencia" type="texte" class="form-control"
                                                            value="{{ isset($perfilCliente->residencia) ? $perfilCliente->residencia : old('residencia') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <div class="title mb-4"><span
                                                    class="fs-18 text-black font-w600">CONTACTOS</span></div>
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Número de Telefone</label>
                                                        <div class="input-group input-icon mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i
                                                                        class="fa fa-phone"
                                                                        aria-hidden="true"></i></span>
                                                            </div>
                                                            <input name="telefone" type="text" class="form-control"
                                                                placeholder="Telefone"
                                                                value="{{ isset($perfilCliente->telefone) ? $perfilCliente->telefone : old('residencia') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Whatsapp</label>
                                                        <div class="input-group input-icon mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon2"><i
                                                                        class="fa fa-whatsapp"
                                                                        aria-hidden="true"></i></span>
                                                            </div>
                                                            <input name="whatssap" type="text" class="form-control"
                                                                placeholder="Telefone"
                                                                value="{{ isset($perfilCliente->whatssap) ? $perfilCliente->whatssap : old('whatssap') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <div class="input-group input-icon mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon3"><i
                                                                        class="las la-envelope"></i></span>
                                                            </div>
                                                            <input name="email" type="text" class="form-control"
                                                                placeholder="Enter email"
                                                                value="{{ isset($perfilCliente->email) ? Auth::user()->email : Auth::user()->email }}">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <div class="title mb-4"><span
                                                    class="fs-18 text-black font-w600">Habilitações literárias</span></div>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label>Descreve a que</label>
                                                        <textarea name="ablilitacoesLiteriais" class="form-control"
                                                            rows="6">
                                                             {{ isset($perfilCliente->ablilitacoesLiteriais)? $perfilCliente->ablilitacoesLiteriais: old('ablilitacoesLiteriais') }}
                                       </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>


                                            <div class="mb-5">
                                                <div class="title mb-4"><span
                                                        class="fs-18 text-black font-w600">Formação profissional</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label>Descreve a que</label>
                                                            <textarea name="formacacaoProfissional" class="form-control"
                                                                rows="6">
                                                                        {{ isset($perfilCliente->formacacaoProfissional)? $perfilCliente->formacacaoProfissional: old('formacacaoProfissional') }}
                                           </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>

                                                <div class="mb-5">
                                                    <div class="title mb-4"><span
                                                            class="fs-18 text-black font-w600">Experiências
                                                            profissionais</span></div>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="form-group">
                                                                <label>Descreve a que</label>
                                                                <textarea name="explerienciaProfissional"
                                                                    class="form-control" rows="6">
                                                                            {{ isset($perfilCliente->explerienciaProfissional)? $perfilCliente->explerienciaProfissional: old('explerienciaProfissional') }}
                                               </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>



                                                    <div class="mb-5">
                                                        <div class="title mb-4"><span
                                                                class="fs-18 text-black font-w600">Idiomas </span></div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="form-group">
                                                                    <label>Descreve a que</label>
                                                                    <textarea name="idiomas" class="form-control"
                                                                        rows="6">
                                                                                {{ isset($perfilCliente->idiomas) ? $perfilCliente->idiomas : old('idiomas') }}
                                                   </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>

                                                        <div class="mb-5">
                                                            <div class="title mb-4"><span
                                                                    class="fs-18 text-black font-w600">Predefinir Hablidades
                                                                </span></div>
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="form-group">
                                                                        <label>Descreve a que</label>
                                                                        @include(
                                                                            'extra.hablidades.index'
)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>

                                                        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>

    </div>
@endsection
