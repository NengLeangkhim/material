


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="listQuoteProduct">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel"><b> Add Product </b></h4>
                </div>
                <div class=" modal-body ">

                    <div class="row pb-3">
                        <div class="col-md-2 col-sm-2 col-4">
                            <input type="button" class="btn-success" id=""  value="Select">
                        </div> 
                        <div class="col-md-5 col-sm-5 col-4"></div>
                        <div class="col-md-5 col-sm-5 col-4">
                            <input type="search" id="mySearchQuote" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="row-12 pt-2 ">
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
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{
                                    $arr[] = ''
                                }}
                                @for($i=0; $i<=20; $i++)
                                    <?php
                                        $arr[] += $i;
                                    ?>
                                @endfor
                                
                                {{-- foreach variable --}}
                                @foreach ($arr as $key=>$val)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="{{$key}}" name="selectAllProduct">
                                         </td>
                                        <td>
                                            <div>
                                                Product--{{ $key }}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                100
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                10
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                1.0
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                Not a bundle
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach    
                                   

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div

