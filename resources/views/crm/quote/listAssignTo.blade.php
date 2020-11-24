


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="listAssignTo">
    <div class="modal-dialog modal-lg" id="confirm_box1">
        <div class="modal-content">
                <div class=" modal-header text-center">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Assign To</b></h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class=" modal-body">

                    <div class="row pb-3">
                        <div class="col-md-2 col-sm-2 col-4">
                            <input type="button" class="btn btn-success " id="getSelectRow"  value="Select">
                        </div>
                        <div class="col-md-5 col-sm-5 col-4"></div>
                        <div class="col-md-5 col-sm-5 col-4">
                            <input type="search" id="mySearchQuote" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="row-12 pt-2 table-responsive">
                        <table id="tblAssignTo" class="table table-bordered " style="width: 100%; white-space:nowrap;">
                            <thead>
                                <tr >
                                    <th>
                                        No.
                                    </th>
                                    <th>Khmer Name</th>
                                    <th>English Name</th>
                                    <th>Card ID</th>
                                    <th>Position</th>
                                </tr>
                            </thead>

                            <tbody>

                                {{-- foreach variable --}}
                                @if(isset($employee))
                                    @foreach($employee as $key=>$val)
                                                {{-- {{ print_r($val->first_name_en) }}<br><br> --}}
                                                <tr id="{{$val->id}}">
                                                    <td class="border">
                                                        {{$key+1}}
                                                        <input type="hidden" name="leadQuote" id="leadQuote" value="{{$val->id}}">
                                                    </td>
                                                    <td class="border">
                                                        <div id="em_name_kh{{$val->id}}"  class="em_name_kh" >
                                                            {{$val->first_name_kh.' '.$val->last_name_kh}}
                                                        </div>
                                                    </td>

                                                    <td class="border">
                                                        <div  id="em_name_en_{{$val->id}}" class="em_name_en">
                                                            {{$val->first_name_en.' '.$val->last_name_en}}
                                                        </div>
                                                    </td>

                                                    <td class="border">
                                                        <div class="leadNumber">
                                                            {{$val->id_number}}
                                                        </div>
                                                    </td>
                                                    <td class="border">
                                                        <div class="leadEmail">
                                                            {{$val->positionName}}
                                                        </div>
                                                    </td>

                                                </tr>

                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>


