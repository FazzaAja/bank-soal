@extends('tamplate.layout')

@section('content')


<!-- SignIn modal content -->
<div id="login-modal" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="login-modal">
<div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
    <div class="modal-body">
        <div class="text-center mt-2 mb-4">
        <a href="#" class="text-success">
            <h2><b>Bank <span class="text-primary">Soal</span></b></h2>
        </a>
        </div>

        <form class="ps-3 pr-3" method="POST" action="{{ route('login') }}">
            @csrf
        <div class="mb-3">
            <label for="emailaddress1">Email address</label>
            <input class="form-control" name="email" type="email" id="emailaddress1" required=""
            placeholder="john@deo.com" />
        </div>

        <div class="mb-3">
            <label for="password1">Password</label>
            <input class="form-control" name="password" type="password" required="" id="password1"
            placeholder="Enter your password" />
        </div>

        <div class="mb-3">
            <div class="form-check">
            <input type="checkbox" class="form-check-input" id="customCheck2" />
            <label class="form-check-label" for="customCheck2">Remember me</label>
            </div>
        </div>

        <div class="mb-3 text-center">
            <button class="btn btn-rounded btn-light-info text-info font-medium" type="submit">
            Sign In
            </button>
        </div>
        </form>
    </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
    
<!-- Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-xl navbar-light container-fluid  px-0">
        <ul class="navbar-nav">
            <li class="nav-item d-none d-xl-block">
                <a href="#" class="text-nowrap nav-link">
                    <h2><b>Bank <span class="text-primary">Soal</span></b></h2>
                </a>
            </li>
        </ul>

        <div class="d-block d-xl-none">
            <a href="index.html" class="text-nowrap nav-link">
                <h2><b>Bank <span class="text-primary">Soal</span></b></h2>
            </a>
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
                <div class="d-flex align-items-center">
                    <div class="user-profile-img">
                        <i class="ti ti-user large-icon" style="font-size: 24px;"></i>
                    </div>
                </div>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    @auth
                    <li class="nav-item dropdown">
                        {{ Auth::user()->name }}
                    </li>    
                    @endauth
                    
                    <li class="nav-item dropdown">

                      @auth
                      <a class="nav-link pe-0" href="dashboard  ">
                          <div class="d-flex align-items-center">
                              <div class="user-profile-img">
                                  <i class="ti ti-user large-icon" style="font-size: 24px;"></i>
                              </div>
                          </div>
                      </a>
                          
                      @else
                      <!-- Custom width modal -->
                      <button type="button" class="nav-link pe-0" id="login-modal"
                      data-bs-toggle="modal" data-bs-target="#login-modal">
                      <div class="d-flex align-items-center">
                          <div class="user-profile-img">
                              <i class="ti ti-user large-icon" style="font-size: 24px;"></i>
                          </div>
                      </div>
                      </button>

                      @endauth

                     
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->
<!-- Main wrapper -->
<div class=" body-wrapper ">
    <div class=" container-fluid ">

        <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
                <a href="javascript:void(0)" class="card bg-info text-center text-white w-100 card-hover py-5">
                  <div class="card-body">
                    <div class="align-items-center">
                        <i class="ti ti-upload" style="font-size: 3rem;"></i>
                    </div>
                    <div class="mt-4">
                      <h4 class="card-title mb-1 text-white" style="font-size: 1.5rem">Upload Soal</h4>
                      <h6 class="card-text fw-normal text-white-50" style="font-size: 1.1rem">
                        Upload soal yang UTS & UAS yang dimiliki
                      </h6>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-6 d-flex align-items-stretch">
                <a href="javascript:void(0)" class="card bg-info text-center text-white w-100 card-hover py-5">
                  <div class="card-body">
                    <div class="align-items-center">
                        <i class="ti ti-search" style="font-size: 3rem;"></i>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white" style="font-size: 1.5rem">Search Soal</h4>
                        <h6 class="card-text fw-normal text-white-50" style="font-size: 1.1rem">
                          Search soal yang UTS & UAS yang pelajari
                        </h6>
                    </div>
                  </div>
                </a>
              </div>
        </div>

    </div>

    <footer class="footer-part pt-9 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="text-center">

                        <p class="mb-0 text-dark">All rights reserved by ...
                            <!-- Designed & Developed by <a
                                class="text-dark text-hover-primary border-bottom border-primary"
                                href="https://adminmart.com/">AdminMart.</a> -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
</div>


@endsection