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
                </span> Users 
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <a href="user/add">
                      <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw"><span class="mdi mdi-plus"></span>&nbsp;Add new user</button>
                    </a>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Borrowers</h4>
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
                          @foreach ($users as $data)
                          <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> <img src="{{ url('/uploaded_files/profile_photos/'.$data->img) }}" class="mr-2" alt="image"> {{$data->user_code}} </td>
                            <td> {{$data->name}} </td>
                            <td> {{$data->username}} </td>
                            <td> {{$data->email}} </td>
                            <td> {{$data->address}} </td>
                            <td> {{$data->phone}} </td>
                            <td> {{$data->role}} </td>
                            <td> 
                                <form class="form-group pull-right" action="user/delete/{{$data->user_code}}/{{$data->img}}" method="POST">
                                  {{csrf_field()}}
                                  {{method_field('delete')}}
                                  <a href="user/edit/{{$data->user_code}}"> <span class="mdi mdi-lead-pencil" style="color:#32bf90;"></span></a>
                                  <button type="submit" style="background:none;border:none;color:#007bff;"><span class="mdi mdi-delete" style="color:#32bf90;"></i></button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
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