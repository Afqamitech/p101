<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="{{url('public/backend/img/ui-sam.jpg')}}" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Super Admin</h5>
              	  	
                  <li class="">
                      <a class="@if(Request::segment(2)=='dashboard') active @endif" href="{{url('admin/dashboard')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-pages') active @endif" href="{{url('admin/manage-pages')}}">
                          <i class="fa fa-file-text"></i>
                          <span>Manage CMS Pages</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-global-value') active @endif" href="{{url('admin/manage-global-value')}}">
                          <i class="fa fa-globe"></i>
                          <span>Manage Global Values</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-store') active @endif" href="{{url('admin/manage-store')}}">
                          <i class="fa fa-globe"></i>
                          <span>Manage Store</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-category') active @endif" href="{{url('admin/manage-category')}}">
                          <i class="fa fa-globe"></i>
                          <span>Manage Category</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-coupon') active @endif" href="{{url('admin/manage-coupon')}}">
                          <i class="fa fa-tags"></i>
                          <span>Manage Coupon</span>
                      </a>
                  </li>
                  
                  <li class="">
                      <a class="@if(Request::segment(2)=='redeem-master') active @endif" href="{{url('admin/redeem-master')}}">
                          <i class="fa fa-money"></i>
                          <span>Redeem Master</span>
                      </a>
                  </li>
                  
                  <li class="">
                      <a class="@if(Request::segment(2)=='query') active @endif" href="{{url('admin/query')}}">
                          <i class="fa fa-question-circle"></i>
                          <span>Missing Cashback Reports</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>UI Elements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Components</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>