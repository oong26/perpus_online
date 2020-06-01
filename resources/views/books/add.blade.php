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
                Add new book
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <a href="../book">Library</a>&nbsp;/&nbsp;Add new book
                </ul>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Book</h4>
                        <p class="card-description"> Add new book </p>
                        <form action="store" class="forms-sample" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                          <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" id="einputTitlexampleInputName1" name="title" placeholder="Book title" required>
                          </div>
                          <div class="form-group">
                            <label for="inputAuthor">Author</label>
                            <input type="text" class="form-control" id="inputAuthor" name="author" placeholder="Book author" required>
                          </div>
                          <div class="form-group">
                            <label for="inputYear">Year & ISBN</label>
                            <div class="row">
                              <div class="col">
                                <input type="number" class="form-control" id="inputYear" name="year" placeholder="Book year" required>
                              </div>
                              <div class="col">
                                <input type="number" class="form-control" id="inputISBN" name="isbn" placeholder="ISBN" maxlength="13" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPublisher">Publisher</label>
                            <input type="text" class="form-control" id="inputPublisher" name="publisher" placeholder="Book Publisher" required>
                          </div>
                          <div class="form-group">
                            <label for="inputSummary">Summary</label>
                            <textarea name="summary" class="editor">
                                    
                            </textarea>
                          </div>
                          <div class="form-group">
                            <label>Book Cover</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" name="img_name" placeholder="Upload Image" required disabled>
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
                                    <option value="">Select choice</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                              </div>
                              <div class="col">
                                <input type="file" name="pdf_file" class="file-upload-default">
                                  <div class="input-group">
                                    <input type="text" class="form-control file-upload-info " name="pdf_filename" placeholder="Upload PDF" disabled>
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
                                <input type="number" class="form-control" id="inputStock" name="stock" placeholder="Book Stock" required>
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" id="inputLocation" name="location" placeholder="Book Location" required>
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                          <a href="../book" class="btn btn-light">Cancel</a>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          @include('footer')