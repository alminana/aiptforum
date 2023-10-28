		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				
				<div>
					<h4 class="logo-text">AIPTDOCKET</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('deadline.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Trademark</div>
					</a>
					<ul>
						<li> <a href="{{ route('categories.index') }}"><i class="bx bx-right-arrow-alt"></i>All Trademark</a>
						</li>
						<li> <a href="{{route('categories.requested')}}"><i class="bx bx-right-arrow-alt"></i>Requested Deadline</a>
						</li>
						<li> <a href="{{route('categories.actual')}}"><i class="bx bx-right-arrow-alt"></i>Actual Deadline</a>
						</li>
                        
					</ul>
				</li>
			
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Patent</div>
					</a>
					<ul>
                        <li> <a href="{{ route('past.index') }}"><i class="bx bx-right-arrow-alt"></i>All Patent</a>
						</li>
						<li> <a href="{{route('past.pct')}}"><i class="bx bx-right-arrow-alt"></i>PCT Deadline</a>
						</li>
						<li> <a href="{{route('past.regular')}}"><i class="bx bx-right-arrow-alt"></i>Regular Deadline</a>
						</li>
						<li> <a href="{{route('past.request')}}"><i class="bx bx-right-arrow-alt"></i>Requested Deadline</a>
						</li>
                        <li> <a href="{{route('past.actual')}}"><i class="bx bx-right-arrow-alt"></i>Actual Deadline</a>
						</li>
                        <li> <a href="{{route('past.annual')}}"><i class="bx bx-right-arrow-alt"></i>Annual Deadline</a>
						</li>
					</ul>
				</li>
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Report</div>
					</a>
					<ul>
                        <li> <a href="{{ route('deadline.getData') }}"><i class="bx bx-right-arrow-alt"></i>Trademark Report</a>
						</li>
						
					</ul>
				</li>
                <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Settings</div>
					</a>
					<ul>
                        <li> <a href="{{ route('home') }}"><i class="bx bx-right-arrow-alt"></i>Lock</a>
						</li>
                        <li> <a href="{{ route('admin.index') }}"><i class="bx bx-right-arrow-alt"></i>Administrator</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->