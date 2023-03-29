<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <!-- <img src="{{ asset('admin_dashboard_assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon"> -->
                </div>
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
                    <a target='_blank' href="{{ route('deadline.deadline') }}">
                    <div class="parent-icon"><i class='bx bx-lock'></i></div>
                        <div class="menu-title">Monitoring</div>
                    </a>
                </li>
                <li>
                    <a target='_blank' href="{{ route('deadline.notification') }}">
                    <div class="parent-icon"><i class='bx bx-lock'></i></div>
                        <div class="menu-title">Deadline</div>
                    </a>
                </li>
                
                <li>
                    <a target='_blank' href="{{ route('deadline.getData') }}">
                    <div class="parent-icon"><i class='bx bx-lock'></i></div>
                        <div class="menu-title">Report</div>
                    </a>
                </li>
                <hr>
                <li>
                    <a target='_blank' href="{{ route('home') }}">
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
