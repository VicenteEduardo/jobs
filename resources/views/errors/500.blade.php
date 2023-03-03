 @extends('layouts.merge.site')
 @section('titulo', 'Error 500')
 @section('content')

     <!-- ====== Banner Start ====== -->
     <section class="ud-page-banner">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="ud-banner-content">
                         <h1>500</h1>
                         <p class="text-white">Aconteceu um erro no servidor</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- ====== Banner End ====== -->

     <!-- ====== Error 404 Start ====== -->
     <section class="ud-404">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="ud-404-wrapper">
                         <div class="ud-404-content">
                             <h2 class="ud-404-title">500 - Aconteceu um erro no servidor.</h2>
                             <h5 class="ud-404-subtitle">Talvez você possa encontrar o que precisa aqui?
                             </h5>
                             <ul class="ud-404-links">
                                 <li>
                                     <a href="{{ route('site.home') }}">Home</a>
                                 </li>

                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- ====== Error 404 End ====== -->

 @endsection
