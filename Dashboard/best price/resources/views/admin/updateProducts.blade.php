@extends('adminLayout')

@section('updateProduct')


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ URL::to('/updateproduct/'.$productInfo->product_id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Name</label>
                        <div class="controls">
                            <!-- <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead"> -->
                            <input type="text" class="form-control" id="exampleInputEmail1" name="productName" value="{{ $productInfo->product_name }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Product Category</label>
                        <div class="controls">
                            <select id="selectError3" name="productCategory">
                                <option>{{ $productInfo->category_name }}</option>
                                {{ $dropdownCategory = DB::table('tbl_category')
                                        ->get()}}

                                @foreach($dropdownCategory as $vCategory)

                                <option value="{{ $vCategory->category_id }}"> {{ $vCategory->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Price</label>
                        <div class="controls">
                            <!-- <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead"> -->
                            <input type="text" class="form-control" id="exampleInputEmail1" name="productPrice" value="{{ $productInfo->product_price }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Product Color</label>
                        <div class="controls">
                            <!-- <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead"> -->
                            <input type="text" class="form-control" id="exampleInputEmail1" name="productColor" value="{{ $productInfo->product_color }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Image Upload</label>
                        <div class="controls">
                            <input type="file" name="productImage">
                        </div>
                    </div>


                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Products Description</label>
                        <div class="controls">
                            <textarea class="form-control" style="width: 909px;height: 145px;" name="productDescription" id="textarea2" rows="3"> {{ ($productInfo->product_description) }} </textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Products Overview</label>
                        <div class="controls">
                            <textarea class="form-control" style="width: 909px;height: 145px;" name="productOverview" id="textarea2" rows="3">{{ $productInfo->product_overview }}</textarea>
                        </div>
                    </div>


                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Products Specification</label>
                        <div class="controls">
                            <textarea class="form-control" style="width: 909px;height: 145px;" name="productSpecification" id="textarea2" rows="3">{{ $productInfo->product_specification }}</textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls">
                            <label class="checkbox inline">
                                <input type="checkbox" id="inlineCheckbox1" name="productStat" value=1>
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->

@endsection