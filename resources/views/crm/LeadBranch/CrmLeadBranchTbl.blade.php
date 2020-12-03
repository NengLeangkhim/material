{{-- @php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
@endphp --}}
<div class="col-12 text-right">
    <a  href="javascript:void(0);" class="btn btn-success crm_contact" onclick="CrmModalAction('crm_lead_status_form','crm_lead_status','ActionLeadStatus','Add Lead Status')" ​><i class="fas fa-plus"></i> Add Lead Branch</a>
</div>
<div class="col-12" style="margin-top: 10px">
    <div class="table-responsive">
        <table id="Lead_Branch_Tbl" class="table table-bordered table-striped nowrap" style="width: 100%;">
            <thead>
                <tr style="background: #1fa8e0">
                    {{-- <th style="color: #FFFFFF">Lead No</th> --}}
                    <th style="color: #FFFFFF">Company Name</th>
                    {{-- <th style="color: #FFFFFF">Lead Branch Number</th> --}}
                    <th style="color: #FFFFFF">Company Branch Name</th>
                    <th style="color: #FFFFFF">Email</th>
                    <th style="color: #FFFFFF">Phone</th>
                    <th style="color: #FFFFFF">Schedule</th>
                    <th style="color: #FFFFFF">Lead Status</th>
                    <th style="color: #FFFFFF">Assign To</th>
                    <th style="color: #FFFFFF">Action</th>
                    {{-- <th>Detail</th> --}}
                </tr>
            </thead>
            <tbody>
            {{-- @php
                $i=1;
            @endphp
             @foreach($tbl->data as $row)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->name_en}}</td>
                    <td>{{$row->name_kh}}</td>
                    <td>{{$row->sequence}}</td>
                    <td>{{date('Y-m-d H:i:s',strtotime($row->create_date))}}</td>
                    <td class="text-center">
                        <a href="#" id="{{$row->id}}" class="btn btn-info btn-block CrmEditLeadStatus"><i class="fas fa-wrench"></i></a>
                    </td>
                </tr>
             @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

