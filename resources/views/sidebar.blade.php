<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset('uploaded_files/profile_photos/'.Session::get('img'))}}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Session::get('name')}}</span>
            <span class="text-secondary text-small">{{Session::get('role')}}</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/perpus_online/public/dashboard">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#menu-library" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Library</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-book menu-icon"></i>
        </a>
        <div class="collapse" id="menu-library">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/perpus_online/public/book">Books</a></li>
            <li class="nav-item"> <a class="nav-link" href="/perpus_online/public/book-genre">Book Genre</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#menu-user" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-group menu-icon"></i>
        </a>
        <div class="collapse" id="menu-user">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/perpus_online/public/user">Data</a></li>
            <li class="nav-item"> <a class="nav-link" href="/perpus_online/public/role">Role</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/perpus_online/public/fine-type">
          <span class="menu-title">Fine Type</span>
          <i class="mdi mdi-wallet-travel menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/perpus_online/public/loans">
          <span class="menu-title">Loans</span>
          <i class="mdi mdi-shopping menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>