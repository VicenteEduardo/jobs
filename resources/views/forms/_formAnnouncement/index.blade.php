

<div class="col-md-12">
    <div class="form-group">
        <label for="title">Titulo do Comunicado</label>
        <input type="text" name="title" id="title" value="{{ isset($Annoucent->title) ? $Annoucent->title : '' }}"
            class="form-control border-secondary" placeholder="Titulo do Comunicado" required>
    </div>
</div> <!-- /.col -->
<div class="col-md-12">
    <div class="form-group">
        <label for="file">Selecione o ficheiro</label>
        <input type="file" name="file" id="file" value="{{ isset($Annoucent->file) ? $Annoucent->file : '' }}"
            class="form-control border-secondary">
    </div>
</div> <!-- /.col -->
