import React from "react";
import 'font-awesome/css/font-awesome.min.css';


function MainLayout(props) {
  return (
    <div className="main-component-wrapper">
      <div className="page-wrapper chiller-theme toggled">
        <div className="sidebar-wrapper">
          <div>
            <a id="show-sidebar" className="btn btn-sm btn-dark" href="#">
              <i className="fas fa-bars" />
            </a>
            <nav id="sidebar" className="sidebar-wrapper">
              <div className="sidebar-content">
                <div className="sidebar-brand">
                  <a href="#">Business Softwares</a>
                  <div id="close-sidebar">
                    <i className="fas fa-times" />
                  </div>
                </div>
                <div className="sidebar-header">
                  <div className="user-pic">
                    <img
                      className="float-left img-responsive rounded"
                      src="images/logo1.png"
                    />
                  </div>
                  <div className="user-info">
                    <span className="user-name font-weight-bold">
                      {" "}
                      {"{"}
                      {"{"} Auth::user()-&gt;name ?? 'User'{"}"}
                      {"}"}
                    </span>
                    <span className="user-role">
                      {"{"}
                      {"{"} Auth::user()-&gt;email ?? 'Mail'{"}"}
                      {"}"}
                    </span>
                    <span className="user-status">
                      <i className="fa fa-circle" />
                      <span>Powered By Swiftpay CRM</span>
                    </span>
                  </div>
                </div>
                <div className="sidebar-menu">
                  <ul>
                    <li className="header-menu">
                      <span>General</span>
                    </li>
                    <li>
                      <a href="/admin/schedule">
                        <i className="fa fa-calendar" aria-hidden="true" />
                        <span>Schedule</span>
                      </a>
                    </li>
                    <li className="sidebar-dropdown">
                      <a href="/admin/blog">
                        <i className="fas fa-blog" />
                        <span>Blog</span>
                      </a>
                    </li>
                    <li>
                      <a href="/admin/gallery">
                        <i className="fa fa-star" aria-hidden="true" />
                        <span>Gallery</span>
                      </a>
                    </li>
                    <li>
                      <a href="/admin/questions">
                        <i
                          className="fa fa-question-circle"
                          aria-hidden="true"
                        />
                        <span>Questions</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('MailConfig')}}">
                        <i className="fa fa-contacts" />
                        <span>Outgoing Mail Configuration</span>
                      </a>
                    </li>
                  </ul>
                </div>
                {/* sidebar-menu  */}
              </div>
              {/* sidebar-content  */}
              <div className="sidebar-footer">
                <a href="#">
                  <i className="fas fa-power-off" />
                  <span className="badge-sonar" />
                </a>
              </div>
            </nav>
          </div>
        </div>
        <main className="page-content">
          <div className id="contents-container">
            {props.children}
          </div>
        </main>
      </div>

      {/* <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script> */}

      {/* @include('sweetalert::alert')
    <script>
        $( document ).ready(function() {
            window.CKEDITOR_BASEPATH = "{{ asset('ckeditor') }}";
        });
        @yield('scripts')

    </script> */}
    </div>
  );
}

export default MainLayout;
