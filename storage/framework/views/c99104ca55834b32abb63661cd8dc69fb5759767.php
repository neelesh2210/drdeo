

<?php $__env->startSection('title',\App\CPU\translate('Shipping Address Choose')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .btn-outline {
            border-color: <?php echo e($web_config['primary_color']); ?> ;
        }

        .btn-outline {
            color: #020512;
            border-color: <?php echo e($web_config['primary_color']); ?>    !important;
        }

        .btn-outline:hover {
            color: white;
            background: <?php echo e($web_config['primary_color']); ?>;

        }

        .btn-outline:focus {
            border-color: <?php echo e($web_config['primary_color']); ?>    !important;
        }

        #location_map_canvas {
            height: 100%;
        }

        @media  only screen and (max-width: 768px) {
            /* For mobile phones: */
            #location_map_canvas {
                height: 200px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container pb-5 mb-2 mb-md-4 rtl"
         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <div class="col-md-12 mb-5 pt-5">
                <div class="feature_header" style="background: #dcdcdc;line-height: 1px">
                    <span><?php echo e(\App\CPU\translate('shipping_and_billing_address')); ?></span>
                </div>
            </div>
            <section class="col-lg-8">
                <hr>
                <div class="checkout_details mt-3">
                    <!-- Steps-->
                <?php echo $__env->make('web-views.partials._checkout-steps',['step'=>2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Shipping methods table-->
                    <h2 class="h4 pb-3 mb-2 mt-5"><?php echo e(\App\CPU\translate('choose_shipping_address')); ?></h2>
                    <?php ($shipping_addresses=\App\Model\ShippingAddress::where('customer_id',auth('customer')->id())->where('is_billing',0)->get()); ?>
                    <form method="post" action="" id="address-form">

                        <div class="card-body" style="padding: 0!important;">
                            <ul class="list-group">
                                <?php $__currentLoopData = $shipping_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item mb-2 mt-2"
                                        style="cursor: pointer;background: rgba(245,245,245,0.51)"
                                        onclick="$('#sh-<?php echo e($address['id']); ?>').prop( 'checked', true )">
                                        <input type="radio" name="shipping_method_id"
                                               id="sh-<?php echo e($address['id']); ?>"
                                               value="<?php echo e($address['id']); ?>" <?php echo e($key==0?'checked':''); ?>>
                                        <span class="checkmark"
                                              style="margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 10px"></span>
                                        <label class="badge"
                                               style="background: <?php echo e($web_config['primary_color']); ?>; color:white !important;"><?php echo e($address['address_type']); ?></label>
                                        <small>
                                            <i class="fa fa-phone"></i> <?php echo e($address['phone']); ?>

                                        </small>
                                        <hr>
                                        <span><?php echo e(\App\CPU\translate('contact_person_name')); ?>: <?php echo e($address['contact_person_name']); ?></span><br>
                                        <span><?php echo e(\App\CPU\translate('address')); ?> : <?php echo e($address['address']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['zip']); ?>, <?php echo e($address['country']); ?>.</span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item mb-2 mt-2" onclick="anotherAddress()">
                                    <input type="radio" name="shipping_method_id"
                                           id="sh-0" value="0" data-toggle="collapse"
                                           data-target="#collapseThree" <?php echo e($shipping_addresses->count()==0?'checked':''); ?>>
                                    <span class="checkmark"
                                          style="margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 10px"></span>
                                    <label class="badge"
                                           style="background: <?php echo e($web_config['primary_color']); ?>; color:white !important;">
                                        <i class="fa fa-plus-circle"></i></label>
                                    <button type="button" class="btn btn-outline" data-toggle="collapse"
                                            data-target="#collapseThree"><?php echo e(\App\CPU\translate('Another')); ?> <?php echo e(\App\CPU\translate('address')); ?>

                                    </button>
                                    <div id="accordion">
                                        <div id="collapseThree"
                                             class="collapse <?php echo e($shipping_addresses->count()==0?'show':''); ?>"
                                             aria-labelledby="headingThree"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1"><?php echo e(\App\CPU\translate('contact_person_name')); ?>

                                                        <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="contact_person_name" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo e(\App\CPU\translate('Phone')); ?>

                                                        <span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="phone" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputPassword1"><?php echo e(\App\CPU\translate('address')); ?> <?php echo e(\App\CPU\translate('Type')); ?></label>
                                                    <select class="form-control" name="address_type">
                                                        <option
                                                            value="permanent"><?php echo e(\App\CPU\translate('Permanent')); ?></option>
                                                        <option value="home"><?php echo e(\App\CPU\translate('Home')); ?></option>
                                                        <option
                                                            value="others"><?php echo e(\App\CPU\translate('Others')); ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo e(\App\CPU\translate('City')); ?><span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="city" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">State<span
                                                            style="color: red">*</span></label>
                                                            <select class="form-control" name="state">
                                                    <?php ($state_tax=\App\Model\StateTax::all()); ?>
                                                    <?php $__currentLoopData = $state_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($taxx->name); ?>"><?php echo e($taxx->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                           </select>
                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(\App\CPU\translate('Country')); ?> <span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="country" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                </div>
                                             
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1"><?php echo e(\App\CPU\translate('zip_code')); ?>

                                                        <span
                                                            style="color: red">*</span></label>
                                                    <input type="number" class="form-control"
                                                           name="zip" <?php echo e($shipping_addresses->count()==0?'required':''); ?>>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1"><?php echo e(\App\CPU\translate('address')); ?><span
                                                            style="color: red">*</span></label>
                                                    <textarea class="form-control" id="address"
                                                              type="text"
                                                              name="address" <?php echo e($shipping_addresses->count()==0?'required':''); ?>></textarea>
                                                </div>
                                                <?php ($default_location=\App\CPU\Helpers::get_business_settings('default_location')); ?>
                                                <div class="form-group">
                                                    <input id="pac-input" class="controls rounded"
                                                           style="height: 3em;width:fit-content;"
                                                           title="<?php echo e(\App\CPU\translate('search_your_location_here')); ?>"
                                                           type="text"
                                                           placeholder="<?php echo e(\App\CPU\translate('search_here')); ?>"/>
                                                    <div style="height: 200px;" id="location_map_canvas"></div>
                                                </div>
                                                 <div class="form-check" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 1.25rem;">
                                                    <input type="checkbox" name="save_address" class="form-check-input"
                                                           id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 1.09rem">
                                                        <?php echo e(\App\CPU\translate('save_this_address')); ?>

                                                    </label>
                                                </div>
                                                <input type="hidden" id="latitude"
                                                       name="latitude" class="form-control d-inline"
                                                       placeholder="Ex : -94.22213"
                                                       value="<?php echo e($default_location?$default_location['lat']:0); ?>" required
                                                       readonly>
                                                <input type="hidden"
                                                       name="longitude" class="form-control"
                                                       placeholder="Ex : 103.344322" id="longitude"
                                                       value="<?php echo e($default_location?$default_location['lng']:0); ?>" required
                                                       readonly>

                                                <button type="submit" class="btn btn-primary" style="display: none"
                                                        id="address_submit"></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>

                    <!-- billing methods table-->
                    <h2 class="h4 pb-3 mb-2 mt-5"><?php echo e(\App\CPU\translate('choose_billing_address')); ?></h2>

                    <?php ($billing_addresses=\App\Model\ShippingAddress::where('customer_id',auth('customer')->id())->where('is_billing',1)->get()); ?>
                    <form method="post" action="" id="billing-address-form">

                        <div class="form-check"
                             style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 1.25rem;">
                            <input type="checkbox" id="same_as_shipping_address" onclick="hide_billingAddress()"
                                   name="same_as_shipping_address" class="form-check-input">
                            <label class="form-check-label"
                                   style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 1.09rem">
                                <?php echo e(\App\CPU\translate('same_as_shipping_address')); ?>

                            </label>
                        </div>
                        <div id="hide_billing_address" class="card-body" style="padding: 0!important;">
                            <ul class="list-group">
                                <?php $__currentLoopData = $billing_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="list-group-item mb-2 mt-2"
                                        style="cursor: pointer;background: rgba(245,245,245,0.51)"
                                        onclick="$('#bh-<?php echo e($address['id']); ?>').prop( 'checked', true )">
                                        <input type="radio" name="billing_method_id"
                                               id="bh-<?php echo e($address['id']); ?>"
                                               value="<?php echo e($address['id']); ?>" <?php echo e($key==0?'checked':''); ?>>
                                        <span class="checkmark"
                                              style="margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 10px"></span>
                                        <label class="badge"
                                               style="background: <?php echo e($web_config['primary_color']); ?>; color:white !important;"><?php echo e($address['address_type']); ?></label>
                                        <small>
                                            <i class="fa fa-phone"></i> <?php echo e($address['phone']); ?>

                                        </small>
                                        <hr>
                                        <span><?php echo e(\App\CPU\translate('contact_person_name')); ?>: <?php echo e($address['contact_person_name']); ?></span><br>
                                        <span><?php echo e(\App\CPU\translate('address')); ?> : <?php echo e($address['address']); ?>, <?php echo e($address['city']); ?>, <?php echo e($address['zip']); ?>, <?php echo e($address['country']); ?>.</span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item mb-2 mt-2" onclick="billingAddress()">
                                    <input type="radio" name="billing_method_id"
                                           id="bh-0" value="0" data-toggle="collapse"
                                           data-target="#billing_model" <?php echo e($billing_addresses->count()==0?'checked':''); ?>>
                                    <span class="checkmark"
                                          style="margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 10px"></span>
                                    <label class="badge"
                                           style="background: <?php echo e($web_config['primary_color']); ?>; color:white !important;">
                                        <i class="fa fa-plus-circle"></i></label>
                                    <button type="button" class="btn btn-outline" data-toggle="collapse"
                                            data-target="#billing_model"><?php echo e(\App\CPU\translate('Another')); ?> <?php echo e(\App\CPU\translate('address')); ?>

                                    </button>
                                    <div id="accordion">
                                        <div id="billing_model"
                                             class="collapse <?php echo e($billing_addresses->count()==0?'show':''); ?>"
                                             aria-labelledby="headingThree"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1"><?php echo e(\App\CPU\translate('contact_person_name')); ?>

                                                        <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="billing_contact_person_name" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo e(\App\CPU\translate('Phone')); ?>

                                                        <span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="billing_phone" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputPassword1"><?php echo e(\App\CPU\translate('address')); ?> <?php echo e(\App\CPU\translate('Type')); ?></label>
                                                    <select class="form-control" name="billing_address_type">
                                                        <option
                                                            value="permanent"><?php echo e(\App\CPU\translate('Permanent')); ?></option>
                                                        <option value="home"><?php echo e(\App\CPU\translate('Home')); ?></option>
                                                        <option
                                                            value="others"><?php echo e(\App\CPU\translate('Others')); ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo e(\App\CPU\translate('City')); ?><span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="billing_city" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">State<span
                                                            style="color: red">*</span></label>
                                                            <select class="form-control" name="billing_state">
                                                                <?php ($billstate_tax=\App\Model\StateTax::all()); ?>
                                                                <?php $__currentLoopData = $billstate_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billtaxx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($billtaxx->name); ?>"><?php echo e($billtaxx->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                       </select>
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(\App\CPU\translate('Country')); ?> <span
                                                            style="color: red">*</span></label>
                                                    <input type="text" class="form-control"
                                                           name="billing_country" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                </div>
                                           
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1"><?php echo e(\App\CPU\translate('zip_code')); ?>

                                                        <span
                                                            style="color: red">*</span></label>
                                                    <input type="number" class="form-control"
                                                           name="billing_zip" <?php echo e($billing_addresses->count()==0?'required':''); ?>>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1"><?php echo e(\App\CPU\translate('address')); ?><span
                                                            style="color: red">*</span></label>
                                                    <textarea class="form-control" id="billing_address"
                                                              type="billing_text"
                                                              name="billing_address" <?php echo e($billing_addresses->count()==0?'required':''); ?>></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <input id="pac-input-billing" class="controls rounded"
                                                           style="height: 3em;width:fit-content;"
                                                           title="<?php echo e(\App\CPU\translate('search_your_location_here')); ?>"
                                                           type="text"
                                                           placeholder="<?php echo e(\App\CPU\translate('search_here')); ?>"/>
                                                    <div style="height: 200px;" id="location_map_canvas_billing"></div>
                                                </div>
                                                 <div class="form-check" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 1.25rem;">
                                                    <input type="checkbox" name="save_address_billing" class="form-check-input"
                                                           id="save_address_billing">
                                                    <label class="form-check-label" for="save_address_billing" style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 1.09rem">
                                                        <?php echo e(\App\CPU\translate('save_this_address')); ?>

                                                    </label>
                                                </div>
                                                <input type="hidden" id="billing_latitude"
                                                       name="billing_latitude" class="form-control d-inline"
                                                       placeholder="Ex : -94.22213"
                                                       value="<?php echo e($default_location?$default_location['lat']:0); ?>" required
                                                       readonly>
                                                <input type="hidden"
                                                       name="billing_longitude" class="form-control"
                                                       placeholder="Ex : 103.344322" id="billing_longitude"
                                                       value="<?php echo e($default_location?$default_location['lng']:0); ?>" required
                                                       readonly>

                                                <button type="submit" class="btn btn-primary" style="display: none"
                                                        id="address_submit"></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>

                    <!-- Navigation (desktop)-->
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-secondary btn-block" href="<?php echo e(route('shop-cart')); ?>">
                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?> mt-sm-0 mx-1"></i>
                                <span class="d-none d-sm-inline"><?php echo e(\App\CPU\translate('shop_cart')); ?></span>
                                <span class="d-inline d-sm-none"><?php echo e(\App\CPU\translate('shop_cart')); ?></span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary btn-block" href="javascript:" onclick="proceed_to_next()">
                                <span class="d-none d-sm-inline"><?php echo e(\App\CPU\translate('proceed_payment')); ?></span>
                                <span class="d-inline d-sm-none"><?php echo e(\App\CPU\translate('Next')); ?></span>
                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?> mt-sm-0 mx-1"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Sidebar-->
                </div>
            </section>
            <?php echo $__env->make('web-views.partials._order-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        function anotherAddress() {
            $('#sh-0').prop('checked', true);
            $("#collapseThree").collapse();
        }

        function billingAddress() {
            $('#bh-0').prop('checked', true);
            $("#billing_model").collapse();
        }

    </script>
    <script>
        function hide_billingAddress() {
            let check_same_as_shippping = $('#same_as_shipping_address').is(":checked");
            console.log(check_same_as_shippping);
            if (check_same_as_shippping) {
                $('#hide_billing_address').hide();
            } else {
                $('#hide_billing_address').show();
            }
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\CPU\Helpers::get_business_settings('map_api_key')); ?>&libraries=places&v=3.45.8"></script>
    <script>
        function initAutocomplete() {
            var myLatLng = {
                lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

            };

            const map = new google.maps.Map(document.getElementById("location_map_canvas"), {
                center: {
                    lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                    lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

                },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap(map);
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng(coordinates['lat'], coordinates['lng']);
                marker.setPosition(latlng);
                map.panTo(latlng);

                document.getElementById('latitude').value = coordinates['lat'];
                document.getElementById('longitude').value = coordinates['lng'];

                geocoder.geocode({'latLng': latlng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('address').value = results[1].formatted_address;
                            console.log(results[1].formatted_address);
                        }
                    }
                });
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        };
        $(document).on('ready', function () {
            initAutocomplete();

        });

        $(document).on("keydown", "input", function (e) {
            if (e.which == 13) e.preventDefault();
        });
    </script>

    <script>
        function initAutocompleteBilling() {
            var myLatLng = {
                lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

            };

            const map = new google.maps.Map(document.getElementById("location_map_canvas_billing"), {
                center: {
                    lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                    lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

                },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap(map);
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng(coordinates['lat'], coordinates['lng']);
                marker.setPosition(latlng);
                map.panTo(latlng);

                document.getElementById('billing_latitude').value = coordinates['lat'];
                document.getElementById('billing_longitude').value = coordinates['lng'];

                geocoder.geocode({'latLng': latlng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('billing_address').value = results[1].formatted_address;
                            console.log(results[1].formatted_address);
                        }
                    }
                });
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input-billing");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('billing_latitude').value = this.position.lat();
                        document.getElementById('billing_longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        };
        $(document).on('ready', function () {
            initAutocompleteBilling();

        });

        $(document).on("keydown", "input", function (e) {
            if (e.which == 13) e.preventDefault();
        });
    </script>
    <script>
        function proceed_to_next() {
            let billing_addresss_same_shipping = $('#same_as_shipping_address').is(":checked");

            let allAreFilled = true;
            document.getElementById("address-form").querySelectorAll("[required]").forEach(function (i) {
                if (!allAreFilled) return;
                if (!i.value) allAreFilled = false;
                if (i.type === "radio") {
                    let radioValueCheck = false;
                    document.getElementById("address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                        if (r.checked) radioValueCheck = true;
                    });
                    allAreFilled = radioValueCheck;
                }
            });

            //billing address saved
            let allAreFilled_shipping = true;

            if (billing_addresss_same_shipping != true) {

                document.getElementById("billing-address-form").querySelectorAll("[required]").forEach(function (i) {
                    if (!allAreFilled_shipping) return;
                    if (!i.value) allAreFilled_shipping = false;
                    if (i.type === "radio") {
                        let radioValueCheck = false;
                        document.getElementById("billing-address-form").querySelectorAll(`[name=${i.name}]`).forEach(function (r) {
                            if (r.checked) radioValueCheck = true;
                        });
                        allAreFilled_shipping = radioValueCheck;
                    }
                });
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('customer.choose-shipping-address')); ?>',
                // dataType: 'json',
                data: {
                    shipping: $('#address-form').serialize(),
                    billing: $('#billing-address-form').serialize(),
                    billing_addresss_same_shipping: billing_addresss_same_shipping
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        location.href = '<?php echo e(route('checkout-payment')); ?>';
                    }
                },
                complete: function () {
                    $('#loading').hide();
                },
                error: function () {
                    toastr.error('<?php echo e(\App\CPU\translate('Please fill all required fields of shipping/billing address')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

            /*if (allAreFilled && allAreFilled_shipping) {

            } else {
                toastr.error('<?php echo e(\App\CPU\translate('Please fill all required fields of shipping/billing address')); ?>', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }*/
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/web-views/checkout-shipping.blade.php ENDPATH**/ ?>