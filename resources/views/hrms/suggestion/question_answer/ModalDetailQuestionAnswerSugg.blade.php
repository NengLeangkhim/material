<section class="content">
    <!-- modal -->
        <div class="modal fade show" id="modal_detail_queston_answer_sugg" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="card card-default">
                  <div class="card-header">
                      <h3 class="card-title hrm-title"><strong><i class="fas fa-info-circle"></i> Detail Question And Answer</strong></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                  </div><!-- /.card-header -->
                  <div class="card-body" style="display: block;">
                    <div class="container-fluid">
                        @foreach ($question_sugg_view as $item)
                        <div class="row" style="height:150px">
                            <div class="col-12" style="text-align:center">
                                <span class="text-center" style="font-size:15px;color:#d42931;float:left">Question:</span>
                                <textarea disabled style="display:inline;color:black;" name="" id="interest" cols="33" rows="4">{{$item->question}}</textarea>
                            </div>
                        </div><!-- End Row -->
                        @endforeach
                        <div class="row" style="height:100%">
                            <div class="col-12" >
                                <span class="text-center" style="font-size:15px;color:#d42931;">Answer:</span>
                                <table class="table" style="width:100%">
                                 <thead class="thead-light">
                                    <tr>
                                        <th>Answer</th>
                                        <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($answer_sugg as $row)
                                        <tr>
                                            <td>{{$row->answer}}</td>
                                            <td class="text-center">
                                            @if ($row->status=='t')
                                               {{'Active'}} 
                                            @else
                                              {{'Inactive'}}  
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                 </tbody>
                                </table> 
                            </div>
                        </div><!-- End Row -->
                        <div class="row text-right">
                            <div class="col-md-12 text-right">
                              <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                          </div>
                    </div>
                  </div><!-- /.END card-body -->
                </div><!-- /.END card-Default -->
              </div>
          </div>
        </div>
          <!-- end modal -->
    </section>
        <!-- end modal -->
    