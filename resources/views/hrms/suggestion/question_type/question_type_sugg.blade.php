 <!-- page content -->
 <section class="content">
   <div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i>Question Type</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" id="Add_Q_Type_Sugg" onclick="AddNewQ_type_sugg('/hrm_question_type_sugg/modal')" class="btn bg-gradient-primary"><i class="fas fa-user-plus"></i> Add Question Type</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_type_sugg">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th scope="col">Question Type</th>
                      <th scope="col">Create_By</th>
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
                            <td style="color:black;">{{$row->username}} </td>
                            <td style="color:black;" class="text-center"><a href="#" id="{{$row->id}}" class="btn btn-info update_q_t_sugg"><i class="far fa-edit"></i></a></td>
                        </tr>     
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
   </section>
   <div id="modaldiv_type_sugg"></div>
   @yield('scripts')
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
  
        <!-- end modal -->
    @section('scripts')
    @parent
    @if($errors->has('question_type_sugg'))
        <script>
        $(function() {
            $('#question_type_sugg_form').modal({
                show: true
            });
        });
        </script>
    @endif
    @endsection