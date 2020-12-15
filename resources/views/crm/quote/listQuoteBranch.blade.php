


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
                                @foreach ($listBranch as  $key=>$val2)
                                    <tr id="{{$val2->id}}" >
                                        <td class="border">
                                            {{$key+1}}
                                            {{-- hidden use for call get value --}}
                                            <input type="hidden" name="branchId" id="branchId" value="{{$val2->id}}">
                                            <input type="hidden"  id="brdcompanyEn_{{$val2->id}}" value="{{$val2->name_en}}">
                                            <input type="hidden"  id="brdAddressNameEn_{{$val2->id}}" value="{{$val2->address_en??''}}">
                                            <input type="hidden"  id="branAddressId_{{$val2->crm_lead_address_id}}" value="{{$val2->crm_lead_address_id}}">
                                            <input type="hidden"  id="branVatNumber_{{$val2->id}}" value="{{ $getVatNum ?? ""}}">

                                        </td>
                                        <td class="border">
                                            <div   class="branchKhName" >
                                                {{$val2->name_en ?? ""}}
                                            </div>
                                        </td>

                                        <td class="border">
                                            <div class="branchEnName" >
                                                {{$val2->name_kh ?? ""}}
                                            </div>
                                        </td>

                                        <td class="border">
                                            <div class="branchEmail">
                                                {{$val2->email ?? ""}}
                                            </div>
                                        </td>
                                        <td class="border">
                                            <div class="branchCompany">
                                                {{$val2->company_detail ??''}}
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

</div>


