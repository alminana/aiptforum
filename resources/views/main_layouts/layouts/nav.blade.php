<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <!-- <img src="{{ asset('admin_dashboard_assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon"> -->
                </div>
                <div>
                    <h4 class="logo-text">AIAPAIT</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('categories.index') }}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <li>
                        @forelse($categories as $category)
                        <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
                        @empty
                        <p>No Categories found</p>
                        @endforelse
                </li>
                
                <li>
                    <a target='_blank' href="{{ route('home') }}">
                    <div class="parent-icon"><i class='bx bx-pointer'></i></div>
                        <div class="menu-title">Visit Site</div>
                    </a>
                </li>
                <hr>
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