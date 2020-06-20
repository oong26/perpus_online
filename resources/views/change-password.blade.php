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
              </span> User Profile
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form action="change-password/update" method="POST">
                      {{csrf_field()}}
                    <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="exampleInputOldPassword">Old Password</label>
                            <input type="password" class="form-control" id="exampleInputOldPassword" name="old_password" placeholder="Old Password">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="exampleInputNewPassword">New Password</label>
                            <input type="password" class="form-control" id="exampleInputNewPassword" name="new_password" placeholder="New Password">
                          </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="dashboard" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        @include('footer')