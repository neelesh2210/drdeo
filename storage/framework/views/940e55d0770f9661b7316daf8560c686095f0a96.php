<?php $__env->startSection('title', \App\CPU\translate('Product Add')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a
                        href="<?php echo e(route('admin.product.list', 'in_house')); ?>"><?php echo e(\App\CPU\translate('Product')); ?></a>
                </li>
                <li class="breadcrumb-item"><?php echo e(\App\CPU\translate('Add')); ?> <?php echo e(\App\CPU\translate('New')); ?> </li>
            </ol>
        </nav>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <form class="product-form" action="<?php echo e(route('admin.product.store')); ?>" method="POST"
                      style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                      enctype="multipart/form-data"
                      id="product_form">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = $language->value ?? null); ?>
                            <?php ($default_lang = 'en'); ?>

                            <?php ($default_lang = json_decode($language)[0]); ?>
                            <ul class="nav nav-tabs mb-4">
                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>" href="#"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <div class="card-body">
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="<?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form"
                                     id="<?php echo e($lang); ?>-form">
                                    <div class="form-group">
                                        <label class="input-label" for="<?php echo e($lang); ?>_name"><?php echo e(\App\CPU\translate('name')); ?>

                                            (<?php echo e(strtoupper($lang)); ?>)</label>
                                        <input type="text" <?php echo e($lang == $default_lang? 'required':''); ?> name="name[]"
                                               id="<?php echo e($lang); ?>_name" class="form-control" placeholder="New Product" required>
                                    </div>
                                    <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                    <div class="form-group pt-4">
                                        <label class="input-label"
                                               for="<?php echo e($lang); ?>_description"><?php echo e(\App\CPU\translate('description')); ?>

                                            (<?php echo e(strtoupper($lang)); ?>)</label>
                                        <textarea name="description[]" class="editor textarea" cols="30"
                                                  rows="10" required><?php echo e(old('details')); ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4><?php echo e(\App\CPU\translate('General Info')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name"><?php echo e(\App\CPU\translate('Category')); ?></label>
                                        <select
                                            class="js-example-basic-multiple form-control"
                                            name="category_id"
                                            onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-category-select','select')"
                                            required>
                                            <option value="<?php echo e(old('category_id')); ?>" selected disabled>---Select---</option>
                                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c['id']); ?>" <?php echo e(old('name')==$c['id']? 'selected': ''); ?>>
                                                    <?php echo e($c['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"><?php echo e(\App\CPU\translate('Sub Category')); ?></label>
                                        <select class="js-example-basic-multiple form-control"
                                            name="sub_category_id" id="sub-category-select"
                                            onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-sub-category-select','select')">
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"><?php echo e(\App\CPU\translate('Sub Sub Category')); ?></label>
                                        <select
                                            class="js-example-basic-multiple form-control"
                                            name="sub_sub_category_id" id="sub-sub-category-select">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name"><?php echo e(\App\CPU\translate('Brand')); ?></label>
                                        <select
                                            class="js-example-basic-multiple js-states js-example-responsive form-control"
                                            name="brand_id" required>
                                            <option value="<?php echo e(null); ?>" selected disabled>---<?php echo e(\App\CPU\translate('Select')); ?>---</option>
                                            <?php $__currentLoopData = $br; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($b['id']); ?>"><?php echo e($b['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">HSN No.</label>
                                        <input type="text" name="hsn" class="form-control" id="hsn" value="<?php echo e(old('hsn')); ?>" placeholder="HSN No." required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">SKU</label>
                                        <input type="text" name="sku" class="form-control" id="sku" value="<?php echo e(old('sku')); ?>" placeholder="SKU" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name">Disease</label>
                                        <select name="disease[]" class="js-example-basic-multiple js-states js-example-responsive form-control" id="disease" required multiple>
                                            <option value="" disabled>Select Disease</option>
                                            <?php $__currentLoopData = App\Model\Disease::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($disease->id); ?>"><?php echo e($disease->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="weight">Weight</label>
                                        <input type="number" name="weight" class="form-control" id="weight" value="<?php echo e(old('weight')); ?>" placeholder="Weight" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="length">Length</label>
                                        <input type="number" name="length" class="form-control" id="length" value="<?php echo e(old('length')); ?>" placeholder="Length" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="width">Width</label>
                                        <input type="number" name="width" class="form-control" id="width" value="<?php echo e(old('width')); ?>" placeholder="Width" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="height">Height</label>
                                        <input type="number" name="height" class="form-control" id="height" value="<?php echo e(old('height')); ?>" placeholder="Height" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="buy_one_get_one">Buy One Get One</label>
                                        <select name="buy_one_get_one" class="js-example-basic-multiple js-states js-example-responsive form-control" id="buy_one_get_one" required>
                                            <option value="">Select Product</option>
                                            <?php $__currentLoopData = App\Model\Product::where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4><?php echo e(\App\CPU\translate('Variations')); ?></h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">


                                    <div class="col-md-6">
                                        <label for="attributes" style="padding-bottom: 3px">
                                            <?php echo e(\App\CPU\translate('Attributes')); ?> :
                                        </label>
                                        <select
                                            class="js-example-basic-multiple js-states js-example-responsive form-control"
                                            name="choice_attributes[]" id="choice_attributes" multiple="multiple">
                                            <?php $__currentLoopData = \App\Model\Attribute::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($a['id']); ?>">
                                                    <?php echo e($a['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-2 mb-2">
                                        <div class="customer_choice_options" id="customer_choice_options"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4><?php echo e(\App\CPU\translate('Product price & stock')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label"><?php echo e(\App\CPU\translate('Selling price')); ?></label>
                                        <input type="number" min="0" step="0.01"
                                               placeholder="<?php echo e(\App\CPU\translate('Selling price')); ?>"
                                               name="unit_price" value="<?php echo e(old('unit_price')); ?>" class="form-control"
                                               required>
                                    </div>
                                    <div class="col-md-6">
                                        <label
                                            class="control-label"><?php echo e(\App\CPU\translate('MRP Price')); ?></label>
                                        <input type="number" min="0" step="0.01"
                                               placeholder="<?php echo e(\App\CPU\translate('MRP Price')); ?>"
                                               value="<?php echo e(old('purchase_price')); ?>"
                                               name="purchase_price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-md-5">
                                        <label class="control-label"><?php echo e(\App\CPU\translate('Tax')); ?></label>
                                        <label class="badge badge-info"><?php echo e(\App\CPU\translate('Percent')); ?> ( % )</label>


                                    <select class="js-example-basic-multiple form-control" name="tax" required>
                                    <option value="5" >5%</option>
                                    <option value="12" >12%</option>
                                    <option value="18" >18%</option>
                                    <option value="22" >22%</option>
                                        </select>


                                        <input name="tax_type" value="percent" style="display: none">
                                    </div>

                                    <div class="col-md-5">
                                        <label class="control-label"><?php echo e(\App\CPU\translate('Discount')); ?></label>
                                        <input type="number" min="0" value="<?php echo e(old('discount')); ?>" step="0.01"
                                               placeholder="<?php echo e(\App\CPU\translate('Discount')); ?>" name="discount"
                                               class="form-control" required>
                                    </div>
                                    <div class="col-md-2" style="padding-top: 30px;">
                                        <select style="width: 100%"
                                            class="js-example-basic-multiple js-states js-example-responsive demo-select2"
                                            name="discount_type">
                                            <option value="flat"><?php echo e(\App\CPU\translate('Flat')); ?></option>
                                            <option value="percent"><?php echo e(\App\CPU\translate('Percent')); ?></option>
                                        </select>
                                    </div>
                                    <div class="pt-4 col-12 sku_combination" id="sku_combination">

                                    </div>
                                    <div class="col-md-6" id="quantity">
                                        <label
                                            class="control-label"><?php echo e(\App\CPU\translate('total')); ?> <?php echo e(\App\CPU\translate('Quantity')); ?></label>
                                        <input type="number" min="0" value="0" step="1"
                                               placeholder="<?php echo e(\App\CPU\translate('Quantity')); ?>"
                                               name="current_stock" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="control-label">Video Link</label>
                                    <small class="badge badge-soft-danger"> ( <?php echo e(\App\CPU\translate('optional, please provide embed link not direct link')); ?>. )</small>
                                    <input type="text" name="video_link" placeholder="<?php echo e(\App\CPU\translate('EX')); ?> : https://www.link.com/embed/5R06LRdUCSE" class="form-control" required>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label><?php echo e(\App\CPU\translate('Upload product images')); ?></label><small
                                            style="color: red">* ( <?php echo e(\App\CPU\translate('ratio')); ?> 1:1 )</small>
                                    </div>
                                    <div class="p-2 border border-dashed" style="max-width:430px;">
                                        <div class="row" id="coba"></div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name"><?php echo e(\App\CPU\translate('Upload thumbnail')); ?></label><small
                                            style="color: red">* ( <?php echo e(\App\CPU\translate('ratio')); ?> 1:1 )</small>
                                    </div>
                                    <div style="max-width:200px;">
                                        <div class="row" id="thumbnail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card mt-2 mb-2 rest-part">
                        <div class="card-header">
                            <h4><?php echo e(\App\CPU\translate('seo_section')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="control-label"><?php echo e(\App\CPU\translate('Meta Title')); ?></label>
                                    <input type="text" name="meta_title" placeholder="" class="form-control">
                                </div>

                                <div class="col-md-8 mb-4">
                                    <label class="control-label"><?php echo e(\App\CPU\translate('Meta Description')); ?></label>
                                    <textarea rows="10" type="text" name="meta_description" class="form-control"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-0">
                                        <label><?php echo e(\App\CPU\translate('Meta Image')); ?></label>
                                    </div>
                                    <div class="border border-dashed">
                                        <div class="row" id="meta_img"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-footer">
                        <div class="row">
                            <div class="col-md-12" style="padding-top: 20px">
                                <button type="button" onclick="check()" class="btn btn-primary"><?php echo e(\App\CPU\translate('Submit')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/tags-input.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script>
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'images[]',
                maxCount: 4,
                rowHeight: 'auto',
                groupClassName: 'col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('Please only input png or jpg type file')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('File size too big')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });



            $("#meta_img").spartanMultiImagePicker({
                fieldName: 'meta_image',
                maxCount: 1,
                rowHeight: '280px',
                groupClassName: 'col-12',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '90%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('Please only input png or jpg type file')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(\App\CPU\translate('File size too big')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });


        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            // dir: "rtl",
            width: 'resolve'
        });
    </script>

    <script>
        function getRequest(route, id, type) {
            $.get({
                url: route,
                dataType: 'json',
                success: function (data) {
                    if (type == 'select') {
                        $('#' + id).empty().append(data.select_tag);
                    }
                },
            });
        }

        $('input[name="colors_active"]').on('change', function () {
            if (!$('input[name="colors_active"]').is(':checked')) {
                $('#colors-selector').prop('disabled', true);
            } else {
                $('#colors-selector').prop('disabled', false);
            }
        });

        $('#choice_attributes').on('change', function () {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function () {
                //console.log($(this).val());
                add_more_customer_choice_option($(this).val(), $(this).text());
            });
        });

        function add_more_customer_choice_option(i, name) {
            let n = name.split(' ').join('');
            $('#customer_choice_options').append('<div class="row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="' + i + '"><input type="text" class="form-control" name="choice[]" value="' + n + '" placeholder="<?php echo e(trans('Choice Title')); ?>" readonly></div><div class="col-lg-9"><input type="text" class="form-control" name="choice_options_' + i + '[]" placeholder="<?php echo e(trans('Enter choice values')); ?>" data-role="tagsinput" onchange="update_sku()"></div></div>');

            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }


        $('#colors-selector').on('change', function () {
            update_sku();
        });

        $('input[name="unit_price"]').on('keyup', function () {
            update_sku();
        });

        function update_sku() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '<?php echo e(route('admin.product.sku-combination')); ?>',
                data: $('#product_form').serialize(),
                success: function (data) {
                    $('#sku_combination').html(data.view);
                    if (data.length > 1) {
                        $('#quantity').hide();
                    } else {
                        $('#quantity').show();
                    }
                }
            });
        }

        $(document).ready(function () {
            // color select select2
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>

    <script>
        function check(){
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are you sure')); ?>?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#377dff',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var formData = new FormData(document.getElementById('product_form'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '<?php echo e(route('admin.product.store')); ?>',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.errors) {
                            for (var i = 0; i < data.errors.length; i++) {
                                toastr.error(data.errors[i].message, {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            }
                        } else {
                            toastr.success('<?php echo e(\App\CPU\translate('product added successfully')); ?>!', {
                                CloseButton: true,
                                ProgressBar: true
                            });
                            $('#product_form').submit();
                        }
                    }
                });
            })
        };
    </script>

    <script>
        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '<?php echo e($default_lang); ?>') {
                $(".rest-part").removeClass('d-none');
            } else {
                $(".rest-part").addClass('d-none');
            }
        })
    </script>

    
    <script src="<?php echo e(asset('/')); ?>vendor/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="<?php echo e(asset('/')); ?>vendor/ckeditor/ckeditor/adapters/jquery.js"></script>
    <script>
        $('.textarea').ckeditor({
            contentsLangDirection : '<?php echo e(Session::get('direction')); ?>',
        });
    </script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/product/add-new.blade.php ENDPATH**/ ?>