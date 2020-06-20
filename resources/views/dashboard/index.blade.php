      @include('header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Users <i class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$users}} Users</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Books <i class="mdi mdi-book mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$books}} Books</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Weekly Loaning <i class="mdi mdi-shopping mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$loans}} Books</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Borrowers</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> User </th>
                            <th> Loan Code </th>
                            <th> Book </th>
                            <th> Status </th>
                            <th> Loan Date </th>
                            <th> Return Date </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($loan as $item)
                          <tr>
                            <td> <img src="{{ url('/uploaded_files/profile_photos/'.$item->img) }}" class="mr-2" alt="image"> {{$item->name}} </td>
                            <td>
                              {{$item->loan_code}} 
                            </td>
                            <td>
                              {{$item->title}}
                            </td>
                            <td>
                              {{-- <label class="badge badge-gradient-success">{{$item->status}}</label> --}}
                              @if($item->status == 'Waiting')
                              <label class="badge badge-gradient-warning">{{$item->status}}</label>
                              @elseif($item->status == 'Borrowed')
                              <label class="badge badge-gradient-info">{{$item->status}}</label>
                              @elseif($item->status == 'Returned')
                              <label class="badge badge-gradient-success">{{$item->status}}</label>
                              @endif
                            </td>
                            <td> {{$item->loan_date}} </td>
                            <td> {{$item->return_date}} </td>
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
          <!-- partial:partials/_footer.html -->
          @include('footer')