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
          Book Detail 
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
              <a href="../">Library</a>&nbsp;/&nbsp;Book Detail
          </ul>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Book Detail</h4>
              <br>
              @foreach ($book as $data)       
              <div class="row">
                <div class="col-md-3">
                    <img src="{{url('/uploaded_files/book_cover/'.$data['cover'])}}" class="img-book-cover-detail" alt="image">
                </div>
                <div class="col">
                    <label class="card-title">{{$data['title']}}</label>
                    <a href="{{url('book/edit',$data['book_code'])}}" style="color:#32bf90;"><i class="mdi mdi-lead-pencil ml-1"></i></a>
                    <hr class="mt-auto">
                    <label>Book Code :</label>&nbsp;<label class="font-weight-light">{{$data['book_code']}}</label><br>
                    <label>ISBN :</label>&nbsp;<label class="font-weight-light">{{$data['isbn']}}</label><br>
                    <label>Author :</label>&nbsp;<label class="font-weight-light">{{$data['author']}}</label><br>
                    <label>Year :</label>&nbsp;<label class="font-weight-light">{{$data['year']}}</label><br>
                    <label>Publisher :</label>&nbsp;<label class="font-weight-light">{{$data['publisher']}}</label><br>
                    <label>Updated at :</label>&nbsp;<label class="font-weight-light">{{$data['updated_at']}}</label><br>
                    <label>Stock :</label>&nbsp;<label class="font-weight-light">{{$data['stock']}}</label><br>
                    <label>Offline Location :</label>&nbsp;<label class="font-weight-light">{{$data['location']}}</label><br>
                    <label>Available in online :</label>&nbsp;<label class="font-weight-light">{{$data['is_available_online']}}</label><br>
                    @if($data['pdf_file'] != null)
                      <label>PDF File :</label>&nbsp;<a href="{{url('uploaded_files/pdf_files',$data['pdf_file'])}}" class="font-weight-light">{{$data['pdf_file']}}</a><br>
                    @else
                      <label>PDF File :</label>&nbsp;-<br>
                    @endif
                </div>
              </div>
              <div class="row ml-0 mr-0">
                {!!$data['summary']!!}  
              </div>  
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    @include('footer')