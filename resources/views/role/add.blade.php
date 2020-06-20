@include('header')
<!-- partial end -->
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
          </span>
          Add new user
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
              <a href="../role">Role</a>&nbsp;/&nbsp;Add new user role
          </ul>
        </nav>
      </div>
      <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User</h4>
                  <p class="card-description"> Add new user role </p>
                  <form action="store" class="forms-sample" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputName1">Role</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="role" placeholder="Role">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="../role" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    @include('footer')