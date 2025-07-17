
<aside class="navbar navbar-vertical navbar-expand-lg d-print-none  " data-bs-theme="dark">

    <div class="container-fluid" >
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark">
        <a href="#" class="f-5">
          CNHS PORTAL
        </a>
      </h1>
      <div class="navbar-nav flex-row d-lg-none">

        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm rounded-circle" style="background-image: url({{asset('images/cnhs_logo.png')}})"></span>
            <div class="d-none d-xl-block ps-2">
                <div>{{ auth('web')->User()->name }}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

            <a href="#" class="dropdown-item" wire:click.prevent="LogoutHandler()">Log Out</a>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="sidebar-menu" >
        <ul class="navbar-nav pt-lg-3">

            <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard')}}" wire:navigate >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                        </svg>
                    </span>
                  <span class="nav-link-title">
                    Dashboard
                  </span>
                </a>
            </li>

            {{-- <li class="hr-text m-2">Encoder Panel</li>

            <li class="nav-item {{ Route::is('profile.booking') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('profile.booking')}}" wire:navigate >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                        </svg>
                    </span>
                  <span class="nav-link-title">
                    Booking
                  </span>
                </a>
            </li> --}}



            <li class="hr-text m-2">Admin Panel</li>

            <li class="nav-item {{ Route::is('admin.enrollment') ? 'active' : '' }}">
              <a href="{{ route('admin.enrollment') }}" class="nav-link" wire:navigate>
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24"
                       stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M22 9l-10 -5l-10 5l10 5l10 -5v6a10 10 0 0 1 -20 0v-6" />
                    <path d="M6 12v5.5a1.5 1.5 0 0 0 3 0v-5.5" />
                    <path d="M15 12v5.5a1.5 1.5 0 0 0 3 0v-5.5" />
                  </svg>
                </span>
                <span class="nav-link-title">
                 Enrollment
                </span>
              </a>
            </li>

            <li class="nav-item {{ Route::is('admin.class-monitoring') ? 'active' : '' }}">
              <a href="{{ route('admin.class-monitoring') }}" class="nav-link" wire:navigate>
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24"
                       stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M22 9l-10 -5l-10 5l10 5l10 -5v6a10 10 0 0 1 -20 0v-6" />
                    <path d="M6 12v5.5a1.5 1.5 0 0 0 3 0v-5.5" />
                    <path d="M15 12v5.5a1.5 1.5 0 0 0 3 0v-5.5" />
                  </svg>
                </span>
                <span class="nav-link-title">
                  Class Monitoring
                </span>
              </a>
            </li>
            
            

            <li class="nav-item {{ Route::is('admin.form-request') ? 'active' : '' }}">
              <a href="{{ route('admin.form-request') }}" class="nav-link" wire:navigate>
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon icon-tabler icon-tabler-clipboard" width="24" height="24" viewBox="0 0 24 24"
                       stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 4h6a2 2 0 0 1 2 2v1h-10v-1a2 2 0 0 1 2 -2z" />
                    <path d="M9 4v1h6v-1" />
                    <path d="M4 7h16v13a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                  </svg>
                </span>
                <span class="nav-link-title">
                  Form Request
                </span>
              </a>
            </li>

            <li class="nav-item {{ Route::is('admin.announcement-form') ? 'active' : '' }}">
              <a href="{{ route('admin.announcement-form') }}" class="nav-link" wire:navigate>
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-megaphone" width="24" height="24"
                       viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                       stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 11v-1a1 1 0 0 1 1 -1h1.5l8 -3v12l-8 -3h-1.5a1 1 0 0 1 -1 -1v-1" />
                    <path d="M15 8v8" />
                    <path d="M17 9.5v5" />
                  </svg>
                </span>
                <span class="nav-link-title">
                  Announcement
                </span>
              </a>
            </li>
            
            
            <li class="nav-item {{ Route::is('admin.activity-log') ? 'active' : '' }}">
              <a href="{{ route('admin.activity-log') }}" class="nav-link" wire:navigate>
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon icon-tabler icon-tabler-list-details" width="24" height="24" viewBox="0 0 24 24"
                       stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M13 5h8" />
                    <path d="M13 9h5" />
                    <path d="M13 15h8" />
                    <path d="M13 19h5" />
                    <path d="M4 6l1 0" />
                    <path d="M4 10l1 0" />
                    <path d="M4 14l1 0" />
                    <path d="M4 18l1 0" />
                  </svg>
                </span>
                <span class="nav-link-title">
                  Activity Log
                </span>
              </a>
            </li>
            
            <li class="nav-item {{ Route::is('admin.user-management') ? 'active' : '' }}">
              <a  href="{{ route('admin.user-management')}}" class="nav-link "  wire:navigate >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                          <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                          <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                      </svg>
                  </span>
              <span class="nav-link-title">
                  User Management
              </span>
              </a>
          </li>


          <li class="hr-text m-2">Student Panel</li>
          <li class="nav-item {{ Route::is('student.student-dashboard') ? 'active' : '' }}">
            <a  href="{{ route('student.student-dashboard')}}" class="nav-link "  wire:navigate >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                </span>
            <span class="nav-link-title">
                Dashboard
            </span>
            </a>
        </li>

        <li class="hr-text m-2">Teacher Panel</li>
          <li class="nav-item {{ Route::is('teacher.my-subject') ? 'active' : '' }}">
            <a  href="{{ route('teacher.my-subject')}}" class="nav-link "  wire:navigate >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                </span>
            <span class="nav-link-title">
                My Subject
            </span>
            </a>
        </li>
        </ul>
      </div>
    </div>
  </aside>