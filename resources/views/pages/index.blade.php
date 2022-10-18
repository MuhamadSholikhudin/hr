@extends('layouts.main')

@section('container')    

    
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="formonline">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">FORM ONLINE <?= $url_p ?></h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                <!-- <div class="portfolio-item mx-auto" data-bs-toggle="modal">-->
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <a class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></a>
                        </div>
                        <img class="img-fluid" src="<?= $base_url ?>/templates/assets/img/portfolio/EXIT INTERVIEW.png" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 2-->		
                
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?= $base_url ?>/templates/assets/img/portfolio/RESIGN ONLINE.png" alt="..." />
                    </div>
                </div>
                
                <!-- Portfolio Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?= $base_url ?>/templates/assets/img/portfolio/CETAK DOWNLOAD.png" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 4-->
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?= $base_url ?>/templates/assets/img/portfolio/KONSELING.png" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 5-->
                <div class="col-md-6 col-lg-4 mb-5 mb-md-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal">
                    <!-- <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal5"> -->
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <a href="http://web.ad.hsinni.com/hwi/gnx/index.html" class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></a>
                        </div>
                        <img class="img-fluid" src="<?= $base_url ?>/templates/assets/img/portfolio/Cuti Online.png" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Item 6-->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal6">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?= $base_url ?>/templates/assets/img/portfolio/We Are Hiring.png" alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section text-white mb-0" id="information" style="background-color: rgb(50, 102, 199);">
        <div class="container" style="background-color: rgb(50, 102, 199);">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">INFORMATION</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa fa-bullhorn"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
        <!--   <div class="col-lg-4 ms-auto"><p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p></div>
                <div class="col-lg-4 me-auto"><p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p></div> -->  
        <!-- Portfolio Information-->
            <!-- Portfolio Information 1-->
            <div class="col-md-6 col-lg-3 mb-5 mb-md-5">
                    <img class="img-fluid" src="<?= $base_url?>/templates/assets/img/portfolio/SERVICE ORDER.png" >
                    </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-md-5">
                    <img class="img-fluid" src="<?= $base_url?>/templates/assets/img/portfolio/SERVICE ORDER.png" >
                    </div>                        
            <div class="col-md-6 col-lg-3 mb-5 mb-md-5">
                    <img class="img-fluid" src="<?= $base_url?>/templates/assets/img/portfolio/SERVICE ORDER.png" >
                    </div>    
            <div class="col-md-6 col-lg-3 mb-5 mb-md-5">
                <img class="img-fluid"  src="<?= $base_url?>/templates/assets/img/portfolio/SERVICE ORDER.png" >
                    </div>                                     
            </div>
        </div>
    </section>

    @if (session()->has('resignfailed'))
        <?= session('resignfailed') ?>
    @elseif(session()->has('danger'))

    {{ session('danger') }}

    @else

    @endif

    

@endsection