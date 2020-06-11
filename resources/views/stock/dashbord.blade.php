<section class="content">
  <div class="container-fluid">
        <!-- page content -->
        <div class="right_col">
          <!-- top tiles -->
  <div id="AllCompanyChange">
          <div class="row"  style="" >
            @foreach($company[0] as $companys)
            <div class="col-md-2 otherCompany">
              <div class="header-title text-center">
                  {{$companys->name}}
              </div>
              <div>
                <div>
                  <p>
                  Branch : 
                  @foreach($company[1] as $brand)
                  @php
                    $b=0;
                    if($companys->id==$brand->company_id){
                      $b=$brand->count;
                      break;
                    }
                    
                   @endphp 
                  @endforeach
                  {{$b}}
                  </p>
                </div>
                <div>
                <p>Products : 
                @foreach($company[2] as $pduct)
                    @php
                      if($companys->id==$pduct[0]->id){
                        echo $pduct[0]->count;
                      }
                    @endphp
                    
                @endforeach
                </p>
                </div>
              </div>
              <div class="text-right">
                <button class="btn-info" onClick="showCompanyDetail({{$companys->id}},1)">Show Detail</button>
              </div>
            </div>
            @endforeach
            
          </div>
          <div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                @php
                if(count($company[0])>6){
                  echo '<li class="page-item"><a class="page-link" href="javascript:void(0);">1/'.ceil(count($company[0])/5).'</a></li>';
                  echo '<li class="page-item"><a class="page-link"href="javascript:void(0);" onclick="PaginationAllCompany(2);">Next</a></li>';
                }
                @endphp
                
              </ul>
            </nav>
        </div>
</div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    Location :
                      <select class="mdb-select md-form" onchange="locationChange()" id="locationStorage">
                        <option value="all">All</option>
                        @foreach ($company[4] as $storage)
                      <option value="{{$storage->id}}">{{$storage->name}}</option>
                        @endforeach
                      </select>
                      <input type="text" placeholder="Search......" id="searchNameProduct" onkeyup="locationChange()">
                  </div>
                  {{-- <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div> --}}
                    <div class="col-md-6 text-right">
                      <input type="date" id="turbo_date_start" onchange="">to<input type="date" id="turbo_date_end" onchange="dashboardDateChange()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4" id="dashboarhProduct">
                <table class="table table-bordered" id="tbl">
                  <thead class="">
                    <th>No</th>
                    <th>Name</th>
                    <th>qty available</th>
                    <th>Purchase</th>
                    <th>Request</th>
                    <th>Return</th>
                  </thead>
                  <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach ($company[3] as $item)
                      <tr>
                      <td>{{++$i}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->import}}</td>
                        <td>{{$item->request*-1}}</td>
                        <td>{{$item->return}}</td>
                        <td style="display:none">{{$item->id}}</td>
                        @php
                          if($i==1){
                            $_SESSION['productID']=$item->id;
                          }
                        @endphp

                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <div class="col-md-8" id="dhsddhjdsdjf">
                <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalCompany" role="dialog">
      <div class="modal-dialog modal-xl" >

        <!-- Modal content-->
        <div class="modal-content" id="copanyProductChange">


        </div>

      </div>
    </div>
  </div>
  </section>