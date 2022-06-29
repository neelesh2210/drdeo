<?php $__env->startSection('title',\App\CPU\translate('Welcome To').' '.$web_config['name']->value); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/home.css"/>
    <style>
        .media {
            background: white;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
        }

        .cz-countdown-days {
            color: white !important;
            background-color: <?php echo e($web_config['primary_color']); ?>;
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-hours {
            color: white !important;
            background-color: <?php echo e($web_config['primary_color']); ?>;
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-minutes {
            color: white !important;
            background-color: <?php echo e($web_config['primary_color']); ?>;
            padding: 0px 6px;
            border-radius: 3px;
            margin-right: 3px !important;
        }

        .cz-countdown-seconds {
            color: <?php echo e($web_config['primary_color']); ?>;
            border: 1px solid<?php echo e($web_config['primary_color']); ?>;
            padding: 0px 6px;
            border-radius: 3px !important;
        }

        .flash_deal_product_details .flash-product-price {
            font-weight: 700;
            font-size: 18px;
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        .featured_deal_left {
            height: 130px;
            background: <?php echo e($web_config['primary_color']); ?> 0% 0% no-repeat padding-box;
            padding: 10px 13px;
            text-align: center;
        }

        .category_div:hover {
            color: <?php echo e($web_config['secondary_color']); ?>;
        }

        .deal_of_the_day {
            /* filter: grayscale(0.5); */
            opacity: .8;
            background: <?php echo e($web_config['secondary_color']); ?>;
            border-radius: 3px;
        }

        .deal-title {
            font-size: 12px;

        }

        .for-flash-deal-img img {
            max-width: none;
        }

        @media (max-width: 375px) {
            .cz-countdown {
                display: flex !important;

            }

            .cz-countdown .cz-countdown-seconds {

                margin-top: -5px !important;
            }

            .for-feature-title {
                font-size: 20px !important;
            }
        }

        @media (max-width: 600px) {
            .flash_deal_title {
                font-size: 20px;
                padding: 7px 5px;
                font-weight: 600;
                color: #505050;
                text-transform: uppercase;
            }

            .cz-countdown .cz-countdown-value {
                font-family: "Roboto", sans-serif;
                font-size: 11px !important;
                font-weight: 700 !important;
            }

            .featured_deal {
                opacity: 1 !important;
            }

            .cz-countdown {
                display: inline-block;
                flex-wrap: wrap;
                font-weight: normal;
                margin-top: 4px;
                font-size: smaller;
            }

            .view-btn-div-f {

                margin-top: 6px;
                float: right;
            }

            .view-btn-div {
                float: right;
            }

            .viw-btn-a {
                font-size: 10px;
                font-weight: 600;
            }


            .for-mobile {
                display: none;
            }

            .featured_for_mobile {
                max-width: 100%;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 360px) {
            .featured_for_mobile {
                max-width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .featured_deal {
                opacity: 1 !important;
            }
        }

        @media (max-width: 375px) {
            .featured_for_mobile {
                max-width: 100%;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .featured_deal {
                opacity: 1 !important;
            }
        }

        @media (min-width: 768px) {
            .displayTab {
                display: block !important;
            }
        }

        @media (max-width: 800px) {
            .for-tab-view-img {
                width: 40%;
            }

            .for-tab-view-img {
                width: 105px;
            }

            .widget-title {
                font-size: 19px !important;
            }
        }

        .featured_deal_carosel .carousel-inner {
            width: 100% !important;
        }

        .badge-style2 {
            color: black !important;
            background: transparent !important;
            font-size: 11px;
        }



.hm-topCategoriesMobile {
   position: relative
}

.hm-topCategoriesMobile .categoryItem {
   width: 98%;
   display: inline-block;
   vertical-align: top
}

.hm-topCategoriesMobile .categoryItem>a {
   margin: 0 5px 10px;
   display: block;
   text-align: center;
   height: 100px
}

@media (min-width:768px) {
   .hm-topCategoriesMobile .categoryItem {
    width: 98%;
    margin-left: 7px;
    padding-bottom: 15px;

   }
   .hm-topCategoriesMobile .categoryItem>a {
      height: 140px;
      margin-top: 25px
   }
}

.hm-topCategoriesMobile .categoryItem>a .categoryIcon {
   display: inline-block;
   width: 55px;
   height: 55px;
   webkit-border-radius: 50%;
   -moz-border-radius: 50%;
   -ms-border-radius: 50%;
   border-radius: 50%;
   overflow: hidden
}


@media (min-width:768px) {
   .hm-topCategoriesMobile .categoryItem>a .categoryIcon {
      width: 100px;
      height: 100px;
      border: 2px solid #fff;
      margin-bottom: 10px;
      box-shadow: 0 2px 8px 0 rgba(0, 0, 0, .06)
   }
   .hm-topCategoriesMobile .categoryItem>a .categoryTitle {
      font-weight: 500;
      color: #818181
   }
}

.hm-topCategoriesMobile .categoryItem>a .categoryIcon img {
   width: 100%;
   height: auto
}

.hm-topCategoriesMobile .categoryItem>a .categoryTitle {
   display: block;
   max-height: 36px;
   font-size: 13px;
}

.hm-topCategoriesMobile .categoryItem>a:focus,
.hm-topCategoriesMobile .categoryItem>a:hover {
   text-decoration: none
}

.hm-topCategoriesMobile .categoryItem>a:hover .categoryTitle {
   color: #149f54;
}


/*======= TOP CATEGORIES END ========*/
.owl-dots {
    display: none;
}
.cat-border {
    border-bottom: 1px solid #dbdbdb;
    padding-top: 15px;
    margin: 0px;
}

.flash-d .cat-border {
    margin: 0px;
    padding: 15px 10px 15px 10px;
}

.rating-show {
    display: none;
}
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/owl.theme.default.min.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero (Banners + Slider)-->
    <section class="bg-transparent mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <?php echo $__env->make('web-views.partials._home-top-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= TOP CATEGORIES START ========-->
        
    <section class="container mt-4 cat-mt1">
        <div class="hm-container card">
         <div class="hm-section hm-topCategoriesMobile">
             <div class="row cat-border">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 hm-sectionTitle"><h2>Top Categories</h2></div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a  style="float:right;" class="btn btn-outline-accent btn-sm viw-btn-a cat"
                       href="https://drdeo.co.in/categories">
                        <?php echo e(\App\CPU\translate('view_all')); ?>

                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                    </a>
                </div>
                </div>
                <div class="owl-carousel owl-theme " id="category-slider">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="categoryItem" data-href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
               <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                  <span class="categoryIcon">
                     <img src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>">
                  </span>
                  <span class="categoryTitle"><?php echo e($category->name); ?></span>
               </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
        </div>
    </section>
    <!-- ======= TOP CATEGORIES END ========-->

    <!-- ======= SHOP BY HEALTH CONCERN START ========-->
    
    <section class="container mt-4 cat-mt1">
        <div class="hm-container card">
         <div class="hm-section hm-topCategoriesMobile">
            <div class="row cat-border">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  hm-sectionTitle"><h2>SHOP BY HEALTH CONCERN</h2></div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a  style="float:right;" class="btn btn-outline-accent btn-sm viw-btn-a cat"
                       href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                        <?php echo e(\App\CPU\translate('view_all')); ?>

                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                    </a>
            </div>
                </div>
                <div class="owl-carousel owl-theme " id="category-slider">
                    <?php $__currentLoopData = $diseases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="categoryItem" data-href="<?php echo e(route('products',['id'=> $disease['slug'],'data_from'=>'disease','page'=>1])); ?>">
                       <a href="<?php echo e(route('products',['id'=> $disease['id'],'data_from'=>'disease','page'=>1])); ?>">
                          <span class="categoryIcon">
                             <img src="<?php echo e(asset("storage/app/public/disease/$disease->icon")); ?>">
                          </span>
                          <span class="categoryTitle"><?php echo e($disease->name); ?></span>
                       </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
         </div>
        </div>
    </section>
    <!-- ======= SHOP BY HEALTH CONCERN END ========-->

     <!-- ======= CARD START ========-->
     <section class="container special-card">
        <div class="mt-2 mb-3 p-2 card1-slider  card">
            <div class="owl-carousel owl-theme" id="card1-slider">
                <?php ($secon_banner=\App\Model\Banner::where('banner_type','Secondary Banner')->where('published',1)->orderBy('id','asc')->take(3)->get()); ?>
        <?php $__currentLoopData = $secon_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                        <a href="<?php echo e($banner['url']); ?>">
                            <img onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'" src="<?php echo e(asset('storage/app/public/banner')); ?>/<?php echo e($banner['photo']); ?>"></a>

                        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
     <!-- ======= CARD END ========-->


    <!-- ======= flash deal  START ========-->
    
    <?php ($flash_deals=\App\Model\FlashDeal::with(['products.product'])->where(['status'=>1])->where(['deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first()); ?>

    <?php if(isset($flash_deals)): ?>
        <div class="container flash-d">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="row section-header fd rtl mx-0 cat-border">
                        <div class="" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0">
                            <div class="d-inline-flex displayTab">
                                <span class="flash_deal_title ">
                                    <?php echo e($flash_deals['title']); ?>

                                </span>
                            </div>
                        </div>
                        <div class="" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 0">
                            <div class="row view_all view-btn-div-f float-right mx-0">
                                <div class="<?php echo e(Session::get('direction') === "rtl" ? 'pl-2' : 'pr-2'); ?>">
                                    <span class="cz-countdown"
                                          data-countdown="<?php echo e(isset($flash_deals)?date('m/d/Y',strtotime($flash_deals['end_date'])):''); ?> 11:59:00 PM">
                                        <span class="cz-countdown-days">
                                            <span class="cz-countdown-value"></span>
                                        </span>
                                        <span class="cz-countdown-value">:</span>
                                        <span class="cz-countdown-hours">
                                            <span class="cz-countdown-value"></span>
                                        </span>
                                        <span class="cz-countdown-value">:</span>
                                        <span class="cz-countdown-minutes">
                                            <span class="cz-countdown-value"></span>
                                        </span>
                                        <span class="cz-countdown-value">:</span>
                                        <span class="cz-countdown-seconds">
                                            <span class="cz-countdown-value"></span>
                                        </span>
                                    </span>
                                </div>
                                <div class="">
                                    <a class="btn btn-outline-accent btn-sm viw-btn-a"
                                       href="<?php echo e(route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme mt-2 p-2" id="flash-deal-slider">
                        <?php $__currentLoopData = $flash_deals->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( $deal->product): ?>
                                <?php echo $__env->make('web-views.partials._product-card-1',['product'=>$deal->product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- ======= flash deal  END ========-->


    <!-- 
    <section class="container rtl">
        <div class="section-header">
            <div class="feature_header" style="color: black">
                <span> <?php echo e(\App\CPU\translate('brands')); ?></span>
            </div>
            <div>
                <a class="btn btn-outline-accent btn-sm viw-btn-a" href="<?php echo e(route('brands')); ?>">
                    <?php echo e(\App\CPU\translate('view_all')); ?>

                    <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                </a>
            </div>
        </div>
     
        <div class="mt-2 mb-3 brand-slider">
            <div class="owl-carousel owl-theme" id="brands-slider">
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                        <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>">
                            <div class="brand_div d-flex align-items-center justify-content-center"
                                 style="height:100px">
                                <img
                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                    src="<?php echo e(asset("storage/app/public/brand/$brand->image")); ?>" alt="<?php echo e($brand->name); ?>">
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section> -->

    <!-- Products grid (featured products)-->
    <!-- <?php if(count($featured_products) > 0): ?>
        <section class="container rtl"> -->
            <!-- Heading-->
            <!-- <div class="section-header">
                <div class="feature_header">
                    <span class="for-feature-title"><?php echo e(\App\CPU\translate('featured_products')); ?></span>
                </div>
                <div>
                    <a class="btn btn-outline-accent btn-sm viw-btn-a"
                       href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                        <?php echo e(\App\CPU\translate('view_all')); ?>

                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                    </a>
                </div>
            </div> -->

        <!-- Grid-->
            <!-- <div class="row mt-2 mb-3">
                <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 10px">
                        <?php echo $__env->make('web-views.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?> -->

    <!-- ======= FEATURED PRODUCTS START ========-->
    
    <div class="container rtl mt-3">
        <div class="row">
            
            <div class="col-xl-12">

                <div class="card">
                    <div class="row cat-border">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  hm-sectionTitle"><h2>FEATURED PRODUCTS</h2></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                            <a  style="float:right;" class="btn btn-outline-accent btn-sm viw-btn-a cat"
                            href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                                <?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Grid-->
                    <div class="row mt-2 mb-3 p-2">
                        <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 10px">
                                <?php echo $__env->make('web-views.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- <div class="row mt-2 mb-3 p-2">
                        <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-2 col-sm-3 col-xs-6 mb-2">
                                <?php echo $__env->make('web-views.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ======= FEATURED PRODUCTS END ========-->


    
    <?php ($featured_deals=\App\Model\FlashDeal::with(['products.product.reviews'])->where(['status'=>1])->where(['deal_type'=>'feature_deal'])->first()); ?>

    <?php if(isset($featured_deals)): ?>
        <section class="container featured_deal rtl mt-3">
            <div class="card p-2">
                <div class="row">
                    <div class="col-xl-3 col-md-4 right">
                        <div class="d-flex align-items-center justify-content-center featured_deal_left">
                            <h1 class="featured_deal_title"
                                style="padding-top: 12px"><?php echo e(\App\CPU\translate('featured_deal')); ?></h1>
                        </div>
                    </div>

                    <div class="col-xl-9 col-md-8">
                        <div class="owl-carousel owl-theme" id="web-feature-deal-slider">
                            <?php $__currentLoopData = $featured_deals->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('web-views.partials._product-card-1',['product'=>$product->product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ======= Latest PRODUCTS START ========-->

    
    <div class="container rtl mt-3">
        <div class="row">
            <!-- 
            <div class="col-xl-3 col-md-4 pb-4 mt-3">
                <div class="deal_of_the_day">
                    <?php if(isset($deal_of_the_day)): ?>
                        <h1 style="color: white"> <?php echo e(\App\CPU\translate('deal_of_the_day')); ?></h1>
                        <center>
                            <strong style="font-size: 21px!important;color: <?php echo e($web_config['primary_color']); ?>">
                                <?php echo e($deal_of_the_day->discount_type=='amount'?\App\CPU\Helpers::currency_converter($deal_of_the_day->discount):$deal_of_the_day->discount.' % '); ?>

                                <?php echo e(\App\CPU\translate('off')); ?>

                            </strong>
                        </center>
                        <div class="d-flex justify-content-center align-items-center" style="padding-top: 37px">
                            <img style="height: 206px;"
                                 src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($deal_of_the_day->product['thumbnail']); ?>"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 alt="">
                        </div>
                        <div style="text-align: center; padding-top: 26px;">
                            <h5 style="font-weight: 600; color: <?php echo e($web_config['primary_color']); ?>">
                                <?php echo e(\Illuminate\Support\Str::limit($deal_of_the_day->product['name'],40)); ?>

                            </h5>
                            <span class="text-accent">
                                <?php echo e(\App\CPU\Helpers::currency_converter(
                                    $deal_of_the_day->product->unit_price-(\App\CPU\Helpers::get_product_discount($deal_of_the_day->product,$deal_of_the_day->product->unit_price))
                                )); ?>

                            </span>
                            <?php if($deal_of_the_day->product->discount > 0): ?>
                                <strike style="font-size: 12px!important;color: grey!important;">
                                    <?php echo e(\App\CPU\Helpers::currency_converter($deal_of_the_day->product->unit_price)); ?>

                                </strike>
                            <?php endif; ?>

                        </div>
                        <div class="pt-3 pb-2" style="text-align: center;">
                            <button class="buy_btn"
                                    onclick="location.href='<?php echo e(route('product',$deal_of_the_day->product->slug)); ?>'"><?php echo e(\App\CPU\translate('buy_now')); ?>

                            </button>
                        </div>
                    <?php else: ?>
                        <?php ($product=\App\Model\Product::active()->inRandomOrder()->first()); ?>
                        <?php if(isset($product)): ?>
                            <h1 style="color: white"> <?php echo e(\App\CPU\translate('recommended_product')); ?></h1>
                            <div class="d-flex justify-content-center align-items-center" style="padding-top: 55px">
                                <img style="height: 206px;"
                                     src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                     alt="">
                            </div>
                            <div style="text-align: center; padding-top: 60px;" class="pb-2">
                                <button class="buy_btn" onclick="location.href='<?php echo e(route('product',$product->slug)); ?>'">
                                    <?php echo e(\App\CPU\translate('buy_now')); ?>

                                </button>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="container mt-2">
                    <div class="row p-0">
                        <div class="col-md-3 p-0 text-center mobile-padding mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/delivery.png")); ?>"
                                 alt="">
                            <div class="deal-title">3 <?php echo e(\App\CPU\translate('days')); ?>

                                <br><span><?php echo e(\App\CPU\translate('free_delivery')); ?></span></div>
                        </div>
                        <div class="col-md-3 p-0 text-center mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/money.png")); ?>" alt="">
                            <div class="deal-title"><?php echo e(\App\CPU\translate('money_back_guarantee')); ?></div>
                        </div>
                        <div class="col-md-3 p-0 text-center mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/Genuine.png")); ?>"
                                 alt="">
                            <div class="deal-title">100% <?php echo e(\App\CPU\translate('genuine')); ?>

                                <br><span><?php echo e(\App\CPU\translate('product')); ?></span></div>
                        </div>
                        <div class="col-md-3 p-0 text-center mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/Payment.png")); ?>"
                                 alt="">
                            <div class="deal-title"><?php echo e(\App\CPU\translate('authentic_payment')); ?></div>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <div class="col-xl-12">
                <!-- <div class="section-header">
                    <div class="feature_header">
                        <span class="for-feature-title"><?php echo e(\App\CPU\translate('latest_products')); ?></span>
                    </div>
                    <div>
                        <a class="btn btn-outline-accent btn-sm viw-btn-a"
                           href="<?php echo e(route('products',['data_from'=>'latest'])); ?>">
                            <?php echo e(\App\CPU\translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                        </a>
                    </div>
                </div> -->
                <div class="card">
                    <div class="row cat-border">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  hm-sectionTitle"><h2>Latest Products</h2></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                            <a  style="float:right;" class="btn btn-outline-accent btn-sm viw-btn-a cat"
                            href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                                <?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Grid-->
                    <div class="row mt-2 mb-3 p-2">
                        <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 10px">
                                <?php echo $__env->make('web-views.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ======= Latest PRODUCTS END ========-->



    <!-- 
    <section class="container rtl">
        <div class="section-header">
            <div class="feature_header">
                <span><?php echo e(\App\CPU\translate('categories')); ?></span>
            </div>
            <div>
                <a class="btn btn-outline-accent btn-sm viw-btn-a"
                   href="<?php echo e(route('categories')); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                    <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                </a>
            </div>
        </div>

        <div class="mt-2 mb-3 brand-slider">
            <div class="owl-carousel owl-theme " id="category-slider">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="category_div" style="height: 132px; width: 100%;">
                        <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                            <img style="vertical-align: middle; padding: 16%;height: 100px"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>"
                                 alt="<?php echo e($category->name); ?>">
                            <p class="text-center small"
                               style="margin-top: -20px"><?php echo e(Str::limit($category->name, 17)); ?></p>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section> -->


    
    <div class="container rtl mt-3">
        <div class="row">
            <!-- 
            <div class="col-xl-3 col-md-4 pb-4 mt-3">
                <div class="deal_of_the_day">
                    <?php if(isset($deal_of_the_day)): ?>
                        <h1 style="color: white"> <?php echo e(\App\CPU\translate('deal_of_the_day')); ?></h1>
                        <center>
                            <strong style="font-size: 21px!important;color: <?php echo e($web_config['primary_color']); ?>">
                                <?php echo e($deal_of_the_day->discount_type=='amount'?\App\CPU\Helpers::currency_converter($deal_of_the_day->discount):$deal_of_the_day->discount.' % '); ?>

                                <?php echo e(\App\CPU\translate('off')); ?>

                            </strong>
                        </center>
                        <div class="d-flex justify-content-center align-items-center" style="padding-top: 37px">
                            <img style="height: 206px;"
                                 src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($deal_of_the_day->product['thumbnail']); ?>"
                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                 alt="">
                        </div>
                        <div style="text-align: center; padding-top: 26px;">
                            <h5 style="font-weight: 600; color: <?php echo e($web_config['primary_color']); ?>">
                                <?php echo e(\Illuminate\Support\Str::limit($deal_of_the_day->product['name'],40)); ?>

                            </h5>
                            <span class="text-accent">
                                <?php echo e(\App\CPU\Helpers::currency_converter(
                                    $deal_of_the_day->product->unit_price-(\App\CPU\Helpers::get_product_discount($deal_of_the_day->product,$deal_of_the_day->product->unit_price))
                                )); ?>

                            </span>
                            <?php if($deal_of_the_day->product->discount > 0): ?>
                                <strike style="font-size: 12px!important;color: grey!important;">
                                    <?php echo e(\App\CPU\Helpers::currency_converter($deal_of_the_day->product->unit_price)); ?>

                                </strike>
                            <?php endif; ?>

                        </div>
                        <div class="pt-3 pb-2" style="text-align: center;">
                            <button class="buy_btn"
                                    onclick="location.href='<?php echo e(route('product',$deal_of_the_day->product->slug)); ?>'"><?php echo e(\App\CPU\translate('buy_now')); ?>

                            </button>
                        </div>
                    <?php else: ?>
                        <?php ($product=\App\Model\Product::active()->inRandomOrder()->first()); ?>
                        <?php if(isset($product)): ?>
                            <h1 style="color: white"> <?php echo e(\App\CPU\translate('recommended_product')); ?></h1>
                            <div class="d-flex justify-content-center align-items-center" style="padding-top: 55px">
                                <img style="height: 206px;"
                                     src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                     alt="">
                            </div>
                            <div style="text-align: center; padding-top: 60px;" class="pb-2">
                                <button class="buy_btn" onclick="location.href='<?php echo e(route('product',$product->slug)); ?>'">
                                    <?php echo e(\App\CPU\translate('buy_now')); ?>

                                </button>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="container mt-2">
                    <div class="row p-0">
                        <div class="col-md-3 p-0 text-center mobile-padding mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/delivery.png")); ?>"
                                 alt="">
                            <div class="deal-title">3 <?php echo e(\App\CPU\translate('days')); ?>

                                <br><span><?php echo e(\App\CPU\translate('free_delivery')); ?></span></div>
                        </div>
                        <div class="col-md-3 p-0 text-center mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/money.png")); ?>" alt="">
                            <div class="deal-title"><?php echo e(\App\CPU\translate('money_back_guarantee')); ?></div>
                        </div>
                        <div class="col-md-3 p-0 text-center mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/Genuine.png")); ?>"
                                 alt="">
                            <div class="deal-title">100% <?php echo e(\App\CPU\translate('genuine')); ?>

                                <br><span><?php echo e(\App\CPU\translate('product')); ?></span></div>
                        </div>
                        <div class="col-md-3 p-0 text-center mt-1 mt-md-0">
                            <img style="height: 29px;" src="<?php echo e(asset("public/assets/front-end/png/Payment.png")); ?>"
                                 alt="">
                            <div class="deal-title"><?php echo e(\App\CPU\translate('authentic_payment')); ?></div>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <div class="col-xl-12">
                <!-- <div class="section-header">
                    <div class="feature_header">
                        <span class="for-feature-title"><?php echo e(\App\CPU\translate('latest_products')); ?></span>
                    </div>
                    <div>
                        <a class="btn btn-outline-accent btn-sm viw-btn-a"
                           href="<?php echo e(route('products',['data_from'=>'latest'])); ?>">
                            <?php echo e(\App\CPU\translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                        </a>
                    </div>
                </div> -->
                <div class="card">
                    <div class="row cat-border">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  hm-sectionTitle"><h2>Top rated</h2></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                            <a  style="float:right;" class="btn btn-outline-accent btn-sm viw-btn-a cat"
                            href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                                <?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>
                        </div>
                    </div>


                    <!-- Grid-->
                    <div class="row mt-2 mb-3 p-2">
                        <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 10px">
                                <?php echo $__env->make('web-views.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <?php $__currentLoopData = $home_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="container rtl">
            <!-- Heading-->
            <div class="section-header">
                <div class="feature_header">
                    <span class="for-feature-title"><?php echo e($category['name']); ?></span>
                </div>
                <div>
                    <a class="btn btn-outline-accent btn-sm viw-btn-a"
                       href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
                        <?php echo e(\App\CPU\translate('view_all')); ?>

                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                    </a>
                </div>
            </div>

            <div class="row mt-2 mb-3">
                <?php $__currentLoopData = $category['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 10px">
                        <?php echo $__env->make('web-views.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- ======= Brand START ========-->
    
    <section class="container mt-4 cat-mt1">
        <div class="hm-container card">
         <div class="hm-section hm-topCategoriesMobile">
            <div class="row cat-border">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  hm-sectionTitle"><h2>Brands</h2></div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                    <a  style="float:right;" class="btn btn-outline-accent btn-sm viw-btn-a cat"
                       href="<?php echo e(route('brands')); ?>">
                        <?php echo e(\App\CPU\translate('view_all')); ?>

                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                    </a>
                </div>
                </div>
                <div class="owl-carousel owl-theme " id="category-slider">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="categoryItem" data-href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>">
               <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>">
                  <span class="categoryIcon">
                     <img src="<?php echo e(asset("storage/app/public/brand/$brand->image")); ?>">
                  </span>
                  <span class="categoryTitle"><?php echo e($brand->name); ?></span>
               </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
         </div>
        </div>
    </section>
    <!-- ======= Brand END ========-->


     <!-- ======= CARD START ========-->
     <section class="container special-card">
        <div class="mt-2 mb-3 p-2 card2-slider  card">
            <div class="owl-carousel owl-theme" id="card2-slider">
                <?php ($footer_banner=\App\Model\Banner::where('banner_type','Footer Banner')->where('published',1)->orderBy('id','asc')->take(3)->get()); ?>
                <?php $__currentLoopData = $footer_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                        <a href="<?php echo e($banner['url']); ?>">
                        <img onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'" src="<?php echo e(asset('storage/app/public/banner')); ?>/<?php echo e($banner['photo']); ?>"></a>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
     <!-- ======= CARD END ========-->

    <!-- ======= Best sellings END ========-->
    <!-- <div class="container flash-d mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="row section-header fd rtl mx-0 cat-border">
                    <div class="" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0">
                        <div class="d-inline-flex displayTab">
                            <span class="flash_deal_title ">
                            Best sellings
                            </span>
                        </div>
                    </div>
                    <div class="" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 0">
                        <div class="row view_all view-btn-div-f float-right mx-0">

                            <div class="">
                                <a class="btn btn-outline-accent btn-sm viw-btn-a"
                                    href="<?php echo e(route('flash-deals',[isset($flash_deals)?$flash_deals['id']:0])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                    <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme mt-2 p-2" id="flash-deal-slider">
                <?php $__currentLoopData = $bestSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$bestSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($bestSell->product && $key<4): ?>
                        <div class="media align-items-center pt-2 pb-2 mb-1"
                                data-href="<?php echo e(route('product',$bestSell->product->slug)); ?>">
                            <a class="d-block <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>"
                                href="<?php echo e(route('product',$bestSell->product->slug)); ?>">
                                <img style="height: 54px; width: 54px"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($bestSell->product['thumbnail']); ?>"
                                        alt="Product"/>
                            </a>
                            <div class="media-body">
                                <h6 class="widget-product-title">
                                    <a class="ptr"
                                        href="<?php echo e(route('product',$product->slug)); ?>">
                                        <?php echo e(\Illuminate\Support\Str::limit($bestSell->product['name'],30)); ?>

                                    </a>
                                </h6>
                                <div class="widget-product-meta">
                                    <span class="text-accent">
                                        <?php echo e(\App\CPU\Helpers::currency_converter(
                                        $bestSell->product->unit_price-(\App\CPU\Helpers::get_product_discount($bestSell->product,$bestSell->product->unit_price))
                                        )); ?>


                                        <?php if($bestSell->product->discount > 0): ?>
                                            <strike style="font-size: 12px!important;color: grey!important;">
                                                <?php echo e(\App\CPU\Helpers::currency_converter($bestSell->product->unit_price)); ?>

                                            </strike>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ======= Best sellings END ========-->


    <!-- ======= Best sellings START ========-->
    
    <div class="container rtl mt-3">
        <div class="row">
            
            <div class="col-xl-12">

                <div class="card">
                    <div class="row cat-border">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  hm-sectionTitle"><h2>BEST SELLINGS</h2></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a  style="float:right;" class="btn btn-outline-accent btn-sm viw-btn-a cat"
                                href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                                    <?php echo e(\App\CPU\translate('view_all')); ?>

                                    <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                                </a>
                        </div>
                    </div>



                   <!-- Grid-->

            <div class="row mt-2 mb-3 p-2">
                <?php $__currentLoopData = $bestSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$bestSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-2 col-sm-3 col-6" style="margin-bottom: 10px">
                        <?php echo $__env->make('web-views.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Best sellings  END ========-->



    <!-- Product widgets-->
    <!-- <section class="container pb-4 pb-md-5 rtl">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 mb-2 py-3">
                <div class="widget">
                    <div class="d-flex justify-content-between">
                        <h3 class="widget-title"><?php echo e(\App\CPU\translate('best_sellings')); ?></h3>
                        <div>
                            <a class="btn btn-outline-accent btn-sm"
                               href="<?php echo e(route('products',['data_from'=>'best-selling','page'=>1])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>
                        </div>
                    </div>
                    <?php $__currentLoopData = $bestSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$bestSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($bestSell->product && $key<4): ?>
                            <div class="media align-items-center pt-2 pb-2 mb-1"
                                 data-href="<?php echo e(route('product',$bestSell->product->slug)); ?>">
                                <a class="d-block <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>"
                                   href="<?php echo e(route('product',$bestSell->product->slug)); ?>">
                                    <img style="height: 54px; width: 54px"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($bestSell->product['thumbnail']); ?>"
                                         alt="Product"/>
                                </a>
                                <div class="media-body">
                                    <h6 class="widget-product-title">
                                        <a class="ptr"
                                           href="<?php echo e(route('product',$product->slug)); ?>">
                                            <?php echo e(\Illuminate\Support\Str::limit($bestSell->product['name'],30)); ?>

                                        </a>
                                    </h6>
                                    <div class="widget-product-meta">
                                        <span class="text-accent">
                                            <?php echo e(\App\CPU\Helpers::currency_converter(
                                            $bestSell->product->unit_price-(\App\CPU\Helpers::get_product_discount($bestSell->product,$bestSell->product->unit_price))
                                            )); ?>


                                            <?php if($bestSell->product->discount > 0): ?>
                                                <strike style="font-size: 12px!important;color: grey!important;">
                                                    <?php echo e(\App\CPU\Helpers::currency_converter($bestSell->product->unit_price)); ?>

                                                </strike>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-2 py-3">
                <div class="widget">
                    <div class="d-flex justify-content-between">
                        <h3 class="widget-title"><?php echo e(\App\CPU\translate('new_arrivals')); ?></h3>
                        <div>
                            <a class="btn btn-outline-accent btn-sm"
                               href="<?php echo e(route('products',['data_from'=>'latest','page'=>1])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i>
                            </a>
                        </div>
                    </div>
                    <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key<4): ?>
                            <div class="media align-items-center pt-2 pb-2 mb-1"
                                 data-href="<?php echo e(route('product',$product->slug)); ?>">
                                <a class="d-block <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>"
                                   href="<?php echo e(route('product',$product->slug)); ?>">
                                    <img style="height: 54px; width: 54px"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                         alt="Product"/>
                                </a>
                                <div class="media-body">
                                    <h6 class="widget-product-title">
                                        <a class="ptr"
                                           href="<?php echo e(route('product',$product->slug)); ?>">
                                            <?php echo e(\Illuminate\Support\Str::limit($product['name'],30)); ?>

                                        </a>
                                    </h6>
                                    <div class="widget-product-meta">
                                          <span class="text-accent">
                                            <?php echo e(\App\CPU\Helpers::currency_converter(
                                            $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                                            )); ?>

                                              <?php if($product->discount > 0): ?>
                                                  <strike style="font-size: 12px!important;color: grey!important;">
                                                    <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                                                </strike>
                                              <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-2 py-3">
                <div class="widget">
                    <div class="d-flex justify-content-between">
                        <h3 class="widget-title"><?php echo e(\App\CPU\translate('top_rated')); ?></h3>
                        <div><a class="btn btn-outline-accent btn-sm"
                                href="<?php echo e(route('products',['data_from'=>'top-rated','page'=>1])); ?>"><?php echo e(\App\CPU\translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1' : 'right ml-1 mr-n1'); ?>"></i></a>
                        </div>
                    </div>
                    <?php $__currentLoopData = $topRated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($top->product && $key<4): ?>
                            <div class="media align-items-center pt-2 pb-2 mb-1"
                                 data-href="<?php echo e(route('product',$top->product->slug)); ?>">
                                <a class="d-block <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>"
                                   href="<?php echo e(route('product',$top->product->slug)); ?>">
                                    <img style="height: 54px; width: 54px"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($top->product['thumbnail']); ?>"
                                         alt="Product"/>
                                </a>
                                <div class="media-body">
                                    <h6 class="widget-product-title">
                                        <a class="ptr"
                                           href="<?php echo e(route('product',$top->product->slug)); ?>">
                                            <?php echo e(\Illuminate\Support\Str::limit($top->product['name'],30)); ?>

                                        </a>
                                    </h6>
                                    <div class="widget-product-meta">
                                       <span class="text-accent">
                                            <?php echo e(\App\CPU\Helpers::currency_converter(
                                            $top->product->unit_price-(\App\CPU\Helpers::get_product_discount($top->product,$top->product->unit_price))
                                            )); ?>


                                           <?php if($top->product->discount > 0): ?>
                                               <strike style="font-size: 12px!important;color: grey!important;">
                                                    <?php echo e(\App\CPU\Helpers::currency_converter($top->product->unit_price)); ?>

                                                </strike>
                                           <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section> -->




<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/js/owl.carousel.min.js"></script>

    <script>
        $('#flash-deal-slider').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 5,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 4
                },
                //Extra extra large
                1400: {
                    items: 4
                }
            }
        })

        $('#web-feature-deal-slider').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 5,
            nav: false,
            //navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 2
                },
                //Large
                992: {
                    items: 2
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })
    </script>

    <script>
        $('#brands-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '<?php echo e(session('direction')); ?>': true,
            //navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 7
                },
                //Large
                992: {
                    items: 9
                },
                //Extra large
                1200: {
                    items: 11
                },
                //Extra extra large
                1400: {
                    items: 12
                }
            }
        })
    </script>

    <script>
        $('#category-slider, #top-seller-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 5,
            nav: false,
            // navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            '<?php echo e(session('direction')); ?>': true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 2
                },
                360: {
                    items: 3
                },
                375: {
                    items: 3
                },
                540: {
                    items: 4
                },
                //Small
                576: {
                    items: 5
                },
                //Medium
                768: {
                    items: 6
                },
                //Large
                992: {
                    items: 8
                },
                //Extra large
                1200: {
                    items: 10
                },
                //Extra extra large
                1400: {
                    items: 11
                }
            }
        })
    </script>




<script>
        $('#card1-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '<?php echo e(session('direction')); ?>': true,
            //navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 3
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })
</script>



<script>
        $('#card2-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '<?php echo e(session('direction')); ?>': true,
            //navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 1
                },
                375: {
                    items: 1
                },
                540: {
                    items: 1
                },
                //Small
                576: {
                    items: 1
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 3
                },
                //Extra large
                1200: {
                    items: 3
                },
                //Extra extra large
                1400: {
                    items: 3
                }
            }
        })
    </script>



<script>
        $('#bestsell-slider').owlCarousel({
            loop: false,
            autoplay: false,
            margin: 10,
            nav: false,
            '<?php echo e(session('direction')); ?>': true,
            //navText: ["<i class='czi-arrow-left'></i>","<i class='czi-arrow-right'></i>"],
            dots: true,
            autoplayHoverPause: true,
            // center: true,
            responsive: {
                //X-Small
                0: {
                    items: 1
                },
                360: {
                    items: 2
                },
                375: {
                    items: 2
                },
                540: {
                    items: 2
                },
                //Small
                576: {
                    items: 2
                },
                //Medium
                768: {
                    items: 3
                },
                //Large
                992: {
                    items: 4
                },
                //Extra large
                1200: {
                    items: 6
                },
                //Extra extra large
                1400: {
                    items: 6
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/web-views/home.blade.php ENDPATH**/ ?>