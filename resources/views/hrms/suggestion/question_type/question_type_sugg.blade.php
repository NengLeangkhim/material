 <!-- page content -->
 <section class="content">
    <div class="right_col" role="main">
       <div class="contain-fluid">
           <section class="content-header">
               <h2>
                   <a  href="javascript:void(0);"><img src="img/customerProduct.png" height="30" class="img-circle img-bordered-sm" alt="User Image"> Question Type</a>
                                       / <a href="javascript:void(0);" onclick="go_to('/AddQuestionType_Sugg')" value="/AddQuestionType" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</a>
                           </h2>
           </section>
           <div>
               <div style="width:100%;height:8px;background-color:#3c8dbc;margin-bottom:10px"></div>
               <div class="row">
                   <div class="col-md-9">
                       <a  href="javascript:void(0);" class="btn btn-light" onclick="ExporttoPDFFile('tb_productlist')">PDF</a>
                       <a  href="javascript:void(0);" class="btn btn-light" onclick="GetDataFromTableExcel('tb_productlist','Product List')">Excel</a>
                   </div>
                   <div class="col-md-3 right">
                       <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text" id="basic-addon1">Search</span>
                           </div>
                           <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" onkeyup="getTable_search('productlist','id',this)">
                       </div>
                   </div>
               </div>
                   <div class="table-overflow">
                       <div class="table-question_type_sugg" id='tablediv'>
                            <div class="table-responsive">
                                <table class="table table-striped" id="tbl_type_sugg">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Question Type</th>
                                        <th scope="col">Create_Date</th>
                                        <th scope="col">Create_By</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $i=1;
                                        $check='';?>
                                        @foreach($question_type_sugg as $row)
                                            <tr>
                                                    <td style="color:black;" scope="row">{{$i++}}</td>
                                                        <td style="color:black;">{{$row->name}}</td>
                                                        <td style="color:black;">{{ $row->create_date }}</td>
                                                        <td style="color:black;">{{$row->username}} </td>
                                                        <td>
                                                        @if($row->status==1)
                                                            <input type="checkbox" name="ch_q_type" value="{{$row->id}}" class="checkbox_type" id="checkbox_type" checked><label id="label_check" style="color:green;">Active</label>
                                                        @else
                                                            <input type="checkbox" name="ch_q_type" value="{{$row->id}}" class="checkbox_type" id="checkbox_type"><label id="label_check" style="color:red;">Inactive</label>
                                                        
                                                        @endif
                                                        </td>
                                                            <td style="color:black;" class="text-right"><a href="#" class="btn btn-info" onClick="EditQuestionType('{{$row->id}}')">Edit</a></td>
                                                        </tr>     
                                    @endforeach
                                    </tbody>
                                </table> 
                                            
                            </div>
                        </div>
                    </div>
           </div>
       </div>
   </div>
   </section>
   <!-- /page content -->
   <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#tbl_type_sugg').DataTable();
             $(".table-overflow").doubleScroll();

         }
     );
   </script>