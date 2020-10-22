@php
    //  foreach($permission as $item){// get group id for permission
    //     $level=$item->ma_group_id;
    //  }
@endphp

 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i> Policies</strong></h1>
                 <div class="col-md-12 text-right">
                     {{-- {!!$add_perm!!} --}}
                 </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" style="width: 100%" id="hrm_policy_list">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Policy Name</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                            {!!$table_perm!!}
                        </table>
                    </div>
               </div>
               <!-- /.card-body -->

             <!-- /.card -->
     </div>
 </div>
    </section>
 <div id='ShowModalPolicy'></div>
    <script type='text/javascript'>
     $(document).ready(
         function(){
            // getTable('productlist','id');
             $('#hrm_policy_list').DataTable({
               scrollX: true
             });
         }
     );
   </script>

