@extends('adminLayout')

@section('updateCategory')


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ URL::to('/updatecategory',$categoryInfo->category_id) }}" method="post">
                {{ csrf_field() }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name</label>
                        <div class="controls">
                            <!-- <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead"> -->
                            <input type="text" class="form-control" id="exampleInputEmail1" name="categoryName" value="{{ $categoryInfo->category_name }}">
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a class="btn brn-info" href="{{ URL::to('/allcategory') }}" >Cancel</a>
                        
                        
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>


@endsection