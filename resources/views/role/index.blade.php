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
              </span> Role 
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                  <a href="role/add">
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw"><span class="mdi mdi-plus"></span>&nbsp;Add new role</button>
                  </a>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Role</h4>
                  <div class="table-responsive">
                    <table  id="example" class="table">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Role </th>
                          <th> Options </th>
                        </tr>
                      </thead>
                      <tbody>
<<<<<<< HEAD
                        
=======
                      @foreach($data as $role)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$role['role']}}</td>
                          <td>
                            <form class="form-group pull-right" action="#" method="POST">
                              {{csrf_field()}}
                              {{method_field('delete')}}
                              <a href="#"> <span class="mdi mdi-lead-pencil" style="color:#32bf90;"></span></a>
                              <button type="submit" style="background:none;border:none;color:#007bff;"><span class="mdi mdi-delete" style="color:#32bf90;"></i></button>
                            </form>
                            {{-- <a href="#"}}> <span class="mdi mdi-delete"></span></a> --}}
                          </td>
                        </tr>
                      @endforeach
>>>>>>> e216efe80d837f43bd829d6c59461772391b640b
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