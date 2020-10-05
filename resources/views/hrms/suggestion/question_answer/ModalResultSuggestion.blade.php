@if ($result==null) {{-- Check fs no data--}}
   <!-- modal -->
   <div class="modal fade show" id="hrm_view_result_sugg" tabindex="-1" role="dialog" aria-labelledby="hrm_view_result_sugg" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card card-default">
            <div class="card-header">
                {{-- <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
                <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"></h2> --}}
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <span> Data No record</span>
                  <div class="row text-right">
                    <div class="col-md-12 text-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
            </div><!-- /.END card-body -->
          </div><!-- /.END card-Default -->
        </div>
      </div>
    </div>
    <!-- end modal --> 
@else
    <!-- modal -->
    <div class="modal fade show" id="hrm_view_result_sugg" tabindex="-1" role="dialog" aria-labelledby="hrm_view_result_sugg" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title hrm-title"><strong><i class="fas fa-poll-h"></i></strong></h3>
                        <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> {{$result[0]->question}}</h2>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                          <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                                <?php  	
							 if($result[0]->hr_suggestion_answer_id==null){
                        echo '<div class="table-responsive">
                                <table class="table table-bordered" id="writing_result">
                                 <thead>
                                    <tr>
                                        <th>Writing Answer</th>
                                        <th>Create Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>';
                                    foreach($result as $row) 
								{ 
                                    $create = $row->create_date;
                                    $ts1 = new DateTime($create); 
							    ?>
								  <tr>  
                                       <td><?php echo $row->answer_text ;?></td>  
                                       <td class="text-center"><?php echo $ts1->format('Y-m-d H:i:s');?></td>
                                  </tr> 
                                  <?php } // end foreach ?> 
                                 </tbody>
                            </table>
							<?php }else{
                         echo '<div class="table-responsive">
                                <table class="table table-bordered">';
								 foreach($result as $row )  
								 {  
									 $count_id[]=$row->answer ;	 
								 ?> 
								 <?php  } ?> 
								 <tr>  
									   <td width="30%"><label>Option Answer</label></td>  
									   <td width="70%"><?php /* echo $row["answer"]." = " ; */
									   // count array as the same string 
                                         $c= array_count_values($count_id);
										foreach ($c as $key => $value) {
										  echo $key.' = '.$value.'<br />';
										}
									  
									   /* print_r(array_count_values($count_id)); */?></td>  
                                  </tr>
                                </table>  
						<?php } ?>
                            
                        </div>
                        <div class="row text-right" style="margin-top:5px;">
                            <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div><!-- /.END card-body -->
              </div><!-- /.END card-Default -->
            </div>
        </div>
    </div>
<!-- end modal -->
@endif
<script type='text/javascript'>
    $(document).ready(
        function(){
           // getTable('productlist','id');
            $('#writing_result').DataTable({
                "searching": false,
                "ordering": false,
            });
        }
    );
  </script>
