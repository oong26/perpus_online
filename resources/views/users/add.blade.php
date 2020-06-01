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
                    <a href="../user">Users</a>&nbsp;/&nbsp;Add new user
                </ul>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">User</h4>
                        <p class="card-description"> Add new user </p>
                        <form action="store" class="forms-sample" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                            <label for="exampleTextarea1">Address</label>
                            <textarea class="form-control" id="exampleTextarea1" name="address" rows="4"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPhone1">Phone</label>
                            <input type="text" class="form-control" id="exampleInputPhone1" name="phone" placeholder="Number">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="role">
                                <option>Select role</option>
                                @foreach ($role as $item)
                                <option value="{{$item['id_role']}}">{{$item['role']}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Photo Profile</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" name="img_name" placeholder="Upload Image" disabled>
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                              </span>
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