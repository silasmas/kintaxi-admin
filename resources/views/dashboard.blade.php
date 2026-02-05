@extends('layouts.app', ['page_title' => __('miscellaneous.menu.dashboard') ])

@section('app-content')

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="home-tab">
                                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">@lang('miscellaneous.admin.overview')</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content tab-content-basic">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="statistics-details d-flex align-items-center justify-content-between">
                                                        <div id="inProgressRides">
                                                            <p class="statistics-title"></p>
                                                            <h3 class="rate-percentage"></h3>
                                                            {{-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> --}}
                                                        </div>

                                                        <div id="completedRides">
                                                            <p class="statistics-title"></p>
                                                            <h3 class="rate-percentage"></h3>
                                                            {{-- <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p> --}}
                                                        </div>

                                                        <div id="requestedRides">
                                                            <p class="statistics-title"></p>
                                                            <h3 class="rate-percentage"></h3>
                                                            {{-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-8 d-flex flex-column">
                                                    <div class="row flex-grow">
                                                        <div class="col-12 grid-margin stretch-card">
                                                            <div class="card card-rounded">
                                                                <div class="card-body">
                                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                                        <div>
                                                                            <h4 class="card-title card-title-dash">@lang('miscellaneous.admin.recent_vehicles')</h4>
                                                                            <p class="card-subtitle card-subtitle-dash">@lang('miscellaneous.admin.count_data', ['count'=> $count_vehicles, 'data' => ($count_vehicles > 1 ? strtolower(__('miscellaneous.admin.vehicles')) : strtolower(__('miscellaneous.admin.vehicle')))])</p>
                                                                        </div>
                                                                        {{-- <div>
                                                                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add</button>
                                                                        </div> --}}
                                                                    </div>
                                                                    <div class="table-responsive  mt-1">
                                                                        <table class="table select-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>@lang('miscellaneous.admin.vehicle.mark')</th>
                                                                                    <th>@lang('miscellaneous.admin.vehicle.model')</th>
                                                                                    <th>@lang('miscellaneous.admin.vehicle.registration_number')</th>
                                                                                    <th>@lang('miscellaneous.admin.status')</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
    @forelse ($vehicles as $vehicle)
                                                                                <tr>
                                                                                    <td class="align-middle">{{ $vehicle['mark'] }}</td>
                                                                                    <td class="align-middle">{{ $vehicle['model'] }}</td>
                                                                                    <td class="align-middle">{{ $vehicle['registration_number'] }}</td>
                                                                                    <td>
                                                                                        <div class="btn-group rounded-pill shadow-0">
                                                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.color') }} rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.icon') me-1"></i> <span class="d-inline-block align-middle">@lang('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.name')</span>
                                                                                            </button>
                                                                                            <ul class="dropdown-menu">
        @foreach ($statuses as $status)
                                                                                                <li>
                                                                                                    <a id="vehicleStatus-{{ $vehicle['id'] }}-{{ $status['id'] }}" class="dropdown-item{{ $status['id'] === $vehicle['status']['id'] ? ' active' : '' }}" data-object-id="{{ $vehicle['id'] }}" data-status-id="{{ $status['id'] }}" onclick="event.preventDefault(); changeStatus('vehicle', this)">
                                                                                                        @lang('miscellaneous.admin.group.status.icon_color.' . $status['id'] . '.name')
                                                                                                    </a>
                                                                                                </li>
        @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="align-middle">
                                                                                        <a href="{{ route('vehicle.show', ['id' => $vehicle['id']]) }}">
                                                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
    @empty
                                                                                <tr>
                                                                                    <td colspan="6" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                                                </tr>
    @endforelse
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row flex-grow">
                                                        <div class="col-12 grid-margin stretch-card">
                                                            <div class="card card-rounded">
                                                                <div class="card-body">
                                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                                        <div>
                                                                            <h4 class="card-title card-title-dash">@lang('miscellaneous.admin.recent_users')</h4>
                                                                            <p class="card-subtitle card-subtitle-dash">@lang('miscellaneous.admin.count_data', ['count'=> $count_members, 'data' => ($count_members > 1 ? strtolower(__('miscellaneous.admin.members')) : strtolower(__('miscellaneous.admin.member')))])</p>
                                                                        </div>
                                                                        {{-- <div>
                                                                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Addr</button>
                                                                        </div> --}}
                                                                    </div>
                                                                    <div class="table-responsive  mt-1">
                                                                        <table class="table select-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>@lang('miscellaneous.photo')</th>
                                                                                    <th>@lang('miscellaneous.names')</th>
                                                                                    <th>@lang('miscellaneous.phone')</th>
                                                                                    <th>@lang('miscellaneous.menu.role.title')</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
    @forelse ($users as $user)
                                                                                <tr>
                                                                                    <td class="align-middle">
                                                                                        <img src="{{ asset($user['avatar_url']) }}" alt="{{ $user['firstname'] . ' ' . $user['lastname'] }}" width="50" class="rounded-circle">
                                                                                    </td>
                                                                                    <td class="align-middle">{{ $user['firstname'] . ' ' . $user['lastname'] }}</td>
                                                                                    <td class="align-middle">{{ $user['phone'] }}</td>
                                                                                    <td>
                                                                                        <select id="userRole-{{ $user['id'] }}" class="form-select form-select-sm" aria-label="@lang('miscellaneous.choose_role')" data-user-id="{{ $user['id'] }}" onchange="changeRole(this);">
                                                                                            <option class="small" disabled>@lang('miscellaneous.choose_role')</option>
        @foreach ($roles as $role)
                                                                                            <option value="{{ $role['id'] }}"{{ $user['role']['id'] == $role['id'] ? ' selected' : '' }}>{{ $role['role_name'] }}</option>
        @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td class="align-middle">
                                                                                        <a href="{{ route('role.entity.show', ['entity' => 'users', 'id' => $user['id']]) }}">
                                                                                            @lang('miscellaneous.change') <i class="fa fa-angle-double-right"></i>
                                                                                        </a><br>
                                                                                        <a role="button" class="text-danger">
                                                                                            @lang('miscellaneous.delete')
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
    @empty
                                                                                <tr>
                                                                                    <td colspan="5" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                                                </tr>
    @endforelse
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 d-flex flex-column">
                                                    <div class="row flex-grow">
                                                        <div class="col-12 grid-margin stretch-card">
                                                            <div class="card card-rounded">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                                <h4 class="card-title card-title-dash">Type By Amount</h4>
                                                                            </div>
                                                                            <div>
                                                                                <canvas class="my-auto" id="doughnutChart"></canvas>
                                                                            </div>
                                                                            <div id="doughnutChart-legend" class="mt-5 text-center"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row flex-grow">
                                                        <div class="col-12 grid-margin stretch-card">
                                                            <div class="card card-rounded">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                                <div>
                                                                                    <h4 class="card-title card-title-dash">Leave Report</h4>
                                                                                </div>
                                                                                <div>
                                                                                    <div class="dropdown">
                                                                                        <button class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                                                            <h6 class="dropdown-header">week Wise</h6>
                                                                                            <a class="dropdown-item" href="#">Year Wise</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <canvas id="leaveReport"></canvas>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row flex-grow">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <div class="au-breadcrumb-content mb-sm-0 mb-3">
                                            <div class="au-breadcrumb-left text-sm-start text-center">
                                                <h2 class="title-1">@lang('miscellaneous.admin.overview')</h2>

                                                <ul class="list-unstyled list-inline au-breadcrumb__list ms-0">
                                                    <li class="list-inline-item">@lang('miscellaneous.menu.dashboard')</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <button class="au-btn au-btn-icon au-btn--blue mb-sm-0 mb-2">
                                            <i class="zmdi zmdi-plus"></i>@lang('miscellaneous.add')
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon" style="margin-top: -25px;">
                                                    <i class="bi bi-clock"></i>
                                                </div>
                                                <div id="inProgressRides" class="text">
                                                    <h2></h2>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon" style="margin-top: -25px;">
                                                    <i class="bi bi-calendar-check"></i>
                                                </div>
                                                <div id="completedRides" class="text">
                                                    <h2></h2>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="overview-item overview-item--c3">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon" style="margin-top: -25px;">
                                                    <i class="bi bi-car-front"></i>
                                                </div>
                                                <div id="requestedRides" class="text">
                                                    <h2></h2>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart3"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-0">

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="title-1 m-b-25">@lang('miscellaneous.admin.recent_vehicles')</h2>
                                    <div class="table-responsive table--no-card mb-3">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.admin.vehicle.mark')</th>
                                                    <th>@lang('miscellaneous.admin.vehicle.model')</th>
                                                    <th>@lang('miscellaneous.admin.vehicle.registration_number')</th>
                                                    <th>@lang('miscellaneous.admin.status')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($vehicles as $vehicle)
                                                <tr>
                                                    <td class="align-middle">{{ $vehicle['mark'] }}</td>
                                                    <td class="align-middle">{{ $vehicle['model'] }}</td>
                                                    <td class="align-middle">{{ $vehicle['registration_number'] }}</td>
                                                    <td>
                                                        <div class="btn-group rounded-pill shadow-0">
                                                            <button type="button" style="min-width: 120px;" class="btn btn-sm btn-{{ __('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.color') }} pb-1 rounded-pill text-start" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="@lang('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.icon') me-1"></i> @lang('miscellaneous.admin.group.status.icon_color.' . $vehicle['status']['id'] . '.name')
                                                            </button>
                                                            <ul class="dropdown-menu">
        @foreach ($statuses as $status)
                                                                <li>
                                                                    <a id="vehicleStatus-{{ $vehicle['id'] }}-{{ $status['id'] }}" class="dropdown-item{{ $status['id'] === $vehicle['status']['id'] ? ' active' : '' }}" data-object-id="{{ $vehicle['id'] }}" data-status-id="{{ $status['id'] }}" onclick="event.preventDefault(); changeStatus('vehicle', this)">
                                                                        @lang('miscellaneous.admin.group.status.icon_color.' . $status['id'] . '.name')
                                                                    </a>
                                                                </li>
        @endforeach
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('vehicle.show', ['id' => $vehicle['id']]) }}">
                                                            @lang('miscellaneous.details') <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
                                                <tr>
                                                    <td colspan="5" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                </tr>
    @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="h6 px-3 text-end">
                                        <a href="{{ route('vehicle.home') }}" class="text-decoration-underline text-success">
                                            @lang('miscellaneous.see_all_data') <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </h6>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="title-1 m-b-25">@lang('miscellaneous.admin.recent_users')</h2>
                                    <div class="table-responsive table--no-card mb-3">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>@lang('miscellaneous.photo')</th>
                                                    <th>@lang('miscellaneous.names')</th>
                                                    <th>@lang('miscellaneous.phone')</th>
                                                    <th>@lang('miscellaneous.menu.role.title')</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
    @forelse ($users as $user)
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="{{ asset($user['avatar_url']) }}" alt="{{ $user['firstname'] . ' ' . $user['lastname'] }}" width="50" class="rounded-circle">
                                                    </td>
                                                    <td class="align-middle">{{ $user['firstname'] . ' ' . $user['lastname'] }}</td>
                                                    <td class="align-middle">{{ $user['phone'] }}</td>
                                                    <td>
                                                        <select id="userRole-{{ $user['id'] }}" class="form-select form-select-sm" aria-label="@lang('miscellaneous.choose_role')" data-user-id="{{ $user['id'] }}" onchange="changeRole(this);">
                                                            <option class="small" disabled>@lang('miscellaneous.choose_role')</option>
        @foreach ($roles as $role)
                                                            <option value="{{ $role['id'] }}"{{ $user['role']['id'] == $role['id'] ? ' selected' : '' }}>{{ $role['role_name'] }}</option>
        @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('role.entity.show', ['entity' => 'users', 'id' => $user['id']]) }}">
                                                            @lang('miscellaneous.change') <i class="fa fa-angle-double-right"></i>
                                                        </a><br>
                                                        <a role="button" class="text-danger">
                                                            @lang('miscellaneous.delete')
                                                        </a>
                                                    </td>
                                                </tr>
    @empty
                                                <tr>
                                                    <td colspan="5" class="text-center fst-italic">@lang('miscellaneous.empty_list')</td>
                                                </tr>
    @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="h6 px-3 text-end">
                                        <a href="{{ route('role.entity.home', ['entity' => 'users']) }}" class="text-decoration-underline text-success">
                                            @lang('miscellaneous.see_all_data') <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </h6>
                                </div>
                            </div> --}}

@endsection