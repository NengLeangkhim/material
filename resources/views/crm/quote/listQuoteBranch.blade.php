


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="listQuoteBranch">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Select Branch</b></h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class=" modal-body">

                    <div class="row pb-3">
                        <div class="col-md-2 col-sm-2 col-4">
                            <input type="button" class="btn btn-success " id="getSelectRow"  value="Select"> 
                        </div> 
                        <div class="col-md-5 col-sm-5 col-4"></div>
                        <div class="col-md-5 col-sm-5 col-4">
                            <input type="search" id="mySearchQuote" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="row-12 pt-2 table-responsive">
                        <table id="tblQuoteBranch" class="table table-bordered " style="width: 100%; white-space:nowrap;">
                            <thead>
                                <tr >
                                    <th>
                                        No.
                                    </th>
                                    <th>Khmer Name</th>
                                    <th>English Name</th>
                                    <th>Company Detail</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody>

                                {{-- foreach variable --}}

                                @foreach ($listBranch as $key=>$val)
                                    @foreach ($val as $key2=>$val2)
                                            <tr id="{{$val2->branch_id}}" >

                                                <td class="border">
                                                    {{$key2+1}}
                                                    {{-- hidden use for call get value --}}
                                                    <input type="hidden" name="branchId" id="branchId" value="{{$val2->branch_id}}">
                                                    <input type="hidden"  id="brdcompanyEn_{{$val2->branch_id}}" value="{{$val2->company_en}}">
                                                    
                                                    <input type="hidden"  id="brdnameEn_{{$val2->branch_id}}" value="{{$val2->home_en}}">
                                                    <input type="hidden"  id="brdnameKh_{{$val2->branch_id}}" value="{{$val2->home_kh}}">
                                                    <input type="hidden"  id="brdstreetEn_{{$val2->branch_id}}" value="{{$val2->street_en}}">
                                                    <input type="hidden"  id="brdstreetKh_{{$val2->branch_id}}" value="{{$val2->street_kh}}">
                                                    <input type="hidden"  id="brdprvince_{{$val2->branch_id}}" value="{{$val2->province}}">
                                                    <input type="hidden"  id="brddistrict_{{$val2->branch_id}}" value="{{$val2->district}}">
                                                    <input type="hidden"  id="brdcommue_{{$val2->branch_id}}" value="{{$val2->commune}}">
                                                    <input type="hidden"  id="brdvillage_{{$val2->branch_id}}" value="{{$val2->village}}">

                                                </td>
                                                <td class="border">
                                                    <div   class="branchKhName" >
                                                        {{$val2->company_en}}
                                                    </div>
                                                </td>

                                                <td class="border">
                                                    <div class="branchEnName" >
                                                        {{$val2->company_kh}}
                                                    </div>
                                                </td>

                                                <td class="border">
                                                    <div class="branchEmail">
                                                        {{$val2->primary_email}}
                                                    </div>
                                                </td>
                                                <td class="border">
                                                    <div class="branchCompany">
                                                        {{$val2->company_detail}}
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


