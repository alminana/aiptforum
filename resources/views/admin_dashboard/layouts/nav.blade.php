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
                    <a href="{{ route('admin.index') }}">
                    <div class="parent-icon"><i class='bx bx-home-circle' style="color: black"></i></div>
                        <div style="color: black">Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-message-square-edit' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Trademark</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.posts.index') }}"><i class="bx bx-right-arrow-alt"></i>All Trademark</a>
                        </li>
                        <li> <a href="{{ route('admin.posts.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Trademark</a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-message-square-edit' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Patent</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.past.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All Patent</a>
                        </li>
                        <li> <a href="{{ route('admin.past.create') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New Patent</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Clients</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.clients.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All </a>
                        </li>
                        <li> <a href="{{route('admin.clients.create')}}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Associates</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.associates.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All </a>
                        </li>
                        <li> <a href=""><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Method</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.method.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All Method</a>
                        </li>
                        <li> <a href="{{ route('admin.method.create') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New Method</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-menu' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Categories</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.categories.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All Categories</a>
                        </li>
                        <li> <a href="{{ route('admin.categories.create') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New Category</a>
                        </li>
                        
                    </ul>
                </li>

                <!-- <li>
                    <a href="{{ route('admin.tags.index') }}">
                    <div class="parent-icon"><i class='bx bx-purchase-tag'></i></div>
                        <div class="">Tags</div>
                    </a>
                </li> -->

                 <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-comment-dots' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Comments</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.comments.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All Comments</a>
                        </li>
                        <li> <a href="{{ route('admin.comments.create') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New Comment</a>
                        </li>
                        
                    </ul>
                </li>

                <hr>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-key' style="color: black"></i>
                        </div>
                        <div class="" style="color: black">Roles</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.roles.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All Roles</a>
                        </li>
                        <li> <a href="{{ route('admin.roles.create') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New Role</a>
                        </li>
                        
                    </ul>
                </li>    
                
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-user' style="color: black"> </i>
                        </div>
                        <div class="" style="color: black">Users</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('admin.users.verified') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Verified New Account</a>
                        </li>
                        <li> <a href="{{ route('admin.users.index') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>All Users</a>
                        </li>
                        <li> <a href="{{ route('admin.users.create') }}"><i class="bx bx-right-arrow-alt" style="color: blueviolet"></i>Add New User</a>
                        </li>
                        
                    </ul>
                </li>    


                <!-- <li>
                    <a href="{{ route('admin.contacts') }}">
                    <div class="parent-icon"><i class='bx bx-mail-send'></i></div>
                        <div class="">Contacts</div>
                    </a>
                </li> -->

                <!-- <li>
                    <a href="{{ route('admin.setting.edit') }}">
                    <div class="parent-icon"><i class='bx bx-info-square'></i></div>
                        <div class="">Setting</div>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="{{ route('admin.import.index') }}">
                    <div class="parent-icon"><i class='bx bx-info-square'></i></div>
                        <div class="">Import</div>
                    </a>
                </li> -->
            
                
                <li>
                    <a href="{{ route('home') }}">
                    <div class="parent-icon"><i class='bx bx-pointer' style="color: black"></i></div>
                        <div class="" style="color: black">Visit Site</div>
                    </a>
                </li>
                <hr>
                <li>
                    @php
                    $id = Auth::user()->id;
                     $adminData = App\Models\User::find($id);
                     @endphp
                    <a href="{{route('user.logout')}}">
                    <div class="parent-icon"><i style="color:red" class='bx bx-log-out-circle'></i></div>
                        <div style="color:red" class="">Logout</div>
                    </a>
                </li> 
                <hr>
                <li>
                    @php
                    $id = Auth::user()->id;
                     $adminData = App\Models\User::find($id);
                     @endphp
                    <div style="text-align: center"><h5>Welcome Back</h5></div>
                     <div class="parent-icon">
                      <img src="{{$adminData->img }}" alt="">
                    </div>
                   
               
                </li>
                 


            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
