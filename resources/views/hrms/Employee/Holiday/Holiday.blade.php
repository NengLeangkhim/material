<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-calendar-times"></i> Holiday</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary"><i class="fas fa-user-plus"></i> Add Holiday</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="tbl_holiday" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Khmer Title</th>
                      <th>Holiday Date</th>
                      <th>Day</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($holiday as $item)
                      <tr>
                      <th>{{ ++$i }}</th>
                      <td>{{ $item->title }}</td>
                        <td>{{ $item->title_kh }}</td>
                      <td>{{ $item->holiday_date }} to {{$item->to_date}}</td>
                        <td>{{ date('l', strtotime($item->holiday_date)) }}</td>
                        <td>{{ $item->description }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#tbl_holiday').DataTable({
      responsive: true
    });
} );
</script>