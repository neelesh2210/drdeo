<?php $__env->startSection('title', \App\CPU\translate('Doctor List')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('Doctor List')); ?></li>
            </ol>
        </nav>
        <div class="row" style="margin-top: 20px" id="banner-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="flex-between row justify-content-between align-items-center flex-grow-1 mx-1">
                            <div class="flex-between">
                                <div><h5><?php echo e(\App\CPU\translate('doctor_Table')); ?></h5></div>
                                <div class="mx-1"><h5 style="color: red;">(<?php echo e($list->total()); ?>)</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="columnSearchDatatable"
                                   style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                   class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Doctor Details</th>
                                    <th>Adhar Card</th>
                                    <th>Pan Card</th>
                                    <th>Degree</th>
                                    <th>Registration</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td scope="row"><?php echo e($list->firstItem()+$key); ?></td>
                                            <td>
                                                <b>Name: </b><?php echo e($data->name); ?> <br>
                                                <b>Email: </b><?php echo e($data->email); ?> <br>
                                                <b>Phone: </b><?php echo e($data->phone_number); ?> <br>
                                                <b>Specialization: </b><?php echo e($data->doctor_profile->specialization); ?> <br>
                                                <b>Designation: </b><?php echo e($data->doctor_profile->designation); ?> <br>
                                                <b>Experience: </b><?php echo e($data->doctor_profile->experience); ?> <br>
                                                <b>Degree Name: </b><?php echo e($data->doctor_profile->degree_name); ?> <br>
                                                <b>Address: </b><?php echo e($data->doctor_profile->address); ?> <br>
                                            </td>
                                            <td>
                                                <img src="<?php if(!empty($data->doctor_profile->adhar_card)): ?><?php echo e(asset('public/doctor_documents/'.$data->doctor_profile->adhar_card)); ?> <?php else: ?> https://tallyfy.com/wp-content/uploads/no-documents.png <?php endif; ?>" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <img src="<?php if(!empty($data->doctor_profile->pan_card)): ?><?php echo e(asset('public/doctor_documents/'.$data->doctor_profile->pan_card)); ?> <?php else: ?> https://tallyfy.com/wp-content/uploads/no-documents.png <?php endif; ?>" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <img src="<?php if(!empty($data->doctor_profile->degree)): ?><?php echo e(asset('public/doctor_documents/'.$data->doctor_profile->degree)); ?> <?php else: ?> https://tallyfy.com/wp-content/uploads/no-documents.png <?php endif; ?>" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <img src="<?php if(!empty($data->doctor_profile->registration_document)): ?><?php echo e(asset('public/doctor_documents/'.$data->doctor_profile->registration_document)); ?> <?php else: ?> https://tallyfy.com/wp-content/uploads/no-documents.png <?php endif; ?>" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <label class="switch switch-status">
                                                    <input type="checkbox" class="status" id="<?php echo e($data->id); ?>" <?php if($data->status == 1): ?> checked <?php endif; ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e($list->links()); ?>

                    </div>
                    <?php if(count($list)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script>
    $(document).on('change', '.status', function ()
    {
        var id = $(this).attr("id");
        if ($(this).prop("checked") == true)
        {
            var status = 1;
        }
        else if ($(this).prop("checked") == false)
        {
            var status = 0;
        }
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "<?php echo e(route('admin.doctor-settings.verify.doctor')); ?>",
            method: 'POST',
            data:
            {
                id: id,
                status: status
            },
            success: function (data)
            {
                if(status == 1)
                {
                    toastr.success('<?php echo e(\App\CPU\translate('Doctor Verified')); ?>');
                }
                else
                {
                    toastr.error('<?php echo e(\App\CPU\translate('Doctor Not Verified')); ?>');
                }
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\drdeo\resources\views/admin-views/doctors/doctor_list.blade.php ENDPATH**/ ?>