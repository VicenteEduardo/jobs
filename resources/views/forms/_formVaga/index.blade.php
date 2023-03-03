<div class="col-lg-6">
    <label for="name" class="form-label">Título da Vaga</label>
    <input type="text" name="tituloEmprego" class="form-control" id="name" placeholder="Nome" required>
</div>
<div class="col-lg-6">
    <label for="name" class="form-label">Tipo Vaga</label>

    <input type="text" name="tempoEmprego" class="form-control" />
</div>

<div class="col-lg-6">
    <label for="img" class="form-label">Imagem da Empresa</label>
    <input type="file" class="form-control" id="inputGroupPrepend2"
    aria-describedby="inputGroupPrepend2" name="imagemEmprego" />
</div>

<div class="col-lg-6">
    <label for="nivel" class="form-label">Nome da empresa</label>
     <select type="text" name="nomeEmresa" id="sub_category_name" class="form-control border rounded">
                        <option>selecione uma opção</option>
                        @foreach ($minhasEmpresas as $item)
                            <option value="{{ $item->nomeEmpresa }}">
                                {{ $item->nomeEmpresa }}
                            </option>
                        @endforeach
                    </select>
</div>

<div class="col-lg-6">
    <label for="email" class="form-label">Email</label>

    <select type="text" name="emailEmprego" id="email" class="form-control border rounded">
    </select>

</div>

<div class="col-lg-6">
    <label for="username" class="form-label">Nº Telefone</label>

    <select id="sub_category" type="text" name="telefoneEmprego" id="acronym"
    class="form-control border rounded">

</select>
</div>

<div class="col-lg-6">
    <label for="username" class="form-label">Vagas disponíveis</label>


        <input type="number" class="form-control" id="inputGroupPrepend2"
        aria-describedby="inputGroupPrepend2" name="tempoVaga"    maxlength="9" />
</div>

<div class="col-lg-6">
    <label for="data_vaga" class="form-label">Disponível até</label>

    <input type="date" class="form-control" id="inputGroupPrepend2"
    aria-describedby="inputGroupPrepend2" name="dataVaga" />
</div>
<div class="col-lg-12 mb-2">
    <label class="text-label">Descrição do Vaga*</label>
    <div class="form-group">

        <textarea name="descricaoEmpreego" rows="6" id="editor1" class="form-control  "></textarea>
    </div>
</div>

    <div id="wizard_Details" class="tab-pane" role="tabpanel">
        <div class="col-xl-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Predefinir Perfil de canditados</h4>
                </div>
                @include('extra.hablidades.index')
            </div>
        </div>
