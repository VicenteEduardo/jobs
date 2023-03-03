@if (session('create'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Conta criada com sucesso!',
            showConfirmButton: true
        })
    </script>
    @endif
<!-- ======= INÍCIO DO RODAPÉ ======= -->
<footer id="footer" class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row gy-5">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <img src="site/assets/img/empresas/itel.png" alt="">
            <span>PAP - 2022/2023</span>
          </a>
          <p> <strong>Plataforma de Busca de Empregos</strong><br>
            criado com objectivo de facilitar as pessoas <br>
            que procuram emprego.
          </p>
          <div class="social-links mt-3">
            <div class="d-inline-flex" data-aos="fade-up" data-aos-delay="100">
              <a href="#" class="facebook"><i class="bi bi-twitter"></i></a>
            </div>
            <div class="d-inline-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#" class="twitter"><i class="bi bi-facebook"></i></a>
            </div>
            <div class="d-inline-flex" data-aos="fade-up" data-aos-delay="300">
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
            <div class="d-inline-flex" data-aos="fade-up" data-aos-delay="400">
              <a href="#" class="linkedin"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Nossos Serviços</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Cadastrar empresas</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Publicitar empresas</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Disponibilizar vagas</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Relacionados</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">JobAtris</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Itel Vagas</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">AngoEmpregos</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contactos</h4>
          <p>
            Bairro Tala Hady <br>
            Cazenga, Luanda<br>
            Angola <br><br>
            <strong>Telefone:</strong> +244 xxx xxx xxx<br>
            <strong>Email:</strong>example@gmail.com<br>
          </p>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>Plataforma de Busca de Empregos</span></strong>.
      Todos os direitos reservados
    </div>
    <div class="credits">
      Desenvolvido por <a href="https://www.facebook.com/">Ariclene Gaspar</a> & <a href="https://www.facebook.com/">Mário Costa</a>
      <br> Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- FIM DO RODAPÉ -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="site/assets/vendor/purecounter/purecounter.js"></script>
<script src="site/assets/vendor/aos/aos.js"></script>
<script src="site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="site/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="site/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="site/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="site/assets/js/main.js"></script>

</body>

</html>
