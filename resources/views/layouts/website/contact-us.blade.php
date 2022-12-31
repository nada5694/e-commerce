@extends('layouts.website.master')

@section('title')
contact us
@endsection

@section('content')
    <div class="page-heading bg-light">
        <div class="container">
        <div class="row align-items-end text-center">
            <div class="col-lg-7 mx-auto">
            <h1>Elements</h1>
            <p class="mb-4"><a href="index.html">Home</a> / <strong>Elements</strong></p>
            </div>
        </div>
        </div>
    </div>

    <div class="fashion_gate-section">
        <div class="container">

        <div class="row mb-5">
            <div class="col-lg-4 mb-5 order-2 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-info">

                <div class="address mt-4">
                {{-- <i class="icon-room"></i> --}}
                <i class="fa-solid fa-location-dot"></i>
                <h4 class="mb-2">Location:</h4>
                <p>43 Raymouth Rd. Baltemoer, London 3910</p>
                </div>

                <div class="open-hours mt-4">
                {{-- <i class="icon-clock-o"></i> --}}
                <i class="fa-regular fa-clock"></i>
                <h4 class="mb-2">Open Hours:</h4>
                <p>
                    Sunday-Friday:<br>
                    11:00 AM - 2300 PM
                </p>
                </div>

                <div class="email mt-4">
                {{-- <i class="icon-envelope"></i> --}}
                <i class="fa-solid fa-at"></i>
                <h4 class="mb-2">Email:</h4>
                <p>info@untree.co</p>
                </div>

                <div class="phone mt-4">
                {{-- <i class="icon-phone"></i> --}}
                <i class="fa-solid fa-phone"></i>
                <h4 class="mb-2">Call:</h4>
                <p>+1 1234 55488 55</p>
                </div>

            </div>
            </div>
            <div class="col-lg-7 mr-auto order-1" data-aos="fade-up" data-aos-delay="200">
            <form action="#">
                <div class="row">
                <div class="col-6 mb-3">
                    <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="col-6 mb-3">
                    <input type="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="col-12 mb-3">
                    <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="col-12 mb-3">
                    <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>

                <div class="col-12">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                </div>
                </div>
            </form>
            </div>
        </div>


        </div>
    </div> <!-- /FASHION GATE -->

    <div class="fashion_gate-section bg-light">
        <div class="container">
        <div class="row align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
            <div class="feature h-100">
                <div class="icon mb-4">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z"/>
                    <path fill-rule="evenodd" d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                    <path fill-rule="evenodd" d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                </svg>
                </div>
                <h3>Worldwide Delivery</h3>
                <p>Far far away, behind the word mountains, far from the countries.</p>
            </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
            <div class="feature h-100">
                <div class="icon mb-4">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                    <path d="M9.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M7.411 8.034a.5.5 0 0 1 .493-.417h.156a.5.5 0 0 1 .492.414l.347 2a.5.5 0 0 1-.493.585h-.835a.5.5 0 0 1-.493-.582l.333-2z"/>
                </svg>
                </div>
                <h3>Secure Payments</h3>
                <p>Far far away, behind the word mountains, far from the countries.</p>
            </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
            <div class="feature h-100">
                <div class="icon mb-4">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.83 6.706a5 5 0 0 0-7.103-3.16.5.5 0 1 1-.454-.892A6 6 0 1 1 2.545 5.5a.5.5 0 1 1 .91.417 5 5 0 1 0 9.375.789z"/>
                    <path fill-rule="evenodd" d="M7.854.146a.5.5 0 0 0-.708 0l-2.5 2.5a.5.5 0 0 0 0 .708l2.5 2.5a.5.5 0 1 0 .708-.708L5.707 3 7.854.854a.5.5 0 0 0 0-.708z"/>
                </svg>
                </div>
                <h3>Simple Returns</h3>
                <p>Far far away, behind the word mountains, far from the countries.</p>
            </div>
            </div>
        </div>
        </div>
    </div> <!-- /FASHION GATE -->

@endsection
