<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('logo/logo.JPG')}}" style=" height:50px; weight:50px" class="logo-dark mx-auto" alt="">        </div>
        <div>
            <h4 class="logo-text">AIPTDocket</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('categories.index') }}">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Application</div>
            </a>
        </li>
        <hr>
       


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-menu'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>

            <ul>    
                 @forelse($categories as $category)
                <li> 
               
                    <a href="{{ route('categories.show', $category) }}">
                        
                        <i class="bx bx-right-arrow-alt"></i>
                    </i><span>{{ $category->name }}</span>
                    </a>
                </li>
               @empty
                        <p class='lead'>There are no categories to show.</p>
                    @endforelse
                
            </ul>
        </li>


        <hr> 
        
         <li>
            <a href="{{ route('deadline.getData') }}">
            <div class="parent-icon"><i class='bx bx-right-arrow-alt'></i></div>
                <div class="menu-title">Report</div>
            </a>
        </li> 
        <hr>
        <li>
            <a href="{{ route('home') }}">
            <div class="parent-icon"><i class='bx bx-lock'></i></div>
                <div class="menu-title">Lock</div>
            </a>
        </li>
        
        <li>
            <a target='_blank' href="{{ route('admin.index') }}">
            <div class="parent-icon"><i class='bx bx-pointer'></i></div>
                <div class="menu-title">Admin Only</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->