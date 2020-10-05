

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="listQuoteProduct">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel"><b> Add Product </b></h4>
                </div>
                <div class=" modal-body ">

                    <div class="row pb-3">
                        <div class="col-md-2 col-sm-2 col-4">
                            <input type="button" class="btn-success" id="" value="Select">
                        </div> 
                        <div class="col-md-5 col-sm-5 col-4"></div>
                        <div class="col-md-5 col-sm-5 col-4">
                            <input type="search" id="mySearchQuote" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="row-12 pt-2 ">
                        <table id="tblItemProduct" class="table table-bordered table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="selectAllProduct" >
                                    </th>
                                    <th>Product Name
                                    </th>
                                    <th>Part Number</th>
                                    <th>Unit Price</th>
                                    <th>Commission Rate</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                    $i = 0;
                                    while ($i <= 25) {
                                        echo '
                                            <tr>
                                                <td><input type="checkbox" name="selectAllProduct" ></td>
                                                <td>BBBB--'.$i.'</td>
                                                <td>CCCC</td>
                                                <td>DDDD</td>
                                                <td>EEEE</td>
                                                <td>FFFF</td>
                                                <td>GGGG</td>
                                            </tr>
                                        ';
                                        $i++;
                                    }
                                   
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div

