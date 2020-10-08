


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="listQuoteLead">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Add Service</b></h4>
                </div>
                <div class=" modal-body ">

                    <div class="row pb-3">
                        <div class="col-md-2 col-sm-2 col-4">
                            <input type="button" class="btn-success " id=""  value="Select"> 
                        </div> 
                        <div class="col-md-5 col-sm-5 col-4"></div>
                        <div class="col-md-5 col-sm-5 col-4">
                            <input type="search" id="mySearchQuote" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="row-12 pt-2 table-responsive">
                        <table id="tblItemService" class="table table-bordered table-hover" style="width: 100%; white-space:nowrap;">
                            <thead>
                                <tr >
                                    <th>
                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="checkAllItem" class="custom-control-input checkAllItem" name="checkAllItem" >
                                            <label class="custom-control-label" for="checkAllItem"></label>
                                        </div>
                                    </th>
                                    <th>Khmer Name</th>
                                    <th>English Name</th>
                                    <th>Email</th>
                                    <th>Lead Number</th>
                                    <th>Website</th>
                                </tr>
                            </thead>

                            <tbody>

                                {{-- foreach variable --}}
                                @foreach ($listService as $key=>$val)
                                    @foreach ($val as $key2=>$val2)
                                            <tr>
                                                <td class="border">
                                                    <input type="hidden" id="showItemType_{{$row_id}}" value="Service"> 
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="checkbox_{{$key2}}"  class="custom-control-input "  value="{{$val2->id}}" name="seleteItem">
                                                        <label class="custom-control-label" for="checkbox_{{$key2}}"></label>
                                                    </div>
                                                </td>
                                                <td class="border">
                                                    <div id="itemName_{{$row_id}}"  class="itemName_{{$val2->id}}" >
                                                        {{$val2->name}}
                                                    </div>
                                                </td>

                                                <td class="border">
                                                    <div class="itemPrice_{{$val2->id}}">
                                                        {{$val2->product_price}}
                                                    </div>
                                                </td>

                                                <td class="border">
                                                    <div class="stockItem_{{$val2->id}}">
                                                        {{$val2->stock_qty}}
                                                    </div>
                                                </td>
                                                <td class="border">
                                                    <div class="itemDescription_{{$val2->id}}">
                                                        {{$val2->description}}
                                                    </div>
                                                </td>
                                            </tr>
                                   
                                    @endforeach

                                @endforeach    
                                   

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>
{{-- <script type="text/javascript">
    $(document).ready(function(){
        var table = $('#tblItemProduct').DataTable();
    });
</script> --}}

