<div class="col-12 text-right">
    <a  href="javascript:void(0);" class="btn btn-success crm_contact" ​><i class="fas fa-plus"></i> Add Lead Industry</a> 
</div>
<div class="col-12" style="margin-top: 10px">
    <div>
        <table class="table table-bordered display nowrap" style="width: 100%" id="Lead_industry_Tbl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name eng</th>
                    {{-- <th>Name Kh</th>
                    <th>phone</th>
                    <th>facebook</th>
                    <th>Email </th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @php
                $i=1;
            @endphp
            @foreach($tbl->data as $row)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->name}}</td>
                    {{-- <td>{{'$row->name_kh'}}</td>
                    <td>{{'$row->phone'}}</td>
                    <td>{{'$row->facebook'}}</td>
                    <td>{{'$row->email'}}</td> --}}
                    <td>
                        <a href="#" class="btn btn-block btn-info btn-sm CrmEditContact"><i class="fas fa-wrench"></i></a>
                    </td>
                </tr>                                        
            @endforeach
            </tbody>  
        </table>
    </div>
</div>
<!-- modal -->
<form id="crm_lead_industry_form">
    
</form>
<!-- end modal -->
