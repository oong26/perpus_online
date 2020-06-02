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
          Edit book
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
              <a href="../">Library</a>&nbsp;/&nbsp;Edit book
          </ul>
        </nav>
      </div>
      <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book</h4>
                  <p class="card-description"> Add new book </p>
                  @foreach ($book as $item)
                  <form action="../update" class="forms-sample" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="book_code" value="{{$item['book_code']}}">
                  <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" id="einputTitlexampleInputName1" name="title" placeholder="Book title" value="{{$item['title']}}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAuthor">Author</label>
                    <input type="text" class="form-control" id="inputAuthor" name="author" placeholder="Book author" value="{{$item['author']}}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputYear" >Year & ISBN</label>
                    <div class="form-inline">
                      <input type="number" class="form-control mb-2 mr-2 col-md-5" id="inputYear" name="year" placeholder="Book year" value="{{$item['year']}}" required>
                      <input type="number" class="form-control mb-2 col-md-6" id="inputISBN" name="isbn" placeholder="ISBN" maxlength="13" value="{{$item['isbn']}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPublisher">Publisher & Total Page</label>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" id="inputPublisher" name="publisher" placeholder="Book Publisher" value="{{$item['publisher']}}" required>
                      </div>
                      <div class="col">
                        <input type="number" class="form-control" id="inputPublisher" name="total_page" placeholder="Total page" value="{{$item['total_page']}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCategory">Genre</label>
                    <select class="form-control" id="inputCategory" name="book_category">
                      <option value="">Select choice</option>
                      $@foreach ($category as $cate)
                      @if($cate['id_category'] == $item['id_book_category'])
                      <option value="{{$cate['id_category']}}" selected>{{$cate['book_category']}}</option>
                      @else
                      <option value="{{$cate['id_category']}}">{{$cate['book_category']}}</option>
                      @endif
                      @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Summary</label>
                    <textarea name="summary" class="editor">{{$item['author']}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Book Cover</label>
                    <input type="file" name="file" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" name="img_name" placeholder="Upload Image" value="{{$item['cover']}}" required disabled>
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label >Available Online & PDF file</label>
                    <div class="row">
                      <div class="col mt-1">
                        <select class="form-control" id="selectOnline" name="is_online">
                            @if ($item['is_available_online'] == 'Yes')
                            <option value="Select choice">Select choice</option>
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                            @elseif($item['is_available_online'] == 'No')
                            <option value="Select choice">Select choice</option>
                            <option value="Yes">Yes</option>
                            <option value="No" selected>No</option>
                            @else
                            <option value="Select choice" selected>Select choice</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            @endif
                        </select>
                      </div>
                      <div class="col">
                        <input type="file" name="pdf_file" class="file-upload-default">
                          <div class="input-group">
                            <input type="text" class="form-control file-upload-info " name="pdf_filename" placeholder="Upload PDF" value="{{$item['pdf_file']}}" disabled>
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                            </span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label >Stock & Offline Book Location</label>
                    <div class="row">
                      <div class="col">
                        <input type="number" class="form-control" id="inputStock" name="stock" placeholder="Book Stock" value="{{$item['stock']}}" required>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="inputLocation" name="location" placeholder="Book Location" value="{{$item['location']}}" required>
                      </div>
                    </div>
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