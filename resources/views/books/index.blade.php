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
                </span> Library 
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <a href="book/add">
                      <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw"><span class="mdi mdi-plus"></span>&nbsp;Add new book</button>
                    </a>
                </ul>
              </nav>
            </div>
            <div class="row mb-2">
                @foreach ($books as $data)
                <div class="col-3 mb-4">       
                  <div class="card h-100">
                    <img class="img-book-cover" src="{{asset('uploaded_files/book_cover/'.$data['cover'])}}" alt="Book cover">
                    <div class="card-body" style="padding:20px !important;"> 
                      <a href="{{url('book/detail',$data['book_code'])}}"><h4 class="card-title">{{$data['title']}}</h4></a>
                      <div class="card-subtitle text-muted font-weight-light mb-2">
                        <i class="mdi mdi-account-outline icon-sm"></i>
                        <span class="mr-2">{{$data['author']}}</span>&nbsp;
                        <i class="mdi mdi-clock icon-sm"></i>
                        <span class="mr-2">{{substr($data['updated_at'], 0 , 10)}} &nbsp;{{substr($data['updated_at'], 11 , 8)}}</span>
                      </div>
                      <p class="card-text mb-0 font-weight-light">{!!substr($data['summary'], 0, 140)!!}...<a href="{{url('book/detail',$data['book_code'])}}" class="text-info">Read More</a></p>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
          </div>
          <!-- content-wrapper ends -->
          @include('footer')