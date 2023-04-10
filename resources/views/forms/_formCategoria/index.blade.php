<div class="col-lg-12">
    <input type="text" name="categoria"
        value="{{ isset($categoria->categoria) ? $categoria->categoria : old('categoria') }}"
        class="form-control" id="categoria" placeholder="Nome da Categoria" required>
    <div class="invalid-feedback">Por favor, digite o nome da categoria!</div>
</div>
