@extends('adminLayout')

@section('allCategory')

<div class="row-fluid sortable">
    <div class="box span12">
        <span style="color:lightcoral;">
            @if ($message = Session::get('msg'))
            {{ $message }}
            {{ Session::put('msg',null) }}

            @else

            @endif
        </span>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach($allCategory as $vAllCategory)
                <tbody>
                    <tr>
                        <td>{{ $vAllCategory->category_id }}</td>
                        <td class="center">{{ $vAllCategory->category_name }}</td>

                        @if($vAllCategory->category_status == 1)
                        <td class="center">
                            <span class="label label-success">Active</span>
                        </td>

                        @else
                        <td class="center">
                            <span class="label label-success" style="color:red">Deactivate</span>
                        </td>
                        @endif

                        <td class="center">
                            @if($vAllCategory ->category_status == 1)
                            <a class="btn btn-success" href="{{ URL::To('/deactivecategory/'.$vAllCategory->category_id) }}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>

                            @else
                            <a class="btn btn-success" href="{{ URL::To('/activecategory/'.$vAllCategory->category_id) }}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>
                            @endif

                            <a class="btn btn-info" href="{{ URL::to('/editcategory/'.$vAllCategory->category_id) }}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="{{ URL::to('/deletecategory/'.$vAllCategory->category_id) }}">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!--/span-->

</div>

@endsection