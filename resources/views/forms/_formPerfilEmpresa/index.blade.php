<div class="mb-5">
    <div class="title mb-4"><span class="fs-18 text-black font-w600">Informações
            da Empresa</span></div>
    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="form-group">
                <label>Foto da empresa</label>
                <input name="imagem" type="file" class="form-control">
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="form-group">
                <label>Nome da empresa</label>
                <input name="nomeEmpresa"
                    value="{{ isset($empresaPerfil->nomeEmpresa) ? $empresaPerfil->nomeEmpresa : old('nomeEmpresa') }}"
                    type="text" class="form-control">
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="form-group">
                <label>Nif</label>
                <input type="text" class="form-control" name="nif"
                    value="{{ isset($empresaPerfil->nif) ? $empresaPerfil->nif : old('nif') }}">
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control"
                    value="{{ isset($empresaPerfil->email) ? $empresaPerfil->email : old('email') }}">
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="form-group">
                <label>Número de Telefone</label>
                <div class="input-group input-icon mb-3">
                    <div class="input-group-prepend">

                    </div>
                    <input name="telefone" type="text" class="form-control"
                        placeholder="telefone"
                        value="{{ isset($empresaPerfil->telefone) ? $empresaPerfil->telefone : old('telefone') }}">
                </div>
            </div>
        </div>
    </div>
</div>
