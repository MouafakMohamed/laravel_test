<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="index.html">
       <img src="{{ url('assets/') }}/images/logo.png" class="img-fluid" alt="">
       <span>XRay</span>
       </a>
       <div class="iq-menu-bt-sidebar">
          <div class="iq-menu-bt align-self-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-more-fill"></i></div>
                   <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
             </div>
          </div>
       </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="{{ 'admin/Dashboard'== request()->path() ? 'active' : ''}}" >
                <a href="{{url('/admin/Dashboard')}}" class="iq-waves-effect"><i class="ri-hospital-fill"></i><span>Dashboard</span></a>
             </li>  
             
             <li>
                <a href="#doctor-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-3-fill"></i><span>Doctors</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="doctor-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="doctor-list.html"><i class="ri-file-list-fill"></i>All Doctors</a></li>
                   <li><a href="add-doctor.html"><i class="ri-user-add-fill"></i> Add Doctor</a></li>
                   <li><a href="profile.html"><i class="ri-profile-fill"></i>Doctor Profile</a></li>
                   <li><a href="profile-edit.html"><i class="ri-file-edit-fill"></i> Edit Doctor</a></li>
                </ul>
             </li>
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>