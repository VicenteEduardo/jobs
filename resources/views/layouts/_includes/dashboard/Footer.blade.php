</main><!-- End #main -->

<!-- container-scroller -->
@if (session('create'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cadastrado com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('destroy'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Eliminado com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('encontrado'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Já envio candidatura para esta vaga!',
            showConfirmButton: true
        })
    </script>
@elseif(session('update'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Atulização realizada com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('edit'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Alterações foram salvas com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('create_image'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Imagens foram salvas com sucesso!',
            showConfirmButton: true
        })
    </script>
@elseif(session('NoAuth'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Não tem autorização para visualizar esta página!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@elseif(session('curriculoError'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Curriculo não encontrado!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif

@if(session('aprovado'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Este candidato já tem o Staus Aprovado!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif
@if(session('Pendente'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Este candidato já tem o Staus Pendente!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif

@if(session('Pendente'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Este candidato já tem o Staus Pendente!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif
@if(session('Negado'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Este candidato já tem o Staus Negado!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif
@if(session('error_vagas'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Já não existe vagas disponivel para esta vaga!',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif



@if (isset($perfil) && $perfil <= 0)
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Termine de Preencher o seu Perfil para candidatar-se a uma vaga!',
            showConfirmButton: true
        })
    </script>
@endif
@if (isset($empresas) && $empresas <= 0)
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Termine de Preencher os dados da sua empresa para poder publicar uma vaga!',
            showConfirmButton: true
        })
    </script>
@endif

<script>
    $(document).ready(function() {

        $('#deleteCategoryBtn').click(function(e) {
            e.preventDefault();
            var category_id = $(this).val();
            console.log(category_id);
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show');

        });
    });
</script>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>Sistema de Gestão de Candidaturas</span></strong>. Todos os direitos reservados
  </div>
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/chart.js/chart.min.js') }} "></script>
<script src="{{ asset('dashboard/vendor/echarts/echarts.min.js') }} "></script>
<script src="{{ asset('dashboard/vendor/quill/quill.min.js') }}  "></script>
<script src= "{{ asset('dashboard/vendor/simple-datatables/simple-datatables.js') }} "></script>
<script src="{{ asset('dashboard/vendor/tinymce/tinymce.min.js') }}  "></script>

<!-- Template Main JS File -->
<script src="{{ asset('dashboard/js/main.js') }}"></script>

</body>

</html>
