  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Business Softwares</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="float-left img-responsive rounded"  src="{{ asset('images/logo1.png') }}">
        </div>
        <div class="user-info">
          <span class="user-name font-weight-bold"> {{ Auth::user()->name ?? 'User'}}</span>
          <span class="user-role">{{ Auth::user()->email ?? 'Mail'}}</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Powered By Swiftpay CRM</span>
          </span>
        </div>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>


          <li>
            <a href="/admin/schedule">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              <span>Schedule</span>
            </a>
          </li>


          <li class="sidebar-dropdown">
            <a href="/admin/blog">
              <i class="fas fa-blog"></i>
              <span>Blog</span>
            </a>
          </li>

          <li>
            <a href="/admin/gallery">
              <i class="fa fa-star" aria-hidden="true"></i>
              <span>Gallery</span>
            </a>
          </li>
          <li>
            <a href="/admin/questions">
              <i class="fa fa-question-circle" aria-hidden="true"></i>
              <span>Questions</span>
            </a>
          </li>

           <li>
            <a href="{{route('MailConfig')}}">
              <i class="fa fa-contacts"></i>
              <span>Outgoing Mail Configuration</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-power-off"></i>
        <span class="badge-sonar"></span>
      </a>
    </div>
  </nav>