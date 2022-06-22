@extends('layouts.back-end.app')
@section('title', \App\CPU\translate('Doctor List'))

@section('content')
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{route('admin.dashboard')}}">{{\App\CPU\translate('Dashboard')}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">{{\App\CPU\translate('Doctor List')}}</li>
            </ol>
        </nav>
        <div class="row" style="margin-top: 20px" id="banner-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="flex-between row justify-content-between align-items-center flex-grow-1 mx-1">
                            <div class="flex-between">
                                <div><h5>{{ \App\CPU\translate('doctor_Table')}}</h5></div>
                                <div class="mx-1"><h5 style="color: red;">({{ $list->total() }})</h5></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0">
                        <div class="table-responsive">
                            <table id="columnSearchDatatable"
                                   style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
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
                                    @foreach($list as $key=>$data)
                                        <tr>
                                            <td scope="row">{{$list->firstItem()+$key}}</td>
                                            <td>
                                                <b>Name: </b>{{$data->name}} <br>
                                                <b>Email: </b>{{$data->email}} <br>
                                                <b>Phone: </b>{{$data->phone_number}} <br>
                                                <b>Specialization: </b>{{$data->doctor_profile->specialization}} <br>
                                                <b>Designation: </b>{{$data->doctor_profile->designation}} <br>
                                                <b>Experience: </b>{{$data->doctor_profile->experience}} <br>
                                                <b>Degree Name: </b>{{$data->doctor_profile->degree_name}} <br>
                                                <b>Address: </b>{{$data->doctor_profile->address}} <br>
                                            </td>
                                            <td>
                                                <img src="@if(!empty($data->doctor_profile->adhar_card)){{asset('public/doctor_documents/'.$data->doctor_profile->adhar_card)}} @else https://tallyfy.com/wp-content/uploads/no-documents.png @endif" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <img src="@if(!empty($data->doctor_profile->pan_card)){{asset('public/doctor_documents/'.$data->doctor_profile->pan_card)}} @else https://tallyfy.com/wp-content/uploads/no-documents.png @endif" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <img src="@if(!empty($data->doctor_profile->degree)){{asset('public/doctor_documents/'.$data->doctor_profile->degree)}} @else https://tallyfy.com/wp-content/uploads/no-documents.png @endif" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <img src="@if(!empty($data->doctor_profile->registration_document)){{asset('public/doctor_documents/'.$data->doctor_profile->registration_document)}} @else https://tallyfy.com/wp-content/uploads/no-documents.png @endif" style="width: 100px;height: 100px;">
                                            </td>
                                            <td>
                                                <label class="switch switch-status">
                                                    <input type="checkbox" class="status" id="{{$data->id}}" @if($data->status == 1) checked @endif>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{$list->links()}}
                    </div>
                    @if(count($list)==0)
                        <div class="text-center p-4">
                            <img class="mb-3" src="{{asset('public/assets/back-end')}}/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                            <p class="mb-0">{{ \App\CPU\translate('No_data_to_show')}}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

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
            url: "{{route('admin.doctor-settings.verify.doctor')}}",
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
                    toastr.success('{{\App\CPU\translate('Doctor Verified')}}');
                }
                else
                {
                    toastr.error('{{\App\CPU\translate('Doctor Not Verified')}}');
                }
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
</script>

@endpush
