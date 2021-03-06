<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorSliderController;
use App\Http\Controllers\api\v1\CustomerController;
use App\Http\Controllers\api\v2\doctor\DoctorController;
use App\Http\Controllers\api\v2\doctor\DoctorProfileController;

Route::group(['namespace' => 'api\v2', 'prefix' => 'v2'], function () {
    Route::group(['prefix' => 'seller', 'namespace' => 'seller'], function () {

        Route::get('seller-info', 'SellerController@seller_info');
        Route::get('seller-delivery-man', 'SellerController@seller_delivery_man');
        Route::get('shop-product-reviews', 'SellerController@shop_product_reviews');
        Route::put('seller-update', 'SellerController@seller_info_update');
        Route::get('monthly-earning', 'SellerController@monthly_earning');
        Route::get('monthly-commission-given', 'SellerController@monthly_commission_given');
        Route::put('cm-firebase-token', 'SellerController@update_cm_firebase_token');

        Route::get('shop-info', 'SellerController@shop_info');
        Route::get('transactions', 'SellerController@transaction');
        Route::put('shop-update', 'SellerController@shop_info_update');

        Route::post('balance-withdraw', 'SellerController@withdraw_request');
        Route::delete('close-withdraw-request', 'SellerController@close_withdraw_request');

        Route::group(['prefix' => 'products'], function () {
            Route::post('upload-images', 'ProductController@upload_images');
            Route::post('add', 'ProductController@add_new');
            Route::get('list', 'ProductController@list');
            Route::get('stock-out-list', 'ProductController@stock_out_list');
            Route::get('edit/{id}', 'ProductController@edit');
            Route::put('update/{id}', 'ProductController@update');
            Route::delete('delete/{id}', 'ProductController@delete');
        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('list', 'OrderController@list');
            Route::get('/{id}', 'OrderController@details');
            Route::put('order-detail-status/{id}', 'OrderController@order_detail_status');
            Route::put('assign-delivery-man', 'OrderController@assign_delivery_man');
        });

        Route::group(['prefix' => 'shipping-method'], function () {
            Route::get('list', 'ShippingMethodController@list');
            Route::post('add', 'ShippingMethodController@store');
            Route::get('edit/{id}', 'ShippingMethodController@edit');
            Route::put('status', 'ShippingMethodController@status_update');
            Route::put('update/{id}', 'ShippingMethodController@update');
            Route::delete('delete/{id}', 'ShippingMethodController@delete');
        });

        Route::group(['prefix' => 'messages'], function () {
            Route::get('list', 'ChatController@messages');
            Route::post('send', 'ChatController@send_message');
        });

        Route::group(['prefix' => 'auth', 'namespace' => 'auth'], function () {
            Route::post('login', 'LoginController@login');
        });
    });
    Route::post('ls-lib-update', 'LsLibController@lib_update');

    Route::group(['prefix' => 'delivery-man', 'namespace' => 'delivery_man'], function () {

        Route::group(['prefix' => 'auth', 'namespace' => 'auth'], function () {
            Route::post('login', 'LoginController@login');
        });

        Route::group(['middleware' => ['delivery_man_auth']], function () {
            Route::get('info', 'DeliveryManController@info');
            Route::get('current-orders', 'DeliveryManController@get_current_orders');
            Route::get('all-orders', 'DeliveryManController@get_all_orders');
            Route::post('record-location-data', 'DeliveryManController@record_location_data');
            Route::get('order-delivery-history', 'DeliveryManController@get_order_history');
            Route::put('update-order-status', 'DeliveryManController@update_order_status');
            Route::put('update-payment-status', 'DeliveryManController@order_payment_status_update');
            Route::get('order-details', 'DeliveryManController@get_order_details');
            Route::get('last-location', 'DeliveryManController@get_last_location');
            Route::put('update-fcm-token', 'DeliveryManController@update_fcm_token');
        });
    });



    //Doctor Api

    Route::group(['prefix' => 'doctor', 'namespace' => 'doctor'], function () {

        Route::post('register', [DoctorController::class, 'register']);
        Route::post('login', [DoctorController::class, 'login']);

        Route::middleware('auth:sanctum')->group( function () {

            Route::post('get_docotor_profile', [DoctorProfileController::class, 'getDocotorProfile']);
            Route::post('save_docotor_profile', [DoctorProfileController::class, 'saveDocotorProfile']);
            Route::post('get_docotor_slot', [DoctorProfileController::class, 'getDocotorSlot']);
            Route::post('save_docotor_slot', [DoctorProfileController::class, 'saveDocotorSlot']);
            Route::post('get_docotor_category', [DoctorProfileController::class, 'getDocotorCategory']);
            Route::post('docotor_dashboard', [DoctorProfileController::class, 'docotorDashboard']);
            Route::post('booking_histories', [DoctorProfileController::class, 'bookingHistories']);
            Route::post('upcoming_booking', [DoctorProfileController::class, 'upcomingBooking']);

        });
    });


    Route::group(['prefix' => 'customer', 'middleware' => 'auth:api'], function () {

        Route::post('doctor_home', [CustomerController::class, 'docotorHome']);
        Route::post('get_doctor_list', [CustomerController::class, 'getDoctorList']);
        Route::post('get_doctor_slot', [CustomerController::class, 'getDoctorSlot']);
        Route::post('doctor_slot_booking', [CustomerController::class, 'doctorSlotBooking']);
        Route::post('customer_booking_histories', [CustomerController::class, 'customerBookingHistories']);
        Route::post('doctor_search', [CustomerController::class, 'doctorSearch']);

    });



});
