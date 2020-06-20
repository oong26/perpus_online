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
          Edit User
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <a href="../">Users</a>&nbsp;/&nbsp;Edit user
        </ul>
      </nav>
      </div>
      <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User</h4>
                  <p class="card-description"> Edit user data </p>
                  @foreach ($users as $data)
                  <form action="../update" class="forms-sample" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_code" value="{{ $data->user_code }}"> 
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleInputName1">Name</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" value="{{$data->name}}">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputUsername">Username</label>
                          <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" value="{{$data->username}}">
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" value="{{$data->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Address</label>
                    <textarea class="form-control" id="exampleTextarea1" name="address" rows="4"> {{$data->address}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPhone1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputPhone1" name="phone" placeholder="Number" value="{{$data->phone}}">
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
                        @if($item['id_role'] == $data->id_role)
                        <option value="{{$item['id_role']}}" selected>{{$item['role']}}</option>
                        @else
                        <option value="{{$item['id_role']}}">{{$item['role']}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Photo Profile</label>
                    <input type="file" name="file" class="file-upload-default" accept="image/x-png,image/jpeg">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" name="img_name" value="{{$data->img}}" placeholder="Upload Image" disabled>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="is_active">Is Active</label>
                    <select class="form-control form-control-lg" id="is_active" name="is_active">
                        <option>Select choice</option>
                        @if($data->is_active == 1)
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                        @elseif($data->is_active == 0)
                        <option value="1">Yes</option>
                        <option value="0" selected>No</option>
                        @else
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        @endif
                    </select>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                  <a href="../" class="btn btn-light">Cancel</a>
                </form>
                  @endforeach
                </div>
              </div>
            </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    @include('footer')