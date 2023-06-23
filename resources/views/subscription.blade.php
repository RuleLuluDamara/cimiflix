@extends('layouts\main')

<!-- 
        - #SERVICE
      -->
@section('container')
      <section class="service">
        <div class="container">

          <div class="service-banner">
            <figure>
              <img src="{{ asset('images/service-banner.jpg') }}" alt="HD 4k resolution! only Rp 49.999">
            </figure>

            <a href="/payment" class="service-btn" disabled>
              <span>Subscribe Now</span>

              <ion-icon name="download-outline"></ion-icon>
            </a>
          </div>

          <div class="service-content">

            <p class="service-subtitle">Our Services</p>

            <h2 class="h2 service-title">Never Miss an Episode - Download Your Shows for Offline Viewing.</h2>

            <p class="service-text">
              Are you ready to experience the ultimate entertainment? Get ready to indulge in an extraordinary world of captivating shows and thrilling movies. With our exclusive feature, you can now download your favorite shows and watch them offline at your convenience.
            </p>

            <ul class="service-list">

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <ion-icon name="tv"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Enjoy on Your Video.</h3>

                    <p class="card-text">
Immerse yourself in a seamless viewing experience as you explore a vast collection of content                    </p>
                  </div>

                </div>
              </li>

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <ion-icon name="videocam"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Watch Everywhere.</h3>

                    <p class="card-text">
Immerse yourself in a seamless viewing experience as you explore a vast collection of content                    </p>
                  </div>

                </div>
              </li>

            </ul>

          </div>

        </div>
      </section>
    @endsection
