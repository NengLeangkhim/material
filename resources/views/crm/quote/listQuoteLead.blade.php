
{{-- <div class="modal fade" id="listQuoteLead" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <h5>Helskdmfklsmdfklsdmafklsmaasdfsx</h5>
            <h5>Helskdmfklsmdfklsdmafklsmaasdfsak</h5>
            <h5>Helskdmfklsmdfklsdmafklsma</h5>
            <h5>Helskdmfklsmdfklsdmafklsma</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="listQuoteLead">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" ><b>Select Customer Name</b></h4>
                    <button type="button" onclick="closeModalUp('listQuoteLead')" class="close" data-dismiss="modal">×</button>
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
                        <table id="tblQuuteLead" class="table table-bordered " style="width: 100%; white-space:nowrap;">
                            <thead>
                                <tr >
                                    {{-- <th>
                                        No.
                                    </th> --}}
                                    <th>Khmer Name</th>
                                    <th>English Name</th>
                                    <th>Lead Number</th>
                                    <th>VAT Type</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody>

                                @if(false)
                                    @foreach ($listLead as $key=>$val)
                                        @foreach ($val as $key2=>$val2)
                                                <tr id="{{$val2->lead_id}}">
                                                    <td class="border">
                                                        {{$key2+1}}
                                                        <input type="hidden" name="leadQuote" id="leadQuote" value="{{$val2->lead_id}}">
                                                        <input type="hidden" id="leadAddressId{{$val2->lead_id}}" value="{{$val2->lead_addr_id}}">
                                                    </td>
                                                    <td class="border">
                                                        <div class="leadKhName" id="leadKhName_{{$val2->lead_id}}">
                                                            {{$val2->customer_name_kh}}
                                                        </div>
                                                    </td>
                                                    <td class="border">
                                                        <div class="leadEnName" id="leadEnName_{{$val2->lead_id}}">
                                                            {{$val2->customer_name_en}}
                                                        </div>
                                                    </td>

                                                    <td class="border">
                                                        <div class="leadNumber">
                                                            {{$val2->lead_number}}
                                                        </div>
                                                    </td>
                                                    <td class="border">
                                                        <div class="vatLead">
                                                            @if($val2->vat_number != '')
                                                                <span>Exclude</span>
                                                            @else
                                                                <span>Include</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="border">
                                                        <div class="leadEmail">
                                                            {{$val2->email}}
                                                        </div>
                                                    </td>

                                                </tr>
                                        @endforeach
                                    @endforeach
                                @endif
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

