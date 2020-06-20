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
                    @foreach($data as $item)
                  <form action="profile/update" method="POST">
                      {{csrf_field()}}
                    <div class="row">
                        <div class="col-3">   
                          <img src="assets/images/dashboard/img_1.jpg"class="img" alt="image" style="width:200px;height:200px;">
                        </div>
                        <div class="col-2">
                          <h4 class="card-title">{{$item->name}}</h4>
                          <span class="text-secondary text-small">{{$item->role}}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Name" value="{{$item->name}}">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" value="{{$item->username}}">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="exampleInputPhone">Phone</label>
                            <input type="number" class="form-control" id="exampleInputPhone" name="phone" placeholder="Phone" value="{{$item->phone}}">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$item->email}}">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Address</label>
                      <textarea class="form-control" id="exampleTextarea1" name="address" rows="4">{{$item->address}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="dashboard" class="btn btn-light">Cancel</a>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        @include('footer')