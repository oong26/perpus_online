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
                  <form action="#" method="POST">
                      {{csrf_field()}}
                    <div class="row">
                        <div class="col-3">   
                          <img src="assets/images/dashboard/img_1.jpg"class="img" alt="image" style="width:200px;height:200px;">
                        </div>
                        <div class="col-2">
                          <h4 class="card-title">{{Session::get('name')}}</h4>
                          <span class="text-secondary text-small">{{Session::get('role')}}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" value="{{Session::get('name')}}">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="inputUsername">Phone</label>
                            <input type="text" class="form-control" id="inputUsername" name="phone" placeholder="Phone" value="{{Session::get('phone')}}">
                          </div>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        @include('footer')