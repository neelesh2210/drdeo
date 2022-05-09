
<?php $__env->startSection('title','Disease'); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
         @media(max-width:375px){
            #disease-icon-modal .modal-content{
              width: 367px !important;
            margin-left: 0 !important;
        }
       
        }

   @media(max-width:500px){
    #disease-icon-modal .modal-content{
              width: 400px !important;
            margin-left: 0 !important;
        }
      
      
   }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page">Disease</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h4 class=" mb-0 text-black-50">Disease Form</h4>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  Add Disease
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.disease.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id">
                                    <label for="name"><?php echo e(trans('messages.name')); ?></label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name')); ?>"
                                            placeholder="Enter Disease Name" required>
                                </div>  
                                <div class="form-group">
                                    <label><?php echo e(trans('messages.icon')); ?></label><br>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="FileUploader" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="FileUploader"><?php echo e(trans('messages.choose')); ?> <?php echo e(trans('messages.file')); ?></label>
                                    </div> 
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <center>
                                    <img style="width: auto;border: 1px solid; border-radius: 10px; max-height:200px;" id="Imageviewer"
                                        src="<?php echo e(asset('public\assets\back-end\img\400x400\img2.jpg')); ?>" alt="banner image"/>
                                </center>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button id="add" class="btn btn-primary"  type = "subbmit" style="color: white"><?php echo e(trans('messages.save')); ?></button>
                            <a id="update" class="btn btn-primary"
                               style="display: none; color: #fff;"><?php echo e(trans('messages.update')); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--modal-->
    <?php echo $__env->make('shared-partials.image-process._image-crop-modal',['modal_id'=>'disease-icon-modal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--modal-->
    <div class="row" style="margin-top: 20px" id="cate-table">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Disease Table</h5>
                </div>
                <div class="card-body" style="padding: 0">
                    <div class="table-responsive">
                        <table id="columnSearchDatatable"
                               class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(trans('messages.sl')); ?></th>
                                <th><?php echo e(trans('messages.name')); ?></th>
                                <th><?php echo e(trans('messages.slug')); ?></th>
                                <th><?php echo e(trans('messages.icon')); ?></th>
                                <th style="width:15%;"><?php echo e(trans('messages.action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $diseases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$disease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($disease['name']); ?></td>
                                    <td><?php echo e($disease['slug']); ?></td>
                                    <td>
                                    <img width="64" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                     src="<?php echo e(asset('storage/app/public/disease')); ?>/<?php echo e($disease['icon']); ?>"></td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="tio-settings"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item  edit" style="cursor: pointer;"
                                                id="<?php echo e($disease['id']); ?>"> <?php echo e(trans('messages.Edit')); ?></a>
                                                <a class="dropdown-item delete"style="cursor: pointer;"
                                                id="<?php echo e($disease['id']); ?>">  <?php echo e(trans('messages.Delete')); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <?php echo e($diseases->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        /*fetch_disease();*/

        function fetch_disease() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.disease.fetch')); ?>",
                method: 'GET',
                success: function (data) {

                    if (data.length != 0) {
                        var html = '';
                        for (var count = 0; count < data.length; count++) {
                            html += '<tr>';
                            html += '<td class="column_name" data-column_name="sl" data-id="' + data[count].id + '">' + (count + 1) + '</td>';
                            html += '<td class="column_name" data-column_name="name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                            html += '<td class="column_name" data-column_name="slug" data-id="' + data[count].id + '">' + data[count].slug + '</td>';
                            html += '<td class="column_name" data-column_name="icon" data-id="' + data[count].id + '"><img src="<?php echo e(asset('storage/app/public/disease/')); ?>/' + data[count].icon + '" class="img-thumbnail" height="40" width="40" alt=""></td>';
                            html += '<td><a type="button" class="btn btn-primary btn-xs edit" id="' + data[count].id + '"><i class="fa fa-edit text-white"></i></a> <a type="button" class="btn btn-danger btn-xs delete" id="' + data[count].id + '"><i class="fa fa-trash text-white"></i></a></td></tr>';
                        }
                        $('tbody').html(html);
                    }
                }
            });
        }

        // $('#add').on('click', function () {
        //     $('#add').attr("disabled", true);
        //     var name = $('#name').val();
        //     var form = $(this).parents("form");
        //     var formData = new FormData(form[0]);
        //     if (name == "") {
        //         toastr.error('Disease Name Is Requeired.');
        //         return false;
        //     }
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         url: "<?php echo e(route('admin.disease.store')); ?>",
        //         method: 'POST',
        //         data: formData,
        //         dataType:'JSON',
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function () {
        //             toastr.success('Disease inserted Successfully.');
        //             $('#name').val('');
        //             $('#image-set').val('');
        //             $('.call-when-done').click();
        //             fetch_disease();
        //             location.reload();
        //         }
        //     });
        // });

        $('#update').on('click', function () {
            $('#update').attr("disabled", true);
            var id = $('#id').val();
            var name = $('#name').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.disease.update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    name: name,
                },
                success: function (data) {
                    $('#name').val('');
                    $.ajax({
                        type: 'get',
                        url: '<?php echo e(route('image-remove',[0,'disease_icon_modal'])); ?>',
                        dataType: 'json',
                        success: function (data) {
                            if (data.success === 1) {
                                $("#img-suc").hide();
                                $("#img-err").hide();
                                $("#crop").hide();
                                $("#show-images").html(data.images);
                                $("#image-count").text(data.count);
                            } else if (data.success === 0) {
                                $("#img-suc").hide();
                                $("#img-err").show();
                            }
                        },
                    });
                    toastr.success('Disease updated Successfully.');
                    $('#update').hide();
                    $('#cate-table').show();
                    $('#add').show();
                    fetch_disease();
                    location.reload();
                }
            });
            $('#save').hide();
        });


        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.disease.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            fetch_disease();
                            toastr.success('Disease deleted Successfully.');
                            location.reload();
                        }
                    });
                }
            })
        });

        $(document).on('click', '.edit', function () {
            // $('#update').show();
            var id = $(this).attr("id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.disease.edit')); ?>",
                method: 'POST',
                data: {id: id},
                success: function (data) {
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#Imageviewer').attr('src', "<?php echo e(asset('storage/app/public/disease')); ?>/"+data.icon);
                    $('#cate-table').hide();
                    $('#add').html("<?php echo e(trans('messages.update')); ?>");
                    $("form").attr('action', "<?php echo e(route('admin.disease.update')); ?>");
                    fetch_disease()
                }
            });
        });

        function imagereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Imageviewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#FileUploader").change(function () {
            imagereadURL(this);
        });
    </script>
    <!-- Page level custom scripts -->
    <?php echo $__env->make('shared-partials.image-process._script',[
    'id'=>'disease-icon-modal',
    'height'=>320,
    'width'=>320,
    'multi_image'=>true,
    'route'=>route('image-upload')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/disease/view.blade.php ENDPATH**/ ?>