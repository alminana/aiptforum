<!--sidebar wrapper -->
<div class="sidebar-wrapper" style data-simplebar="true">
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
            <div class="parent-icon"><i class='bx bx-home-circle' style="color: white"></i></div>
                <div class="menu-title" style="font-size:12; color: white; font-weight:bold">Applications</div>
            </a>
        </li>
        <hr style="font-size:12; color: black; font-weight:bold">
        <li>
            <a href="{{ route('categories.index') }}">
            <div class="parent-icon" style="color: white">TM</div>
                <div class="menu-title" style="font-size:12; color: white; font-weight:bold">TradeMark</div>
            </a>
        </li>
       


        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><span style="font-size: 90%; color:gray;">TM</span>
                </div>
                <div class="menu-title">Trademark</div>
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
        </li> --}}

        {{-- <li>
            <a href="{{ route('patent.index') }}">
            <div class="parent-icon"><i class='bx bx-notepad'></i></div>
                <div class="menu-title">Patent</div>
            </a>
        </li>  --}}

        
        <li>
            <a href="{{ route('past.index') }}">
            <div class="parent-icon"><i class='bx bx-notepad' style="color: white"></i></div>
                <div class="menu-title" style="font-size:12; color: white; font-weight:bold">Patent</div>
            </a>
        </li> 
      
        <hr style="font-size:12; color: black; font-weight:bold">

         <li>
            <a href="{{ route('deadline.getData') }}">
            <div class="parent-icon"><i class='bx bx-notepad' style="color: white"></i></div>
                <div class="menu-title" style="font-size:12; color: white; font-weight:bold">Report</div>
            </a>
        </li> 
        <hr style="font-size:12; color: black; font-weight:bold">
        <li>
            <a href="{{ route('home') }}">
            <div class="parent-icon"><i class='bx bx-lock' style="color: white"></i></div>
                <div class="menu-title" style="font-size:12; color: white; font-weight:bold">Lock</div>
            </a>
        </li>
        
        <li>
            <a href="{{ route('admin.index') }}">
            <div class="parent-icon"><i class='bx bx-user-circle' style="color: white"></i></div>
                <div class="menu-title" style="font-size:12; color: white; font-weight:bold">Admin Only</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
