<div class="col-12">
    <div class="row d-flex align-items-stretch">
      @foreach ($contact_pagination as $row )
      <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch" >
        <div class="card bg-light" style="width:1000px">
          <div class="card-header text-muted border-bottom-0">                                    
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
              <h2 class="lead"><b>{{($row->name_en)=='Null'? "N/A":$row->name_en}}</b></h2>
              <h2 class="lead" style="font-family: khmer UI;"><b>{{($row->name_kh)=='Null'? "N/A":$row->name_kh}}</b></h2>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span> Email : {{($row->email)=='NUll'? "turbotech@gmail.com":$row->email}}</li>
                  <li class="small"><span class="fa-li"><i class="fab fa-facebook-f"></i></span> Facbook : {{($row->facebook)=='Null'? "N/A":$row->facebook}}</li>
                  <li class="small"><span class="fa-li"><i class="fas fa-phone-alt"></i></span> Phone : {{($row->phone)=='Null'? "N/A":$row->phone}}</li>
                </ul>
              </div>
              <div class="col-5 text-center">
                <img src="../../dist/img/user_contact.png" alt="" class="img-circle img-fluid" style="border: 3px solid black">
                {{-- <i style="font-size:55px" class="fas fa-user-circle"></i> --}}
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              {{-- <a href="#" class="btn btn-sm bg-teal">
                <i class="fas fa-comments"></i>
              </a> --}}
              <a href="javascript:void(0);" class="btn btn-sm btn-primary CrmContactDetail" onclick="go_to('/contact/detail?id={{$row->id}}')">
                <i class="fas fa-user"></i> View Profile
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach                      

    </div> 
    {{$contact_pagination->links()}}
</div>
  