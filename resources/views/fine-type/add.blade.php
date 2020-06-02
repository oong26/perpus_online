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
          Add new fine type
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
              <a href="../role">Role</a>&nbsp;/&nbsp;Add new fine type
          </ul>
        </nav>
      </div>
      <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fine Type</h4>
                  <p class="card-description"> Add new fine type </p>
                  <form action="store" class="forms-sample" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputName1">Fine</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="fine" placeholder="Fine">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName2">Type</label>
                          <input type="text" class="form-control" id="exampleInputName2" name="type" placeholder="Type">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="../user" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    @include('footer')