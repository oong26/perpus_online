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
              </span> Book Category 
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                  <a href="#">
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw"><span class="mdi mdi-plus"></span>&nbsp;Add new category</button>
                  </a>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Category</h4>
                  <div class="table-responsive">
                    <table  id="example" class="table">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Category </th>
                          <th> Options </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item['book_category']}}</td>
                          <td>
                            <form class="form-group pull-right" action="book-category/delete/{{$item['id_category']}}" method="POST">
                              {{csrf_field()}}
                              {{method_field('delete')}}
                              <a href="book-category/edit/{{$item['id_category']}}"> <span class="mdi mdi-lead-pencil" style="color:#32bf90;"></span></a>
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