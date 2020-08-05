<div class="modal fade show" id="HrmModalKnowledgeQuestion" tabindex="-1" role="dialog" aria-labelledby="HrmModalKnowledgeQuestion" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i></strong></h3>
                <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">General Question</h2>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <ul class="list-group list-group-flush">
                    <?php 
                    $i=1;
                    foreach($knowledge as $row){
                    ?>
                    <li class="list-group-item"><span><?=$i++?> /: </span> <?=$row->question?></li>
                    <?php 
                    } 
                    ?>
                </ul> 
                  <div class="row text-right" style="margin-top: 5px;">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>   
                  </div>
            </div><!-- /.END card-body -->
          </div><!-- /.END card-Default -->
      </div>
  </div>
</div>