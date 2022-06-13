<style>
    .navbar-vertical .nav-link {
        color: #ffffff;
        font-weight: bold;
    }

    .navbar .nav-link:hover {
        color: #C6FFC1;
    }

    .navbar .active > .nav-link, .navbar .nav-link.active, .navbar .nav-link.show, .navbar .show > .nav-link {
        color: #C6FFC1;
    }

    .navbar-vertical .active .nav-indicator-icon, .navbar-vertical .nav-link:hover .nav-indicator-icon, .navbar-vertical .show > .nav-link > .nav-indicator-icon {
        color: #C6FFC1;
    }

    .nav-subtitle {
        display: block;
        color: #fffbdf91;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .03125rem;
    }

    .side-logo {
        background-color: #F7F8FA;
    }

    .nav-sub {
        background-color: #182c2f !important;
    }

    .nav-indicator-icon {
        margin-left: <?php echo e(Session::get('direction') === "rtl" ? '6px' : ''); ?>;
    }
</style>

<div id="sidebarMain" class="d-none">
    <aside
        style="background: #182c2f!important; text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset pb-0">
                <div class="navbar-brand-wrapper justify-content-between side-logo">
                    <!-- Logo -->
                    <?php ($e_commerce_logo=\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value); ?>
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard.index')); ?>" aria-label="Front">
                        <img style="max-height: 38px"
                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/900x400/img1.jpg')); ?>'"
                             class="navbar-brand-logo-mini for-web-logo"
                             src="<?php echo e(asset("storage/app/public/company/$e_commerce_logo")); ?>" alt="Logo">
                    </a>
                    <!-- Navbar Vertical Toggle -->
                    <button type="button"
                            class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

                <!-- Content -->
                <div class="navbar-vertical-content mt-2">
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <!-- Dashboards -->

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin')?'show':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.dashboard.index')); ?>">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('Dashboard')); ?>

                                </span>
                            </a>
                        </li>

                        <!-- End Dashboards -->
                        <!-- POS -->


                        <!-- End POS -->
                        <?php if(\App\CPU\Helpers::module_permission_check('order_management')): ?>
                            <li class="nav-item <?php echo e(Request::is('admin/orders*')?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(\App\CPU\translate('order_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <!-- Order -->
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/orders*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-shopping-cart-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('orders')); ?>

                                </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/order*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/all')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.orders.list',['all'])); ?>" title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('All')); ?>

                                            <span class="badge badge-info badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/pending')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['pending'])); ?>" title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('pending')); ?>

                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'pending'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/confirmed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('confirmed')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'confirmed'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/processing')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['processing'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('Processing')); ?>

                                                <span class="badge badge-warning badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'processing'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/out_for_delivery')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('out_for_delivery')); ?>

                                                <span class="badge badge-warning badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'out_for_delivery'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/delivered')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['delivered'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('delivered')); ?>

                                                <span class="badge badge-success badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'delivered'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/returned')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['returned'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('returned')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'returned'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/failed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['failed'])); ?>" title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('failed')); ?>

                                            <span class="badge badge-danger badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'failed'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/orders/list/canceled')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['canceled'])); ?>"
                                           title="">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(\App\CPU\translate('canceled')); ?>

                                                <span class="badge badge-danger badge-pill ml-1">
                                                <?php echo e(\App\Model\Order::where('order_type','default_type')->where(['order_status'=>'canceled'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <!--order management ends-->

                        <?php if(\App\CPU\Helpers::module_permission_check('product_management')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/brand*') || Request::is('admin/category*') || Request::is('admin/sub*') || Request::is('admin/attribute*') || Request::is('admin/product*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle"
                                       title=""><?php echo e(\App\CPU\translate('product_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <!-- Pages -->
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/brand*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-pages nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('brands')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/brand*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/add-new')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.add-new')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/list')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('List')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*')) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-filter-list nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('categories')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*'))?'block':''); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.category.view')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('category')); ?></span>
                                        </a>

                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-category.view')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('sub_category')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-sub-category/view')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-sub-category.view')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(\App\CPU\translate('sub_sub_category')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/disease*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link" href="<?php echo e(route('admin.disease.view')); ?>"
                                   title="Pages">
                                   <i class="tio-image nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Disease</span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/attribute*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.attribute.view')); ?>">
                                    <i class="tio-category-outlined nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('Attribute')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/product/list/in_house') || Request::is('admin/product/bulk-import'))?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-shop nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <span class="text-truncate"><?php echo e(\App\CPU\translate('InHouse Products')); ?></span>
                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/product/list/in_house') || Request::is('admin/product/stock-limit-list/in_house') || Request::is('admin/product/bulk-import'))?'block':''); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/product/list/in_house')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.list',['in_house', ''])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('Products')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/stock-limit-list/in_house')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.stock-limit-list',['in_house', ''])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('stock_limit_products')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/bulk-import')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.bulk-import')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('bulk_import')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/bulk-export')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.product.bulk-export')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('bulk_export')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/product/list/seller*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-airdrop nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('Seller')); ?> <?php echo e(\App\CPU\translate('Products')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/product/list/seller*')?'block':''); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/product/list/seller/0')?'active':''); ?>">
                                        <a class="nav-link "
                                           href="<?php echo e(route('admin.product.list',['seller', 'status'=>'0'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(\App\CPU\translate('New')); ?> <?php echo e(\App\CPU\translate('Products')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/list/seller/1')?'active':''); ?>">
                                        <a class="nav-link "
                                           href="<?php echo e(route('admin.product.list',['seller', 'status'=>'1'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(\App\CPU\translate('Approved')); ?> <?php echo e(\App\CPU\translate('Products')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product/list/seller/2')?'active':''); ?>">
                                        <a class="nav-link "
                                           href="<?php echo e(route('admin.product.list',['seller', 'status'=>'2'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(\App\CPU\translate('Denied')); ?> <?php echo e(\App\CPU\translate('Products')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <!--product management ends-->

                        <?php if(\App\CPU\Helpers::module_permission_check('marketing_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/banner*') || Request::is('admin/coupon*') || Request::is('admin/notification*') || Request::is('admin/deal*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(\App\CPU\translate('Marketing_Section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/banner*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.banner.list')); ?>">
                                    <i class="tio-photo-square-outlined nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('banners')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/coupon*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.coupon.add-new')); ?>">
                                    <i class="tio-credit-cards nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('coupons')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/notification*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.notification.add-new')); ?>" title="">
                                    <i class="tio-notifications-on-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('push_notification')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/deal/flash')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.deal.flash')); ?>">
                                    <i class="tio-flash nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('flash_deals')); ?></span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/deal/feature')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.deal.feature')); ?>">
                                    <i class="tio-flag-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('featured_deal')); ?>

                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--marketing section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('business_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/report/product-in-wishlist') || Request::is('admin/reviews*') || Request::is('admin/sellers/withdraw_list') || Request::is('admin/report/product-stock'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(\App\CPU\translate('business_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/stock/product-stock')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.stock.product-stock')); ?>">
                                    <i class="tio-fullscreen-1-1 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                 <?php echo e(\App\CPU\translate('product')); ?> <?php echo e(\App\CPU\translate('stock')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/reviews*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.reviews.list')); ?>">
                                    <i class="tio-star nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('Customer')); ?> <?php echo e(\App\CPU\translate('Reviews')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/stock/product-in-wishlist')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.stock.product-in-wishlist')); ?>">
                                    <i class="tio-heart-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                 <?php echo e(\App\CPU\translate('product')); ?> <?php echo e(\App\CPU\translate('in')); ?>  <?php echo e(\App\CPU\translate('wish_list')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/transaction/list')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.transaction.list')); ?>">
                                    <i class="tio-money nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                 <?php echo e(\App\CPU\translate('Transactions')); ?>

                                </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--business section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('user_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/customer/list') || Request::is('admin/sellers/seller-list'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(\App\CPU\translate('user_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/seller*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-users-switch nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(\App\CPU\translate('Seller')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/seller*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/sellers/seller-list')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.sellers.seller-list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(\App\CPU\translate('list')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sellers/withdraw_list')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sellers.withdraw_list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('withdraws')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item <?php echo e(Request::is('admin/customer/list')?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.customer.list')); ?>">
                                    <span class="tio-poi-user nav-icon"></span>
                                    <span
                                        class="text-truncate"><?php echo e(\App\CPU\translate('customers')); ?> </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--user section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('support_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/support-ticket*') || Request::is('admin/contact*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(\App\CPU\translate('support_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/contact*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.contact.list')); ?>">
                                    <i class="tio-messages nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('messages')); ?>

                                </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/support-ticket*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.support-ticket.view')); ?>">
                                    <i class="tio-chat nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(\App\CPU\translate('support_ticket')); ?>

                                </span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <!--support section ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('business_settings')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/currency/view') || Request::is('admin/business-settings/language*') || Request::is('admin/business-settings/shipping-method*') || Request::is('admin/business-settings/payment-method') || Request::is('admin/business-settings/seller-settings*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(\App\CPU\translate('business_settings')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/seller-settings*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.seller-settings.index')); ?>">
                                    <i class="tio-user-big-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('seller_settings')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/payment-method')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.payment-method.index')); ?>">
                                    <i class="tio-money-vs nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('payment_method')); ?>

                                    </span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/sms-module')?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.business-settings.sms-module')); ?>"
                                   title="<?php echo e(\App\CPU\translate('sms')); ?> <?php echo e(\App\CPU\translate('module')); ?>">
                                    <i class="tio-sms-active-outlined nav-icon"></i>
                                    <span
                                        class="text-truncate"><?php echo e(\App\CPU\translate('sms')); ?> <?php echo e(\App\CPU\translate('module')); ?></span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/shipping-method*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-car nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('shipping_method')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/business-settings/shipping-method*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/shipping-method/by/admin')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.business-settings.shipping-method.by.admin')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(\App\CPU\translate('by_admin')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/shipping-method/setting')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.business-settings.shipping-method.setting')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(\App\CPU\translate('Settings')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/language*')?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.business-settings.language.index')); ?>"
                                   title="<?php echo e(\App\CPU\translate('languages')); ?>">
                                    <i class="tio-book-opened nav-icon"></i>
                                    <span class="text-truncate"><?php echo e(\App\CPU\translate('languages')); ?></span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/social-login/view')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.social-login.view')); ?>">
                                    <i class="tio-top-security-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('social_login')); ?>

                                    </span>
                                </a>
                            </li>

                        <?php endif; ?>


                        <?php if(\App\CPU\Helpers::module_permission_check('report')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-product-sale') || Request::is('admin/report/order') || Request::is('admin/report/earning'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title="">
                                    <?php echo e(\App\CPU\translate('Report')); ?>& <?php echo e(\App\CPU\translate('Analytics')); ?>

                                </small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/earning')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.earning')); ?>">
                                    <i class="tio-chart-pie-1 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                       <?php echo e(\App\CPU\translate('Earning')); ?> <?php echo e(\App\CPU\translate('Report')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/order')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.order')); ?>">
                                    <i class="tio-chart-bar-1 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                     <?php echo e(\App\CPU\translate('Order')); ?> <?php echo e(\App\CPU\translate('Report')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-product-sale') ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-chart-bar-4 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('sale_report')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/report/inhoue-product-sale') || Request::is('admin/report/seller-product-sale') ?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/report/inhoue-product-sale')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.report.inhoue-product-sale')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(\App\CPU\translate('inhouse')); ?> <?php echo e(\App\CPU\translate('sale')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/report/seller-product-sale')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.report.seller-product-sale')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate text-capitalize">
                                                <?php echo e(\App\CPU\translate('seller')); ?> <?php echo e(\App\CPU\translate('sale')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <!--reporting and analysis ends here-->

                        <?php if(\App\CPU\Helpers::module_permission_check('employee_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/employee*') || Request::is('admin/custom-role*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle"><?php echo e(\App\CPU\translate('employee_section')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/custom-role*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.custom-role.create')); ?>">
                                    <i class="tio-incognito nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(\App\CPU\translate('employee_role')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/employee*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-user nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(\App\CPU\translate('employees')); ?>

                                        </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/employee*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/employee/add-new')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.employee.add-new')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/employee/list')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.employee.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(\App\CPU\translate('List')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item <?php echo e((Request::is('admin/employee*') || Request::is('admin/custom-role*'))?'scroll-here':''); ?>">
                            <small class="nav-subtitle"><?php echo e(\App\CPU\translate('doctor_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/doctor-settings/sliders')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.doctor-settings.sliders')); ?>">
                                <i class="tio-incognito nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('doctor_sliders')); ?></span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/doctor-settings/categories')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('admin.doctor-settings.categories')); ?>">
                                <i class="tio-incognito nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(\App\CPU\translate('doctor_categories')); ?></span>
                            </a>
                        </li>

                        <li class="nav-item" style="padding-top: 50px">
                            <div class="nav-divider"></div>
                        </li>
                    </ul>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </aside>
</div>



<?php /**PATH C:\xampp\htdocs\drdeo\resources\views/layouts/back-end/partials/_side-bar.blade.php ENDPATH**/ ?>