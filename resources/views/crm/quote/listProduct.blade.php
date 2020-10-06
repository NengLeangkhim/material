


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="listQuoteProduct">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel"><b> Add Product </b></h4>
                </div>
                <div class=" modal-body ">

                    <div class="row pb-3">
                        <div class="col-md-2 col-sm-2 col-4">
                            <input type="button" class="btn-success getItemProduct" id="{{$row_id}}"  value="Select"> 
                        </div> 
                        <div class="col-md-5 col-sm-5 col-4"></div>
                        <div class="col-md-5 col-sm-5 col-4">
                            <input type="search" id="mySearchQuote" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="row-12 pt-2 table-responsive">
                        <table id="tblItemProduct" class="table table-bordered table-hover" style="width: 100%; white-space:nowrap;">
                            <thead>
                                <tr >
                                    <th>
                                        <input type="checkbox" id="" name="selectAllProduct" >
                                    </th>
                                    <th>Product Name</th>
                                    <th>Part Number</th>
                                    <th>Unit Price</th>
                                    <th>Qty/Unit</th>
                                    <th>Description</th>
                                </tr>
                            </thead>

                            <tbody>

                                {{-- foreach variable --}}
                                @foreach ($listProduct as $key=>$val)
                                    @foreach ($val as $key2=>$val2)
                                            <tr>
                                                <td class="border">
                                                    <input type="checkbox" id="productSelect_{{$row_id}}"  class="productSelect_{{$key2}}"   value="{{$val2->id}}" name="selectUnitProduct">
                                                </td>
                                                <td class="border">
                                                    <div id="productName_{{$row_id}}"  data-id="productName_{{$val2->id}}" >
                                                        {{$val2->name}}
                                                    </div>
                                                </td>
                                                <td class="border">
                                                    <div data-id="productPartNumber_{{$val2->id}}">
                                                        {{$val2->part_number}}
                                                    </div>
                                                </td>
                                                <td class="border">
                                                    <div data-id="productPrice_{{$val2->id}}">
                                                        {{$val2->product_price}}
                                                    </div>
                                                </td>

                                                <td class="border">
                                                    <div data-id="stockProduct_{{$val2->id}}">
                                                        {{$val2->stock_qty}}
                                                    </div>
                                                </td>
                                                <td class="border">
                                                    <div data-id="productDescription_{{$val2->id}}">
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

