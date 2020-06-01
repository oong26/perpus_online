@include('header')
<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('sidebar')
      <!-- partial end -->
      <!-- content-wrapper start -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-group"></i>
              </span> Fine type 
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                  <a href="fine-type/add">
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw"><span class="mdi mdi-plus"></span>&nbsp;Add new fine type</button>
                  </a>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fine type</h4>
                  <div class="table-responsive">
                    <table  id="example" class="table">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> User Code </th>
                          <th> Name </th>
                          <th> Username </th>
                          <th> Email </th>
                          <th> Address </th>
                          <th> Phone </th>
                          <th> Role </th>
                          <th> Options </th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        @include('footer')