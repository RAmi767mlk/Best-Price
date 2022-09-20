@extends('adminLayout')

@section('addCategory')

<div class="row-fluid sortable">
    <div class="box span12">
        <span style="color:green;">

            @if ($message = Session::get('msg'))
                {{ $message }}
                {{ Session::put('msg',null) }}
            @else

            @endif
           
        </span>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/savecategory') }}" method="post">
            {{ csrf_field() }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name</label>
                        <div class="controls">
                            <!-- <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead"> -->
                            <input type="text" class="form-control" id="exampleInputEmail1" name="categoryName" required="" placeholder="Enter Category Name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls">
                            <label class="checkbox inline">
                                <input type="checkbox" id="inlineCheckbox1" name="categoryStat" required="" value="1">
                            </label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>


@endsection