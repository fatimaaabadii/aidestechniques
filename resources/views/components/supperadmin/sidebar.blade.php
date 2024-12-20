<div class="vertical-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="26"> <span class="logo-txt"></span>
            </span>
        </a>

        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo.png')}}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo.png')}}" alt="" height="26"> <span class="logo-txt">Entraide</span>
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('supperadmin.dashboard') }}" >
                        <i class="bx bx-home-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('supperadmin.delegation') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="nav-icon" stroke="currentColor" width="20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                        </svg>
                        <span class="menu-item" data-key="t-delegation">{{ __('Delegations')}}</span>
                    </a>
                </li>

                <li>
                    <a href="/test">
                        <i class="bx bx-user nav-icon"></i>
                        <span class="menu-item" data-key="t-delegation">{{ __('Users')}}</span>
                    </a>
                </li>
                <li class="menu-title" data-key="t-applications">Applications</li>

                <li>
                    <a href="apps-calendar.html">
                        <i class="bx bx-calendar-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-calendar">Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="apps-chat.html">
                        <i class="bx bx-chat nav-icon"></i>
                        <span class="menu-item" data-key="t-chat">Chat</span>
                        <span class="badge rounded-pill badge-soft-danger" data-key="t-hot">Hot</span>
                    </a>
                </li>

                <li>
                    <a href="apps-kanban-board.html">
                        <i class="bx bxl-trello nav-icon"></i>
                        <span class="menu-item" data-key="t-kanban">Kanban Board</span>
                    </a>
                </li>

                <li>
                    <a href="apps-file-manager.html">
                        <i class="bx bx-folder nav-icon"></i>
                        <span class="menu-item" data-key="t-filemanager">File Manager</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-shield-quarter nav-icon"></i>
                        <span class="menu-item" data-key="t-ecommerce">Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products.html" data-key="t-products">Products</a></li>
                        <li><a href="ecommerce-product-detail.html" data-key="t-product-detail">Product Detail</a></li>
                        <li><a href="ecommerce-orders.html" data-key="t-orders">Orders</a></li>
                        <li><a href="ecommerce-customers.html" data-key="t-customers">Customers</a></li>
                        <li><a href="ecommerce-cart.html" data-key="t-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout.html" data-key="t-checkout">Checkout</a></li>
                        <li><a href="ecommerce-shops.html" data-key="t-shops">Shops</a></li>
                        <li><a href="ecommerce-add-product.html" data-key="t-add-product">Add Product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-mail-send nav-icon"></i>
                        <span class="menu-item" data-key="t-email">Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html" data-key="t-inbox">Inbox</a></li>
                        <li><a href="email-read.html" data-key="t-read-email">Read Email</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-book nav-icon"></i>
                        <span class="menu-item" data-key="t-contacts">Contacts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="contacts-grid.html" data-key="t-user-grid">User Grid</a></li>
                        <li><a href="contacts-list.html" data-key="t-user-list">User List</a></li>
                        <li><a href="contacts-settings.html" data-key="t-user-settings">User Settings</a></li>
                    </ul>
                </li>

                <li>
                    <a href="apps-gallery.html">
                        <i class="bx bx-image-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-gallery">Gallery</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-briefcase-alt-2 nav-icon"></i>
                        <span class="menu-item" data-key="t-projects">Projects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="projects-grid.html" data-key="t-p-grid">Projects Grid</a></li>
                        <li><a href="projects-list.html" data-key="t-p-list">Projects List</a></li>
                        <li><a href="projects-overview.html" data-key="t-p-overview">Project Overview</a></li>
                        <li><a href="projects-create.html" data-key="t-create-new">Create New</a></li>
                    </ul>
                </li>

                <li class="menu-title" data-key="t-layouts">Layouts</li>

                <li>
                    <a href="layout-vertical.html">
                        <i class="bx bx-layout nav-icon"></i>
                        <span class="menu-item" data-key="t-verfical">Vertical</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-pages">Pages</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="bx bx-user nav-icon"></i>
                        <span class="menu-item" data-key="t-authentication">Authentication</span>
                        <span class="badge rounded-pill bg-info">9</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-signin">Sign In</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-signin-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-signin-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-signup">Sign Up</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-signup-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-signup-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-signout">Sign Out</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-signout-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-signout-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-lock-screen">Lock Screen</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-lockscreen-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-lockscreen-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-forgot-password">Forgot
                                Password</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-forgotpassword-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-forgotpassword-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-reset-password">Reset
                                Password</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-resetpassword-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-resetpassword-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-email-verification">Email
                                Verification</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-emailverification-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-emailverification-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-2step-verification">2-step
                                Verification</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-2step-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-2step-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-thankyou">Thank you</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="auth-thankyou-basic.html" data-key="t-basic">Basic</a></li>
                                <li><a href="auth-thankyou-cover.html" data-key="t-cover">Cover</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-info-circle nav-icon"></i>
                        <span class="menu-item" data-key="t-error-pages">Error Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="error-404-basic.html" data-key="t-error-404-basic">404 Basic</a></li>
                        <li><a href="error-404-cover.html" data-key="t-error-404-cover">404 Cover</a></li>
                        <li><a href="error-500-basic.html" data-key="t-error-500-basic">500 Basic</a></li>
                        <li><a href="error-500-cover.html" data-key="t-error-500-cover">500 Cover</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file-blank nav-icon"></i>
                        <span class="menu-item" data-key="t-utility">Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html" data-key="t-starter-page">Starter Page</a></li>
                        <li><a href="pages-profile.html" data-key="t-profile">Profile</a></li>
                        <li><a href="pages-maintenance.html" data-key="t-maintenance">Maintenance</a></li>
                        <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Coming Soon</a></li>
                        <li><a href="pages-faqs.html" data-key="t-faqs">FAQs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-purchase-tag-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-pricing">Pricing</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pricing-basic.html" data-key="t-basic">Basic</a></li>
                        <li><a href="pricing-table.html" data-key="t-table">Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file nav-icon"></i>
                        <span class="menu-item" data-key="t-invoices">Invoices</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="invoices-list.html" data-key="t-invoice-list">Invoice List</a></li>
                        <li><a href="invoices-detail.html" data-key="t-invoice-detail">Invoice Detail</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-award nav-icon"></i>
                        <span class="menu-item" data-key="t-timeline">Timeline</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="timeline-center.html" data-key="t-center-view">Center View</a></li>
                        <li><a href="timeline-left.html" data-key="t-left-view">Left View</a></li>
                    </ul>
                </li>

                <li class="menu-title" data-key="t-components">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-tone nav-icon"></i>
                        <span class="menu-item" data-key="t-ui-elements">UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html" data-key="t-alerts">Alerts</a></li>
                        <li><a href="ui-buttons.html" data-key="t-buttons">Buttons</a></li>
                        <li><a href="ui-cards.html" data-key="t-cards">Cards</a></li>
                        <li><a href="ui-carousel.html" data-key="t-carousel">Carousel</a></li>
                        <li><a href="ui-dropdowns.html" data-key="t-dropdowns">Dropdowns</a></li>
                        <li><a href="ui-grid.html" data-key="t-grid">Grid</a></li>
                        <li><a href="ui-images.html" data-key="t-images">Images</a></li>
                        <li><a href="ui-modals.html" data-key="t-modals">Modals</a></li>
                        <li><a href="ui-offcanvas.html" data-key="t-offcanvas">Offcanvas</a></li>
                        <li><a href="ui-placeholders.html" data-key="t-placeholders">Placeholders</a></li>
                        <li><a href="ui-progressbars.html" data-key="t-progress-bars">Progress Bars</a></li>
                        <li><a href="ui-tabs-accordions.html" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html" data-key="t-typography">Typography</a></li>
                        <li><a href="ui-video.html" data-key="t-video">Video</a></li>
                        <li><a href="ui-general.html" data-key="t-general">General</a></li>
                        <li><a href="ui-colors.html" data-key="t-colors">Colors</a></li>
                        <li><a href="ui-utilities.html" data-key="t-utilities">Utilities</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-customize nav-icon"></i>
                        <span class="menu-item" data-key="t-extend-ui">Extended UI</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                        <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                        <li><a href="extended-sweet-alert.html" data-key="t-sweetalert">SweetAlert 2</a></li>
                        <li><a href="extended-rating.html" data-key="t-rating">Rating</a></li>
                        <li><a href="extended-notifications.html" data-key="t-notifications">Notifications</a></li>
                        <li><a href="extended-swiperslider.html" data-key="t-swiperslider">Swiper Slider</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-pencil nav-icon"></i>
                        <span class="menu-item" data-key="t-forms">Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html" data-key="t-basic-elements">Basic Elements</a></li>
                        <li><a href="form-validation.html" data-key="t-validation">Validation</a></li>
                        <li><a href="form-advanced.html" data-key="t-advanced-plugins">Advanced Plugins</a></li>
                        <li><a href="form-editors.html" data-key="t-editors">Editors</a></li>
                        <li><a href="form-uploads.html" data-key="t-file-upload">File Upload</a></li>
                        <li><a href="form-wizard.html" data-key="t-wizard">Wizard</a></li>
                        <li><a href="form-mask.html" data-key="t-mask">Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-table nav-icon"></i>
                        <span class="menu-item" data-key="t-tables">Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html" data-key="t-bootstrap-basic">Bootstrap Basic</a></li>
                        <li><a href="tables-advanced.html" data-key="t-advanced-tables">Advance Tables</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-bar-chart-alt-2 nav-icon"></i>
                        <span class="menu-item" data-key="t-apex-charts">Apex Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-line.html" data-key="t-line">Line</a></li>
                        <li><a href="charts-area.html" data-key="t-area">Area</a></li>
                        <li><a href="charts-column.html" data-key="t-column">Column</a></li>
                        <li><a href="charts-bar.html" data-key="t-bar">Bar</a></li>
                        <li><a href="charts-mixed.html" data-key="t-mixed">Mixed</a></li>
                        <li><a href="charts-timeline.html" data-key="t-timeline">Timeline</a></li>
                        <li><a href="charts-candlestick.html" data-key="t-candlestick">Candlestick</a></li>
                        <li><a href="charts-boxplot.html" data-key="t-boxplot">Boxplot</a></li>
                        <li><a href="charts-bubble.html" data-key="t-bubble">Bubble</a></li>
                        <li><a href="charts-scatter.html" data-key="t-scatter">Scatter</a></li>
                        <li><a href="charts-heatmap.html" data-key="t-heatmap">Heatmap</a></li>
                        <li><a href="charts-treemap.html" data-key="t-treemap">Treemap</a></li>
                        <li><a href="charts-pie.html" data-key="t-pie">Pie</a></li>
                        <li><a href="charts-radialbar.html" data-key="t-radialbar">Radialbar</a></li>
                        <li><a href="charts-radar.html" data-key="t-radar">Radar</a></li>
                        <li><a href="charts-polararea.html" data-key="t-polararea">Polararea</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-archive nav-icon"></i>
                        <span class="menu-item" data-key="t-icons">Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-unicons.html" data-key="t-unicons">Unicons</a></li>
                        <li><a href="icons-feathericons.html" data-key="t-feather-icons">Feather icons</a></li>
                        <li><a href="icons-boxicons.html" data-key="t-boxicons">Boxicons</a></li>
                        <li><a href="icons-materialdesign.html" data-key="t-material-design">Material Design</a></li>
                        <li><a href="icons-fontawesome.html" data-key="t-font-awesome">Font Awesome 5</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-map-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-maps">Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html" data-key="t-google">Google</a></li>
                        <li><a href="maps-vector.html" data-key="t-vector">Vector</a></li>
                        <li><a href="maps-leaflet.html" data-key="t-leaflet">Leaflet</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-share-alt nav-icon"></i>
                        <span class="menu-item" data-key="t-multi-level">Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" data-key="t-level-1.1">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow" data-key="t-level-1.2">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2.1">Level 2.1</a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2.2">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
