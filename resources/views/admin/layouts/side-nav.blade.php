    @if(auth()->user()->hasRole('admin')|| auth()->user()->hasRole('manager'))
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @else
            <aside class="main-sidebar sidebar-light-primary elevation-4">
    @endif
    <!-- Brand Logo -->
    <a href="#" class="brand-link  text-center" dir="rtl">
      @if(auth()->user()->profile_image)
      <img src="{{ asset('storage/'. auth()->user()->profile_image) }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      @else
          <p></p>
      @endif
      <span class="brand-text font-weight-light text-right" dir="rtl"> نظام المتطوعين </span>
    </a>
       <br>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-6 pb-6 mb-6 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }} - {{ auth()->user()->roles->pluck('name')->implode(', ') }} </a>
          <span class="text-muted"></span>
          <!-- صلاحيات المستخدم -->
        </div>
      </div>
 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                لوحة التحكم
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>الرئيسية</p>
                </a>
              </li>
              @if(auth()->user()->hasRole('admin')|| auth()->user()->hasRole('manager'))
                  
              



              <li class="nav-item">
                <a href="{{ route('people.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> المنسقين</p>
                </a>
              </li> 
             <li class="nav-item">
                <a href="{{ route('volunteers.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> المتطوعين</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('skills.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> مهارات  </p>
                </a>
              </li> 

            
          
              <li class="nav-item">
                <a href="{{ route('volunteer-skills.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> مهارات المتطوع </p>
                </a>
              </li> 

            
              <li class="nav-item">
                <a href="{{ route('volunteer-tasks.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> مهام المتطوع </p>
                </a>
              </li> 


              <li class="nav-item">
                <a href="{{ route('events.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> الفعالية  </p>
                </a>
              </li>
                  
              <li class="nav-item">
                <a href="{{ route('employed-available-resources.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> موارد متاحة  </p>
                </a>
              </li> 
                


               
               <li class="nav-item">
                <a href="{{ route('organizations.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  المنظمات </p>
                </a>
              </li> 

              
              <li class="nav-item">
                <a href="{{ route('financial-supports.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> الداعم المالي </p>
                </a>
              </li> 

              
              <li class="nav-item">
                <a href="{{ route('funding-organizations.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  تمويل منظمات </p>
                </a>
              </li> 
                 
             
                    
             

                 
              
                
      
              

              <li class="nav-item d-none d-sm-inline-block">
                  <a href="{{ route('event-volunteers.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>مشاركات المتطوعين</p>
                  </a>
              </li>
        
              
              @endif


              @if(auth()->user()->hasRole('admin'))
                        <li class="nav-item">
                          <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>المستخدمين</p>
                          </a>
                        </li>
             
                     
               @endif
              <li class="nav-item">
                <a  href="{{ route('main_home') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> الموقع</p>
                </a>
              </li>
              <li class="nav-item" style="margin-bottom: 10px">
                
                <a class="nav-link"style="margin-bottom: 10px" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                  
                    <i class="far fa-circle nav-icon"></i>
                    {{ __('تسجيل خروج') }} 
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" 
                 method="POST" class="d-none">@csrf
                </form>
              </li>
             
            </ul>
            
          </li>
     
        
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>