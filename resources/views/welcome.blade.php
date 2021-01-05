    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
       @extends('layouts.homepage')
       @section('content')
        <!-- Masthead-->


        <header class="masthead">

            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">YASMEEN THAI FOOD FOR STOCK MANAGEMENT SYSTEM</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">we built this system for save time and cost to Yasmeen Restaurant for identify stocking.</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>

                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Yasmeen Thai Food Restaurant </h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">Yasmeen Thai food restaurant was opened in 1995 and the first opening was by dentist Dr. Abdulkadir Yusoh. Now the Yasmeen Thai food restaurant is passing through in its second generation who runs restaurant, Dr. Sakeenah Yusoh in Yala, Suan Khwan Muang is the first branch. That is the brief of Yasmeen Thai food restaurant and the restaurant is going develop step by step as possible to the best and suitable to our Muslim culture.</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">See More!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">{{__('YM STOCKS Services')}}</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-business-time text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Save Time</h3>
                            <p class="text-muted mb-0">Users no need to calculate the result of the stocks by themselves and the system will be calculate.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Accessible</h3>
                            <p class="text-muted mb-0">This system is built in the form of a Web Application and users can access the system by browser or device from anywhere.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-life-ring text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Save Cost</h3>
                            <p class="text-muted mb-0">Users can complete stocktaking without any documents.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-file-invoice text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Safe Information</h3>
                            <p class="text-muted mb-0">All of the information in the server and can make sure it will not lose.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="../img/ymym.jpg"
                            ><img class="img-fluid" src="../img/ymym.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="../img/6.jpg"
                            ><img class="img-fluid" src="../img/6.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="../img/3.jpg"
                            ><img class="img-fluid" src="../img/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="../img/4.jpg"
                            ><img class="img-fluid" src="../img/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="../img/5.jpg"
                            ><img class="img-fluid" src="../img/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="../img/1.jpg"
                            ><img class="img-fluid" src="../img/1.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>073-222-300</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i
                        ><!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a class="d-block" href="mailto:yasmeenrestaurant@hotmail.com">yasmeenrestaurant@hotmail.com</a>
                    </div>
                </div>
            </div>
        </section>
     @endsection
    </html>
