<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/emirates.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit',auth()->user()->id) }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                   
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </div>
        </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('argon') }}/img/brand/blue.png">
                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
            <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-search"></span>
                    </div>
                </div>
            </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                </a>
            </li>
            @hasanyrole('super-admin')
            <li class="nav-item">
                <a class="nav-link active" href="#admins" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="admins">
                    <i class="fas fa-users" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Admins') }}</span>
                </a>

                <div class="collapse" id="admins">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                {{ __('List of Admins') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#agents" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="agents">
                    <i class="fas fa-user-check" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Agents') }}</span>
                </a>

                <div class="collapse" id="agents">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agents.index') }}">
                                {{ __('List of Agents') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @endrole
            @hasanyrole('super-admin|agent')
            <li class="nav-item">
                <a class="nav-link active" href="#leads" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="leads">
                    <i class="fas fa-headset" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Leads') }}</span>
                </a>

                <div class="collapse" id="leads">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('leads.index') }}">
                                {{ __('List of Leads') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('leads.create') }}">
                                {{ __('Add Leads') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @endrole
            @hasanyrole('agent')
            <li class="nav-item">
                <a class="nav-link active" href="#commission" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="commission">
                    <i class="fas fa-headset" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Project & Commission') }}</span>
                </a>

                <div class="collapse" id="commission">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('details', auth()->user()) }}">
                                {{ __('View  Details') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole
            @hasanyrole('super-admin')
            <li class="nav-item">
                <a class="nav-link active" href="#customers" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="customers">
                    <i class="fas fa-headset" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Customers') }}</span>
                </a>

                <div class="collapse" id="customers">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers.index') }}">
                                {{ __('List of Customers') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#projects" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="customers">
                    <i class="fas fa-headset" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Projects') }}</span>
                </a>

                <div class="collapse" id="projects">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.create') }}">
                                {{ __('Add New') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.index') }}">
                                {{ __('List of Projects') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link active" href="#followup" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="customers">
                    <i class="fas fa-headset" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Followup') }}</span>
                </a>

                <div class="collapse" id="followup">
                    <ul class="nav nav-sm flex-column">
                        <!--<li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.create') }}">
                                {{ __('Add New') }}
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('meetings.index') }}">
                                {{ __('List of Meeting') }}
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="{{ route('callings.index') }}">
                                {{ __('List of Callings') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

               {{--  <li class="nav-item">
                    <a class="nav-link active" href="#properties" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="properties">
                        <i class="far fa-building" style="color: #2D375D"></i>
                        <span class="nav-link-text" style="color: #2D375D">{{ __('Properties') }}</span>
                    </a>

                    <div class="collapse" id="properties">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('properties.index') }}">
                                    {{ __('List of Properties') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#sales" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sales">
                        <i class="fas fa-dollar-sign" style="color: #2D375D"></i>
                        <span class="nav-link-text" style="color: #2D375D">{{ __('Sales') }}</span>
                    </a>

                    <div class="collapse" id="sales">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sales.index') }}">
                                    {{ __('List of Sales') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#installments" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="installments">
                        <i class="fas fa-dollar-sign" style="color: #2D375D"></i>
                        <span class="nav-link-text" style="color: #2D375D">{{ __('Installments') }}</span>
                    </a>

                    <div class="collapse" id="installments">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('installments.index') }}">
                                    {{ __('List of Installments') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                @endrole
                @hasanyrole('agent')
                
            <li class="nav-item">
                <a class="nav-link active" href="#followup" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="customers">
                    <i class="fas fa-headset" style="color: #2D375D"></i>
                    <span class="nav-link-text" style="color: #2D375D">{{ __('Followup') }}</span>
                </a>

                <div class="collapse" id="followup">
                    <ul class="nav nav-sm flex-column">
                        <!--<li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.create') }}">
                                {{ __('Add New') }}
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('meetings.index') }}">
                                {{ __('List of Meeting') }}
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="{{ route('callings.index') }}">
                                {{ __('List of Callings') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
                @endrole
            </ul>

        </div>
    </div>
</nav>