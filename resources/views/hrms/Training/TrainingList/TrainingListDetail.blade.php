<div class="modal fade show" id="modal_traininglist_detail" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong>Training List Detail</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @php
                // print_r($data[0]);
            @endphp
             <table class="table">
                 <tbody>
                     <tr>
                         <th>Training Type</th>
                         <th>:</th>
                         <td>{{$data[0][0]->type}}</td>
                     </tr>
                     <tr>
                         <th>Trainer</th>
                         <th>:</th>
                         <td>{{$data[0][0]->trainer}}</td>
                     </tr>
                     <tr>
                         <th>Start Date</th>
                         <th>:</th>
                         <td>{{$data[0][0]->schet_f_date}}</td>
                     </tr>
                     <tr>
                         <th>End Date</th>
                         <th>:</th>
                         <td>{{$data[0][0]->schet_t_date}}</td>
                     </tr>
                     <tr>
                         <th>Trained or Not</th>
                         <th>:</th>
                         <td>@php
                             if(Str::length($data[0][0]->hrid)>0){
                                 echo "Trained";
                             }else {
                                 echo "Not Trained";
                             }
                         @endphp</td>
                     </tr>
                     <tr>
                     <th rowspan="{{count($data[1])+1}}">Staff Trained</th>
                         <th rowspan="{{count($data[1])+1}}">:</th>
                     </tr>
                     @foreach ($data[1] as $strain)
                        <tr>
                        <td>{{$strain->first_name_en}} {{$strain->last_name_en}}</td>
                        </tr>
                     @endforeach
                     
                     <tr>
                         <th>Description</th>
                         <th>:</th>
                         <td>{{$data[0][0]->schet_description}}</td>
                     </tr>
                 </tbody>
             </table>
             
          </div>
          
          <!-- /.card-body -->
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();


    
  });
  
</script>
