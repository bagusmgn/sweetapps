<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gogi - Admin and Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/media/image/favicon.png') }}" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bundle.css') }}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datepicker/daterangepicker.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/dataTable/datatables.min.css') }}" type="text/css">

    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hidden-navigation">
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <!-- ./ Preloader -->

    <!-- Sidebar group -->
    <div class="sidebar-group">

        <!-- BEGIN: Settings -->
        <div class="sidebar" id="settings">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between">
                        Settings
                        <a class="btn-sidebar-close" href="#">
                            <i class="ti-close"></i>
                        </a>
                    </h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item pl-0 pr-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                <label class="custom-control-label" for="customSwitch1">Allow notifications.</label>
                            </div>
                        </li>
                        <li class="list-group-item pl-0 pr-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Hide user requests</label>
                            </div>
                        </li>
                        <li class="list-group-item pl-0 pr-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                <label class="custom-control-label" for="customSwitch3">Speed up demands</label>
                            </div>
                        </li>
                        <li class="list-group-item pl-0 pr-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                <label class="custom-control-label" for="customSwitch4">Hide menus</label>
                            </div>
                        </li>
                        <li class="list-group-item pl-0 pr-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                <label class="custom-control-label" for="customSwitch5">Remember next visits</label>
                            </div>
                        </li>
                        <li class="list-group-item pl-0 pr-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch6">
                                <label class="custom-control-label" for="customSwitch6">Enable report
                                    generation.</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Settings -->

        <!-- BEGIN: Chat List -->
        <div class="sidebar" id="chat-list">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title d-flex justify-content-between">
                        Chats
                        <a class="btn-sidebar-close" href="#">
                            <i class="ti-close"></i>
                        </a>
                    </h6>
                    <div class="list-group list-group-flush">
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-danger">
                                    <img src="../../assets/media/image/user/women_avatar3.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div class="flex-grow- 1">
                                <h6 class="mb-1">Cass Queyeiro</h6>
                                <span class="text-muted">
                                    <i class="fa fa-image mr-1"></i> Photo
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Yesterday</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-warning">
                                    <img src="../../assets/media/image/user/man_avatar4.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Evered Asquith</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item px-0 d-flex align-items-start">
                            <div class="pr-3">
                                <div class="avatar avatar-state-danger">
                                    <span class="avatar-title bg-success rounded-circle">F</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1">Francisco Ubsdale</h6>
                                <span class="text-muted">Hello how are you?</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">2:32 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item px-0 d-flex align-items-start">
                            <div class="pr-3">
                                <div class="avatar avatar-state-success">
                                    <img src="../../assets/media/image/user/women_avatar1.jpg" class="rounded-circle"
                                        alt="image">
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1">Natale Janu</h6>
                                <span class="text-muted">Hi!</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="badge badge-primary badge-pill ml-auto mb-2">3</span>
                                <span class="small text-muted">08:27 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-warning">
                                    <img src="../../assets/media/image/user/women_avatar2.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div class="flex-grow- 1">
                                <h6 class="mb-1">Orelie Rockhall</h6>
                                <span class="text-muted">
                                    <i class="fa fa-image mr-1"></i> Photo
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Yesterday</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-info">
                                    <img src="../../assets/media/image/user/man_avatar1.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Barbette Bolf</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-secondary">
                                    <span class="avatar-title bg-warning rounded-circle">D</span>
                                </span>
                            </div>
                            <div>
                                <h6 class="mb-1">Dudley Laborde</h6>
                                <span class="text-muted">Hello how are you?</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">2:32 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-success">
                                    <img src="../../assets/media/image/user/man_avatar2.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div>
                                <h6 class="mb-1">Barbaraanne Riby</h6>
                                <span class="text-muted">Hi!</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">08:27 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-danger">
                                    <img src="../../assets/media/image/user/women_avatar3.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div class="flex-grow- 1">
                                <h6 class="mb-1">Mariana Ondrousek</h6>
                                <span class="text-muted">
                                    <i class="fa fa-image mr-1"></i> Photo
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Yesterday</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-warning">
                                    <img src="../../assets/media/image/user/man_avatar4.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Ruprecht Lait</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-info">
                                    <img src="../../assets/media/image/user/man_avatar1.jpg" class="rounded-circle"
                                        alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Cosme Hubbold</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-start">
                            <div class="pr-3">
                                <span class="avatar avatar-state-secondary">
                                    <span class="avatar-title bg-secondary rounded-circle">M</span>
                                </span>
                            </div>
                            <div>
                                <h6 class="mb-1">Mallory Darch</h6>
                                <span class="text-muted">Hello how are you?</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">2:32 PM</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Chat List -->

    </div>
    <!-- ./ Sidebar group -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        <div class="header d-print-none">
            <div class="header-container">
                <div class="header-left">
                    <div class="navigation-toggler">
                        <a href="#" data-action="navigation-toggler">
                            <i data-feather="menu"></i>
                        </a>
                    </div>

                    <div class="header-logo">
                        <a href=index.html>
                            <img class="logo" src="../../assets/media/image/logo.png" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="header-body">
                    <div class="header-body-left">
                        <ul class="navbar-nav">
                            <li class="nav-item mr-3">

                            </li>

                        </ul>
                    </div>

                    <div class="header-body-right">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link mobile-header-search-btn" title="Search">
                                    <i data-feather="search"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown d-none d-md-block">
                                <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                    <i class="maximize" data-feather="maximize"></i>
                                    <i class="minimize" data-feather="minimize"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link" title="Settings" data-sidebar-target="#settings">
                                    <i data-feather="settings"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                    <figure class="avatar avatar-sm">
                                        <img src="../../assets/media/image/user/man_avatar3.jpg" class="rounded-circle"
                                            alt="avatar">
                                    </figure>
                                    <span class="ml-2 d-sm-inline d-none">Bony Gidden</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                    <div class="text-center py-4">
                                        <figure class="avatar avatar-lg mb-3 border-0">
                                            <img src="../../assets/media/image/user/man_avatar3.jpg"
                                                class="rounded-circle" alt="image">
                                        </figure>
                                        <h5 class="text-center">Bony Gidden</h5>
                                        <div class="mb-3 small text-center text-muted">@bonygidden</div>
                                        <a href="#" class="btn btn-outline-light btn-rounded">Manage Your Account</a>
                                    </div>
                                    <div class="list-group">
                                        <a href="profile.html" class="list-group-item">View Profile</a>
                                        <a href="http://bifor.laborasyon.com/login" class="list-group-item text-danger"
                                            data-sidebar-target="#settings">Sign Out!</a>
                                    </div>
                                    <div class="p-4">
                                        <div class="mb-4">
                                            <h6 class="d-flex justify-content-between">
                                                Storage
                                                <span>%25</span>
                                            </h6>
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-success-gradient" role="progressbar"
                                                    style="width: 40%;" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <hr class="mb-3">
                                        <p class="small mb-0">
                                            <a href="#">Privacy policy</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./ Header -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- begin::navigation -->
            <div class="navigation">
                <div class="navigation-header">
                    <span>Navigation</span>
                    <a href="#">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <div class="navigation-menu-body">
                    <ul>
                        <li>
                            <a class="active" href=index.html>
                                <span class="nav-link-icon">
                                    <i data-feather="pie-chart"></i>
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('task.index')}}">
                                <span class="nav-link-icon">
                                    <i data-feather="message-circle"></i>
                                </span>
                                <span>Task</span>
                                <span class="badge badge-danger">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('lahans.index')}}">
                                <span class="nav-link-icon">
                                    <i data-feather="mail"></i>
                                </span>
                                <span>Fields</span>
                            </a>
                        </li>
                        <li>
                            <a href="todo-list.html">
                                <span class="nav-link-icon">
                                    <i data-feather="check-square"></i>
                                </span>
                                <span>Todo List</span>
                                <span class="badge badge-warning">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="file-manager.html">
                                <span class="nav-link-icon">
                                    <i data-feather="file-plus"></i>
                                </span>
                                <span>File Manager</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <span class="nav-link-icon">
                                    <i data-feather="calendar"></i>
                                </span>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="gallery.html">
                                <span class="nav-link-icon">
                                    <i data-feather="image"></i>
                                </span>
                                <span>Gallery</span>
                            </a>
                        </li>
                        <li>
                            <a href="invoice.html">
                                <span class="nav-link-icon">
                                    <i data-feather="file-text"></i>
                                </span>
                                <span>Invoice</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="shopping-cart"></i>
                                </span>
                                <span>E-commerce</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="orders.html">Orders</a>
                                </li>
                                <li>
                                    <a href="products.html">Products</a>
                                </li>
                                <li>
                                    <a href="product-detail.html">Product Detail</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="edit-3"></i>
                                </span>
                                <span>Forms</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="basic-forms.html">Basic Forms</a>
                                </li>
                                <li>
                                    <a href="custom-forms.html">Custom Forms</a>
                                </li>
                                <li>
                                    <a href="advanced-forms.html">Advanced Forms</a>
                                </li>
                                <li>
                                    <a href="form-validation.html">Form Validation</a>
                                </li>
                                <li>
                                    <a href="form-wizard.html">Form Wizard</a>
                                </li>

                                <li>
                                    <a href="form-repeater.html">Form Repeater</a>
                                </li>
                                <li>
                                    <a href="file-upload.html">File Upload</a>
                                </li>
                                <li>
                                    <a href="ckeditor.html">CKEditor</a>
                                </li>
                                <li>
                                    <a href="datepicker.html">Datepicker</a>
                                </li>
                                <li>
                                    <a href="timepicker.html">Timepicker</a>
                                </li>
                                <li>
                                    <a href="colorpicker.html">Colorpicker</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="layers"></i>
                                </span>
                                <span>Components</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Elements</a>
                                    <ul>
                                        <li>
                                            <a href="alert.html">Alerts</a>
                                        </li>
                                        <li>
                                            <a href="accordion.html">Accordion</a>
                                        </li>
                                        <li>
                                            <a href="buttons.html">Buttons</a>
                                        </li>
                                        <li>
                                            <a href="dropdown.html">Dropdown</a>
                                        </li>
                                        <li>
                                            <a href="list-group.html">List Group</a>
                                        </li>
                                        <li>
                                            <a href="pagination.html">Pagination</a>
                                        </li>
                                        <li>
                                            <a href="typography.html">Typography</a>
                                        </li>
                                        <li>
                                            <a href="media-object.html">Media Object</a>
                                        </li>
                                        <li>
                                            <a href="progress.html">Progress</a>
                                        </li>
                                        <li>
                                            <a href="modal.html">Modal</a>
                                        </li>
                                        <li>
                                            <a href="spinners.html">Spinners</a>
                                        </li>
                                        <li>
                                            <a href="navs.html">Navs</a>
                                        </li>
                                        <li>
                                            <a href="tab.html">Tab</a>
                                        </li>
                                        <li>
                                            <a href="tooltip.html">Tooltip</a>
                                        </li>
                                        <li>
                                            <a href="popovers.html">Popovers</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Cards</a>
                                    <ul>
                                        <li>
                                            <a href="basic-cards.html">Basic Cards </a>
                                        </li>
                                        <li>
                                            <a href="image-cards.html">Image Cards </a>
                                        </li>
                                        <li>
                                            <a href="scroll-cards.html">Scroll Cards </a>
                                        </li>
                                        <li>
                                            <a href="other-cards.html">Others Cards</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Tables</a>
                                    <ul>
                                        <li>
                                            <a href="basic-tables.html">Basic Tables</a>
                                        </li>
                                        <li>
                                            <a href="dataTable.html">Datatable</a>
                                        </li>
                                        <li>
                                            <a href="responsive-tables.html">Responsive Tables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Charts</a>
                                    <ul>
                                        <li>
                                            <a href="apexchart.html">Apex Chart</a>
                                        </li>
                                        <li>
                                            <a href="chartjs.html">Chartjs</a>
                                        </li>
                                        <li>
                                            <a href="justgage.html">Justgage</a>
                                        </li>
                                        <li>
                                            <a href="morsis.html">Morsis</a>
                                        </li>
                                        <li>
                                            <a href="peity.html">Peity</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Maps</a>
                                    <ul>
                                        <li>
                                            <a href="google-map.html">Google Map</a>
                                        </li>
                                        <li>
                                            <a href="vector-map.html">Vector Map</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="avatar.html">
                                        Avatar
                                    </a>
                                </li>
                                <li>
                                    <a href="icons.html">
                                        Icons
                                    </a>
                                </li>
                                <li>
                                    <a href="colors.html">
                                        Colors
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="gift"></i>
                                </span>
                                <span>Plugins</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="sweet-alert.html">Sweet Alert</a>
                                </li>
                                <li>
                                    <a href="lightbox.html">Lightbox</a>
                                </li>
                                <li>
                                    <a href="toast.html">Toast</a>
                                </li>
                                <li>
                                    <a href="tour.html">Tour</a>
                                </li>
                                <li>
                                    <a href="slick-slide.html">Slick Slide</a>
                                </li>
                                <li>
                                    <a href="nestable.html">Nestable</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="copy"></i>
                                </span>
                                <span>Pages</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="profile.html">Profile</a>
                                </li>
                                <li>
                                    <a href="users.html">Users</a>
                                </li>
                                <li>
                                    <a href="settings.html">Settings</a>
                                </li>
                                <li>
                                    <a href="login.html" target="_blank">Login</a>
                                </li>
                                <li>
                                    <a href="register.html" target="_blank">Register</a>
                                </li>
                                <li>
                                    <a href="recovery-password.html" target="_blank">Recovery Password</a>
                                </li>
                                <li>
                                    <a href="lock-screen.html" target="_blank">Lock Screen</a>
                                </li>
                                <li>
                                    <a href="timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="pricing-table.html">Pricing Table</a>
                                </li>

                                <li>
                                    <a href="pricing-table-2.html">Pricing Table 2</a>
                                </li>
                                <li>
                                    <a href="search-result.html">Search Result</a>
                                </li>
                                <li>
                                    <a href="#">Error Pages</a>
                                    <ul>
                                        <li>
                                            <a href="404.html" target="_blank">404</a>
                                        </li>
                                        <li>
                                            <a href="mean-at-work.html" target="_blank">Mean at Work</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blank-page.html">Blank Page</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="mailing.html">
                                <span class="nav-link-icon">
                                    <i data-feather="corner-up-right"></i>
                                </span>
                                <span>Mailing</span>
                            </a>
                            <ul>
                                <li>
                                    <a target="_blank" href="email-template-basic.html">Basic</a>
                                </li>
                                <li>
                                    <a target="_blank" href="email-template-alert.html">Alert</a>
                                </li>
                                <li>
                                    <a target="_blank" href="email-template-billing.html">Billing</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="menu"></i>
                                </span>
                                <span>Menu Level</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Menu Level</a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Level </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="disabled">
                                <span class="nav-link-icon">
                                    <i data-feather="mouse-pointer"></i>
                                </span>
                                <span>Disabled</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end::navigation -->

            <!-- Content body -->
            <div class="content-body">
                <div class="content ">
                @include('sweetalert::alert')

                @yield('content')
                </div>

                <!-- ./ Content -->

                <!-- Footer -->
                <footer class="content-footer">
                    <div>© 2020 Gogi - <a href="http://laborasyon.com" target="_blank">Laborasyon</a></div>
                    <div>
                        <nav class="nav">
                            <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
                            <a href="#" class="nav-link">Change Log</a>
                            <a href="#" class="nav-link">Get Help</a>
                        </nav>
                    </div>
                </footer>
                <!-- ./ Footer -->
            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./ Layout wrapper -->

    <!-- Main scripts -->
    <script src="{{ asset('assets/vendors/bundle.js') }}"></script>

    <!-- Apex chart -->
    <script src="{{ asset('assets/vendors/charts/apex/apexcharts.min.js') }}"></script>

    <!-- Daterangepicker -->
    <script src="{{ asset('assets/vendors/datepicker/daterangepicker.js') }}"></script>

    <!-- DataTable -->
    <script src="{{ asset('assets/vendors/dataTable/datatables.min.js') }}"></script>

    <!-- Dashboard scripts -->
    <script src="{{ asset('assets/js/examples/pages/dashboard.js') }}"></script>

    <!-- App scripts -->

    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    @stack('scripts')

</body>

</html>
