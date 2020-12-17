{{-- @php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
@endphp --}}
<div class="col-12" style="margin-top: 10px">
    <div class="table-responsive">
        <table id="Lead_Branch_Tbl" class="table table-bordered table-striped nowrap">
            <thead>
                <tr style="background: #1fa8e0">
                    <th style="color: #FFFFFF">Lead No</th>
                    <th style="color: #FFFFFF">Customer Name</th>
                    {{-- <th style="color: #FFFFFF">Lead Branch Number</th> --}}
                    <th style="color: #FFFFFF">Customer Branch Name</th>
                    <th style="color: #FFFFFF">Email</th>
                    <th style="color: #FFFFFF">Phone</th>
                    <th style="color: #FFFFFF">Customer Type</th>
                    <th style="color: #FFFFFF">Lead Status</th>
                    <th style="color: #FFFFFF">Assign To</th>
                    <th style="color: #FFFFFF">Create By</th>
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
<script>

</script>

