<!-- Footer -->
<style>
    .social-media :hover {
        color: <?php echo e($web_config['secondary_color']); ?> !important;
    }
    .widget-list-link{
        color: #999898 !important;
    }

    .widget-list-link:hover{
        color: white !important;
    }
    a.d-table-cell.cz-handheld-toolbar-item.icon-free1 {
    border-radius: 56px;
    background-color: #009745;
    width: 56px;
    position: absolute;
    margin-top: -38px;
    margin-left: 3px;
    padding: 9px;
    border: none;
    }

    
/* trustBarWrap */
.trustBarWrap{ margin-top: 1.5rem !important;}


/* @media (min-width:768px){ */
    .trustBarWrap{display:block;background-color:#fff}
    .trustBarWrap .trustBar{display:table;table-layout:fixed;width:100%}
    .trustBarWrap .trustBar .trustBox{display:table-cell;text-align:center;padding:20px 10px;border-right:1px solid #F4F4F4}
    .trustBarWrap .trustBar .trustBox:last-child{border-right:none}
    .trustBarWrap .trustBar .trustBox>div .trustBarIcon{width:40px;height:40px;margin-bottom:15px;display:inline-block}
    .trustBarWrap .trustBar .trustBox>div .trustBarIcon svg{width:100%;height:100%;fill:#51C9A6}
    .trustBarWrap .trustBar .trustBox>div .trustBarTitle{display:block;width:100%;font-size:17px;color:#505050;text-transform:uppercase}
    .trustBarWrap .trustBar .trustBox>div .trustBarTitle span{width:100%;display:block;margin-top:10px;font-size:75%;color:#b7b7b7;text-transform:capitalize}


</style>
  <!-- ======= trustBarWrap END ========-->
  <div class="trustBarWrap">
        <div class="hm-container">
            <div class="trustBar">
                <div class="trustBox">
                    <div>
                        <span class="trustBarIcon">
                        <img  src="/public/assets/front-end/img/secure.png" onerror="this.src='http://127.0.0.1:8000/public/assets/front-end/img/secure.png'" alt="Dr Deo Homoeo Pvt. Ltd.">
                               </span>
                        <span class="trustBarTitle">
                            100% Secure
                            <span>100% Payments Protection</span>
                        </span>
                    </div>
                </div>
                <div class="trustBox cod">
                    <div>
                        <span class="trustBarIcon">
                        <img  src="/public/assets/front-end/img/cash.png" alt="Dr Deo Homoeo Pvt. Ltd.">
                       
                        </span>
                        <span class="trustBarTitle">
                            Cash On Delivery
                            <span>Get first pay later</span>
                        </span>
                    </div>
                </div>
                <div class="trustBox">
                    <div>
                        <span class="trustBarIcon">
                        <img  src="/public/assets/front-end/img/return.png"  alt="Dr Deo Homoeo Pvt. Ltd.">
                       
                        </span>
                        <span class="trustBarTitle">
                            Easy Return
                            <span>Easy return &amp; refund</span>
                        </span>
                    </div>
                </div>
                <div class="trustBox">
                    <div>
                        <span class="trustBarIcon">
                        <img  src="/public/assets/front-end/img/help.png" alt="Dr Deo Homoeo Pvt. Ltd.">
                        
                        </span>
                        <span class="trustBarTitle">
                            Help Center
                            <span>Call: 8084000363 or Read <a href="#">FAQs</a> </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= trustBarWrap END ========-->

    
<footer class="page-footer font-small mdb-color pt-3 rtl">
    <!-- Footer Links -->
    <div class="container text-center" style="padding-bottom: 13px;">

        <!-- Footer links -->
        <div
            class="row text-center <?php echo e(Session::get('direction') === "rtl" ? 'text-md-right' : 'text-md-left'); ?> mt-3 pb-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
                <div class="text-nowrap mb-4">
                    <a class="d-inline-block mt-n1" href="<?php echo e(route('home')); ?>">
                        <img width="250" style="height: 60px!important;"
                             src="<?php echo e(asset("storage/app/public/company/")); ?>/<?php echo e($web_config['footer_logo']->value); ?>"
                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                             alt="<?php echo e($web_config['name']->value); ?>"/>
                    </a>
                </div>
                <?php ($social_media = \App\Model\SocialMedia::where('active_status', 1)->get()); ?>
                <?php if(isset($social_media)): ?>
                    <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="social-media">
                                <a class="social-btn sb-light sb-<?php echo e($item->name); ?> <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?> mb-2"
                                   target="_blank" href="<?php echo e($item->link); ?>" style="color: white!important;">
                                    <i class="<?php echo e($item->icon); ?>" aria-hidden="true"></i>
                                </a>
                            </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class="widget mb-4 for-margin">
                    <?php ($ios = \App\CPU\Helpers::get_business_settings('download_app_apple_stroe')); ?>
                    <?php ($android = \App\CPU\Helpers::get_business_settings('download_app_google_stroe')); ?>

                    <?php if($ios['status'] || $android['status']): ?>
                        <h6 class="text-uppercase font-weight-bold footer-heder">
                            <?php echo e(\App\CPU\translate('download_our_app')); ?>

                        </h6>
                    <?php endif; ?>


                    <div class="store-contents" style="display: flex;">
                        <?php if($ios['status']): ?>
                            <div class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?> mb-2">
                                <a class="" href="<?php echo e($ios['link']); ?>" role="button"><img
                                        src="<?php echo e(asset("public/assets/front-end/png/apple_app.png")); ?>"
                                        alt="" style="height: 40px!important;">
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if($android['status']): ?>
                            <div class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?> mb-2">
                                <a href="<?php echo e($android['link']); ?>" role="button">
                                    <img src="<?php echo e(asset("public/assets/front-end/png/google_app.png")); ?>"
                                         alt="" style="height: 40px!important;">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 f1">
                <h6 class="text-uppercase mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('special')); ?></h6>
                <ul class="widget-list" style="padding-bottom: 10px">
                    <?php ($flash_deals=\App\Model\FlashDeal::where(['status'=>1,'deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first()); ?>
                    <?php if(isset($flash_deals)): ?>
                        <li class="widget-list-item">
                            <a class="widget-list-link"
                               href="<?php echo e(route('flash-deals',[$flash_deals['id']])); ?>">
                                <?php echo e(\App\CPU\translate('flash_deal')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>"><?php echo e(\App\CPU\translate('featured_products')); ?></a>
                    </li>
                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('products',['data_from'=>'latest','page'=>1])); ?>"><?php echo e(\App\CPU\translate('latest_products')); ?></a>
                    </li>
                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('products',['data_from'=>'best-selling','page'=>1])); ?>"><?php echo e(\App\CPU\translate('best_selling_product')); ?></a>
                    </li>
                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('products',['data_from'=>'top-rated','page'=>1])); ?>"><?php echo e(\App\CPU\translate('top_rated_product')); ?></a>
                    </li>

                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('brands')); ?>"><?php echo e(\App\CPU\translate('all_brand')); ?></a>
                    </li>
                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('categories')); ?>"><?php echo e(\App\CPU\translate('all_category')); ?></a>
                    </li>

                </ul>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 f2">
                <h6 class="text-uppercase mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('account&shipping_info')); ?></h6>
                <?php if(auth('customer')->check()): ?>
                    <ul class="widget-list" style="padding-bottom: 10px">
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('user-account')); ?>"><?php echo e(\App\CPU\translate('profile_info')); ?></a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('wishlists')); ?>"><?php echo e(\App\CPU\translate('wish_list')); ?></a>
                        </li>
                        
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('track-order.index')); ?>"><?php echo e(\App\CPU\translate('track_order')); ?></a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('account-address')); ?>"><?php echo e(\App\CPU\translate('address')); ?></a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('account-tickets')); ?>"><?php echo e(\App\CPU\translate('support_ticket')); ?></a>
                        </li>
                        
                    </ul>
                <?php else: ?>
                    <ul class="widget-list" style="padding-bottom: 10px">
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('customer.auth.login')); ?>"><?php echo e(\App\CPU\translate('profile_info')); ?></a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('customer.auth.login')); ?>"><?php echo e(\App\CPU\translate('wish_list')); ?></a>
                        </li>
                        
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('track-order.index')); ?>"><?php echo e(\App\CPU\translate('track_order')); ?></a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('customer.auth.login')); ?>"><?php echo e(\App\CPU\translate('address')); ?></a>
                        </li>
                        <li class="widget-list-item"><a class="widget-list-link"
                                                        href="<?php echo e(route('customer.auth.login')); ?>"><?php echo e(\App\CPU\translate('support_ticket')); ?></a>
                        </li>
                        
                        
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Grid column -->
            <!-- <hr class="w-100 clearfix d-md-none"> -->

            <!-- Grid column -->
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 f3">
                <h6 class="text-uppercase mb-4 font-weight-bold footer-heder"><?php echo e(\App\CPU\translate('about_us')); ?></h6>


                <ul class="widget-list" style="padding-bottom: 10px">
                    
                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('about-us')); ?>"><?php echo e(\App\CPU\translate('about_company')); ?></a>
                    </li>
                    <li class="widget-list-item"><a class="widget-list-link"
                                                    href="<?php echo e(route('helpTopic')); ?>"><?php echo e(\App\CPU\translate('faq')); ?></a></li>
                    <li class="widget-list-item "><a class="widget-list-link"
                                                     href="<?php echo e(route('terms')); ?>"><?php echo e(\App\CPU\translate('terms_&_conditions')); ?></a>

                    </li>

                    <li class="widget-list-item ">
                        <a class="widget-list-link" href="<?php echo e(route('privacy-policy')); ?>">
                            <?php echo e(\App\CPU\translate('privacy_policy')); ?>

                        </a>
                    </li>
                    <li class="widget-list-item "><a class="widget-list-link"
                                                     href="<?php echo e(route('contacts')); ?>"><?php echo e(\App\CPU\translate('contact_us')); ?></a>

                    </li>
                </ul>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Footer links -->
    </div>

    <hr>
    <!-- Grid row -->
    <div class="container text-center">
        <div class="row d-flex align-items-center footer-end">
            <div class="col-md-12 mt-3">
                <p class="text-center" style="font-size: 12px;"><?php echo e($web_config['copyright_text']->value); ?></p>
            </div>
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->
</footer>
<!-- Footer -->


<div class="cz-handheld-toolbar" id="toolbar">
    <div class="d-table table-fixed w-100">
    <a class="d-table-cell cz-handheld-toolbar-item" onclick="openNav11()">
        <span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span>
        <span class="cz-handheld-toolbar-label">Categories</span></a>

<!-- 
    <a class="d-table-cell cz-handheld-toolbar-item" href="https://www.drdeo.co.in/wishlists">
        <span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i></span>
        <span class="cz-handheld-toolbar-label">Wishlist (<span class="countWishlist">0</span>)
        <span class="badge badge-primary badge-pill ml-1" id="cart_count">0</span>
        </span>
    </a> -->

          
    <a class="d-table-cell cz-handheld-toolbar-item" href="https://www.drdeo.co.in/shop-cart">
        <span class="cz-handheld-toolbar-icon"><i class="czi-heart"></i>
            <span class="badge badge-primary badge-pill ml-1" id="cart_count">0</span>
        </span>
        <span class="cz-handheld-toolbar-label" id="cart_total_price">
        Wishlist </span>
    </a>

   
    
    <a class="d-table-cell cz-handheld-toolbar-item icon-free1" href="#">
        <span class="cz-handheld-toolbar-icon-ask"><i class="fa fa-stethoscope"></i></span>
        <span class="cz-handheld-toolbar-label-ask"> Ask Doctor</span>
    </a>
    
        
    <a class="d-table-cell cz-handheld-toolbar-item" href="https://www.drdeo.co.in/shop-cart">
        <span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i>
            <span class="badge badge-primary badge-pill ml-1" id="cart_count">0</span>
        </span>
        <span class="cz-handheld-toolbar-label" id="cart_total_price">
                         Cart
                    </span>
    </a>
     <a class="d-table-cell cz-handheld-toolbar-item" href="https://www.drdeo.co.in/customer/auth/login">
    <span class="cz-handheld-toolbar-icon"><i class="fa fa-user-o"></i></span>
    <span class="cz-handheld-toolbar-label">Profile</span></a>
 </div>
</div>

<?php /**PATH C:\xampp\htdocs\drdeo\resources\views/layouts/front-end/partials/_footer.blade.php ENDPATH**/ ?>