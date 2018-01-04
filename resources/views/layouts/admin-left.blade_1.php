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
                      <a class="@if(Request::segment(2)=='users') active @endif" href="{{url('admin/users/manage-users')}}">
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-order-history') active @endif" href="{{url('admin/manage-order-history')}}">
                          <i class="fa fa-user"></i>
                          <span>Order History Master</span>
                      </a>
                  </li>
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-global-wallet') active @endif" href="{{url('admin/manage-global-wallet')}}">
                          <i class="fa fa-user"></i>
                          <span>Global Wallet Master</span>
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
<!--                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-category') active @endif" href="{{url('admin/manage-category')}}">
                          <i class="fa fa-globe"></i>
                          <span>Manage Category</span>
                      </a>
                  </li>-->
                  <li class="">
                      <a class="@if(Request::segment(2)=='promotional-category') active @endif" href="{{url('admin/promotional-category')}}">
                          <i class="fa fa-globe"></i>
                          <span>Manage Promotional Category</span>
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
                  
                  <li class="">
                      <a class="@if(Request::segment(2)=='manage-slider') active @endif" href="{{url('admin/manage-slider')}}">
                          <i class="fa fa-question-circle"></i>
                          <span>Manage Slider</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>