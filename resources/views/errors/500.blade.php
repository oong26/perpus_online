@include('errors.header')
<div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                  <h1 class="display-1 mb-0">500</h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2>SORRY!</h2>
                  <h3 class="font-weight-light">Internal server error!</h3>
                </div>
              @include('errors.footer')