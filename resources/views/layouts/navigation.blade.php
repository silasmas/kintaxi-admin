
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <!-- Home -->
                        <li class="nav-item {{ Route::is('home') || Route::is('search') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="mdi mdi-view-grid-outline menu-icon"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.dashboard')</span>
                            </a>
                        </li>
                        <!-- Customers -->
                        <li class="nav-item {{ Route::is('customer.home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('customer.home') }}">
                                <i class="mdi mdi-map-marker menu-icon"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.customers.title')</span>
                            </a>
                        </li>
                        <!-- Currency -->
                        <li class="nav-item {{ Route::is('currency.home') || Route::is('currency.show') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('currency.home') }}">
                                <i class="mdi mdi-currency-usd menu-icon"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.currency')</span>
                            </a>
                        </li>
                        <!-- Pricing rule -->
                        <li class="nav-item {{ Route::is('pricing.home') || Route::is('pricing.show') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pricing.home') }}">
                                <i class="mdi mdi-cash-100 menu-icon"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.pricing')</span>
                            </a>
                        </li>
                        <!-- Payment gateway -->
                        <li class="nav-item {{ Route::is('payment_gateway.home') || Route::is('payment_gateway.show') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('payment_gateway.home') }}">
                                <i class="mdi mdi-cash menu-icon"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.payment-gateway')</span>
                            </a>
                        </li>
                        <!-- Vehicle -->
                        <li class="nav-item {{ Route::is('vehicle.home') || Route::is('vehicle.show') || Route::is('vehicle.entity.home') || Route::is('vehicle.entity.show') ? ' active' : '' }}">
                            <a class="nav-link" data-bs-toggle="collapse" href="#ui-vehicle" aria-expanded="false" aria-controls="ui-vehicle">
                                <i class="menu-icon mdi mdi-car-estate"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.vehicle.title')</span>
                                <i class="menu-arrow"></i>
                            </a>

                            <div class="collapse" id="ui-vehicle">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('vehicle.home') }}">@lang('miscellaneous.menu.vehicle.all')</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('vehicle.entity.home', ['entity' => 'shape']) }}">@lang('miscellaneous.menu.vehicle.shape')</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('vehicle.entity.home', ['entity' => 'category']) }}">@lang('miscellaneous.menu.vehicle.category')</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Role -->
                        <li class="nav-item {{ Route::is('role.entity.home') || Route::is('role.entity.show') ? ' active' : '' }}">
                            <a class="nav-link" data-bs-toggle="collapse" href="#ui-role" aria-expanded="false" aria-controls="ui-role">
                                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.role.title')</span>
                                <i class="menu-arrow"></i>
                            </a>

                            <div class="collapse" id="ui-role">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('role.entity.home', ['entity' => 'manage-roles']) }}">@lang('miscellaneous.menu.role.manage-roles')</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('role.entity.home', ['entity' => 'users']) }}">@lang('miscellaneous.menu.role.users')</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Status -->
                        <li class="nav-item {{ Route::is('status.home') || Route::is('status.show') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('status.home') }}">
                                <i class="mdi mdi-thermometer menu-icon"></i>
                                <span class="menu-title">@lang('miscellaneous.menu.status')</span>
                            </a>
                        </li>
                    </ul>
                </nav>
