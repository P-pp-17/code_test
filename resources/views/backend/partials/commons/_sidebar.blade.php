 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('backend.dashboard') }}" class="brand-link text-center">
         <span class="brand-text font-weight-light" style="">Sample_project</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
         <div class="os-resize-observer-host">
             <div class="os-resize-observer observed"></div>
         </div>
         <div class="os-size-auto-observer">
             <div class="os-resize-observer observed"></div>
         </div>
         <div class="os-content-glue"></div>
         <div class="os-padding">
             <div class="os-viewport os-viewport-native-scrollbars-invisible os-viewport-native-scrollbars-overlaid">
                 <div class="os-content">
                     <!-- Sidebar Menu -->
                     <nav class="mt-2">
                         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                             <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                             <li class="nav-item">
                                 <a href="{{ route('backend.dashboard') }}" class="nav-link @if (request()->is('backend')) active @endif">
                                     <i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i>
                                     <p>
                                         {{ __('messages.dashboard') }}
                                     </p>
                                 </a>
                             </li>
                             @if(Auth::guard('admin')->user()->email == 'superadmin@example.com')
                             <li class="nav-item">
                                <a href="{{ route('backend.admins.index') }}"
                                    class="nav-link @if (request()->is('backend/admins*')) active @endif">
                                    <i class="nav-icon fas fa-user" aria-hidden="true"></i>
                                    <p>
                                        Admins
                                    </p>
                                </a>
                            </li>
                            @endif
                            
                            <li class="nav-item">
                                <a href="{{ route('backend.users.index') }}"
                                    class="nav-link @if (request()->is('backend/users*')) active @endif">
                                    <i class="nav-icon fas fa-users" aria-hidden="true"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('backend.vendors.index') }}"
                                    class="nav-link @if (request()->is('backend/vendors*')) active @endif">
                                    <i class="nav-icon fas fa-users-cog" aria-hidden="true"></i>
                                    <p>
                                        Vendors
                                    </p>
                                </a>
                            </li>
                         
                         </ul>
                     </nav>
                     <!-- /.sidebar-menu -->
                 </div>
             </div>
         </div>
         <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
             <div class="os-scrollbar-track">
                 <div class="os-scrollbar-handle"></div>
             </div>
         </div>
         <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
             <div class="os-scrollbar-track">
                 <div class="os-scrollbar-handle"></div>
             </div>
         </div>
         <div class="os-scrollbar-corner"></div>
     </div>
     <!-- /.sidebar -->
 </aside>