@extends('adminLayout')

@section('allProducts')


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
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
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
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Color</th>
                        <th>Product Description</th>
                        <th>Product Overview</th>
                        <th>Product Spacification</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>

                @foreach($allProduct as $vProduct)

                <tbody>
                    <tr>
                        <td>{{ $vProduct->product_id }}</td>
                        <td class="center">{{ $vProduct->product_name }}</td>

                        <td>{{ $vProduct->category_name }}</td>
                        <td>{{ $vProduct->product_price }}</td>
                        <td><img src="{{URL::to($vProduct->product_image)}}" style="height:70px;width:120px"></td>
                        <td>{{ $vProduct->product_color }}</td>
                        <td>{{ $vProduct->product_description }}</td>
                        <td>{{ $vProduct->product_overview }}</td>
                        <td>{{ $vProduct->product_specification }}</td>

                        <td class="center">

                            @if($vProduct->product_status == 1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Deactivate</span>
                            @endif
                        </td>

                        <td class="center">
                            @if($vProduct->product_status ==1)
                            <a class="btn btn-success" href="{{ URL::to('/deactivate/'.$vProduct->product_id) }}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>

                            @else
                            <a class="btn btn-success" href="{{ URL::to('/activate/'.$vProduct->product_id) }}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>

                            @endif

                            <a class="btn btn-info" href="{{ URL::to('/editproduct/'.$vProduct->product_id) }}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="{{ URL::to('/deleteproduct/'.$vProduct->product_id) }}">
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
<!--/row-->


@endsection