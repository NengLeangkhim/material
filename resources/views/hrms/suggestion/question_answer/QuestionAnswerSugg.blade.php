 <!-- page content -->
 <section class="content">
   <div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i>Question & Answer</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary"><i class="fas fa-user-plus"></i> Add Question Type</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="question_sugg">
                  <thead>                  
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Question Type</th>
                        <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @php
                   $i=1;   
                  @endphp
                  <tbody>
                    @foreach ($question_sugg as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->question}}</td>
                        <td>{{$row->question_type}}</td>
                        <td class="text-center">
                          <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu hrm_dropdown-menu"aria-labelledby="dropdownMenuButton">
                            <button type="button" id="{{$row->id}}" class="dropdown-item hrm_item">View Detail</button>
                            <button type="button" id="{{$row->id}}" onclick="add_plan_follow_up({{$row->id}})" class="dropdown-item hrm_item add_plan_follow_up">Add Choice</button>
                            <button type="button" id="{{$row->id}}" onclick="add_plan_follow_up({{$row->id}})" class="dropdown-item hrm_item add_plan_follow_up">Update</button>
                            </div>
                            </div>
                        </td>
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
   <script type='text/javascript'>
    $(document).ready(
        function(){
           // getTable('productlist','id');
            $('#question_sugg').DataTable();
        }
    );
  </script>