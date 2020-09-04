 <!-- page content -->
 <section class="content">
    <div style="padding:10px 10px 10px 10px">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                 <h1 class="card-title hrm-title"><strong><i class="fas fa-question-circle"></i> Suggestion</strong></h1>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="col-md-12 text-left">
                    <form id="suggestion_comment_form">
                      @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label for="employee_sugg">Suggestion<span class="text-danger">*</span></label>
                              <textarea class="form-control" required id="employee_sugg" aria-describedby="employee_sugg" name="employee_sugg" rows="7"></textarea>
                              <span class="invalid-feedback" role="alert" id="employee_suggError"> {{--span for alert--}}
                                <strong></strong>
                              </span>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                             <button type="submit" onclick="HrmSubmitSuggestion()" class="btn btn-info">Submit</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>    
               </div>
               <!-- /.card-body -->
               
             <!-- /.card -->
     </div>
 </div>
    </section> 