@extends('setting.layout.master')

@section('content')
<style>
    .fa-select{
        font-family: "Font Awesome 5 Free" !important;
    }
    .fa-select option{ font-weight: 900 !important; }
</style>
        <div style="padding:10px 10px 10px 10px">
            <div class="row">
              <div id="testt"></div>
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h1 class="card-title hrm-title"><strong><i class="fas fas fa-users"></i> Modules Access</strong></h1>
                        <div class="col-md-12 text-right">
                            {{-- <a title="Add Vehicles" class="btn-samll btn btn-primary" data-toggle="modal" data-target="#addDevice" href="#"><i class="fa fas fa-lg fas fa-plus"></i></a> --}}
                            <a href="#" class="btn bg-turbo-color" data-toggle="modal" data-target="#addModule"><i class="fas fas fa-plus"></i> Add Module​ Access</a>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="container-fluid">
                            <table class="table table-bordered" id="tbl_employee" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Module Name</th>
                                    <th>Code</th>
                                    <th>Icon</th>
                                    <th>Position</th>
                                    <th>Group</th>
                                    <th>Department</th>
                                    <th>User</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                {{-- <tbody> --}}
                                  @php
                                //   $flag='';
                                //   $sh='';
                                //   foreach ($module_access as $item){
                                //       echo '<tr>';
                                //               if(empty($flag)){
                                //                   $f=true;
                                //                   $flag=$item->code;
                                //               }else if($flag==$item->code){
                                //                   $flag=$item->code;
                                //                   $f=false;
                                //               }else{
                                //                   $flag=$item->code;
                                //                   $f=true;
                                //               }
                                //               if($f){
                                //                   echo $sh= "<td rowspan=' {$item->count}'> $item->name</td>
                                //                       <td rowspan=' {$item->count}'> $item->code</td>
                                //                       <td rowspan=' {$item->count}'>$item->icon</td>";
                                //               }
                                //             //   echo $sh= "<td > $item->name</td>
                                //             //           <td > $item->code</td>
                                //             //           <td '>$item->icon</td>";
                                //           echo "<td> $item->position </td>
                                //           <td> $item->group </td>
                                //           <td> $item->department </td>
                                //           <td> $item->user </td>
                                //           <td><a onclick=\"edit($item->module_id)\"><i class=\"far fas fa-edit\"></i></td>";
                                //       echo'</tr>';
                                //   }
                                  @endphp
                                {{-- </tbody> --}}
                              </table>

                        </div>
                      </div>
            </div>
        </div>
        <script src="//cdn.rawgit.com/ashl1/datatables-rowsgroup/v1.0.0/dataTables.rowsGroup.js"></script>
        <script>
          $(document).ready(function() {
            $('#tbl_employee').DataTable({
                ajax: {
                    url: 'access/json',
                    dataSrc : 'data',
                },
                columns: [
                    { data: 'name' },
                    { data: 'code' },
                    { data: 'icon' },
                    { data: 'position' },
                    { data: 'group' },
                    { data: 'department' },
                    { data: 'user' },
                    { data: "module_id"  ,  "render": function ( data, type, full, meta ) {
                        return '<a type="button"  onclick="delete_access('+data+')"><i class="far fas fa-trash"></i></a>';
                        }}
                ],
                rowsGroup: [
                    0,
                    1,
                    2
                ],
            });
        } );
    </script>
{{-- Tab Module --}}

<!--====================================== Modal add device =====================================-->
<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><strong> Add Module Access</strong></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Module Access Group</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Module Access User</a>
            </li>
        </ul>
        {{-- ============= div module ============ --}}
        <div class="tab-content" id="myTabContent">
            {{-- ==================== Modue Access Group ===================== --}}
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="tile">
                        <div class="tile-body">
                            <form class="form-horizontal" action="access/add" method="POST">
                            @csrf
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Positions : </label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="position" id="position" required>
                                            <option value="" selected hidden disabled></option>
                                            <option value="null">null</option>
                                            @foreach ($position as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Group : </label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="group" id="group" required>
                                            <option value="" selected hidden disabled></option>
                                            <option value="null">null</option>
                                            @foreach ($group as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Company Department : </label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="department" id="department" required>
                                            <option value="" selected hidden disabled></option>
                                            <option value="null">null</option>
                                            @foreach ($department as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Select modules : </label>
                                    <div class="col-md-9">
                                        <select multiple class="form-control select2" name="module_id[]" id="" required>
                                            @foreach ($module as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                </div>
                                <div class="form-group row">
                                </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary submit-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" data-dismiss="modal" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ==================== Modue Access User ===================== --}}
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="tile">
                                <div class="tile-body">
                                    <form class="form-horizontal" action="access/add" method="POST">
                                    @csrf
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">User : </label><br/>
                                            <div class="col-md-9">
                                                <select class="form-control select2" name="user" id="user" required >
                                                    <option value="" selected hidden disabled></option>
                                                    <option value="null">null</option>
                                                    @foreach ($staff as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Select modules : </label>
                                            <div class="col-md-9">
                                                <select multiple class="form-control select2" id="" name="module_id[]" required>
                                                    @foreach ($module as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        </div>
                                        <div class="form-group row">
                                        </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary submit-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" data-dismiss="modal" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--================================================= End Modal add Module ====================================--}}

<!--================================================== Edit Module =====================================-->
<div class="modal fade" id="editModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Edit Module</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="col-md-12">
                <div class="tile">
                  <h5 class="tile-title">Module</h5>
                  <div class="tile-body">
                    <form class="form-horizontal" action="update/module" method="POST">
                      @csrf
                        <input type="hidden" name="moduleId" id="moduleId">
                        <div class="form-group row">
                            <label class="control-label col-md-2">Name</label>
                            <div class="col-md-4">
                            <input class="form-control" type="text" name="editName" id="editName" required placeholder="Name">
                            </div>

                            <label class="control-label col-md-2">Parent</label>
                            <div class="col-md-4">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-2">Link</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="editLink" id="editLink" required placeholder="link">
                            </div>

                            <label class="control-label col-md-2">Sequence</label>
                            <div class="col-md-4">
                                <input class="form-control" id="editSequence" type="text" required name="editSequence" placeholder="Sequence">
                            </div>
                        </div>

                        <div id="prefix" class="form-group row">
                            <label class="control-label col-md-2">Prefix Code</label>
                              <div class="col-md-4">
                                <input class="form-control" id="editPrefix_code" type="text" readonly="readonly" required name="editPrefix_code" placeholder="prefix code">
                            </div>

                            <label class="control-label col-md-2">IS SHOW</label>
                            <div class="form-check">
                                <input class="form-check-input" name="editShow" type="radio" value="t" id="editShow">
                                <label class="form-check-label" for="defaultCheck1">
                                    Yes
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="form-check">
                                <input class="form-check-input" name="editShow" type="radio" value="f" id="editShow">
                                <label class="form-check-label" for="defaultCheck1">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2">Icon</label>
                            <div class="col-md-4">
                                <select size="4" class="form-control fa-select" id="editIcon" required name="editIcon" >
                                    <option value="fas fa-american-sign-language-interpreting">&#xf2a3;&nbsp;American Sign Language Interpreting</option>
                                    <option value="fas fa-assistive-listening-systems">&#xf2a2;&nbsp;Assistive Listening Systems</option>
                                    <option value="fas fa-audio-description">&#xf29e;&nbsp;Audio Description</option>
                                    <option value="fas fa-blind">&#xf29d;&nbsp;Blind</option>
                                    <option value="fas fa-braille">&#xf2a1;&nbsp;Braille</option>
                                    <option value="fas fa-closed-captioning">&#xf20a;&nbsp;Closed Captioning</option>
                                    <option value="fas fa-deaf">&#xf2a4;&nbsp;Deaf</option>
                                    <option value="fas fa-low-vision">&#xf2a8;&nbsp;Low Vision</option>
                                    <option value="fas fa-phone-volume">&#xf2a0;&nbsp;Phone Volume</option>
                                    <option value="fas fa-question-circle">&#xf059;&nbsp;Question Circle</option>
                                    <option value="fas fa-sign-language">&#xf2a7;&nbsp;Sign Language</option>
                                    <option value="fas fa-tty">&#xf1e4;&nbsp;TTY</option>
                                    <option value="fas fa-universal-access">&#xf29a;&nbsp;Universal Access</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bell-slash">&#xf1f6;&nbsp;Bell Slash</option>
                                    <option value="fas fa-exclamation">&#xf12a;&nbsp;exclamation</option>
                                    <option value="fas fa-exclamation-circle">&#xf06a;&nbsp;Exclamation Circle</option>
                                    <option value="fas fa-exclamation-triangle">&#xf071;&nbsp;Exclamation Triangle</option>
                                    <option value="fas fa-radiation">&#xf7b9;&nbsp;Radiation</option>
                                    <option value="fas fa-radiation-alt">&#xf7ba;&nbsp;Alternate Radiation</option>
                                    <option value="fas fa-skull-crossbones">&#xf714;&nbsp;Skull & Crossbones</option>
                                    <option value="fas fa-cat">&#xf6be;&nbsp;Cat</option>
                                    <option value="fas fa-crow">&#xf520;&nbsp;Crow</option>
                                    <option value="fas fa-dog">&#xf6d3;&nbsp;Dog</option>
                                    <option value="fas fa-dove">&#xf4ba;&nbsp;Dove</option>
                                    <option value="fas fa-dragon">&#xf6d5;&nbsp;Dragon</option>
                                    <option value="fas fa-feather">&#xf52d;&nbsp;Feather</option>
                                    <option value="fas fa-feather-alt">&#xf56b;&nbsp;Alternate Feather</option>
                                    <option value="fas fa-fish">&#xf578;&nbsp;Fish</option>
                                    <option value="fas fa-frog">&#xf52e;&nbsp;Frog</option>
                                    <option value="fas fa-hippo">&#xf6ed;&nbsp;Hippo</option>
                                    <option value="fas fa-horse">&#xf6f0;&nbsp;Horse</option>
                                    <option value="fas fa-horse-head">&#xf7ab;&nbsp;Horse Head</option>
                                    <option value="fas fa-kiwi-bird">&#xf535;&nbsp;Kiwi Bird</option>
                                    <option value="fas fa-otter">&#xf700;&nbsp;Otter</option>
                                    <option value="fas fa-paw">&#xf1b0;&nbsp;Paw</option>
                                    <option value="fas fa-spider">&#xf717;&nbsp;Spider</option>
                                    <option value="fas fa-angle-double-down">&#xf103;&nbsp;Angle Double Down</option>
                                    <option value="fas fa-angle-double-left">&#xf100;&nbsp;Angle Double Left</option>
                                    <option value="fas fa-angle-double-right">&#xf101;&nbsp;Angle Double Right</option>
                                    <option value="fas fa-angle-double-up">&#xf102;&nbsp;Angle Double Up</option>
                                    <option value="fas fa-angle-down">&#xf107;&nbsp;angle-down</option>
                                    <option value="fas fa-angle-left">&#xf104;&nbsp;angle-left</option>
                                    <option value="fas fa-angle-right">&#xf105;&nbsp;angle-right</option>
                                    <option value="fas fa-angle-up">&#xf106;&nbsp;angle-up</option>
                                    <option value="fas fa-arrow-alt-circle-down">&#xf358;&nbsp;Alternate Arrow Circle Down</option>
                                    <option value="fas fa-arrow-alt-circle-left">&#xf359;&nbsp;Alternate Arrow Circle Left</option>
                                    <option value="fas fa-arrow-alt-circle-right">&#xf35a;&nbsp;Alternate Arrow Circle Right</option>
                                    <option value="fas fa-arrow-alt-circle-up">&#xf35b;&nbsp;Alternate Arrow Circle Up</option>
                                    <option value="fas fa-arrow-circle-down">&#xf0ab;&nbsp;Arrow Circle Down</option>
                                    <option value="fas fa-arrow-circle-left">&#xf0a8;&nbsp;Arrow Circle Left</option>
                                    <option value="fas fa-arrow-circle-right">&#xf0a9;&nbsp;Arrow Circle Right</option>
                                    <option value="fas fa-arrow-circle-up">&#xf0aa;&nbsp;Arrow Circle Up</option>
                                    <option value="fas fa-arrow-down">&#xf063;&nbsp;arrow-down</option>
                                    <option value="fas fa-arrow-left">&#xf060;&nbsp;arrow-left</option>
                                    <option value="fas fa-arrow-right">&#xf061;&nbsp;arrow-right</option>
                                    <option value="fas fa-arrow-up">&#xf062;&nbsp;arrow-up</option>
                                    <option value="fas fa-arrows-alt">&#xf0b2;&nbsp;Alternate Arrows</option>
                                    <option value="fas fa-arrows-alt-h">&#xf337;&nbsp;Alternate Arrows Horizontal</option>
                                    <option value="fas fa-arrows-alt-v">&#xf338;&nbsp;Alternate Arrows Vertical</option>
                                    <option value="fas fa-caret-down">&#xf0d7;&nbsp;Caret Down</option>
                                    <option value="fas fa-caret-left">&#xf0d9;&nbsp;Caret Left</option>
                                    <option value="fas fa-caret-right">&#xf0da;&nbsp;Caret Right</option>
                                    <option value="fas fa-caret-square-down">&#xf150;&nbsp;Caret Square Down</option>
                                    <option value="fas fa-caret-square-left">&#xf191;&nbsp;Caret Square Left</option>
                                    <option value="fas fa-caret-square-right">&#xf152;&nbsp;Caret Square Right</option>
                                    <option value="fas fa-caret-square-up">&#xf151;&nbsp;Caret Square Up</option>
                                    <option value="fas fa-caret-up">&#xf0d8;&nbsp;Caret Up</option>
                                    <option value="fas fa-cart-arrow-down">&#xf218;&nbsp;Shopping Cart Arrow Down</option>
                                    <option value="fas fa-chart-line">&#xf201;&nbsp;Line Chart</option>
                                    <option value="fas fa-chevron-circle-down">&#xf13a;&nbsp;Chevron Circle Down</option>
                                    <option value="fas fa-chevron-circle-left">&#xf137;&nbsp;Chevron Circle Left</option>
                                    <option value="fas fa-chevron-circle-right">&#xf138;&nbsp;Chevron Circle Right</option>
                                    <option value="fas fa-chevron-circle-up">&#xf139;&nbsp;Chevron Circle Up</option>
                                    <option value="fas fa-chevron-down">&#xf078;&nbsp;chevron-down</option>
                                    <option value="fas fa-chevron-left">&#xf053;&nbsp;chevron-left</option>
                                    <option value="fas fa-chevron-right">&#xf054;&nbsp;chevron-right</option>
                                    <option value="fas fa-chevron-up">&#xf077;&nbsp;chevron-up</option>
                                    <option value="fas fa-cloud-download-alt">&#xf381;&nbsp;Alternate Cloud Download</option>
                                    <option value="fas fa-cloud-upload-alt">&#xf382;&nbsp;Alternate Cloud Upload</option>
                                    <option value="fas fa-compress-alt">&#xf422;&nbsp;Alternate Compress</option>
                                    <option value="fas fa-compress-arrows-alt">&#xf78c;&nbsp;Alternate Compress Arrows</option>
                                    <option value="fas fa-download">&#xf019;&nbsp;Download</option>
                                    <option value="fas fa-exchange-alt">&#xf362;&nbsp;Alternate Exchange</option>
                                    <option value="fas fa-expand-alt">&#xf424;&nbsp;Alternate Expand</option>
                                    <option value="fas fa-expand-arrows-alt">&#xf31e;&nbsp;Alternate Expand Arrows</option>
                                    <option value="fas fa-external-link-alt">&#xf35d;&nbsp;Alternate External Link</option>
                                    <option value="fas fa-external-link-square-alt">&#xf360;&nbsp;Alternate External Link Square</option>
                                    <option value="fas fa-hand-point-down">&#xf0a7;&nbsp;Hand Pointing Down</option>
                                    <option value="fas fa-hand-point-left">&#xf0a5;&nbsp;Hand Pointing Left</option>
                                    <option value="fas fa-hand-point-right">&#xf0a4;&nbsp;Hand Pointing Right</option>
                                    <option value="fas fa-hand-point-up">&#xf0a6;&nbsp;Hand Pointing Up</option>
                                    <option value="fas fa-hand-pointer">&#xf25a;&nbsp;Pointer (Hand)</option>
                                    <option value="fas fa-history">&#xf1da;&nbsp;History</option>
                                    <option value="fas fa-level-down-alt">&#xf3be;&nbsp;Alternate Level Down</option>
                                    <option value="fas fa-level-up-alt">&#xf3bf;&nbsp;Alternate Level Up</option>
                                    <option value="fas fa-location-arrow">&#xf124;&nbsp;location-arrow</option>
                                    <option value="fas fa-long-arrow-alt-down">&#xf309;&nbsp;Alternate Long Arrow Down</option>
                                    <option value="fas fa-long-arrow-alt-left">&#xf30a;&nbsp;Alternate Long Arrow Left</option>
                                    <option value="fas fa-long-arrow-alt-right">&#xf30b;&nbsp;Alternate Long Arrow Right</option>
                                    <option value="fas fa-long-arrow-alt-up">&#xf30c;&nbsp;Alternate Long Arrow Up</option>
                                    <option value="fas fa-mouse-pointer">&#xf245;&nbsp;Mouse Pointer</option>
                                    <option value="fas fa-play">&#xf04b;&nbsp;play</option>
                                    <option value="fas fa-random">&#xf074;&nbsp;random</option>
                                    <option value="fas fa-recycle">&#xf1b8;&nbsp;Recycle</option>
                                    <option value="fas fa-redo">&#xf01e;&nbsp;Redo</option>
                                    <option value="fas fa-redo-alt">&#xf2f9;&nbsp;Alternate Redo</option>
                                    <option value="fas fa-reply">&#xf3e5;&nbsp;Reply</option>
                                    <option value="fas fa-reply-all">&#xf122;&nbsp;reply-all</option>
                                    <option value="fas fa-retweet">&#xf079;&nbsp;Retweet</option>
                                    <option value="fas fa-share">&#xf064;&nbsp;Share</option>
                                    <option value="fas fa-share-square">&#xf14d;&nbsp;Share Square</option>
                                    <option value="fas fa-sign-in-alt">&#xf2f6;&nbsp;Alternate Sign In</option>
                                    <option value="fas fa-sign-out-alt">&#xf2f5;&nbsp;Alternate Sign Out</option>
                                    <option value="fas fa-sort">&#xf0dc;&nbsp;Sort</option>
                                    <option value="fas fa-sort-alpha-down">&#xf15d;&nbsp;Sort Alphabetical Down</option>
                                    <option value="fas fa-sort-alpha-down-alt">&#xf881;&nbsp;Alternate Sort Alphabetical Down</option>
                                    <option value="fas fa-sort-alpha-up">&#xf15e;&nbsp;Sort Alphabetical Up</option>
                                    <option value="fas fa-sort-alpha-up-alt">&#xf882;&nbsp;Alternate Sort Alphabetical Up</option>
                                    <option value="fas fa-sort-amount-down">&#xf160;&nbsp;Sort Amount Down</option>
                                    <option value="fas fa-sort-amount-down-alt">&#xf884;&nbsp;Alternate Sort Amount Down</option>
                                    <option value="fas fa-sort-amount-up">&#xf161;&nbsp;Sort Amount Up</option>
                                    <option value="fas fa-sort-amount-up-alt">&#xf885;&nbsp;Alternate Sort Amount Up</option>
                                    <option value="fas fa-sort-down">&#xf0dd;&nbsp;Sort Down (Descending)</option>
                                    <option value="fas fa-sort-numeric-down">&#xf162;&nbsp;Sort Numeric Down</option>
                                    <option value="fas fa-sort-numeric-down-alt">&#xf886;&nbsp;Alternate Sort Numeric Down</option>
                                    <option value="fas fa-sort-numeric-up">&#xf163;&nbsp;Sort Numeric Up</option>
                                    <option value="fas fa-sort-numeric-up-alt">&#xf887;&nbsp;Alternate Sort Numeric Up</option>
                                    <option value="fas fa-sort-up">&#xf0de;&nbsp;Sort Up (Ascending)</option>
                                    <option value="fas fa-sync">&#xf021;&nbsp;fas fa-sync</option>
                                    <option value="fas fa-sync-alt">&#xf2f1;&nbsp;Alternate Sync</option>
                                    <option value="fas fa-text-height">&#xf034;&nbsp;text-height</option>
                                    <option value="fas fa-text-width">&#xf035;&nbsp;Text Width</option>
                                    <option value="fas fa-undo">&#xf0e2;&nbsp;Undo</option>
                                    <option value="fas fa-undo-alt">&#xf2ea;&nbsp;Alternate Undo</option>
                                    <option value="fas fa-upload">&#xf093;&nbsp;Upload</option>
                                    <option value="fas fa-audio-description">&#xf29e;&nbsp;Audio Description</option>
                                    <option value="fas fa-backward">&#xf04a;&nbsp;backward</option>
                                    <option value="fas fa-broadcast-tower">&#xf519;&nbsp;Broadcast Tower</option>
                                    <option value="fas fa-circle">&#xf111;&nbsp;Circle</option>
                                    <option value="fas fa-closed-captioning">&#xf20a;&nbsp;Closed Captioning</option>
                                    <option value="fas fa-compress">&#xf066;&nbsp;Compress</option>
                                    <option value="fas fa-compress-alt">&#xf422;&nbsp;Alternate Compress</option>
                                    <option value="fas fa-compress-arrows-alt">&#xf78c;&nbsp;Alternate Compress Arrows</option>
                                    <option value="fas fa-eject">&#xf052;&nbsp;eject</option>
                                    <option value="fas fa-expand">&#xf065;&nbsp;Expand</option>
                                    <option value="fas fa-expand-alt">&#xf424;&nbsp;Alternate Expand</option>
                                    <option value="fas fa-expand-arrows-alt">&#xf31e;&nbsp;Alternate Expand Arrows</option>
                                    <option value="fas fa-fast-backward">&#xf049;&nbsp;fast-backward</option>
                                    <option value="fas fa-fast-forward">&#xf050;&nbsp;fast-forward</option>
                                    <option value="fas fa-file-audio">&#xf1c7;&nbsp;Audio File</option>
                                    <option value="fas fa-file-video">&#xf1c8;&nbsp;Video File</option>
                                    <option value="fas fa-film">&#xf008;&nbsp;Film</option>
                                    <option value="fas fa-forward">&#xf04e;&nbsp;forward</option>
                                    <option value="fas fa-headphones">&#xf025;&nbsp;headphones</option>
                                    <option value="fas fa-microphone">&#xf130;&nbsp;microphone</option>
                                    <option value="fas fa-microphone-alt">&#xf3c9;&nbsp;Alternate Microphone</option>
                                    <option value="fas fa-microphone-alt-slash">&#xf539;&nbsp;Alternate Microphone Slash</option>
                                    <option value="fas fa-microphone-slash">&#xf131;&nbsp;Microphone Slash</option>
                                    <option value="fas fa-music">&#xf001;&nbsp;Music</option>
                                    <option value="fas fa-pause">&#xf04c;&nbsp;pause</option>
                                    <option value="fas fa-pause-circle">&#xf28b;&nbsp;Pause Circle</option>
                                    <option value="fas fa-phone-volume">&#xf2a0;&nbsp;Phone Volume</option>
                                    <option value="fas fa-photo-video">&#xf87c;&nbsp;Photo Video</option>
                                    <option value="fas fa-play">&#xf04b;&nbsp;play</option>
                                    <option value="fas fa-play-circle">&#xf144;&nbsp;Play Circle</option>
                                    <option value="fas fa-podcast">&#xf2ce;&nbsp;Podcast</option>
                                    <option value="fas fa-random">&#xf074;&nbsp;random</option>
                                    <option value="fas fa-redo">&#xf01e;&nbsp;Redo</option>
                                    <option value="fas fa-redo-alt">&#xf2f9;&nbsp;Alternate Redo</option>
                                    <option value="fas fa-rss">&#xf09e;&nbsp;rss</option>
                                    <option value="fas fa-rss-square">&#xf143;&nbsp;RSS Square</option>
                                    <option value="fas fa-step-backward">&#xf048;&nbsp;step-backward</option>
                                    <option value="fas fa-step-forward">&#xf051;&nbsp;step-forward</option>
                                    <option value="fas fa-stop">&#xf04d;&nbsp;stop</option>
                                    <option value="fas fa-stop-circle">&#xf28d;&nbsp;Stop Circle</option>
                                    <option value="fas fa-sync">&#xf021;&nbsp;Sync</option>
                                    <option value="fas fa-sync-alt">&#xf2f1;&nbsp;Alternate Sync</option>
                                    <option value="fas fa-tv">&#xf26c;&nbsp;Television</option>
                                    <option value="fas fa-undo">&#xf0e2;&nbsp;Undo</option>
                                    <option value="fas fa-undo-alt">&#xf2ea;&nbsp;Alternate Undo</option>
                                    <option value="fas fa-video">&#xf03d;&nbsp;Video</option>
                                    <option value="fas fa-volume-down">&#xf027;&nbsp;Volume Down</option>
                                    <option value="fas fa-volume-mute">&#xf6a9;&nbsp;Volume Mute</option>
                                    <option value="fas fa-volume-off">&#xf026;&nbsp;Volume Off</option>
                                    <option value="fas fa-volume-up">&#xf028;&nbsp;Volume Up</option>
                                    <option value="fas fa-youtube">&#xf167;&nbsp;YouTube</option>
                                    <option value="fas fa-air-freshener">&#xf5d0;&nbsp;Air Freshener</option>
                                    <option value="fas fa-ambulance">&#xf0f9;&nbsp;ambulance</option>
                                    <option value="fas fa-bus">&#xf207;&nbsp;Bus</option>
                                    <option value="fas fa-bus-alt">&#xf55e;&nbsp;Bus Alt</option>
                                    <option value="fas fa-car">&#xf1b9;&nbsp;Car</option>
                                    <option value="fas fa-car-alt">&#xf5de;&nbsp;Alternate Car</option>
                                    <option value="fas fa-car-battery">&#xf5df;&nbsp;Car Battery</option>
                                    <option value="fas fa-car-crash">&#xf5e1;&nbsp;Car Crash</option>
                                    <option value="fas fa-car-side">&#xf5e4;&nbsp;Car Side</option>
                                    <option value="fas fa-caravan">&#xf8ff;&nbsp;Caravan</option>
                                    <option value="fas fa-charging-station">&#xf5e7;&nbsp;Charging Station</option>
                                    <option value="fas fa-gas-pump">&#xf52f;&nbsp;Gas Pump</option>
                                    <option value="fas fa-motorcycle">&#xf21c;&nbsp;Motorcycle</option>
                                    <option value="fas fa-oil-can">&#xf613;&nbsp;Oil Can</option>
                                    <option value="fas fa-shuttle-van">&#xf5b6;&nbsp;Shuttle Van</option>
                                    <option value="fas fa-tachometer-alt">&#xf3fd;&nbsp;Alternate Tachometer</option>
                                    <option value="fas fa-taxi">&#xf1ba;&nbsp;Taxi</option>
                                    <option value="fas fa-trailer">&#xe041;&nbsp;Trailer</option>
                                    <option value="fas fa-truck">&#xf0d1;&nbsp;truck</option>
                                    <option value="fas fa-truck-monster">&#xf63b;&nbsp;Truck Monster</option>
                                    <option value="fas fa-truck-pickup">&#xf63c;&nbsp;Truck Side</option>
                                    <option value="fas fa-apple-alt">&#xf5d1;&nbsp;Fruit Apple</option>
                                    <option value="fas fa-campground">&#xf6bb;&nbsp;Campground</option>
                                    <option value="fas fa-cloud-sun">&#xf6c4;&nbsp;Cloud with Sun</option>
                                    <option value="fas fa-drumstick-bite">&#xf6d7;&nbsp;Drumstick with Bite Taken Out</option>
                                    <option value="fas fa-football-ball">&#xf44e;&nbsp;Football Ball</option>
                                    <option value="fas fa-hiking">&#xf6ec;&nbsp;Hiking</option>
                                    <option value="fas fa-mountain">&#xf6fc;&nbsp;Mountain</option>
                                    <option value="fas fa-tractor">&#xf722;&nbsp;Tractor</option>
                                    <option value="fas fa-tree">&#xf1bb;&nbsp;Tree</option>
                                    <option value="fas fa-wind">&#xf72e;&nbsp;Wind</option>
                                    <option value="fas fa-wine-bottle">&#xf72f;&nbsp;Wine Bottle</option>
                                    <option value="fas fa-beer">&#xf0fc;&nbsp;beer</option>
                                    <option value="fas fa-blender">&#xf517;&nbsp;Blender</option>
                                    <option value="fas fa-cocktail">&#xf561;&nbsp;Cocktail</option>
                                    <option alue="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-flask">&#xf0c3;&nbsp;Flask</option>
                                    <option value="fas fa-glass-cheers">&#xf79f;&nbsp;Glass Cheers</option>
                                    <option value="fas fa-glass-martini">&#xf000;&nbsp;Martini Glass</option>
                                    <option value="fas fa-glass-martini-alt">&#xf57b;&nbsp;Alternate Glass Martini</option>
                                    <option value="fas fa-glass-whiskey">&#xf7a0;&nbsp;Glass Whiskey</option>
                                    <option value="fas fa-mug-hot">&#xf7b6;&nbsp;Mug Hot</option>
                                    <option value="fas fa-wine-bottle">&#xf72f;&nbsp;Wine Bottle</option>
                                    <option value="fas fa-wine-glass">&#xf4e3;&nbsp;Wine Glass</option>
                                    <option value="fas fa-wine-glass-alt">&#xf5ce;&nbsp;Alternate Wine Glas</option>
                                    <option value="fas fa-archway">&#xf557;&nbsp;Archway</option>
                                    <option value="fas fa-building">&#xf1ad;&nbsp;Building</option>
                                    <option value="fas fa-campground">&#xf6bb;&nbsp;Campground</option>
                                    <option value="fas fa-church">&#xf51d;&nbsp;Church</option>
                                    <option value="fas fa-city">&#xf64f;&nbsp;City</option>
                                    <option value="fas fa-clinic-medical">&#xf7f2;&nbsp;Medical Clinic</option>
                                    <option value="fas fa-dungeon">&#xf6d9;&nbsp;Dungeon</option>
                                    <option value="fas fa-gopuram">&#xf664;&nbsp;Gopuram</option>
                                    <option value="fas fa-home">&#xf015;&nbsp;home</option>
                                    <option value="fas fa-hospital">&#xf0f8;&nbsp;hospital</option>
                                    <option value="fas fa-hospital-alt">&#xf47d;&nbsp;Alternate Hospital</option>
                                    <option value="fas fa-hospital-user">&#xf80d;&nbsp;Hospital with User</option>
                                    <option value="fas fa-hotel">&#xf594;&nbsp;Hotel</option>
                                    <option value="fas fa-house-damage">&#xf6f1;&nbsp;Damaged House</option>
                                    <option value="fas fa-igloo">&#xf7ae;&nbsp;Igloo</option>
                                    <option value="fas fa-industry">&#xf275;&nbsp;Industry</option>
                                    <option value="fas fa-kaaba">&#xf66b;&nbsp;Kaaba</option>
                                    <option value="fas fa-landmark">&#xf66f;&nbsp;Landmark</option>
                                    <option value="fas fa-monument">&#xf5a6;&nbsp;Monument</option>
                                    <option value="fas fa-mosque">&#xf678;&nbsp;Mosque</option>
                                    <option value="fas fa-place-of-worship">&#xf67f;&nbsp;Place of Worship</option>
                                    <option value="fas fa-school">&#xf549;&nbsp;School</option>
                                    <option value="fas fa-store">&#xf54e;&nbsp;Store</option>
                                    <option value="fas fa-store-alt">&#xf54f;&nbsp;Alternate Store</option>
                                    <option value="fas fa-synagogue">&#xf69b;&nbsp;Synagogue</option>
                                    <option value="fas fa-torii-gate">&#xf6a1;&nbsp;Torii Gate</option>
                                    <option value="fas fa-university">&#xf19c;&nbsp;University</option>
                                    <option value="fas fa-vihara">&#xf6a7;&nbsp;Vihara</option>
                                    <option value="fas fa-warehouse">&#xf494;&nbsp;Warehouse</option>
                                    <option value="fas fa-address-book">&#xf2b9;&nbsp;Address Book</option>
                                    <option value="fas fa-address-card">&#xf2bb;&nbsp;Address Card</option>
                                    <option value="fas fa-archive">&#xf187;&nbsp;Archive</option>
                                    <option value="fas fa-balance-scale">&#xf24e;&nbsp;Balance Scale</option>
                                    <option value="fas fa-balance-scale-left">&#xf515;&nbsp;Balance Scale (Left-Weighted)</option>
                                    <option value="fas fa-balance-scale-right">&#xf516;&nbsp;Balance Scale (Right-Weighted)</option>
                                    <option value="fas fa-birthday-cake">&#xf1fd;&nbsp;Birthday Cake</option>
                                    <option value="fas fa-book">&#xf02d;&nbsp;book</option>
                                    <option value="fas fa-briefcase">&#xf0b1;&nbsp;Briefcase</option>
                                    <option value="fas fa-building">&#xf1ad;&nbsp;Building</option>
                                    <option value="fas fa-bullhorn">&#xf0a1;&nbsp;bullhorn</option>
                                    <option value="fas fa-bullseye">&#xf140;&nbsp;Bullseye</option>
                                    <option value="fas fa-business-time">&#xf64a;&nbsp;Business Time</option>
                                    <option value="fas fa-calculator">&#xf1ec;&nbsp;Calculator</option>
                                    <option value="fas fa-calendar">&#xf133;&nbsp;Calendar</option>
                                    <option value="fas fa-calendar-alt">&#xf073;&nbsp;Alternate Calendar</option>
                                    <option value="fas fa-certificate">&#xf0a3;&nbsp;certificate</option>
                                    <option value="fas fa-chart-area">&#xf1fe;&nbsp;Area Chart</option>
                                    <option value="fas fa-chart-bar">&#xf080;&nbsp;Bar Chart</option>
                                    <option value="fas fa-chart-line">&#xf201;&nbsp;Line Chart</option>
                                    <option value="fas fa-chart-pie">&#xf200;&nbsp;Pie Chart</option>
                                    <option value="fas fa-city">&#xf64f;&nbsp;City</option>
                                    <option value="fas fa-clipboard">&#xf328;&nbsp;Clipboard</option>
                                    <option value="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-columns">&#xf0db;&nbsp;Columns</option>
                                    <option value="fas fa-compass">&#xf14e;&nbsp;Compass</option>
                                    <option value="fas fa-copy">&#xf0c5;&nbsp;Copy</option>
                                    <option value="fas fa-copyright">&#xf1f9;&nbsp;Copyright</option>
                                    <option value="fas fa-cut">&#xf0c4;&nbsp;Cut</option>
                                    <option value="fas fa-edit">&#xf044;&nbsp;Edit</option>
                                    <option value="fas fa-envelope">&#xf0e0;&nbsp;Envelope</option>
                                    <option value="fas fa-envelope-open">&#xf2b6;&nbsp;Envelope Open</option>
                                    <option value="fas fa-envelope-square">&#xf199;&nbsp;Envelope Square</option>
                                    <option value="fas fa-eraser">&#xf12d;&nbsp;eraser</option>
                                    <option value="fas fa-fax">&#xf1ac;&nbsp;Fax</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-folder">&#xf07b;&nbsp;Folder</option>
                                    <option value="fas fa-folder-minus">&#xf65d;&nbsp;Folder Minus</option>
                                    <option value="fas fa-folder-open">&#xf07c;&nbsp;Folder Open</option>
                                    <option value="fas fa-folder-plus">&#xf65e;&nbsp;Folder Plus</option>
                                    <option value="fas fa-glasses">&#xf530;&nbsp;Glasses</option>
                                    <option value="fas fa-globe">&#xf0ac;&nbsp;Globe</option>
                                    <option value="fas fa-highlighter">&#xf591;&nbsp;Highlighter</option>
                                    <option value="fas fa-industry">&#xf275;&nbsp;Industry</option>
                                    <option value="fas fa-landmark">&#xf66f;&nbsp;Landmark</option>
                                    <option value="fas fa-laptop-house">&#xe066;&nbsp;Laptop House</option>
                                    <option value="fas fa-marker">&#xf5a1;&nbsp;Marker</option>
                                    <option value="fas fa-paperclip">&#xf0c6;&nbsp;Paperclip</option>
                                    <option value="fas fa-paste">&#xf0ea;&nbsp;Paste</option>
                                    <option value="fas fa-pen">&#xf304;&nbsp;Pen</option>
                                    <option value="fas fa-pen-alt">&#xf305;&nbsp;Alternate Pen</option>
                                    <option value="fas fa-pen-fancy">&#xf5ac;&nbsp;Pen Fancy</option>
                                    <option value="fas fa-pen-nib">&#xf5ad;&nbsp;Pen Nib</option>
                                    <option value="fas fa-pen-square">&#xf14b;&nbsp;Pen Square</option>
                                    <option value="fas fa-pencil-alt">&#xf303;&nbsp;Alternate Pencil</option>
                                    <option value="fas fa-percent">&#xf295;&nbsp;Percent</option>
                                    <option value="fas fa-phone">&#xf095;&nbsp;Phone</option>
                                    <option value="fas fa-phone-alt">&#xf879;&nbsp;Alternate Phone</option>
                                    <option value="fas fa-phone-slash">&#xf3dd;&nbsp;Phone Slash</option>
                                    <option value="fas fa-phone-square">&#xf098;&nbsp;Phone Square</option>
                                    <option value="fas fa-phone-square-alt">&#xf87b;&nbsp;Alternate Phone Square</option>
                                    <option value="fas fa-phone-volume">&#xf2a0;&nbsp;Phone Volume</option>
                                    <option value="fas fa-print">&#xf02f;&nbsp;print</option>
                                    <option value="fas fa-project-diagram">&#xf542;&nbsp;Project Diagram</option>
                                    <option value="fas fa-registered">&#xf25d;&nbsp;Registered Trademark</option>
                                    <option value="fas fa-save">&#xf0c7;&nbsp;Save</option>
                                    <option value="fas fa-sitemap">&#xf0e8;&nbsp;Sitemap</option>
                                    <option value="fas fa-socks">&#xf696;&nbsp;Socks</option>
                                    <option value="fas fa-sticky-note">&#xf249;&nbsp;Sticky Note</option>
                                    <option value="fas fa-stream">&#xf550;&nbsp;Stream</option>
                                    <option value="fas fa-table">&#xf0ce;&nbsp;table</option>
                                    <option value="fas fa-tag">&#xf02b;&nbsp;tag</option>
                                    <option value="fas fa-tags">&#xf02c;&nbsp;tags</option>
                                    <option value="fas fa-tasks">&#xf0ae;&nbsp;Tasks</option>
                                    <option value="fas fa-thumbtack">&#xf08d;&nbsp;Thumbtack</option>
                                    <option value="fas fa-trademark">&#xf25c;&nbsp;Trademark</option>
                                    <option value="fas fa-wallet">&#xf555;&nbsp;Wallet</option>
                                    <option value="fas fa-binoculars">&#xf1e5;&nbsp;Binoculars</option>
                                    <option value="fas fa-campground">&#xf6bb;&nbsp;Campground</option>
                                    <option value="fas fa-caravan">&#xf8ff;&nbsp;Caravan</option>
                                    <option value="fas fa-compass">&#xf14e;&nbsp;Compass</option>
                                    <option value="fas fa-faucet">&#xe005;&nbsp;Faucet</option>
                                    <option value="fas fa-fire">&#xf06d;&nbsp;fire</option>
                                    <option value="fas fa-fire-alt">&#xf7e4;&nbsp;Alternate Fire</option>
                                    <option value="fas fa-first-aid">&#xf479;&nbsp;First Aid</option>
                                    <option value="fas fa-frog">&#xf52e;&nbsp;Frog</option>
                                    <option value="fas fa-hiking">&#xf6ec;&nbsp;Hiking</option>
                                    <option value="fas fa-map">&#xf279;&nbsp;Map</option>
                                    <option value="fas fa-map-marked">&#xf59f;&nbsp;Map Marked</option>
                                    <option value="fas fa-map-marked-alt">&#xf5a0;&nbsp;Alternate Map Marked</option>
                                    <option value="fas fa-map-signs">&#xf277;&nbsp;Map Signs</option>
                                    <option value="fas fa-mountain">&#xf6fc;&nbsp;Mountain</option>
                                    <option value="fas fa-route">&#xf4d7;&nbsp;Route</option>
                                    <option value="fas fa-toilet-paper">&#xf71e;&nbsp;Toilet Paper</option>
                                    <option value="fas fa-trailer">&#xe041;&nbsp;Trailer</option>
                                    <option value="fas fa-tree">&#xf1bb;&nbsp;Tree</option>
                                    <option value="fas fa-dollar-sign">&#xf155;&nbsp;Dollar Sign</option>
                                    <option value="fas fa-donate">&#xf4b9;&nbsp;Donate</option>
                                    <option value="fas fa-dove">&#xf4ba;&nbsp;Dove</option>
                                    <option value="fas fa-gift">&#xf06b;&nbsp;gift</option>
                                    <option value="fas fa-globe">&#xf0ac;&nbsp;Globe</option>
                                    <option value="fas fa-hand-holding-heart">&#xf4be;&nbsp;Hand Holding Heart</option>
                                    <option value="fas fa-hand-holding-usd">&#xf4c0;&nbsp;Hand Holding US Dollar</option>
                                    <option value="fas fa-hand-holding-water">&#xf4c1;&nbsp;Hand Holding Water</option>
                                    <option value="fas fa-hands-helping">&#xf4c4;&nbsp;Helping Hands</option>
                                    <option value="fas fa-handshake">&#xf2b5;&nbsp;Handshake</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-leaf">&#xf06c;&nbsp;leaf</option>
                                    <option value="fas fa-parachute-box">&#xf4cd;&nbsp;Parachute Box</option>
                                    <option value="fas fa-piggy-bank">&#xf4d3;&nbsp;Piggy Bank</option>
                                    <option value="fas fa-ribbon">&#xf4d6;&nbsp;Ribbon</option>
                                    <option value="fas fa-seedling">&#xf4d8;&nbsp;Seedling</option>
                                    <option value="fas fa-comment-alt">&#xf27a;&nbsp;Alternate Comment</option>
                                    <option value="fas fa-comment-dots">&#xf4ad;&nbsp;Comment Dots</option>
                                    <option value="fas fa-comment-medical">&#xf7f5;&nbsp;Alternate Medical Chat</option>
                                    <option value="fas fa-comment-slash">&#xf4b3;&nbsp;Comment Slash</option>
                                    <option value="fas fa-comments">&#xf086;&nbsp;comments</option>
                                    <option value="fas fa-frown">&#xf119;&nbsp;Frowning Face</option>
                                    <option value="fas fa-icons">&#xf86d;&nbsp;Icons</option>
                                    <option value="fas fa-meh">&#xf11a;&nbsp;Neutral Face</option>
                                    <option value="fas fa-phone">&#xf095;&nbsp;Phone</option>
                                    <option value="fas fa-phone-alt">&#xf879;&nbsp;Alternate Phone</option>
                                    <option value="fas fa-phone-slash">&#xf3dd;&nbsp;Phone Slash</option>
                                    <option value="fas fa-poo">&#xf2fe;&nbsp;Poo</option>
                                    <option value="fas fa-quote-left">&#xf10d;&nbsp;quote-left</option>
                                    <option value="fas fa-quote-right">&#xf10e;&nbsp;quote-right</option>
                                    <option value="fas fa-smile">&#xf118;&nbsp;Smiling Face</option>
                                    <option value="fas fa-sms">&#xf7cd;&nbsp;SMS</option>
                                    <option value="fas fa-video">&#xf03d;&nbsp;Video</option>
                                    <option value="fas fa-video-slash">&#xf4e2;&nbsp;Video Slash</option>
                                    <option value="fas fa-chess">&#xf439;&nbsp;Chess</option>
                                    <option value="fas fa-chess-bishop">&#xf43a;&nbsp;Chess Bishop</option>
                                    <option value="fas fa-chess-board">&#xf43c;&nbsp;Chess Board</option>
                                    <option value="fas fa-chess-king">&#xf43f;&nbsp;Chess King</option>
                                    <option value="fas fa-chess-knight">&#xf441;&nbsp;Chess Knight</option>
                                    <option value="fas fa-chess-pawn">&#xf443;&nbsp;Chess Pawn</option>
                                    <option value="fas fa-chess-queen">&#xf445;&nbsp;Chess Queen</option>
                                    <option value="fas fa-chess-rook">&#xf447;&nbsp;Chess Rook</option>
                                    <option value="fas fa-square-full">&#xf45c;&nbsp;Square Full</option>
                                    <option value="fas fa-apple-alt">&#xf5d1;&nbsp;Fruit Apple</option>
                                    <option value="fas fa-baby">&#xf77c;&nbsp;Baby</option>
                                    <option value="fas fa-baby-carriage">&#xf77d;&nbsp;Baby Carriage</option>
                                    <option value="fas fa-bath">&#xf2cd;&nbsp;Bath</option>
                                    <option value="fas fa-biking">&#xf84a;&nbsp;Biking</option>
                                    <option value="fas fa-birthday-cake">&#xf1fd;&nbsp;Birthday Cake</option>
                                    <option value="fas fa-cookie">&#xf563;&nbsp;Cookie</option>
                                    <option value="fas fa-cookie-bite">&#xf564;&nbsp;Cookie Bite</option>
                                    <option value="fas fa-gamepad">&#xf11b;&nbsp;Gamepad</option>
                                    <option value="fas fa-ice-cream">&#xf810;&nbsp;Ice Cream</option>
                                    <option value="fas fa-mitten">&#xf7b5;&nbsp;Mitten</option>
                                    <option value="fas fa-robot">&#xf544;&nbsp;Robot</option>
                                    <option value="fas fa-school">&#xf549;&nbsp;School</option>
                                    <option value="fas fa-shapes">&#xf61f;&nbsp;Shapes</option>
                                    <option value="fas fa-snowman">&#xf7d0;&nbsp;Snowman</option>
                                    <option value="fas fa-graduation-cap">&#xf19d;&nbsp;Graduation Cap</option>
                                    <option value="fas fa-hat-cowboy">&#xf8c0;&nbsp;Cowboy Hat</option>
                                    <option value="fas fa-hat-cowboy-side">&#xf8c1;&nbsp;Cowboy Hat Side</option>
                                    <option value="fas fa-hat-wizard">&#xf6e8;&nbsp;Wizard's Hat</option>
                                    <option value="fas fa-mitten">&#xf7b5;&nbsp;Mitten</option>
                                    <option value="fas fa-shoe-prints">&#xf54b;&nbsp;Shoe Prints</option>
                                    <option value="fas fa-socks">&#xf696;&nbsp;Socks</option>
                                    <option value="fas fa-tshirt">&#xf553;&nbsp;T-Shirt</option>
                                    <option value="fas fa-user-tie">&#xf508;&nbsp;User Tie</option>
                                    <option value="fas fa-archive">&#xf187;&nbsp;Archive</option>
                                    <option value="fas fa-barcode">&#xf02a;&nbsp;barcode</option>
                                    <option value="fas fa-bath">&#xf2cd;&nbsp;Bath</option>
                                    <option value="fas fa-bug">&#xf188;&nbsp;Bug</option>
                                    <option value="fas fa-code">&#xf121;&nbsp;Code</option>
                                    <option value="fas fa-code-branch">&#xf126;&nbsp;Code Branch</option>
                                    <option value="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-file-code">&#xf1c9;&nbsp;Code File</option>
                                    <option value="fas fa-filter">&#xf0b0;&nbsp;Filter</option>
                                    <option value="fas fa-fire-extinguisher">&#xf134;&nbsp;fire-extinguisher</option>
                                    <option value="fas fa-folder">&#xf07b;&nbsp;Folder</option>
                                    <option value="fas fa-folder-open">&#xf07c;&nbsp;Folder Open</option>
                                    <option value="fas fa-keyboard">&#xf11c;&nbsp;Keyboard</option>
                                    <option value="fas fa-laptop-code">&#xf5fc;&nbsp;Laptop Code</option>
                                    <option value="fas fa-microchip">&#xf2db;&nbsp;Microchip</option>
                                    <option value="fas fa-project-diagram">&#xf542;&nbsp;Project Diagram</option>
                                    <option value="fas fa-qrcode">&#xf029;&nbsp;qrcode</option>
                                    <option value="fas fa-shield-alt">&#xf3ed;&nbsp;Alternate Shield</option>
                                    <option value="fas fa-sitemap">&#xf0e8;&nbsp;Sitemap</option>
                                    <option value="fas fa-stream">&#xf550;&nbsp;Stream</option>
                                    <option value="fas fa-terminal">&#xf120;&nbsp;Terminal</option>
                                    <option value="fas fa-user-secret">&#xf21b;&nbsp;User Secret</option>
                                    <option value="fas fa-window-close">&#xf410;&nbsp;Window Close</option>
                                    <option value="fas fa-window-maximize">&#xf2d0;&nbsp;Window Maximize</option>
                                    <option value="fas fa-window-minimize">&#xf2d1;&nbsp;Window Minimize</option>
                                    <option value="fas fa-window-restore">&#xf2d2;&nbsp;Window Restore</option>
                                    <option value="fas fa-address-book">&#xf2b9;&nbsp;Address Book</option>
                                    <option value="fas fa-address-card">&#xf2bb;&nbsp;Address Card</option>
                                    <option value="fas fa-american-sign-language-interpreting">&#xf2a3;&nbsp;American Sign Language Interpreting</option>
                                    <option value="fas fa-assistive-listening-systems">&#xf2a2;&nbsp;Assistive Listening Systems</option>
                                    <option value="fas fa-at">&#xf1fa;&nbsp;At</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bell-slash">&#xf1f6;&nbsp;Bell Slash</option>
                                    <option value="fas fa-bluetooth">&#xf293;&nbsp;Bluetooth</option>
                                    <option value="fas fa-bluetooth-b">&#xf294;&nbsp;Bluetooth</option>
                                    <option value="fas fa-broadcast-tower">&#xf519;&nbsp;Broadcast Tower</option>
                                    <option value="fas fa-bullhorn">&#xf0a1;&nbsp;bullhorn</option>
                                    <option value="fas fa-chalkboard">&#xf51b;&nbsp;Chalkboard</option>
                                    <option value="fas fa-comment">&#xf075;&nbsp;comment</option>
                                    <option value="fas fa-comment-alt">&#xf27a;&nbsp;Alternate Comment</option>
                                    <option value="fas fa-comments">&#xf086;&nbsp;comments</option>
                                    <option value="fas fa-envelope">&#xf0e0;&nbsp;Envelope</option>
                                    <option value="fas fa-envelope-open">&#xf2b6;&nbsp;Envelope Open</option>
                                    <option value="fas fa-envelope-square">&#xf199;&nbsp;Envelope Square</option>
                                    <option value="fas fa-fax">&#xf1ac;&nbsp;Fax</option>
                                    <option value="fas fa-inbox">&#xf01c;&nbsp;inbox</option>
                                    <option value="fas fa-language">&#xf1ab;&nbsp;Language</option>
                                    <option value="fas fa-microphone">&#xf130;&nbsp;microphone</option>
                                    <option value="fas fa-microphone-alt">&#xf3c9;&nbsp;Alternate Microphone</option>
                                    <option value="fas fa-microphone-alt-slash">&#xf539;&nbsp;Alternate Microphone Slash</option>
                                    <option value="fas fa-microphone-slash">&#xf131;&nbsp;Microphone Slash</option>
                                    <option value="fas fa-mobile">&#xf10b;&nbsp;Mobile Phone</option>
                                    <option value="fas fa-mobile-alt">&#xf3cd;&nbsp;Alternate Mobile</option>
                                    <option value="fas fa-paper-plane">&#xf1d8;&nbsp;Paper Plane</option>
                                    <option value="fas fa-phone">&#xf095;&nbsp;Phone</option>
                                    <option value="fas fa-phone-alt">&#xf879;&nbsp;Alternate Phone</option>
                                    <option value="fas fa-phone-slash">&#xf3dd;&nbsp;Phone Slash</option>
                                    <option value="fas fa-phone-square">&#xf098;&nbsp;Phone Square</option>
                                    <option value="fas fa-phone-square-alt">&#xf87b;&nbsp;Alternate Phone Square</option>
                                    <option value="fas fa-phone-volume">&#xf2a0;&nbsp;Phone Volume</option>
                                    <option value="fas fa-rss">&#xf09e;&nbsp;rss</option>
                                    <option value="fas fa-rss-square">&#xf143;&nbsp;RSS Square</option>
                                    <option value="fas fa-tty">&#xf1e4;&nbsp;TTY</option>
                                    <option value="fas fa-voicemail">&#xf897;&nbsp;Voicemail</option>
                                    <option value="fas fa-wifi">&#xf1eb;&nbsp;WiFi</option>
                                    <option value="fas fa-database">&#xf1c0;&nbsp;Database</option>
                                    <option value="fas fa-desktop">&#xf108;&nbsp;Desktop</option>
                                    <option value="fas fa-download">&#xf019;&nbsp;Download</option>
                                    <option value="fas fa-ethernet">&#xf796;&nbsp;Ethernet</option>
                                    <option value="fas fa-hdd">&#xf0a0;&nbsp;HDD</option>
                                    <option value="fas fa-headphones">&#xf025;&nbsp;headphones</option>
                                    <option value="fas fa-keyboard">&#xf11c;&nbsp;Keyboard</option>
                                    <option value="fas fa-laptop">&#xf109;&nbsp;Laptop</option>
                                    <option value="fas fa-laptop-house">&#xe066;&nbsp;Laptop House</option>
                                    <option value="fas fa-memory">&#xf538;&nbsp;Memory</option>
                                    <option value="fas fa-microchip">&#xf2db;&nbsp;Microchip</option>
                                    <option value="fas fa-mobile">&#xf10b;&nbsp;Mobile Phone</option>
                                    <option value="fas fa-mobile-alt">&#xf3cd;&nbsp;Alternate Mobile</option>
                                    <option value="fas fa-mouse">&#xf8cc;&nbsp;Mouse</option>
                                    <option value="fas fa-plug">&#xf1e6;&nbsp;Plug</option>
                                    <option value="fas fa-power-off">&#xf011;&nbsp;Power Off</option>
                                    <option value="fas fa-print">&#xf02f;&nbsp;print</option>
                                    <option value="fas fa-satellite">&#xf7bf;&nbsp;Satellite</option>
                                    <option value="fas fa-satellite-dish">&#xf7c0;&nbsp;Satellite Dish</option>
                                    <option value="fas fa-save">&#xf0c7;&nbsp;Save</option>
                                    <option value="fas fa-sd-card">&#xf7c2;&nbsp;Sd Card</option>
                                    <option value="fas fa-server">&#xf233;&nbsp;Server</option>
                                    <option value="fas fa-sim-card">&#xf7c4;&nbsp;SIM Card</option>
                                    <option value="fas fa-stream">&#xf550;&nbsp;Stream</option>
                                    <option value="fas fa-tablet">&#xf10a;&nbsp;tablet</option>
                                    <option value="fas fa-tablet-alt">&#xf3fa;&nbsp;Alternate Tablet</option>
                                    <option value="fas fa-tv">&#xf26c;&nbsp;Television</option>
                                    <option value="fas fa-upload">&#xf093;&nbsp;Upload</option>
                                    <option value="fas fa-brush">&#xf55d;&nbsp;Brush</option>
                                    <option value="fas fa-drafting-compass">&#xf568;&nbsp;Drafting Compass</option>
                                    <option value="fas fa-dumpster">&#xf793;&nbsp;Dumpster</option>
                                    <option value="fas fa-hammer">&#xf6e3;&nbsp;Hammer</option>
                                    <option value="fas fa-hard-hat">&#xf807;&nbsp;Hard Hat</option>
                                    <option value="fas fa-paint-roller">&#xf5aa;&nbsp;Paint Roller</option>
                                    <option value="fas fa-pencil-alt">&#xf303;&nbsp;Alternate Pencil</option>
                                    <option value="fas fa-pencil-ruler">&#xf5ae;&nbsp;Pencil Ruler</option>
                                    <option value="fas fa-ruler">&#xf545;&nbsp;Ruler</option>
                                    <option value="fas fa-ruler-combined">&#xf546;&nbsp;Ruler Combined</option>
                                    <option value="fas fa-ruler-horizontal">&#xf547;&nbsp;Ruler Horizontal</option>
                                    <option value="fas fa-ruler-vertical">&#xf548;&nbsp;Ruler Vertical</option>
                                    <option value="fas fa-screwdriver">&#xf54a;&nbsp;Screwdriver</option>
                                    <option value="fas fa-toolbox">&#xf552;&nbsp;Toolbox</option>
                                    <option value="fas fa-tools">&#xf7d9;&nbsp;Tools</option>
                                    <option value="fas fa-truck-pickup">&#xf63c;&nbsp;Truck Side</option>
                                    <option value="fas fa-wrench">&#xf0ad;&nbsp;Wrench</option>
                                    <option value="fas fa-bitcoin">&#xf379;&nbsp;Bitcoin</option>
                                    <option value="fas fa-btc">&#xf15a;&nbsp;BTC</option>
                                    <option value="fas fa-dollar-sign">&#xf155;&nbsp;Dollar Sign</option>
                                    <option value="fas fa-ethereum">&#xf42e;&nbsp;Ethereum</option>
                                    <option value="fas fa-euro-sign">&#xf153;&nbsp;Euro Sign</option>
                                    <option value="fas fa-gg">&#xf260;&nbsp;GG Currency</option>
                                    <option value="fas fa-gg-circle">&#xf261;&nbsp;GG Currency Circle</option>
                                    <option value="fas fa-hryvnia">&#xf6f2;&nbsp;Hryvnia</option>
                                    <option value="fas fa-lira-sign">&#xf195;&nbsp;Turkish Lira Sign</option>
                                    <option value="fas fa-money-bill">&#xf0d6;&nbsp;Money Bill</option>
                                    <option value="fas fa-money-bill-alt">&#xf3d1;&nbsp;Alternate Money Bill</option>
                                    <option value="fas fa-money-bill-wave">&#xf53a;&nbsp;Wavy Money Bill</option>
                                    <option value="fas fa-money-bill-wave-alt">&#xf53b;&nbsp;Alternate Wavy Money Bill</option>
                                    <option value="fas fa-money-check">&#xf53c;&nbsp;Money Check</option>
                                    <option value="fas fa-money-check-alt">&#xf53d;&nbsp;Alternate Money Check</option>
                                    <option value="fas fa-pound-sign">&#xf154;&nbsp;Pound Sign</option>
                                    <option value="fas fa-ruble-sign">&#xf158;&nbsp;Ruble Sign</option>
                                    <option value="fas fa-rupee-sign">&#xf156;&nbsp;Indian Rupee Sign</option>
                                    <option value="fas fa-shekel-sign">&#xf20b;&nbsp;Shekel Sign</option>
                                    <option value="fas fa-tenge">&#xf7d7;&nbsp;Tenge</option>
                                    <option value="fas fa-won-sign">&#xf159;&nbsp;Won Sign</option>
                                    <option value="fas fa-yen-sign">&#xf157;&nbsp;Yen Sign</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bell-slash">&#xf1f6;&nbsp;Bell Slash</option>
                                    <option value="fas fa-calendar">&#xf133;&nbsp;Calendar</option>
                                    <option value="fas fa-calendar-alt">&#xf073;&nbsp;Alternate Calendar</option>
                                    <option value="fas fa-calendar-check">&#xf274;&nbsp;Calendar Check</option>
                                    <option value="fas fa-calendar-minus">&#xf272;&nbsp;Calendar Minus</option>
                                    <option value="fas fa-calendar-plus">&#xf271;&nbsp;Calendar Plus</option>
                                    <option value="fas fa-calendar-times">&#xf273;&nbsp;Calendar Times</option>
                                    <option value="fas fa-clock">&#xf017;&nbsp;Clock</option>
                                    <option value="fas fa-hourglass">&#xf254;&nbsp;Hourglass</option>
                                    <option value="fas fa-hourglass-end">&#xf253;&nbsp;Hourglass End</option>
                                    <option value="fas fa-hourglass-half">&#xf252;&nbsp;Hourglass Half</option>
                                    <option value="fas fa-hourglass-start">&#xf251;&nbsp;Hourglass Start</option>
                                    <option value="fas fa-stopwatch">&#xf2f2;&nbsp;Stopwatch</option>
                                    <option value="fas fa-adjust">&#xf042;&nbsp;adjust</option>
                                    <option value="fas fa-bezier-curve">&#xf55b;&nbsp;Bezier Curve</option>
                                    <option value="fas fa-brush">&#xf55d;&nbsp;Brush</option>
                                    <option value="fas fa-clone">&#xf24d;&nbsp;Clone</option>
                                    <option value="fas fa-copy">&#xf0c5;&nbsp;Copy</option>
                                    <option value="fas fa-crop">&#xf125;&nbsp;crop</option>
                                    <option value="fas fa-crop-alt">&#xf565;&nbsp;Alternate Crop</option>
                                    <option value="fas fa-crosshairs">&#xf05b;&nbsp;Crosshairs</option>
                                    <option value="fas fa-cut">&#xf0c4;&nbsp;Cut</option>
                                    <option value="fas fa-drafting-compass">&#xf568;&nbsp;Drafting Compass</option>
                                    <option value="fas fa-draw-polygon">&#xf5ee;&nbsp;Draw Polygon</option>
                                    <option value="fas fa-edit">&#xf044;&nbsp;Edit</option>
                                    <option value="fas fa-eraser">&#xf12d;&nbsp;eraser</option>
                                    <option value="fas fa-eye">&#xf06e;&nbsp;Eye</option>
                                    <option value="fas fa-eye-dropper">&#xf1fb;&nbsp;Eye Dropper</option>
                                    <option value="fas fa-eye-slash">&#xf070;&nbsp;Eye Slash</option>
                                    <option value="fas fa-fill">&#xf575;&nbsp;Fill</option>
                                    <option value="fas fa-fill-drip">&#xf576;&nbsp;Fill Drip</option>
                                    <option value="fas fa-highlighter">&#xf591;&nbsp;Highlighter</option>
                                    <option value="fas fa-icons">&#xf86d;&nbsp;Icons</option>
                                    <option value="fas fa-layer-group">&#xf5fd;&nbsp;Layer Group</option>
                                    <option value="fas fa-magic">&#xf0d0;&nbsp;magic</option>
                                    <option value="fas fa-marker">&#xf5a1;&nbsp;Marker</option>
                                    <option value="fas fa-object-group">&#xf247;&nbsp;Object Group</option>
                                    <option value="fas fa-object-ungroup">&#xf248;&nbsp;Object Ungroup</option>
                                    <option value="fas fa-paint-brush">&#xf1fc;&nbsp;Paint Brush</option>
                                    <option value="fas fa-paint-roller">&#xf5aa;&nbsp;Paint Roller</option>
                                    <option value="fas fa-palette">&#xf53f;&nbsp;Palette</option>
                                    <option value="fas fa-paste">&#xf0ea;&nbsp;Paste</option>
                                    <option value="fas fa-pen">&#xf304;&nbsp;Pen</option>
                                    <option value="fas fa-pen-alt">&#xf305;&nbsp;Alternate Pen</option>
                                    <option value="fas fa-pen-fancy">&#xf5ac;&nbsp;Pen Fancy</option>
                                    <option value="fas fa-pen-nib">&#xf5ad;&nbsp;Pen Nib</option>
                                    <option value="fas fa-pencil-alt">&#xf303;&nbsp;Alternate Pencil</option>
                                    <option value="fas fa-pencil-ruler">&#xf5ae;&nbsp;Pencil Ruler</option>
                                    <option value="fas fa-ruler-combined">&#xf546;&nbsp;Ruler Combined</option>
                                    <option value="fas fa-ruler-horizontal">&#xf547;&nbsp;Ruler Horizontal</option>
                                    <option value="fas fa-ruler-vertical">&#xf548;&nbsp;Ruler Vertical</option>
                                    <option value="fas fa-save">&#xf0c7;&nbsp;Save</option>
                                    <option value="fas fa-splotch">&#xf5bc;&nbsp;Splotch</option>
                                    <option value="fas fa-spray-can">&#xf5bd;&nbsp;Spray Can</option>
                                    <option value="fas fa-stamp">&#xf5bf;&nbsp;Stamp</option>
                                    <option value="fas fa-swatchbook">&#xf5c3;&nbsp;Swatchbook</option>
                                    <option value="fas fa-tint">&#xf043;&nbsp;tint</option>
                                    <option value="fas fa-tint-slash">&#xf5c7;&nbsp;Tint Slash</option>
                                    <option value="fas fa-vector-square">&#xf5cb;&nbsp;Vector Square</option>
                                    <option value="fas fa-align-center">&#xf037;&nbsp;align-center</option>
                                    <option value="fas fa-align-justify">&#xf039;&nbsp;align-justify</option>
                                    <option value="fas fa-align-left">&#xf036;&nbsp;align-left</option>
                                    <option value="fas fa-align-right">&#xf038;&nbsp;align-right</option>
                                    <option value="fas fa-bold">&#xf032;&nbsp;bold</option>
                                    <option value="fas fa-border-all">&#xf84c;&nbsp;Border All</option>
                                    <option value="fas fa-border-none">&#xf850;&nbsp;Border None</option>
                                    <option value="fas fa-border-style">&#xf853;&nbsp;Border Style</option>
                                    <option value="fas fa-clipboard">&#xf328;&nbsp;Clipboard</option>
                                    <option value="fas fa-clone">&#xf24d;&nbsp;Clone</option>
                                    <option value="fas fa-columns">&#xf0db;&nbsp;Columns</option>
                                    <option value="fas fa-copy">&#xf0c5;&nbsp;Copy</option>
                                    <option value="fas fa-cut">&#xf0c4;&nbsp;Cut</option>
                                    <option value="fas fa-edit">&#xf044;&nbsp;Edit</option>
                                    <option value="fas fa-eraser">&#xf12d;&nbsp;eraser</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-font">&#xf031;&nbsp;font</option>
                                    <option value="fas fa-glasses">&#xf530;&nbsp;Glasses</option>
                                    <option value="fas fa-heading">&#xf1dc;&nbsp;heading</option>
                                    <option value="fas fa-highlighter">&#xf591;&nbsp;Highlighter</option>
                                    <option value="fas fa-i-cursor">&#xf246;&nbsp;I Beam Cursor</option>
                                    <option value="fas fa-icons">&#xf86d;&nbsp;Icons</option>
                                    <option value="fas fa-indent">&#xf03c;&nbsp;Indent</option>
                                    <option value="fas fa-italic">&#xf033;&nbsp;italic</option>
                                    <option value="fas fa-link">&#xf0c1;&nbsp;Link</option>
                                    <option value="fas fa-list">&#xf03a;&nbsp;List</option>
                                    <option value="fas fa-list-alt">&#xf022;&nbsp;Alternate List</option>
                                    <option value="fas fa-list-ol">&#xf0cb;&nbsp;list-ol</option>
                                    <option value="fas fa-list-ul">&#xf0ca;&nbsp;list-ul</option>
                                    <option value="fas fa-marker">&#xf5a1;&nbsp;Marker</option>
                                    <option value="fas fa-outdent">&#xf03b;&nbsp;Outdent</option>
                                    <option value="fas fa-paper-plane">&#xf1d8;&nbsp;Paper Plane</option>
                                    <option value="fas fa-paperclip">&#xf0c6;&nbsp;Paperclip</option>
                                    <option value="fas fa-paragraph">&#xf1dd;&nbsp;paragraph</option>
                                    <option value="fas fa-paste">&#xf0ea;&nbsp;Paste</option>
                                    <option value="fas fa-pen">&#xf304;&nbsp;Pen</option>
                                    <option value="fas fa-pen-alt">&#xf305;&nbsp;Alternate Pen</option>
                                    <option value="fas fa-pen-fancy">&#xf5ac;&nbsp;Pen Fancy</option>
                                    <option value="fas fa-pen-nib">&#xf5ad;&nbsp;Pen Nib</option>
                                    <option value="fas fa-pencil-alt">&#xf303;&nbsp;Alternate Pencil</option>
                                    <option value="fas fa-print">&#xf02f;&nbsp;print</option>
                                    <option value="fas fa-quote-left">&#xf10d;&nbsp;quote-left</option>
                                    <option value="fas fa-quote-right">&#xf10e;&nbsp;quote-right</option>
                                    <option value="fas fa-redo">&#xf01e;&nbsp;Redo</option>
                                    <option value="fas fa-redo-alt">&#xf2f9;&nbsp;Alternate Redo</option>
                                    <option value="fas fa-remove-format">&#xf87d;&nbsp;Remove Format</option>
                                    <option value="fas fa-reply">&#xf3e5;&nbsp;Reply</option>
                                    <option value="fas fa-reply-all">&#xf122;&nbsp;reply-all</option>
                                    <option value="fas fa-screwdriver">&#xf54a;&nbsp;Screwdriver</option>
                                    <option value="fas fa-share">&#xf064;&nbsp;Share</option>
                                    <option value="fas fa-spell-check">&#xf891;&nbsp;Spell Check</option>
                                    <option value="fas fa-strikethrough">&#xf0cc;&nbsp;Strikethrough</option>
                                    <option value="fas fa-subscript">&#xf12c;&nbsp;subscript</option>
                                    <option value="fas fa-superscript">&#xf12b;&nbsp;superscript</option>
                                    <option value="fas fa-sync">&#xf021;&nbsp;Sync</option>
                                    <option value="fas fa-sync-alt">&#xf2f1;&nbsp;Alternate Sync</option>
                                    <option value="fas fa-table">&#xf0ce;&nbsp;table</option>
                                    <option value="fas fa-tasks">&#xf0ae;&nbsp;Tasks</option>
                                    <option value="fas fa-text-height">&#xf034;&nbsp;text-height</option>
                                    <option value="fas fa-text-width">&#xf035;&nbsp;Text Width</option>
                                    <option value="fas fa-th">&#xf00a;&nbsp;th</option>
                                    <option value="fas fa-th-large">&#xf009;&nbsp;th-large</option>
                                    <option value="fas fa-th-list">&#xf00b;&nbsp;th-list</option>
                                    <option value="fas fa-tools">&#xf7d9;&nbsp;Tools</option>
                                    <option value="fas fa-trash">&#xf1f8;&nbsp;Trash</option>
                                    <option value="fas fa-trash-alt">&#xf2ed;&nbsp;Alternate Trash</option>
                                    <option value="fas fa-trash-restore">&#xf829;&nbsp;Trash Restore</option>
                                    <option value="fas fa-trash-restore-alt">&#xf82a;&nbsp;Alternative Trash Restore</option>
                                    <option value="fas fa-underline">&#xf0cd;&nbsp;Underline</option>
                                    <option value="fas fa-undo">&#xf0e2;&nbsp;Undo</option>
                                    <option value="fas fa-undo-alt">&#xf2ea;&nbsp;Alternate Undo</option>
                                    <option value="fas fa-unlink">&#xf127;&nbsp;unlink</option>
                                    <option value="fas fa-wrench">&#xf0ad;&nbsp;Wrench</option>
                                    <option value="fas fa-apple-alt">&#xf5d1;&nbsp;Fruit Apple</option>
                                    <option value="fas fa-atom">&#xf5d2;&nbsp;Atom</option>
                                    <option value="fas fa-award">&#xf559;&nbsp;Award</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bell-slash">&#xf1f6;&nbsp;Bell Slash</option>
                                    <option value="fas fa-book-open">&#xf518;&nbsp;Book Open</option>
                                    <option value="fas fa-book-reader">&#xf5da;&nbsp;Book Reader</option>
                                    <option value="fas fa-chalkboard">&#xf51b;&nbsp;Chalkboard</option>
                                    <option value="fas fa-chalkboard-teacher">&#xf51c;&nbsp;Chalkboard Teacher</option>
                                    <option value="fas fa-graduation-cap">&#xf19d;&nbsp;Graduation Cap</option>
                                    <option value="fas fa-laptop-code">&#xf5fc;&nbsp;Laptop Code</option>
                                    <option value="fas fa-microscope">&#xf610;&nbsp;Microscope</option>
                                    <option value="fas fa-music">&#xf001;&nbsp;Music</option>
                                    <option value="fas fa-school">&#xf549;&nbsp;School</option>
                                    <option value="fas fa-shapes">&#xf61f;&nbsp;Shapes</option>
                                    <option value="fas fa-theater-masks">&#xf630;&nbsp;Theater Masks</option>
                                    <option value="fas fa-user-graduate">&#xf501;&nbsp;User Graduate</option>
                                    <option value="fas fa-angry">&#xf556;&nbsp;Angry Face</option>
                                    <option value="fas fa-dizzy">&#xf567;&nbsp;Dizzy Face</option>
                                    <option value="fas fa-flushed">&#xf579;&nbsp;Flushed Face</option>
                                    <option value="fas fa-frown">&#xf119;&nbsp;Frowning Face</option>
                                    <option value="fas fa-frown-open">&#xf57a;&nbsp;Frowning Face With Open Mouth</option>
                                    <option value="fas fa-grimace">&#xf57f;&nbsp;Grimacing Face</option>
                                    <option value="fas fa-grin">&#xf580;&nbsp;Grinning Face</option>
                                    <option value="fas fa-grin-alt">&#xf581;&nbsp;Alternate Grinning Face</option>
                                    <option value="fas fa-grin-beam">&#xf582;&nbsp;Grinning Face With Smiling Eyes</option>
                                    <option value="fas fa-grin-beam-sweat">&#xf583;&nbsp;Grinning Face With Sweat</option>
                                    <option value="fas fa-grin-hearts">&#xf584;&nbsp;Smiling Face With Heart-Eyes</option>
                                    <option value="fas fa-grin-squint">&#xf585;&nbsp;Grinning Squinting Face</option>
                                    <option value="fas fa-grin-squint-tears">&#xf586;&nbsp;Rolling on the Floor Laughing</option>
                                    <option value="fas fa-grin-stars">&#xf587;&nbsp;Star-Struck</option>
                                    <option value="fas fa-grin-tears">&#xf588;&nbsp;Face With Tears of Joy</option>
                                    <option value="fas fa-grin-tongue">&#xf589;&nbsp;Face With Tongue</option>
                                    <option value="fas fa-grin-tongue-squint">&#xf58a;&nbsp;Squinting Face With Tongue</option>
                                    <option value="fas fa-grin-tongue-wink">&#xf58b;&nbsp;Winking Face With Tongue</option>
                                    <option value="fas fa-grin-wink">&#xf58c;&nbsp;Grinning Winking Face</option>
                                    <option value="fas fa-kiss">&#xf596;&nbsp;Kissing Face</option>
                                    <option value="fas fa-kiss-beam">&#xf597;&nbsp;Kissing Face With Smiling Eyes</option>
                                    <option value="fas fa-kiss-wink-heart">&#xf598;&nbsp;Face Blowing a Kiss</option>
                                    <option value="fas fa-laugh">&#xf599;&nbsp;Grinning Face With Big Eyes</option>
                                    <option value="fas fa-laugh-beam">&#xf59a;&nbsp;Laugh Face with Beaming Eyes</option>
                                    <option value="fas fa-laugh-squint">&#xf59b;&nbsp;Laughing Squinting Face</option>
                                    <option value="fas fa-laugh-wink">&#xf59c;&nbsp;Laughing Winking Face</option>
                                    <option value="fas fa-meh">&#xf11a;&nbsp;Neutral Face</option>
                                    <option value="fas fa-meh-blank">&#xf5a4;&nbsp;Face Without Mouth</option>
                                    <option value="fas fa-meh-rolling-eyes">&#xf5a5;&nbsp;Face With Rolling Eyes</option>
                                    <option value="fas fa-sad-cry">&#xf5b3;&nbsp;Crying Face</option>
                                    <option value="fas fa-sad-tear">&#xf5b4;&nbsp;Loudly Crying Face</option>
                                    <option value="fas fa-smile">&#xf118;&nbsp;Smiling Face</option>
                                    <option value="fas fa-smile-beam">&#xf5b8;&nbsp;Beaming Face With Smiling Eyes</option>
                                    <option value="fas fa-smile-wink">&#xf4da;&nbsp;Winking Face</option>
                                    <option value="fas fa-surprise">&#xf5c2;&nbsp;Hushed Face</option>
                                    <option value="fas fa-tired">&#xf5c8;&nbsp;Tired Face</option>
                                    <option value="fas fa-atom">&#xf5d2;&nbsp;Atom</option>
                                    <option value="fas fa-battery-empty">&#xf244;&nbsp;Battery Empty</option>
                                    <option value="fas fa-battery-full">&#xf240;&nbsp;Battery Full</option>
                                    <option value="fas fa-battery-half">&#xf242;&nbsp;Battery 1/2 Full</option>
                                    <option value="fas fa-battery-quarter">&#xf243;&nbsp;Battery 1/4 Full</option>
                                    <option value="fas fa-battery-three-quarters">&#xf241;&nbsp;Battery 3/4 Full</option>
                                    <option value="fas fa-broadcast-tower">&#xf519;&nbsp;Broadcast Tower</option>
                                    <option value="fas fa-burn">&#xf46a;&nbsp;Burn</option>
                                    <option value="fas fa-charging-station">&#xf5e7;&nbsp;Charging Station</option>
                                    <option value="fas fa-fan">&#xf863;&nbsp;Fan</option>
                                    <option value="fas fa-fire">&#xf06d;&nbsp;fire</option>
                                    <option value="fas fa-fire-alt">&#xf7e4;&nbsp;Alternate Fire</option>
                                    <option value="fas fa-gas-pump">&#xf52f;&nbsp;Gas Pump</option>
                                    <option value="fas fa-industry">&#xf275;&nbsp;Industry</option>
                                    <option value="fas fa-leaf">&#xf06c;&nbsp;leaf</option>
                                    <option value="fas fa-lightbulb">&#xf0eb;&nbsp;Lightbulb</option>
                                    <option value="fas fa-plug">&#xf1e6;&nbsp;Plug</option>
                                    <option value="fas fa-poop">&#xf619;&nbsp;Poop</option>
                                    <option value="fas fa-power-off">&#xf011;&nbsp;Power Off</option>
                                    <option value="fas fa-radiation">&#xf7b9;&nbsp;Radiation</option>
                                    <option value="fas fa-radiation-alt">&#xf7ba;&nbsp;Alternate Radiation</option>
                                    <option value="fas fa-seedling">&#xf4d8;&nbsp;Seedling</option>
                                    <option value="fas fa-solar-panel">&#xf5ba;&nbsp;Solar Panel</option>
                                    <option value="fas fa-sun">&#xf185;&nbsp;Sun</option>
                                    <option value="fas fa-water">&#xf773;&nbsp;Water</option>
                                    <option value="fas fa-wind">&#xf72e;&nbsp;Wind</option>
                                    <option value="fas fa-archive">&#xf187;&nbsp;Archive</option>
                                    <option value="fas fa-clone">&#xf24d;&nbsp;Clone</option>
                                    <option value="fas fa-copy">&#xf0c5;&nbsp;Copy</option>
                                    <option value="fas fa-cut">&#xf0c4;&nbsp;Cut</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-file-archive">&#xf1c6;&nbsp;Archive File</option>
                                    <option value="fas fa-file-audio">&#xf1c7;&nbsp;Audio File</option>
                                    <option value="fas fa-file-code">&#xf1c9;&nbsp;Code File</option>
                                    <option value="fas fa-file-excel">&#xf1c3;&nbsp;Excel File</option>
                                    <option value="fas fa-file-image">&#xf1c5;&nbsp;Image File</option>
                                    <option value="fas fa-file-pdf">&#xf1c1;&nbsp;PDF File</option>
                                    <option value="fas fa-file-powerpoint">&#xf1c4;&nbsp;Powerpoint File</option>
                                    <option value="fas fa-file-video">&#xf1c8;&nbsp;Video File</option>
                                    <option value="fas fa-file-word">&#xf1c2;&nbsp;Word File</option>
                                    <option value="fas fa-folder">&#xf07b;&nbsp;Folder</option>
                                    <option value="fas fa-folder-open">&#xf07c;&nbsp;Folder Open</option>
                                    <option value="fas fa-paste">&#xf0ea;&nbsp;Paste</option>
                                    <option value="fas fa-photo-video">&#xf87c;&nbsp;Photo Video</option>
                                    <option value="fas fa-save">&#xf0c7;&nbsp;Save</option>
                                    <option value="fas fa-sticky-note">&#xf249;&nbsp;Sticky Note</option>
                                    <option value="fas fa-balance-scale">&#xf24e;&nbsp;Balance Scale</option>
                                    <option value="fas fa-balance-scale-left">&#xf515;&nbsp;Balance Scale (Left-Weighted)</option>
                                    <option value="fas fa-balance-scale-right">&#xf516;&nbsp;Balance Scale (Right-Weighted)</option>
                                    <option value="fas fa-book">&#xf02d;&nbsp;book</option>
                                    <option value="fas fa-cash-register">&#xf788;&nbsp;Cash Register</option>
                                    <option value="fas fa-chart-line">&#xf201;&nbsp;Line Chart</option>
                                    <option value="fas fa-chart-pie">&#xf200;&nbsp;Pie Chart</option>
                                    <option value="fas fa-coins">&#xf51e;&nbsp;Coins</option>
                                    <option value="fas fa-comment-dollar">&#xf651;&nbsp;Comment Dollar</option>
                                    <option value="fas fa-comments-dollar">&#xf653;&nbsp;Comments Dollar</option>
                                    <option value="fas fa-credit-card">&#xf09d;&nbsp;Credit Card</option>
                                    <option value="fas fa-donate">&#xf4b9;&nbsp;Donate</option>
                                    <option value="fas fa-file-invoice">&#xf570;&nbsp;File Invoice</option>
                                    <option value="fas fa-file-invoice-dollar">&#xf571;&nbsp;File Invoice with US Dollar</option>
                                    <option value="fas fa-hand-holding-usd">&#xf4c0;&nbsp;Hand Holding US Dollar</option>
                                    <option value="fas fa-landmark">&#xf66f;&nbsp;Landmark</option>
                                    <option value="fas fa-money-bill">&#xf0d6;&nbsp;Money Bill</option>
                                    <option value="fas fa-money-bill-alt">&#xf3d1;&nbsp;Alternate Money Bill</option>
                                    <option value="fas fa-money-bill-wave">&#xf53a;&nbsp;Wavy Money Bill</option>
                                    <option value="fas fa-money-bill-wave-alt">&#xf53b;&nbsp;Alternate Wavy Money Bill</option>
                                    <option value="fas fa-money-check">&#xf53c;&nbsp;Money Check</option>
                                    <option value="fas fa-money-check-alt">&#xf53d;&nbsp;Alternate Money Check</option>
                                    <option value="fas fa-percentage">&#xf541;&nbsp;Percentage</option>
                                    <option value="fas fa-piggy-bank">&#xf4d3;&nbsp;Piggy Bank</option>
                                    <option value="fas fa-receipt">&#xf543;&nbsp;Receipt</option>
                                    <option value="fas fa-stamp">&#xf5bf;&nbsp;Stamp</option>
                                    <option value="fas fa-wallet">&#xf555;&nbsp;Wallet</option>
                                    <option value="fas fa-bicycle">&#xf206;&nbsp;Bicycle</option>
                                    <option value="fas fa-biking">&#xf84a;&nbsp;Biking</option>
                                    <option value="fas fa-burn">&#xf46a;&nbsp;Burn</option>
                                    <option value="fas fa-fire-alt">&#xf7e4;&nbsp;Alternate Fire</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-heartbeat">&#xf21e;&nbsp;Heartbeat</option>
                                    <option value="fas fa-hiking">&#xf6ec;&nbsp;Hiking</option>
                                    <option value="fas fa-running">&#xf70c;&nbsp;Running</option>
                                    <option value="fas fa-shoe-prints">&#xf54b;&nbsp;Shoe Prints</option>
                                    <option value="fas fa-skating">&#xf7c5;&nbsp;Skating</option>
                                    <option value="fas fa-skiing">&#xf7c9;&nbsp;Skiing</option>
                                    <option value="fas fa-skiing-nordic">&#xf7ca;&nbsp;Skiing Nordic</option>
                                    <option value="fas fa-snowboarding">&#xf7ce;&nbsp;Snowboarding</option>
                                    <option value="fas fa-spa">&#xf5bb;&nbsp;Spa</option>
                                    <option value="fas fa-swimmer">&#xf5c4;&nbsp;Swimmer</option>
                                    <option value="fas fa-walking">&#xf554;&nbsp;Walking</option>
                                    <option value="fas fa-apple-alt">&#xf5d1;&nbsp;Fruit Apple</option>
                                    <option value="fas fa-bacon">&#xf7e5;&nbsp;Bacon</option>
                                    <option value="fas fa-bone">&#xf5d7;&nbsp;Bone</option>
                                    <option value="fas fa-bread-slice">&#xf7ec;&nbsp;Bread Slice</option>
                                    <option value="fas fa-candy-cane">&#xf786;&nbsp;Candy Cane</option>
                                    <option value="fas fa-carrot">&#xf787;&nbsp;Carrot</option>
                                    <option value="fas fa-cheese">&#xf7ef;&nbsp;Cheese</option>
                                    <option value="fas fa-cloud-meatball">&#xf73b;&nbsp;Cloud with (a chance of) Meatball</option>
                                    <option value="fas fa-cookie">&#xf563;&nbsp;Cookie</option>
                                    <option value="fas fa-drumstick-bite">&#xf6d7;&nbsp;Drumstick with Bite Taken Out</option>
                                    <option value="fas fa-egg">&#xf7fb;&nbsp;Egg</option>
                                    <option value="fas fa-fish">&#xf578;&nbsp;Fish</option>
                                    <option value="fas fa-hamburger">&#xf805;&nbsp;Hamburger</option>
                                    <option value="fas fa-hotdog">&#xf80f;&nbsp;Hot Dog</option>
                                    <option value="fas fa-ice-cream">&#xf810;&nbsp;Ice Cream</option>
                                    <option value="fas fa-lemon">&#xf094;&nbsp;Lemon</option>
                                    <option value="fas fa-pepper-hot">&#xf816;&nbsp;Hot Pepper</option>
                                    <option value="fas fa-pizza-slice">&#xf818;&nbsp;Pizza Slice</option>
                                    <option value="fas fa-seedling">&#xf4d8;&nbsp;Seedling</option>
                                    <option value="fas fa-stroopwafel">&#xf551;&nbsp;Stroopwafel</option>
                                    <option value="fas fa-apple-alt">&#xf5d1;&nbsp;Fruit Apple</option>
                                    <option value="fas fa-carrot">&#xf787;&nbsp;Carrot</option>
                                    <option value="fas fa-leaf">&#xf06c;&nbsp;leaf</option>
                                    <option value="fas fa-lemon">&#xf094;&nbsp;Lemon</option>
                                    <option value="fas fa-pepper-hot">&#xf816;&nbsp;Hot Pepper</option>
                                    <option value="fas fa-seedling">&#xf4d8;&nbsp;Seedling</option>
                                    <option value="fas fa-chess">&#xf439;&nbsp;Chess</option>
                                    <option value="fas fa-chess-bishop">&#xf43a;&nbsp;Chess Bishop</option>
                                    <option value="fas fa-chess-board">&#xf43c;&nbsp;Chess Board</option>
                                    <option value="fas fa-chess-king">&#xf43f;&nbsp;Chess King</option>
                                    <option value="fas fa-chess-knight">&#xf441;&nbsp;Chess Knight</option>
                                    <option value="fas fa-chess-pawn">&#xf443;&nbsp;Chess Pawn</option>
                                    <option value="fas fa-chess-queen">&#xf445;&nbsp;Chess Queen</option>
                                    <option value="fas fa-chess-rook">&#xf447;&nbsp;Chess Rook</option>
                                    <option value="fas fa-dice">&#xf522;&nbsp;Dice</option>
                                    <option value="fas fa-dice-d20">&#xf6cf;&nbsp;Dice D20</option>
                                    <option value="fas fa-dice-d6">&#xf6d1;&nbsp;Dice D6</option>
                                    <option value="fas fa-dice-five">&#xf523;&nbsp;Dice Five</option>
                                    <option value="fas fa-dice-four">&#xf524;&nbsp;Dice Four</option>
                                    <option value="fas fa-dice-one">&#xf525;&nbsp;Dice One</option>
                                    <option value="fas fa-dice-six">&#xf526;&nbsp;Dice Six</option>
                                    <option value="fas fa-dice-three">&#xf527;&nbsp;Dice Three</option>
                                    <option value="fas fa-dice-two">&#xf528;&nbsp;Dice Two</option>
                                    <option value="fas fa-gamepad">&#xf11b;&nbsp;Gamepad</option>
                                    <option value="fas fa-ghost">&#xf6e2;&nbsp;Ghost</option>
                                    <option value="fas fa-headset">&#xf590;&nbsp;Headset</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-playstation">&#xf3df;&nbsp;PlayStation</option>
                                    <option value="fas fa-puzzle-piece">&#xf12e;&nbsp;Puzzle Piece</option>
                                    <option value="fas fa-steam">&#xf1b6;&nbsp;Steam</option>
                                    <option value="fas fa-steam-square">&#xf1b7;&nbsp;Steam Square</option>
                                    <option value="fas fa-steam-symbol">&#xf3f6;&nbsp;Steam Symbol</option>
                                    <option value="fas fa-twitch">&#xf1e8;&nbsp;Twitch</option>
                                    <option value="fas fa-xbox">&#xf412;&nbsp;Xbox</option>
                                    <option value="fas fa-acquisitions-incorporated">&#xf6af;&nbsp;Acquisitions Incorporated</option>
                                    <option value="fas fa-book-dead">&#xf6b7;&nbsp;Book of the Dead</option>
                                    <option value="fas fa-critical-role">&#xf6c9;&nbsp;Critical Role</option>
                                    <option value="fas fa-d-and-d">&#xf38d;&nbsp;Dungeons & Dragons</option>
                                    <option value="fas fa-d-and-d-beyond">&#xf6ca;&nbsp;D&D Beyond</option>
                                    <option value="fas fa-dice-d20">&#xf6cf;&nbsp;Dice D20</option>
                                    <option value="fas fa-dice-d6">&#xf6d1;&nbsp;Dice D6</option>
                                    <option value="fas fa-dragon">&#xf6d5;&nbsp;Dragon</option>
                                    <option value="fas fa-dungeon">&#xf6d9;&nbsp;Dungeon</option>
                                    <option value="fas fa-fantasy-flight-games">&#xf6dc;&nbsp;Fantasy Flight-games</option>
                                    <option value="fas fa-fist-raised">&#xf6de;&nbsp;Raised Fist</option>
                                    <option value="fas fa-hat-wizard">&#xf6e8;&nbsp;Wizard's Hat</option>
                                    <option value="fas fa-penny-arcade">&#xf704;&nbsp;Penny Arcade</option>
                                    <option value="fas fa-ring">&#xf70b;&nbsp;Ring</option>
                                    <option value="fas fa-scroll">&#xf70e;&nbsp;Scroll</option>
                                    <option value="fas fa-skull-crossbones">&#xf714;&nbsp;Skull & Crossbones</option>
                                    <option value="fas fa-wizards-of-the-coast">&#xf730;&nbsp;Wizards of the Coast</option>
                                    <option value="fas fa-genderless">&#xf22d;&nbsp;Genderless</option>
                                    <option value="fas fa-mars">&#xf222;&nbsp;Mars</option>
                                    <option value="fas fa-mars-double">&#xf227;&nbsp;Mars Double</option>
                                    <option value="fas fa-mars-stroke">&#xf229;&nbsp;Mars Stroke</option>
                                    <option value="fas fa-mars-stroke-h">&#xf22b;&nbsp;Mars Stroke Horizontal</option>
                                    <option value="fas fa-mars-stroke-v">&#xf22a;&nbsp;Mars Stroke Vertical</option>
                                    <option value="fas fa-mercury">&#xf223;&nbsp;Mercury</option>
                                    <option value="fas fa-neuter">&#xf22c;&nbsp;Neuter</option>
                                    <option value="fas fa-transgender">&#xf224;&nbsp;Transgender</option>
                                    <option value="fas fa-transgender-alt">&#xf225;&nbsp;Alternate Transgender</option>
                                    <option value="fas fa-venus">&#xf221;&nbsp;Venus</option>
                                    <option value="fas fa-venus-double">&#xf226;&nbsp;Venus Double</option>
                                    <option value="fas fa-venus-mars">&#xf228;&nbsp;Venus Mars</option>
                                    <option value="fas fa-book-dead">&#xf6b7;&nbsp;Book of the Dead</option>
                                    <option value="fas fa-broom">&#xf51a;&nbsp;Broom</option>
                                    <option value="fas fa-cat">&#xf6be;&nbsp;Cat</option>
                                    <option value="fas fa-cloud-moon">&#xf6c3;&nbsp;Cloud with Moon</option>
                                    <option value="fas fa-crow">&#xf520;&nbsp;Crow</option>
                                    <option value="fas fa-ghost">&#xf6e2;&nbsp;Ghost</option>
                                    <option value="fas fa-hat-wizard">&#xf6e8;&nbsp;Wizard's Hat</option>
                                    <option value="fas fa-mask">&#xf6fa;&nbsp;Mask</option>
                                    <option value="fas fa-skull-crossbones">&#xf714;&nbsp;Skull & Crossbones</option>
                                    <option value="fas fa-spider">&#xf717;&nbsp;Spider</option>
                                    <option value="fas fa-toilet-paper">&#xf71e;&nbsp;Toilet Paper</option>
                                    <option value="fas fa-allergies">&#xf461;&nbsp;Allergies</option>
                                    <option value="fas fa-fist-raised">&#xf6de;&nbsp;Raised Fist</option>
                                    <option value="fas fa-hand-holding">&#xf4bd;&nbsp;Hand Holding</option>
                                    <option value="fas fa-hand-holding-heart">&#xf4be;&nbsp;Hand Holding Heart</option>
                                    <option value="fas fa-hand-holding-medical">&#xe05c;&nbsp;Hand Holding Medical Cross</option>
                                    <option value="fas fa-hand-holding-usd">&#xf4c0;&nbsp;Hand Holding US Dollar</option>
                                    <option value="fas fa-hand-holding-water">&#xf4c1;&nbsp;Hand Holding Water</option>
                                    <option value="fas fa-hand-lizard">&#xf258;&nbsp;Lizard (Hand)</option>
                                    <option value="fas fa-hand-middle-finger">&#xf806;&nbsp;Hand with Middle Finger Raised</option>
                                    <option value="fas fa-hand-paper">&#xf256;&nbsp;Paper (Hand)</option>
                                    <option value="fas fa-hand-peace">&#xf25b;&nbsp;Peace (Hand)</option>
                                    <option value="fas fa-hand-point-down">&#xf0a7;&nbsp;Hand Pointing Down</option>
                                    <option value="fas fa-hand-point-left">&#xf0a5;&nbsp;Hand Pointing Left</option>
                                    <option value="fas fa-hand-point-right">&#xf0a4;&nbsp;Hand Pointing Right</option>
                                    <option value="fas fa-hand-point-up">&#xf0a6;&nbsp;Hand Pointing Up</option>
                                    <option value="fas fa-hand-pointer">&#xf25a;&nbsp;Pointer (Hand)</option>
                                    <option value="fas fa-hand-rock">&#xf255;&nbsp;Rock (Hand)</option>
                                    <option value="fas fa-hand-scissors">&#xf257;&nbsp;Scissors (Hand)</option>
                                    <option value="fas fa-hand-sparkles">&#xe05d;&nbsp;Hand Sparkles</option>
                                    <option value="fas fa-hand-spock">&#xf259;&nbsp;Spock (Hand)</option>
                                    <option value="fas fa-hands">&#xf4c2;&nbsp;Hands</option>
                                    <option value="fas fa-hands-helping">&#xf4c4;&nbsp;Helping Hands</option>
                                    <option value="fas fa-hands-wash">&#xe05e;&nbsp;Hands Wash</option>
                                    <option value="fas fa-handshake">&#xf2b5;&nbsp;Handshake</option>
                                    <option value="fas fa-handshake-alt-slash">&#xe05f;&nbsp;Handshake Alternate Slash</option>
                                    <option value="fas fa-handshake-slash">&#xe060;&nbsp;Handshake Slash</option>
                                    <option value="fas fa-praying-hands">&#xf684;&nbsp;Praying Hands</option>
                                    <option value="fas fa-thumbs-down">&#xf165;&nbsp;thumbs-down</option>
                                    <option value="fas fa-thumbs-up">&#xf164;&nbsp;thumbs-up</option>
                                    <option value="fas fa-accessible-icon">&#xf368;&nbsp;Accessible Icon</option>
                                    <option value="fas fa-ambulance">&#xf0f9;&nbsp;ambulance</option>
                                    <option value="fas fa-h-square">&#xf0fd;&nbsp;H Square</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-heartbeat">&#xf21e;&nbsp;Heartbeat</option>
                                    <option value="fas fa-hospital">&#xf0f8;&nbsp;hospital</option>
                                    <option value="fas fa-medkit">&#xf0fa;&nbsp;medkit</option>
                                    <option value="fas fa-plus-square">&#xf0fe;&nbsp;Plus Square</option>
                                    <option value="fas fa-prescription">&#xf5b1;&nbsp;Prescription</option>
                                    <option value="fas fa-stethoscope">&#xf0f1;&nbsp;Stethoscope</option>
                                    <option value="fas fa-user-md">&#xf0f0;&nbsp;Doctor</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-accessible-icon">&#xf368;&nbsp;Accessible Icon</option>
                                    <option value="fas fa-ambulance">&#xf0f9;&nbsp;ambulance</option>
                                    <option value="fas fa-h-square">&#xf0fd;&nbsp;H Square</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-heartbeat">&#xf21e;&nbsp;Heartbeat</option>
                                    <option value="fas fa-hospital">&#xf0f8;&nbsp;hospital</option>
                                    <option value="fas fa-medkit">&#xf0fa;&nbsp;medkit</option>
                                    <option value="fas fa-plus-square">&#xf0fe;&nbsp;Plus Square</option>
                                    <option value="fas fa-prescription">&#xf5b1;&nbsp;Prescription</option>
                                    <option value="fas fa-stethoscope">&#xf0f1;&nbsp;Stethoscope</option>
                                    <option value="fas fa-user-md">&#xf0f0;&nbsp;Doctor</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-baby-carriage">&#xf77d;&nbsp;Baby Carriage</option>
                                    <option value="fas fa-bath">&#xf2cd;&nbsp;Bath</option>
                                    <option value="fas fa-bed">&#xf236;&nbsp;Bed</option>
                                    <option value="fas fa-briefcase">&#xf0b1;&nbsp;Briefcase</option>
                                    <option value="fas fa-car">&#xf1b9;&nbsp;Car</option>
                                    <option value="fas fa-cocktail">&#xf561;&nbsp;Cocktail</option>
                                    <option value="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-concierge-bell">&#xf562;&nbsp;Concierge Bell</option>
                                    <option value="fas fa-dice">&#xf522;&nbsp;Dice</option>
                                    <option value="fas fa-dice-five">&#xf523;&nbsp;Dice Five</option>
                                    <option value="fas fa-door-closed">&#xf52a;&nbsp;Door Closed</option>
                                    <option value="fas fa-door-open">&#xf52b;&nbsp;Door Open</option>
                                    <option value="fas fa-dumbbell">&#xf44b;&nbsp;Dumbbell</option>
                                    <option value="fas fa-glass-martini">&#xf000;&nbsp;Martini Glass</option>
                                    <option value="fas fa-glass-martini-alt">&#xf57b;&nbsp;Alternate Glass Martini</option>
                                    <option value="fas fa-hot-tub">&#xf593;&nbsp;Hot Tub</option>
                                    <option value="fas fa-hotel">&#xf594;&nbsp;Hotel</option>
                                    <option value="fas fa-infinity">&#xf534;&nbsp;Infinity</option>
                                    <option value="fas fa-key">&#xf084;&nbsp;key</option>
                                    <option value="fas fa-luggage-cart">&#xf59d;&nbsp;Luggage Cart</option>
                                    <option value="fas fa-shower">&#xf2cc;&nbsp;Shower</option>
                                    <option value="fas fa-shuttle-van">&#xf5b6;&nbsp;Shuttle Van</option>
                                    <option value="fas fa-smoking">&#xf48d;&nbsp;Smoking</option>
                                    <option value="fas fa-smoking-ban">&#xf54d;&nbsp;Smoking Ban</option>
                                    <option value="fas fa-snowflake">&#xf2dc;&nbsp;Snowflake</option>
                                    <option value="fas fa-spa">&#xf5bb;&nbsp;Spa</option>
                                    <option value="fas fa-suitcase">&#xf0f2;&nbsp;Suitcase</option>
                                    <option value="fas fa-suitcase-rolling">&#xf5c1;&nbsp;Suitcase Rolling</option>
                                    <option value="fas fa-swimmer">&#xf5c4;&nbsp;Swimmer</option>
                                    <option value="fas fa-swimming-pool">&#xf5c5;&nbsp;Swimming Pool</option>
                                    <option value="fas fa-tv">&#xf26c;&nbsp;Television</option>
                                    <option value="fas fa-umbrella-beach">&#xf5ca;&nbsp;Umbrella Beach</option>
                                    <option value="fas fa-utensils">&#xf2e7;&nbsp;Utensils</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-wifi">&#xf1eb;&nbsp;WiFi</option>
                                    <option value="fas fa-bath">&#xf2cd;&nbsp;Bath</option>
                                    <option value="fas fa-bed">&#xf236;&nbsp;Bed</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-blender">&#xf517;&nbsp;Blender</option>
                                    <option value="fas fa-box-tissue">&#xe05b;&nbsp;Tissue Box</option>
                                    <option value="fas fa-chair">&#xf6c0;&nbsp;Chair</option>
                                    <option value="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-couch">&#xf4b8;&nbsp;Couch</option>
                                    <option value="fas fa-door-closed">&#xf52a;&nbsp;Door Closed</option>
                                    <option value="fas fa-door-open">&#xf52b;&nbsp;Door Open</option>
                                    <option value="fas fa-dungeon">&#xf6d9;&nbsp;Dungeon</option>
                                    <option value="fas fa-fan">&#xf863;&nbsp;Fan</option>
                                    <option value="fas fa-faucet">&#xe005;&nbsp;Faucet</option>
                                    <option value="fas fa-house-user">&#xe065;&nbsp;House User</option>
                                    <option value="fas fa-laptop-house">&#xe066;&nbsp;Laptop House</option>
                                    <option value="fas fa-lightbulb">&#xf0eb;&nbsp;Lightbulb</option>
                                    <option value="fas fa-plug">&#xf1e6;&nbsp;Plug</option>
                                    <option value="fas fa-pump-soap">&#xe06b;&nbsp;Pump Soap</option>
                                    <option value="fas fa-shower">&#xf2cc;&nbsp;Shower</option>
                                    <option value="fas fa-sink">&#xe06d;&nbsp;Sink</option>
                                    <option value="fas fa-snowflake">&#xf2dc;&nbsp;Snowflake</option>
                                    <option value="fas fa-soap">&#xe06e;&nbsp;Soap</option>
                                    <option value="fas fa-toilet-paper">&#xf71e;&nbsp;Toilet Paper</option>
                                    <option value="fas fa-toilet-paper-slash">&#xe072;&nbsp;Toilet Paper Slash</option>
                                    <option value="fas fa-tv">&#xf26c;&nbsp;Television</option>
                                    <option value="fas fa-award">&#xf559;&nbsp;Award</option>
                                    <option value="fas fa-ban">&#xf05e;&nbsp;ban</option>
                                    <option value="fas fa-barcode">&#xf02a;&nbsp;barcode</option>
                                    <option value="fas fa-bars">&#xf0c9;&nbsp;Bars</option>
                                    <option value="fas fa-beer">&#xf0fc;&nbsp;beer</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bell-slash">&#xf1f6;&nbsp;Bell Slash</option>
                                    <option value="fas fa-blog">&#xf781;&nbsp;Blog</option>
                                    <option value="fas fa-bug">&#xf188;&nbsp;Bug</option>
                                    <option value="fas fa-bullhorn">&#xf0a1;&nbsp;bullhorn</option>
                                    <option value="fas fa-bullseye">&#xf140;&nbsp;Bullseye</option>
                                    <option value="fas fa-calculator">&#xf1ec;&nbsp;Calculator</option>
                                    <option value="fas fa-calendar">&#xf133;&nbsp;Calendar</option>
                                    <option value="fas fa-calendar-alt">&#xf073;&nbsp;Alternate Calendar</option>
                                    <option value="fas fa-calendar-check">&#xf274;&nbsp;Calendar Check</option>
                                    <option value="fas fa-calendar-minus">&#xf272;&nbsp;Calendar Minus</option>
                                    <option value="fas fa-calendar-plus">&#xf271;&nbsp;Calendar Plus</option>
                                    <option value="fas fa-calendar-times">&#xf273;&nbsp;Calendar Times</option>
                                    <option value="fas fa-certificate">&#xf0a3;&nbsp;certificate</option>
                                    <option value="fas fa-check">&#xf00c;&nbsp;Check</option>
                                    <option value="fas fa-check-circle">&#xf058;&nbsp;Check Circle</option>
                                    <option value="fas fa-check-double">&#xf560;&nbsp;Double Check</option>
                                    <option value="fas fa-check-square">&#xf14a;&nbsp;Check Square</option>
                                    <option value="fas fa-circle">&#xf111;&nbsp;Circle</option>
                                    <option value="fas fa-clipboard">&#xf328;&nbsp;Clipboard</option>
                                    <option value="fas fa-clone">&#xf24d;&nbsp;Clone</option>
                                    <option value="fas fa-cloud">&#xf0c2;&nbsp;Cloud</option>
                                    <option value="fas fa-cloud-download-alt">&#xf381;&nbsp;Alternate Cloud Download</option>
                                    <option value="fas fa-cloud-upload-alt">&#xf382;&nbsp;Alternate Cloud Upload</option>
                                    <option value="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-cog">&#xf013;&nbsp;cog</option>
                                    <option value="fas fa-cogs">&#xf085;&nbsp;cogs</option>
                                    <option value="fas fa-copy">&#xf0c5;&nbsp;Copy</option>
                                    <option value="fas fa-cut">&#xf0c4;&nbsp;Cut</option>
                                    <option value="fas fa-database">&#xf1c0;&nbsp;Database</option>
                                    <option value="fas fa-dot-circle">&#xf192;&nbsp;Dot Circle</option>
                                    <option value="fas fa-download">&#xf019;&nbsp;Download</option>
                                    <option value="fas fa-edit">&#xf044;&nbsp;Edit</option>
                                    <option value="fas fa-ellipsis-h">&#xf141;&nbsp;Horizontal Ellipsis</option>
                                    <option value="fas fa-ellipsis-v">&#xf142;&nbsp;Vertical Ellipsis</option>
                                    <option value="fas fa-envelope">&#xf0e0;&nbsp;Envelope</option>
                                    <option value="fas fa-envelope-open">&#xf2b6;&nbsp;Envelope Open</option>
                                    <option value="fas fa-eraser">&#xf12d;&nbsp;eraser</option>
                                    <option value="fas fa-exclamation">&#xf12a;&nbsp;exclamation</option>
                                    <option value="fas fa-exclamation-circle">&#xf06a;&nbsp;Exclamation Circle</option>
                                    <option value="fas fa-exclamation-triangle">&#xf071;&nbsp;Exclamation Triangle</option>
                                    <option value="fas fa-external-link-alt">&#xf35d;&nbsp;Alternate External Link</option>
                                    <option value="fas fa-external-link-square-alt">&#xf360;&nbsp;Alternate External Link Square</option>
                                    <option value="fas fa-eye">&#xf06e;&nbsp;Eye</option>
                                    <option value="fas fa-eye-slash">&#xf070;&nbsp;Eye Slash</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-file-download">&#xf56d;&nbsp;File Download</option>
                                    <option value="fas fa-file-export">&#xf56e;&nbsp;File Export</option>
                                    <option value="fas fa-file-import">&#xf56f;&nbsp;File Import</option>
                                    <option value="fas fa-file-upload">&#xf574;&nbsp;File Upload</option>
                                    <option value="fas fa-filter">&#xf0b0;&nbsp;Filter</option>
                                    <option value="fas fa-fingerprint">&#xf577;&nbsp;Fingerprint</option>
                                    <option value="fas fa-flag">&#xf024;&nbsp;flag</option>
                                    <option value="fas fa-flag-checkered">&#xf11e;&nbsp;flag-checkered</option>
                                    <option value="fas fa-folder">&#xf07b;&nbsp;Folder</option>
                                    <option value="fas fa-folder-open">&#xf07c;&nbsp;Folder Open</option>
                                    <option value="fas fa-frown">&#xf119;&nbsp;Frowning Face</option>
                                    <option value="fas fa-glasses">&#xf530;&nbsp;Glasses</option>
                                    <option value="fas fa-grip-horizontal">&#xf58d;&nbsp;Grip Horizontal</option>
                                    <option value="fas fa-grip-lines">&#xf7a4;&nbsp;Grip Lines</option>
                                    <option value="fas fa-grip-lines-vertical">&#xf7a5;&nbsp;Grip Lines Vertical</option>
                                    <option value="fas fa-grip-vertical">&#xf58e;&nbsp;Grip Vertical</option>
                                    <option value="fas fa-hashtag">&#xf292;&nbsp;Hashtag</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-history">&#xf1da;&nbsp;History</option>
                                    <option value="fas fa-home">&#xf015;&nbsp;home</option>
                                    <option value="fas fa-i-cursor">&#xf246;&nbsp;I Beam Cursor</option>
                                    <option value="fas fa-info">&#xf129;&nbsp;Info</option>
                                    <option value="fas fa-info-circle">&#xf05a;&nbsp;Info Circle</option>
                                    <option value="fas fa-language">&#xf1ab;&nbsp;Language</option>
                                    <option value="fas fa-magic">&#xf0d0;&nbsp;magic</option>
                                    <option value="fas fa-marker">&#xf5a1;&nbsp;Marker</option>
                                    <option value="fas fa-medal">&#xf5a2;&nbsp;Medal</option>
                                    <option value="fas fa-meh">&#xf11a;&nbsp;Neutral Face</option>
                                    <option value="fas fa-microphone">&#xf130;&nbsp;microphone</option>
                                    <option value="fas fa-microphone-alt">&#xf3c9;&nbsp;Alternate Microphone</option>
                                    <option value="fas fa-microphone-slash">&#xf131;&nbsp;Microphone Slash</option>
                                    <option value="fas fa-minus">&#xf068;&nbsp;minus</option>
                                    <option value="fas fa-minus-circle">&#xf056;&nbsp;Minus Circle</option>
                                    <option value="fas fa-minus-square">&#xf146;&nbsp;Minus Square</option>
                                    <option value="fas fa-paste">&#xf0ea;&nbsp;Paste</option>
                                    <option value="fas fa-pen">&#xf304;&nbsp;Pen</option>
                                    <option value="fas fa-pen-alt">&#xf305;&nbsp;Alternate Pen</option>
                                    <option value="fas fa-pen-fancy">&#xf5ac;&nbsp;Pen Fancy</option>
                                    <option value="fas fa-pencil-alt">&#xf303;&nbsp;Alternate Pencil</option>
                                    <option value="fas fa-plus">&#xf067;&nbsp;plus</option>
                                    <option value="fas fa-plus-circle">&#xf055;&nbsp;Plus Circle</option>
                                    <option value="fas fa-plus-square">&#xf0fe;&nbsp;Plus Square</option>
                                    <option value="fas fa-poo">&#xf2fe;&nbsp;Poo</option>
                                    <option value="fas fa-qrcode">&#xf029;&nbsp;qrcode</option>
                                    <option value="fas fa-question">&#xf128;&nbsp;Question</option>
                                    <option value="fas fa-question-circle">&#xf059;&nbsp;Question Circle</option>
                                    <option value="fas fa-quote-left">&#xf10d;&nbsp;quote-left</option>
                                    <option value="fas fa-quote-right">&#xf10e;&nbsp;quote-right</option>
                                    <option value="fas fa-redo">&#xf01e;&nbsp;Redo</option>
                                    <option value="fas fa-redo-alt">&#xf2f9;&nbsp;Alternate Redo</option>
                                    <option value="fas fa-reply">&#xf3e5;&nbsp;Reply</option>
                                    <option value="fas fa-reply-all">&#xf122;&nbsp;reply-all</option>
                                    <option value="fas fa-rss">&#xf09e;&nbsp;rss</option>
                                    <option value="fas fa-rss-square">&#xf143;&nbsp;RSS Square</option>
                                    <option value="fas fa-save">&#xf0c7;&nbsp;Save</option>
                                    <option value="fas fa-screwdriver">&#xf54a;&nbsp;Screwdriver</option>
                                    <option value="fas fa-search">&#xf002;&nbsp;Search</option>
                                    <option value="fas fa-search-minus">&#xf010;&nbsp;Search Minus</option>
                                    <option value="fas fa-search-plus">&#xf00e;&nbsp;Search Plus</option>
                                    <option value="fas fa-share">&#xf064;&nbsp;Share</option>
                                    <option value="fas fa-share-alt">&#xf1e0;&nbsp;Alternate Share</option>
                                    <option value="fas fa-share-alt-square">&#xf1e1;&nbsp;Alternate Share Square</option>
                                    <option value="fas fa-share-square">&#xf14d;&nbsp;Share Square</option>
                                    <option value="fas fa-shield-alt">&#xf3ed;&nbsp;Alternate Shield</option>
                                    <option value="fas fa-sign-in-alt">&#xf2f6;&nbsp;Alternate Sign In</option>
                                    <option value="fas fa-sign-out-alt">&#xf2f5;&nbsp;Alternate Sign Out</option>
                                    <option value="fas fa-signal">&#xf012;&nbsp;signal</option>
                                    <option value="fas fa-sitemap">&#xf0e8;&nbsp;Sitemap</option>
                                    <option value="fas fa-sliders-h">&#xf1de;&nbsp;Horizontal Sliders</option>
                                    <option value="fas fa-smile">&#xf118;&nbsp;Smiling Face</option>
                                    <option value="fas fa-sort">&#xf0dc;&nbsp;Sort</option>
                                    <option value="fas fa-sort-alpha-down">&#xf15d;&nbsp;Sort Alphabetical Down</option>
                                    <option value="fas fa-sort-alpha-down-alt">&#xf881;&nbsp;Alternate Sort Alphabetical Down</option>
                                    <option value="fas fa-sort-alpha-up">&#xf15e;&nbsp;Sort Alphabetical Up</option>
                                    <option value="fas fa-sort-alpha-up-alt">&#xf882;&nbsp;Alternate Sort Alphabetical Up</option>
                                    <option value="fas fa-sort-amount-down">&#xf160;&nbsp;Sort Amount Down</option>
                                    <option value="fas fa-sort-amount-down-alt">&#xf884;&nbsp;Alternate Sort Amount Down</option>
                                    <option value="fas fa-sort-amount-up">&#xf161;&nbsp;Sort Amount Up</option>
                                    <option value="fas fa-sort-amount-up-alt">&#xf885;&nbsp;Alternate Sort Amount Up</option>
                                    <option value="fas fa-sort-down">&#xf0dd;&nbsp;Sort Down (Descending)</option>
                                    <option value="fas fa-sort-numeric-down">&#xf162;&nbsp;Sort Numeric Down</option>
                                    <option value="fas fa-sort-numeric-down-alt">&#xf886;&nbsp;Alternate Sort Numeric Down</option>
                                    <option value="fas fa-sort-numeric-up">&#xf163;&nbsp;Sort Numeric Up</option>
                                    <option value="fas fa-sort-numeric-up-alt">&#xf887;&nbsp;Alternate Sort Numeric Up</option>
                                    <option value="fas fa-sort-up">&#xf0de;&nbsp;Sort Up (Ascending)</option>
                                    <option value="fas fa-star">&#xf005;&nbsp;Star</option>
                                    <option value="fas fa-star-half">&#xf089;&nbsp;star-half</option>
                                    <option value="fas fa-sync">&#xf021;&nbsp;Sync</option>
                                    <option value="fas fa-sync-alt">&#xf2f1;&nbsp;Alternate Sync</option>
                                    <option value="fas fa-thumbs-down">&#xf165;&nbsp;thumbs-down</option>
                                    <option value="fas fa-thumbs-up">&#xf164;&nbsp;thumbs-up</option>
                                    <option value="fas fa-times">&#xf00d;&nbsp;Times</option>
                                    <option value="fas fa-times-circle">&#xf057;&nbsp;Times Circle</option>
                                    <option value="fas fa-toggle-off">&#xf204;&nbsp;Toggle Off</option>
                                    <option value="fas fa-toggle-on">&#xf205;&nbsp;Toggle On</option>
                                    <option value="fas fa-tools">&#xf7d9;&nbsp;Tools</option>
                                    <option value="fas fa-trash">&#xf1f8;&nbsp;Trash</option>
                                    <option value="fas fa-trash-alt">&#xf2ed;&nbsp;Alternate Trash</option>
                                    <option value="fas fa-trash-restore">&#xf829;&nbsp;Trash Restore</option>
                                    <option value="fas fa-trash-restore-alt">&#xf82a;&nbsp;Alternative Trash Restore</option>
                                    <option value="fas fa-trophy">&#xf091;&nbsp;trophy</option>
                                    <option value="fas fa-undo">&#xf0e2;&nbsp;Undo</option>
                                    <option value="fas fa-undo-alt">&#xf2ea;&nbsp;Alternate Undo</option>
                                    <option value="fas fa-upload">&#xf093;&nbsp;Upload</option>
                                    <option value="fas fa-user">&#xf007;&nbsp;User</option>
                                    <option value="fas fa-user-alt">&#xf406;&nbsp;Alternate User</option>
                                    <option value="fas fa-user-circle">&#xf2bd;&nbsp;User Circle</option>
                                    <option value="fas fa-volume-down">&#xf027;&nbsp;Volume Down</option>
                                    <option value="fas fa-volume-mute">&#xf6a9;&nbsp;Volume Mute</option>
                                    <option value="fas fa-volume-off">&#xf026;&nbsp;Volume Off</option>
                                    <option value="fas fa-volume-up">&#xf028;&nbsp;Volume Up</option>
                                    <option value="fas fa-wifi">&#xf1eb;&nbsp;WiFi</option>
                                    <option value="fas fa-box">&#xf466;&nbsp;Box</option>
                                    <option value="fas fa-boxes">&#xf468;&nbsp;Boxes</option>
                                    <option value="fas fa-clipboard-check">&#xf46c;&nbsp;Clipboard with Check</option>
                                    <option value="fas fa-clipboard-list">&#xf46d;&nbsp;Clipboard List</option>
                                    <option value="fas fa-dolly">&#xf472;&nbsp;Dolly</option>
                                    <option value="fas fa-dolly-flatbed">&#xf474;&nbsp;Dolly Flatbed</option>
                                    <option value="fas fa-hard-hat">&#xf807;&nbsp;Hard Hat</option>
                                    <option value="fas fa-pallet">&#xf482;&nbsp;Pallet</option>
                                    <option value="fas fa-shipping-fast">&#xf48b;&nbsp;Shipping Fast</option>
                                    <option value="fas fa-truck">&#xf0d1;&nbsp;truck</option>
                                    <option value="fas fa-warehouse">&#xf494;&nbsp;Warehouse</option>
                                    <option value="fas fa-ambulance">&#xf0f9;&nbsp;ambulance</option>
                                    <option value="fas fa-anchor">&#xf13d;&nbsp;Anchor</option>
                                    <option value="fas fa-balance-scale">&#xf24e;&nbsp;Balance Scale</option>
                                    <option value="fas fa-balance-scale-left">&#xf515;&nbsp;Balance Scale (Left-Weighted)</option>
                                    <option value="fas fa-balance-scale-right">&#xf516;&nbsp;Balance Scale (Right-Weighted)</option>
                                    <option value="fas fa-bath">&#xf2cd;&nbsp;Bath</option>
                                    <option value="fas fa-bed">&#xf236;&nbsp;Bed</option>
                                    <option value="fas fa-beer">&#xf0fc;&nbsp;beer</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bell-slash">&#xf1f6;&nbsp;Bell Slash</option>
                                    <option value="fas fa-bicycle">&#xf206;&nbsp;Bicycle</option>
                                    <option value="fas fa-binoculars">&#xf1e5;&nbsp;Binoculars</option>
                                    <option value="fas fa-birthday-cake">&#xf1fd;&nbsp;Birthday Cake</option>
                                    <option value="fas fa-blind">&#xf29d;&nbsp;Blind</option>
                                    <option value="fas fa-bomb">&#xf1e2;&nbsp;Bomb</option>
                                    <option value="fas fa-book">&#xf02d;&nbsp;book</option>
                                    <option value="fas fa-bookmark">&#xf02e;&nbsp;bookmark</option>
                                    <option value="fas fa-briefcase">&#xf0b1;&nbsp;Briefcase</option>
                                    <option value="fas fa-building">&#xf1ad;&nbsp;Building</option>
                                    <option value="fas fa-car">&#xf1b9;&nbsp;Car</option>
                                    <option value="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-crosshairs">&#xf05b;&nbsp;Crosshairs</option>
                                    <option value="fas fa-directions">&#xf5eb;&nbsp;Directions</option>
                                    <option value="fas fa-dollar-sign">&#xf155;&nbsp;Dollar Sign</option>
                                    <option value="fas fa-draw-polygon">&#xf5ee;&nbsp;Draw Polygon</option>
                                    <option value="fas fa-eye">&#xf06e;&nbsp;Eye</option>
                                    <option value="fas fa-eye-slash">&#xf070;&nbsp;Eye Slash</option>
                                    <option value="fas fa-fighter-jet">&#xf0fb;&nbsp;fighter-jet</option>
                                    <option value="fas fa-fire">&#xf06d;&nbsp;fire</option>
                                    <option value="fas fa-fire-alt">&#xf7e4;&nbsp;Alternate Fire</option>
                                    <option value="fas fa-fire-extinguisher">&#xf134;&nbsp;fire-extinguisher</option>
                                    <option value="fas fa-flag">&#xf024;&nbsp;flag</option>
                                    <option value="fas fa-flag-checkered">&#xf11e;&nbsp;flag-checkered</option>
                                    <option value="fas fa-flask">&#xf0c3;&nbsp;Flask</option>
                                    <option value="fas fa-gamepad">&#xf11b;&nbsp;Gamepad</option>
                                    <option value="fas fa-gavel">&#xf0e3;&nbsp;Gavel</option>
                                    <option value="fas fa-gift">&#xf06b;&nbsp;gift</option>
                                    <option value="fas fa-glass-martini">&#xf000;&nbsp;Martini Glass</option>
                                    <option value="fas fa-globe">&#xf0ac;&nbsp;Globe</option>
                                    <option value="fas fa-graduation-cap">&#xf19d;&nbsp;Graduation Cap</option>
                                    <option value="fas fa-h-square">&#xf0fd;&nbsp;H Square</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-heartbeat">&#xf21e;&nbsp;Heartbeat</option>
                                    <option value="fas fa-helicopter">&#xf533;&nbsp;Helicopter</option>
                                    <option value="fas fa-home">&#xf015;&nbsp;home</option>
                                    <option value="fas fa-hospital">&#xf0f8;&nbsp;hospital</option>
                                    <option value="fas fa-image">&#xf03e;&nbsp;Image</option>
                                    <option value="fas fa-images">&#xf302;&nbsp;Images</option>
                                    <option value="fas fa-industry">&#xf275;&nbsp;Industry</option>
                                    <option value="fas fa-info">&#xf129;&nbsp;Info</option>
                                    <option value="fas fa-info-circle">&#xf05a;&nbsp;Info Circle</option>
                                    <option value="fas fa-key">&#xf084;&nbsp;key</option>
                                    <option value="fas fa-landmark">&#xf66f;&nbsp;Landmark</option>
                                    <option value="fas fa-layer-group">&#xf5fd;&nbsp;Layer Group</option>
                                    <option value="fas fa-leaf">&#xf06c;&nbsp;leaf</option>
                                    <option value="fas fa-lemon">&#xf094;&nbsp;Lemon</option>
                                    <option value="fas fa-life-ring">&#xf1cd;&nbsp;Life Ring</option>
                                    <option value="fas fa-lightbulb">&#xf0eb;&nbsp;Lightbulb</option>
                                    <option value="fas fa-location-arrow">&#xf124;&nbsp;location-arrow</option>
                                    <option value="fas fa-low-vision">&#xf2a8;&nbsp;Low Vision</option>
                                    <option value="fas fa-magnet">&#xf076;&nbsp;magnet</option>
                                    <option value="fas fa-male">&#xf183;&nbsp;Male</option>
                                    <option value="fas fa-map">&#xf279;&nbsp;Map</option>
                                    <option value="fas fa-map-marker">&#xf041;&nbsp;map-marker</option>
                                    <option value="fas fa-map-marker-alt">&#xf3c5;&nbsp;Alternate Map Marker</option>
                                    <option value="fas fa-map-pin">&#xf276;&nbsp;Map Pin</option>
                                    <option value="fas fa-map-signs">&#xf277;&nbsp;Map Signs</option>
                                    <option value="fas fa-medkit">&#xf0fa;&nbsp;medkit</option>
                                    <option value="fas fa-money-bill">&#xf0d6;&nbsp;Money Bill</option>
                                    <option value="fas fa-money-bill-alt">&#xf3d1;&nbsp;Alternate Money Bill</option>
                                    <option value="fas fa-motorcycle">&#xf21c;&nbsp;Motorcycle</option>
                                    <option value="fas fa-music">&#xf001;&nbsp;Music</option>
                                    <option value="fas fa-newspaper">&#xf1ea;&nbsp;Newspaper</option>
                                    <option value="fas fa-parking">&#xf540;&nbsp;Parking</option>
                                    <option value="fas fa-paw">&#xf1b0;&nbsp;Paw</option>
                                    <option value="fas fa-phone">&#xf095;&nbsp;Phone</option>
                                    <option value="fas fa-phone-alt">&#xf879;&nbsp;Alternate Phone</option>
                                    <option value="fas fa-phone-square">&#xf098;&nbsp;Phone Square</option>
                                    <option value="fas fa-phone-square-alt">&#xf87b;&nbsp;Alternate Phone Square</option>
                                    <option value="fas fa-phone-volume">&#xf2a0;&nbsp;Phone Volume</option>
                                    <option value="fas fa-plane">&#xf072;&nbsp;plane</option>
                                    <option value="fas fa-plug">&#xf1e6;&nbsp;Plug</option>
                                    <option value="fas fa-plus">&#xf067;&nbsp;plus</option>
                                    <option value="fas fa-plus-square">&#xf0fe;&nbsp;Plus Square</option>
                                    <option value="fas fa-print">&#xf02f;&nbsp;print</option>
                                    <option value="fas fa-recycle">&#xf1b8;&nbsp;Recycle</option>
                                    <option value="fas fa-restroom">&#xf7bd;&nbsp;Restroom</option>
                                    <option value="fas fa-road">&#xf018;&nbsp;road</option>
                                    <option value="fas fa-rocket">&#xf135;&nbsp;rocket</option>
                                    <option value="fas fa-route">&#xf4d7;&nbsp;Route</option>
                                    <option value="fas fa-search">&#xf002;&nbsp;Search</option>
                                    <option value="fas fa-search-minus">&#xf010;&nbsp;Search Minus</option>
                                    <option value="fas fa-search-plus">&#xf00e;&nbsp;Search Plus</option>
                                    <option value="fas fa-ship">&#xf21a;&nbsp;Ship</option>
                                    <option value="fas fa-shoe-prints">&#xf54b;&nbsp;Shoe Prints</option>
                                    <option value="fas fa-shopping-bag">&#xf290;&nbsp;Shopping Bag</option>
                                    <option value="fas fa-shopping-basket">&#xf291;&nbsp;Shopping Basket</option>
                                    <option value="fas fa-shopping-cart">&#xf07a;&nbsp;shopping-cart</option>
                                    <option value="fas fa-shower">&#xf2cc;&nbsp;Shower</option>
                                    <option value="fas fa-snowplow">&#xf7d2;&nbsp;Snowplow</option>
                                    <option value="fas fa-street-view">&#xf21d;&nbsp;Street View</option>
                                    <option value="fas fa-subway">&#xf239;&nbsp;Subway</option>
                                    <option value="fas fa-suitcase">&#xf0f2;&nbsp;Suitcase</option>
                                    <option value="fas fa-tag">&#xf02b;&nbsp;tag</option>
                                    <option value="fas fa-tags">&#xf02c;&nbsp;tags</option>
                                    <option value="fas fa-taxi">&#xf1ba;&nbsp;Taxi</option>
                                    <option value="fas fa-thumbtack">&#xf08d;&nbsp;Thumbtack</option>
                                    <option value="fas fa-ticket-alt">&#xf3ff;&nbsp;Alternate Ticket</option>
                                    <option value="fas fa-tint">&#xf043;&nbsp;tint</option>
                                    <option value="fas fa-traffic-light">&#xf637;&nbsp;Traffic Light</option>
                                    <option value="fas fa-train">&#xf238;&nbsp;Train</option>
                                    <option value="fas fa-tram">&#xf7da;&nbsp;Tram</option>
                                    <option value="fas fa-tree">&#xf1bb;&nbsp;Tree</option>
                                    <option value="fas fa-trophy">&#xf091;&nbsp;trophy</option>
                                    <option value="fas fa-truck">&#xf0d1;&nbsp;truck</option>
                                    <option value="fas fa-tty">&#xf1e4;&nbsp;TTY</option>
                                    <option value="fas fa-umbrella">&#xf0e9;&nbsp;Umbrella</option>
                                    <option value="fas fa-university">&#xf19c;&nbsp;University</option>
                                    <option value="fas fa-utensil-spoon">&#xf2e5;&nbsp;Utensil Spoon</option>
                                    <option value="fas fa-utensils">&#xf2e7;&nbsp;Utensils</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-wifi">&#xf1eb;&nbsp;WiFi</option>
                                    <option value="fas fa-wine-glass">&#xf4e3;&nbsp;Wine Glass</option>
                                    <option value="fas fa-wrench">&#xf0ad;&nbsp;Wrench</option>
                                    <option value="fas fa-anchor">&#xf13d;&nbsp;Anchor</option>
                                    <option value="fas fa-binoculars">&#xf1e5;&nbsp;Binoculars</option>
                                    <option value="fas fa-compass">&#xf14e;&nbsp;Compass</option>
                                    <option value="fas fa-dharmachakra">&#xf655;&nbsp;Dharmachakra</option>
                                    <option value="fas fa-frog">&#xf52e;&nbsp;Frog</option>
                                    <option value="fas fa-ship">&#xf21a;&nbsp;Ship</option>
                                    <option value="fas fa-skull-crossbones">&#xf714;&nbsp;Skull & Crossbones</option>
                                    <option value="fas fa-swimmer">&#xf5c4;&nbsp;Swimmer</option>
                                    <option value="fas fa-water">&#xf773;&nbsp;Water</option>
                                    <option value="fas fa-wind">&#xf72e;&nbsp;Wind</option>
                                    <option value="fas fa-ad">&#xf641;&nbsp;Ad</option>
                                    <option value="fas fa-bullhorn">&#xf0a1;&nbsp;bullhorn</option>
                                    <option value="fas fa-bullseye">&#xf140;&nbsp;Bullseye</option>
                                    <option value="fas fa-comment-dollar">&#xf651;&nbsp;Comment Dollar</option>
                                    <option value="fas fa-comments-dollar">&#xf653;&nbsp;Comments Dollar</option>
                                    <option value="fas fa-envelope-open-text">&#xf658;&nbsp;Envelope Open-text</option>
                                    <option value="fas fa-funnel-dollar">&#xf662;&nbsp;Funnel Dollar</option>
                                    <option value="fas fa-lightbulb">&#xf0eb;&nbsp;Lightbulb</option>
                                    <option value="fas fa-mail-bulk">&#xf674;&nbsp;Mail Bulk</option>
                                    <option value="fas fa-poll">&#xf681;&nbsp;Poll</option>
                                    <option value="fas fa-poll-h">&#xf682;&nbsp;Poll H</option>
                                    <option value="fas fa-search-dollar">&#xf688;&nbsp;Search Dollar</option>
                                    <option value="fas fa-search-location">&#xf689;&nbsp;Search Location</option>
                                    <option value="fas fa-calculator">&#xf1ec;&nbsp;Calculator</option>
                                    <option value="fas fa-divide">&#xf529;&nbsp;Divide</option>
                                    <option value="fas fa-equals">&#xf52c;&nbsp;Equals</option>
                                    <option value="fas fa-greater-than">&#xf531;&nbsp;Greater Than</option>
                                    <option value="fas fa-greater-than-equal">&#xf532;&nbsp;Greater Than Equal To</option>
                                    <option value="fas fa-infinity">&#xf534;&nbsp;Infinity</option>
                                    <option value="fas fa-less-than">&#xf536;&nbsp;Less Than</option>
                                    <option value="fas fa-less-than-equal">&#xf537;&nbsp;Less Than Equal To</option>
                                    <option value="fas fa-minus">&#xf068;&nbsp;minus</option>
                                    <option value="fas fa-not-equal">&#xf53e;&nbsp;Not Equal</option>
                                    <option value="fas fa-percentage">&#xf541;&nbsp;Percentage</option>
                                    <option value="fas fa-plus">&#xf067;&nbsp;plus</option>
                                    <option value="fas fa-square-root-alt">&#xf698;&nbsp;Alternate Square Root</option>
                                    <option value="fas fa-subscript">&#xf12c;&nbsp;subscript</option>
                                    <option value="fas fa-superscript">&#xf12b;&nbsp;superscript</option>
                                    <option value="fas fa-times">&#xf00d;&nbsp;Times</option>
                                    <option value="fas fa-wave-square">&#xf83e;&nbsp;Square Wave</option>
                                    <option value="fas fa-allergies">&#xf461;&nbsp;Allergies</option>
                                    <option value="fas fa-ambulance">&#xf0f9;&nbsp;ambulance</option>
                                    <option value="fas fa-bacteria">&#xe059;&nbsp;Bacteria</option>
                                    <option value="fas fa-bacterium">&#xe05a;&nbsp;Bacterium</option>
                                    <option value="fas fa-band-aid">&#xf462;&nbsp;Band-Aid</option>
                                    <option value="fas fa-biohazard">&#xf780;&nbsp;Biohazard</option>
                                    <option value="fas fa-bone">&#xf5d7;&nbsp;Bone</option>
                                    <option value="fas fa-bong">&#xf55c;&nbsp;Bong</option>
                                    <option value="fas fa-book-medical">&#xf7e6;&nbsp;Medical Book</option>
                                    <option value="fas fa-brain">&#xf5dc;&nbsp;Brain</option>
                                    <option value="fas fa-briefcase-medical">&#xf469;&nbsp;Medical Briefcase</option>
                                    <option value="fas fa-burn">&#xf46a;&nbsp;Burn</option>
                                    <option value="fas fa-cannabis">&#xf55f;&nbsp;Cannabis</option>
                                    <option value="fas fa-capsules">&#xf46b;&nbsp;Capsules</option>
                                    <option value="fas fa-clinic-medical">&#xf7f2;&nbsp;Medical Clinic</option>
                                    <option value="fas fa-comment-medical">&#xf7f5;&nbsp;Alternate Medical Chat</option>
                                    <option value="fas fa-crutch">&#xf7f7;&nbsp;Crutch</option>
                                    <option value="fas fa-diagnoses">&#xf470;&nbsp;Diagnoses</option>
                                    <option value="fas fa-disease">&#xf7fa;&nbsp;Disease</option>
                                    <option value="fas fa-dna">&#xf471;&nbsp;DNA</option>
                                    <option value="fas fa-file-medical">&#xf477;&nbsp;Medical File</option>
                                    <option value="fas fa-file-medical-alt">&#xf478;&nbsp;Alternate Medical File</option>
                                    <option value="fas fa-file-prescription">&#xf572;&nbsp;File Prescription</option>
                                    <option value="fas fa-first-aid">&#xf479;&nbsp;First Aid</option>
                                    <option value="fas fa-hand-holding-medical">&#xe05c;&nbsp;Hand Holding Medical Cross</option>
                                    <option value="fas fa-head-side-cough">&#xe061;&nbsp;Head Side Cough</option>
                                    <option value="fas fa-head-side-cough-slash">&#xe062;&nbsp;Head Side-cough-slash</option>
                                    <option value="fas fa-head-side-mask">&#xe063;&nbsp;Head Side Mask</option>
                                    <option value="fas fa-head-side-virus">&#xe064;&nbsp;Head Side Virus</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-heartbeat">&#xf21e;&nbsp;Heartbeat</option>
                                    <option value="fas fa-hospital">&#xf0f8;&nbsp;hospital</option>
                                    <option value="fas fa-hospital-alt">&#xf47d;&nbsp;Alternate Hospital</option>
                                    <option value="fas fa-hospital-symbol">&#xf47e;&nbsp;Hospital Symbol</option>
                                    <option value="fas fa-hospital-user">&#xf80d;&nbsp;Hospital with User</option>
                                    <option value="fas fa-id-card-alt">&#xf47f;&nbsp;Alternate Identification Card</option>
                                    <option value="fas fa-joint">&#xf595;&nbsp;Joint</option>
                                    <option value="fas fa-laptop-medical">&#xf812;&nbsp;Laptop Medical</option>
                                    <option value="fas fa-lungs">&#xf604;&nbsp;Lungs</option>
                                    <option value="fas fa-lungs-virus">&#xe067;&nbsp;Lungs Virus</option>
                                    <option value="fas fa-microscope">&#xf610;&nbsp;Microscope</option>
                                    <option value="fas fa-mortar-pestle">&#xf5a7;&nbsp;Mortar Pestle</option>
                                    <option value="fas fa-notes-medical">&#xf481;&nbsp;Medical Notes</option>
                                    <option value="fas fa-pager">&#xf815;&nbsp;Pager</option>
                                    <option value="fas fa-pills">&#xf484;&nbsp;Pills</option>
                                    <option value="fas fa-plus">&#xf067;&nbsp;plus</option>
                                    <option value="fas fa-poop">&#xf619;&nbsp;Poop</option>
                                    <option value="fas fa-prescription">&#xf5b1;&nbsp;Prescription</option>
                                    <option value="fas fa-prescription-bottle">&#xf485;&nbsp;Prescription Bottle</option>
                                    <option value="fas fa-prescription-bottle-alt">&#xf486;&nbsp;Alternate Prescription Bottle</option>
                                    <option value="fas fa-procedures">&#xf487;&nbsp;Procedures</option>
                                    <option value="fas fa-pump-medical">&#xe06a;&nbsp;Pump Medical</option>
                                    <option value="fas fa-radiation">&#xf7b9;&nbsp;Radiation</option>
                                    <option value="fas fa-radiation-alt">&#xf7ba;&nbsp;Alternate Radiation</option>
                                    <option value="fas fa-shield-virus">&#xe06c;&nbsp;Shield Virus</option>
                                    <option value="fas fa-smoking">&#xf48d;&nbsp;Smoking</option>
                                    <option value="fas fa-smoking-ban">&#xf54d;&nbsp;Smoking Ban</option>
                                    <option value="fas fa-star-of-life">&#xf621;&nbsp;Star of Life</option>
                                    <option value="fas fa-stethoscope">&#xf0f1;&nbsp;Stethoscope</option>
                                    <option value="fas fa-syringe">&#xf48e;&nbsp;Syringe</option>
                                    <option value="fas fa-tablets">&#xf490;&nbsp;Tablets</option>
                                    <option value="fas fa-teeth">&#xf62e;&nbsp;Teeth</option>
                                    <option value="fas fa-teeth-open">&#xf62f;&nbsp;Teeth Open</option>
                                    <option value="fas fa-thermometer">&#xf491;&nbsp;Thermometer</option>
                                    <option value="fas fa-tooth">&#xf5c9;&nbsp;Tooth</option>
                                    <option value="fas fa-user-md">&#xf0f0;&nbsp;Doctor</option>
                                    <option value="fas fa-user-nurse">&#xf82f;&nbsp;Nurse</option>
                                    <option value="fas fa-vial">&#xf492;&nbsp;Vial</option>
                                    <option value="fas fa-vials">&#xf493;&nbsp;Vials</option>
                                    <option value="fas fa-virus">&#xe074;&nbsp;Virus</option>
                                    <option value="fas fa-virus-slash">&#xe075;&nbsp;Virus Slash</option>
                                    <option value="fas fa-viruses">&#xe076;&nbsp;Viruses</option>
                                    <option value="fas fa-weight">&#xf496;&nbsp;Weight</option>
                                    <option value="fas fa-x-ray">&#xf497;&nbsp;X-Ray</option>
                                    <option value="fas fa-archive">&#xf187;&nbsp;Archive</option>
                                    <option value="fas fa-box-open">&#xf49e;&nbsp;Box Open</option>
                                    <option value="fas fa-caravan">&#xf8ff;&nbsp;Caravan</option>
                                    <option value="fas fa-couch">&#xf4b8;&nbsp;Couch</option>
                                    <option value="fas fa-dolly">&#xf472;&nbsp;Dolly</option>
                                    <option value="fas fa-people-carry">&#xf4ce;&nbsp;People Carry</option>
                                    <option value="fas fa-route">&#xf4d7;&nbsp;Route</option>
                                    <option value="fas fa-sign">&#xf4d9;&nbsp;Sign</option>
                                    <option value="fas fa-suitcase">&#xf0f2;&nbsp;Suitcase</option>
                                    <option value="fas fa-tape">&#xf4db;&nbsp;Tape</option>
                                    <option value="fas fa-trailer">&#xe041;&nbsp;Trailer</option>
                                    <option value="fas fa-truck-loading">&#xf4de;&nbsp;Truck Loading</option>
                                    <option value="fas fa-truck-moving">&#xf4df;&nbsp;Truck Moving</option>
                                    <option value="fas fa-wine-glass">&#xf4e3;&nbsp;Wine Glass</option>
                                    <option value="fas fa-drum">&#xf569;&nbsp;Drum</option>
                                    <option value="fas fa-drum-steelpan">&#xf56a;&nbsp;Drum Steelpan</option>
                                    <option value="fas fa-file-audio">&#xf1c7;&nbsp;Audio File</option>
                                    <option value="fas fa-guitar">&#xf7a6;&nbsp;Guitar</option>
                                    <option value="fas fa-headphones">&#xf025;&nbsp;headphones</option>
                                    <option value="fas fa-headphones-alt">&#xf58f;&nbsp;Alternate Headphones</option>
                                    <option value="fas fa-microphone">&#xf130;&nbsp;microphone</option>
                                    <option value="fas fa-microphone-alt">&#xf3c9;&nbsp;Alternate Microphone</option>
                                    <option value="fas fa-microphone-alt-slash">&#xf539;&nbsp;Alternate Microphone Slash</option>
                                    <option value="fas fa-microphone-slash">&#xf131;&nbsp;Microphone Slash</option>
                                    <option value="fas fa-music">&#xf001;&nbsp;Music</option>
                                    <option value="fas fa-napster">&#xf3d2;&nbsp;Napster</option>
                                    <option value="fas fa-play">&#xf04b;&nbsp;play</option>
                                    <option value="fas fa-record-vinyl">&#xf8d9;&nbsp;Record Vinyl</option>
                                    <option value="fas fa-sliders-h">&#xf1de;&nbsp;Horizontal Sliders</option>
                                    <option value="fas fa-soundcloud">&#xf1be;&nbsp;SoundCloud</option>
                                    <option value="fas fa-spotify">&#xf1bc;&nbsp;Spotify</option>
                                    <option value="fas fa-volume-down">&#xf027;&nbsp;Volume Down</option>
                                    <option value="fas fa-volume-mute">&#xf6a9;&nbsp;Volume Mute</option>
                                    <option value="fas fa-volume-off">&#xf026;&nbsp;Volume Off</option>
                                    <option value="fas fa-volume-up">&#xf028;&nbsp;Volume Up</option>
                                    <option value="fas fa-ambulance">&#xf0f9;&nbsp;ambulance</option>
                                    <option value="fas fa-anchor">&#xf13d;&nbsp;Anchor</option>
                                    <option value="fas fa-archive">&#xf187;&nbsp;Archive</option>
                                    <option value="fas fa-award">&#xf559;&nbsp;Award</option>
                                    <option value="fas fa-baby-carriage">&#xf77d;&nbsp;Baby Carriage</option>
                                    <option value="fas fa-balance-scale">&#xf24e;&nbsp;Balance Scale</option>
                                    <option value="fas fa-balance-scale-left">&#xf515;&nbsp;Balance Scale (Left-Weighted)</option>
                                    <option value="fas fa-balance-scale-right">&#xf516;&nbsp;Balance Scale (Right-Weighted)</option>
                                    <option value="fas fa-bath">&#xf2cd;&nbsp;Bath</option>
                                    <option value="fas fa-bed">&#xf236;&nbsp;Bed</option>
                                    <option value="fas fa-beer">&#xf0fc;&nbsp;beer</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bicycle">&#xf206;&nbsp;Bicycle</option>
                                    <option value="fas fa-binoculars">&#xf1e5;&nbsp;Binoculars</option>
                                    <option value="fas fa-birthday-cake">&#xf1fd;&nbsp;Birthday Cake</option>
                                    <option value="fas fa-blender">&#xf517;&nbsp;Blender</option>
                                    <option value="fas fa-bomb">&#xf1e2;&nbsp;Bomb</option>
                                    <option value="fas fa-book">&#xf02d;&nbsp;book</option>
                                    <option value="fas fa-book-dead">&#xf6b7;&nbsp;Book of the Dead</option>
                                    <option value="fas fa-bookmark">&#xf02e;&nbsp;bookmark</option>
                                    <option value="fas fa-briefcase">&#xf0b1;&nbsp;Briefcase</option>
                                    <option value="fas fa-broadcast-tower">&#xf519;&nbsp;Broadcast Tower</option>
                                    <option value="fas fa-bug">&#xf188;&nbsp;Bug</option>
                                    <option value="fas fa-building">&#xf1ad;&nbsp;Building</option>
                                    <option value="fas fa-bullhorn">&#xf0a1;&nbsp;bullhorn</option>
                                    <option value="fas fa-bullseye">&#xf140;&nbsp;Bullseye</option>
                                    <option value="fas fa-bus">&#xf207;&nbsp;Bus</option>
                                    <option value="fas fa-calculator">&#xf1ec;&nbsp;Calculator</option>
                                    <option value="fas fa-calendar">&#xf133;&nbsp;Calendar</option>
                                    <option value="fas fa-calendar-alt">&#xf073;&nbsp;Alternate Calendar</option>
                                    <option value="fas fa-camera">&#xf030;&nbsp;camera</option>
                                    <option value="fas fa-camera-retro">&#xf083;&nbsp;Retro Camera</option>
                                    <option value="fas fa-candy-cane">&#xf786;&nbsp;Candy Cane</option>
                                    <option value="fas fa-car">&#xf1b9;&nbsp;Car</option>
                                    <option value="fas fa-carrot">&#xf787;&nbsp;Carrot</option>
                                    <option value="fas fa-church">&#xf51d;&nbsp;Church</option>
                                    <option value="fas fa-clipboard">&#xf328;&nbsp;Clipboard</option>
                                    <option value="fas fa-cloud">&#xf0c2;&nbsp;Cloud</option>
                                    <option value="fas fa-coffee">&#xf0f4;&nbsp;Coffee</option>
                                    <option value="fas fa-cog">&#xf013;&nbsp;cog</option>
                                    <option value="fas fa-cogs">&#xf085;&nbsp;cogs</option>
                                    <option value="fas fa-compass">&#xf14e;&nbsp;Compass</option>
                                    <option value="fas fa-cookie">&#xf563;&nbsp;Cookie</option>
                                    <option value="fas fa-cookie-bite">&#xf564;&nbsp;Cookie Bite</option>
                                    <option value="fas fa-copy">&#xf0c5;&nbsp;Copy</option>
                                    <option value="fas fa-cube">&#xf1b2;&nbsp;Cube</option>
                                    <option value="fas fa-cubes">&#xf1b3;&nbsp;Cubes</option>
                                    <option value="fas fa-cut">&#xf0c4;&nbsp;Cut</option>
                                    <option value="fas fa-dice">&#xf522;&nbsp;Dice</option>
                                    <option value="fas fa-dice-d20">&#xf6cf;&nbsp;Dice D20</option>
                                    <option value="fas fa-dice-d6">&#xf6d1;&nbsp;Dice D6</option>
                                    <option value="fas fa-dice-five">&#xf523;&nbsp;Dice Five</option>
                                    <option value="fas fa-dice-four">&#xf524;&nbsp;Dice Four</option>
                                    <option value="fas fa-dice-one">&#xf525;&nbsp;Dice One</option>
                                    <option value="fas fa-dice-six">&#xf526;&nbsp;Dice Six</option>
                                    <option value="fas fa-dice-three">&#xf527;&nbsp;Dice Three</option>
                                    <option value="fas fa-dice-two">&#xf528;&nbsp;Dice Two</option>
                                    <option value="fas fa-digital-tachograph">&#xf566;&nbsp;Digital Tachograph</option>
                                    <option value="fas fa-door-closed">&#xf52a;&nbsp;Door Closed</option>
                                    <option value="fas fa-door-open">&#xf52b;&nbsp;Door Open</option>
                                    <option value="fas fa-drum">&#xf569;&nbsp;Drum</option>
                                    <option value="fas fa-drum-steelpan">&#xf56a;&nbsp;Drum Steelpan</option>
                                    <option value="fas fa-envelope">&#xf0e0;&nbsp;Envelope</option>
                                    <option value="fas fa-envelope-open">&#xf2b6;&nbsp;Envelope Open</option>
                                    <option value="fas fa-eraser">&#xf12d;&nbsp;eraser</option>
                                    <option value="fas fa-eye">&#xf06e;&nbsp;Eye</option>
                                    <option value="fas fa-eye-dropper">&#xf1fb;&nbsp;Eye Dropper</option>
                                    <option value="fas fa-fax">&#xf1ac;&nbsp;Fax</option>
                                    <option value="fas fa-feather">&#xf52d;&nbsp;Feather</option>
                                    <option value="fas fa-feather-alt">&#xf56b;&nbsp;Alternate Feather</option>
                                    <option value="fas fa-fighter-jet">&#xf0fb;&nbsp;fighter-jet</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-file-prescription">&#xf572;&nbsp;File Prescription</option>
                                    <option value="fas fa-film">&#xf008;&nbsp;Film</option>
                                    <option value="fas fa-fire">&#xf06d;&nbsp;fire</option>
                                    <option value="fas fa-fire-alt">&#xf7e4;&nbsp;Alternate Fire</option>
                                    <option value="fas fa-fire-extinguisher">&#xf134;&nbsp;fire-extinguisher</option>
                                    <option value="fas fa-flag">&#xf024;&nbsp;flag</option>
                                    <option value="fas fa-flag-checkered">&#xf11e;&nbsp;flag-checkered</option>
                                    <option value="fas fa-flask">&#xf0c3;&nbsp;Flask</option>
                                    <option value="fas fa-futbol">&#xf1e3;&nbsp;Futbol</option>
                                    <option value="fas fa-gamepad">&#xf11b;&nbsp;Gamepad</option>
                                    <option value="fas fa-gavel">&#xf0e3;&nbsp;Gavel</option>
                                    <option value="fas fa-gem">&#xf3a5;&nbsp;Gem</option>
                                    <option value="fas fa-gift">&#xf06b;&nbsp;gift</option>
                                    <option value="fas fa-gifts">&#xf79c;&nbsp;Gifts</option>
                                    <option value="fas fa-glass-cheers">&#xf79f;&nbsp;Glass Cheers</option>
                                    <option value="fas fa-glass-martini">&#xf000;&nbsp;Martini Glass</option>
                                    <option value="fas fa-glass-whiskey">&#xf7a0;&nbsp;Glass Whiskey</option>
                                    <option value="fas fa-glasses">&#xf530;&nbsp;Glasses</option>
                                    <option value="fas fa-globe">&#xf0ac;&nbsp;Globe</option>
                                    <option value="fas fa-graduation-cap">&#xf19d;&nbsp;Graduation Cap</option>
                                    <option value="fas fa-guitar">&#xf7a6;&nbsp;Guitar</option>
                                    <option value="fas fa-hat-wizard">&#xf6e8;&nbsp;Wizard's Hat</option>
                                    <option value="fas fa-hdd">&#xf0a0;&nbsp;HDD</option>
                                    <option value="fas fa-headphones">&#xf025;&nbsp;headphones</option>
                                    <option value="fas fa-headphones-alt">&#xf58f;&nbsp;Alternate Headphones</option>
                                    <option value="fas fa-headset">&#xf590;&nbsp;Headset</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-heart-broken">&#xf7a9;&nbsp;Heart Broken</option>
                                    <option value="fas fa-helicopter">&#xf533;&nbsp;Helicopter</option>
                                    <option value="fas fa-highlighter">&#xf591;&nbsp;Highlighter</option>
                                    <option value="fas fa-holly-berry">&#xf7aa;&nbsp;Holly Berry</option>
                                    <option value="fas fa-home">&#xf015;&nbsp;home</option>
                                    <option value="fas fa-hospital">&#xf0f8;&nbsp;hospital</option>
                                    <option value="fas fa-hourglass">&#xf254;&nbsp;Hourglass</option>
                                    <option value="fas fa-igloo">&#xf7ae;&nbsp;Igloo</option>
                                    <option value="fas fa-image">&#xf03e;&nbsp;Image</option>
                                    <option value="fas fa-images">&#xf302;&nbsp;Images</option>
                                    <option value="fas fa-industry">&#xf275;&nbsp;Industry</option>
                                    <option value="fas fa-key">&#xf084;&nbsp;key</option>
                                    <option value="fas fa-keyboard">&#xf11c;&nbsp;Keyboard</option>
                                    <option value="fas fa-laptop">&#xf109;&nbsp;Laptop</option>
                                    <option value="fas fa-leaf">&#xf06c;&nbsp;leaf</option>
                                    <option value="fas fa-lemon">&#xf094;&nbsp;Lemon</option>
                                    <option value="fas fa-life-ring">&#xf1cd;&nbsp;Life Ring</option>
                                    <option value="fas fa-lightbulb">&#xf0eb;&nbsp;Lightbulb</option>
                                    <option value="fas fa-lock">&#xf023;&nbsp;lock</option>
                                    <option value="fas fa-lock-open">&#xf3c1;&nbsp;Lock Open</option>
                                    <option value="fas fa-magic">&#xf0d0;&nbsp;magic</option>
                                    <option value="fas fa-magnet">&#xf076;&nbsp;magnet</option>
                                    <option value="fas fa-map">&#xf279;&nbsp;Map</option>
                                    <option value="fas fa-map-marker">&#xf041;&nbsp;map-marker</option>
                                    <option value="fas fa-map-marker-alt">&#xf3c5;&nbsp;Alternate Map Marker</option>
                                    <option value="fas fa-map-pin">&#xf276;&nbsp;Map Pin</option>
                                    <option value="fas fa-map-signs">&#xf277;&nbsp;Map Signs</option>
                                    <option value="fas fa-marker">&#xf5a1;&nbsp;Marker</option>
                                    <option value="fas fa-medal">&#xf5a2;&nbsp;Medal</option>
                                    <option value="fas fa-medkit">&#xf0fa;&nbsp;medkit</option>
                                    <option value="fas fa-memory">&#xf538;&nbsp;Memory</option>
                                    <option value="fas fa-microchip">&#xf2db;&nbsp;Microchip</option>
                                    <option value="fas fa-microphone">&#xf130;&nbsp;microphone</option>
                                    <option value="fas fa-microphone-alt">&#xf3c9;&nbsp;Alternate Microphone</option>
                                    <option value="fas fa-mitten">&#xf7b5;&nbsp;Mitten</option>
                                    <option value="fas fa-mobile">&#xf10b;&nbsp;Mobile Phone</option>
                                    <option value="fas fa-mobile-alt">&#xf3cd;&nbsp;Alternate Mobile</option>
                                    <option value="fas fa-money-bill">&#xf0d6;&nbsp;Money Bill</option>
                                    <option value="fas fa-money-bill-alt">&#xf3d1;&nbsp;Alternate Money Bill</option>
                                    <option value="fas fa-money-check">&#xf53c;&nbsp;Money Check</option>
                                    <option value="fas fa-money-check-alt">&#xf53d;&nbsp;Alternate Money Check</option>
                                    <option value="fas fa-moon">&#xf186;&nbsp;Moon</option>
                                    <option value="fas fa-motorcycle">&#xf21c;&nbsp;Motorcycle</option>
                                    <option value="fas fa-mug-hot">&#xf7b6;&nbsp;Mug Hot</option>
                                    <option value="fas fa-newspaper">&#xf1ea;&nbsp;Newspaper</option>
                                    <option value="fas fa-paint-brush">&#xf1fc;&nbsp;Paint Brush</option>
                                    <option value="fas fa-paper-plane">&#xf1d8;&nbsp;Paper Plane</option>
                                    <option value="fas fa-paperclip">&#xf0c6;&nbsp;Paperclip</option>
                                    <option value="fas fa-paste">&#xf0ea;&nbsp;Paste</option>
                                    <option value="fas fa-paw">&#xf1b0;&nbsp;Paw</option>
                                    <option value="fas fa-pen">&#xf304;&nbsp;Pen</option>
                                    <option value="fas fa-pen-alt">&#xf305;&nbsp;Alternate Pen</option>
                                    <option value="fas fa-pen-fancy">&#xf5ac;&nbsp;Pen Fancy</option>
                                    <option value="fas fa-pen-nib">&#xf5ad;&nbsp;Pen Nib</option>
                                    <option value="fas fa-pencil-alt">&#xf303;&nbsp;Alternate Pencil</option>
                                    <option value="fas fa-phone">&#xf095;&nbsp;Phone</option>
                                    <option value="fas fa-phone-alt">&#xf879;&nbsp;Alternate Phone</option>
                                    <option value="fas fa-plane">&#xf072;&nbsp;plane</option>
                                    <option value="fas fa-plug">&#xf1e6;&nbsp;Plug</option>
                                    <option value="fas fa-print">&#xf02f;&nbsp;print</option>
                                    <option value="fas fa-puzzle-piece">&#xf12e;&nbsp;Puzzle Piece</option>
                                    <option value="fas fa-ring">&#xf70b;&nbsp;Ring</option>
                                    <option value="fas fa-road">&#xf018;&nbsp;road</option>
                                    <option value="fas fa-rocket">&#xf135;&nbsp;rocket</option>
                                    <option value="fas fa-ruler-combined">&#xf546;&nbsp;Ruler Combined</option>
                                    <option value="fas fa-ruler-horizontal">&#xf547;&nbsp;Ruler Horizontal</option>
                                    <option value="fas fa-ruler-vertical">&#xf548;&nbsp;Ruler Vertical</option>
                                    <option value="fas fa-satellite">&#xf7bf;&nbsp;Satellite</option>
                                    <option value="fas fa-satellite-dish">&#xf7c0;&nbsp;Satellite Dish</option>
                                    <option value="fas fa-save">&#xf0c7;&nbsp;Save</option>
                                    <option value="fas fa-school">&#xf549;&nbsp;School</option>
                                    <option value="fas fa-screwdriver">&#xf54a;&nbsp;Screwdriver</option>
                                    <option value="fas fa-scroll">&#xf70e;&nbsp;Scroll</option>
                                    <option value="fas fa-sd-card">&#xf7c2;&nbsp;Sd Card</option>
                                    <option value="fas fa-search">&#xf002;&nbsp;Search</option>
                                    <option value="fas fa-shield-alt">&#xf3ed;&nbsp;Alternate Shield</option>
                                    <option value="fas fa-shopping-bag">&#xf290;&nbsp;Shopping Bag</option>
                                    <option value="fas fa-shopping-basket">&#xf291;&nbsp;Shopping Basket</option>
                                    <option value="fas fa-shopping-cart">&#xf07a;&nbsp;shopping-cart</option>
                                    <option value="fas fa-shower">&#xf2cc;&nbsp;Shower</option>
                                    <option value="fas fa-sim-card">&#xf7c4;&nbsp;SIM Card</option>
                                    <option value="fas fa-skull-crossbones">&#xf714;&nbsp;Skull & Crossbones</option>
                                    <option value="fas fa-sleigh">&#xf7cc;&nbsp;Sleigh</option>
                                    <option value="fas fa-snowflake">&#xf2dc;&nbsp;Snowflake</option>
                                    <option value="fas fa-snowplow">&#xf7d2;&nbsp;Snowplow</option>
                                    <option value="fas fa-space-shuttle">&#xf197;&nbsp;Space Shuttle</option>
                                    <option value="fas fa-star">&#xf005;&nbsp;Star</option>
                                    <option value="fas fa-sticky-note">&#xf249;&nbsp;Sticky Note</option>
                                    <option value="fas fa-stopwatch">&#xf2f2;&nbsp;Stopwatch</option>
                                    <option value="fas fa-stroopwafel">&#xf551;&nbsp;Stroopwafel</option>
                                    <option value="fas fa-subway">&#xf239;&nbsp;Subway</option>
                                    <option value="fas fa-suitcase">&#xf0f2;&nbsp;Suitcase</option>
                                    <option value="fas fa-sun">&#xf185;&nbsp;Sun</option>
                                    <option value="fas fa-tablet">&#xf10a;&nbsp;tablet</option>
                                    <option value="fas fa-tablet-alt">&#xf3fa;&nbsp;Alternate Tablet</option>
                                    <option value="fas fa-tachometer-alt">&#xf3fd;&nbsp;Alternate Tachometer</option>
                                    <option value="fas fa-tag">&#xf02b;&nbsp;tag</option>
                                    <option value="fas fa-tags">&#xf02c;&nbsp;tags</option>
                                    <option value="fas fa-taxi">&#xf1ba;&nbsp;Taxi</option>
                                    <option value="fas fa-thumbtack">&#xf08d;&nbsp;Thumbtack</option>
                                    <option value="fas fa-ticket-alt">&#xf3ff;&nbsp;Alternate Ticket</option>
                                    <option value="fas fa-toilet">&#xf7d8;&nbsp;Toilet</option>
                                    <option value="fas fa-toolbox">&#xf552;&nbsp;Toolbox</option>
                                    <option value="fas fa-tools">&#xf7d9;&nbsp;Tools</option>
                                    <option value="fas fa-train">&#xf238;&nbsp;Train</option>
                                    <option value="fas fa-tram">&#xf7da;&nbsp;Tram</option>
                                    <option value="fas fa-trash">&#xf1f8;&nbsp;Trash</option>
                                    <option value="fas fa-trash-alt">&#xf2ed;&nbsp;Alternate Trash</option>
                                    <option value="fas fa-tree">&#xf1bb;&nbsp;Tree</option>
                                    <option value="fas fa-trophy">&#xf091;&nbsp;trophy</option>
                                    <option value="fas fa-truck">&#xf0d1;&nbsp;truck</option>
                                    <option value="fas fa-tv">&#xf26c;&nbsp;Television</option>
                                    <option value="fas fa-umbrella">&#xf0e9;&nbsp;Umbrella</option>
                                    <option value="fas fa-university">&#xf19c;&nbsp;University</option>
                                    <option value="fas fa-unlock">&#xf09c;&nbsp;unlock</option>
                                    <option value="fas fa-unlock-alt">&#xf13e;&nbsp;Alternate Unlock</option>
                                    <option value="fas fa-utensil-spoon">&#xf2e5;&nbsp;Utensil Spoon</option>
                                    <option value="fas fa-utensils">&#xf2e7;&nbsp;Utensils</option>
                                    <option value="fas fa-wallet">&#xf555;&nbsp;Wallet</option>
                                    <option value="fas fa-weight">&#xf496;&nbsp;Weight</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-wine-glass">&#xf4e3;&nbsp;Wine Glass</option>
                                    <option value="fas fa-wrench">&#xf0ad;&nbsp;Wrench</option>
                                    <option value="fas fa-alipay">&#xf642;&nbsp;Alipay</option>
                                    <option value="fas fa-amazon-pay">&#xf42c;&nbsp;Amazon Pay</option>
                                    <option value="fas fa-apple-pay">&#xf415;&nbsp;Apple Pay</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bitcoin">&#xf379;&nbsp;Bitcoin</option>
                                    <option value="fas fa-bookmark">&#xf02e;&nbsp;bookmark</option>
                                    <option value="fas fa-btc">&#xf15a;&nbsp;BTC</option>
                                    <option value="fas fa-bullhorn">&#xf0a1;&nbsp;bullhorn</option>
                                    <option value="fas fa-camera">&#xf030;&nbsp;camera</option>
                                    <option value="fas fa-camera-retro">&#xf083;&nbsp;Retro Camera</option>
                                    <option value="fas fa-cart-arrow-down">&#xf218;&nbsp;Shopping Cart Arrow Down</option>
                                    <option value="fas fa-cart-plus">&#xf217;&nbsp;Add to Shopping Cart</option>
                                    <option value="fas fa-cc-amazon-pay">&#xf42d;&nbsp;Amazon Pay Credit Card</option>
                                    <option value="fas fa-cc-amex">&#xf1f3;&nbsp;American Express Credit Card</option>
                                    <option value="fas fa-cc-apple-pay">&#xf416;&nbsp;Apple Pay Credit Card</option>
                                    <option value="fas fa-cc-diners-club">&#xf24c;&nbsp;Diner's Club Credit Card</option>
                                    <option value="fas fa-cc-discover">&#xf1f2;&nbsp;Discover Credit Card</option>
                                    <option value="fas fa-cc-jcb">&#xf24b;&nbsp;JCB Credit Card</option>
                                    <option value="fas fa-cc-mastercard">&#xf1f1;&nbsp;MasterCard Credit Card</option>
                                    <option value="fas fa-cc-paypal">&#xf1f4;&nbsp;Paypal Credit Card</option>
                                    <option value="fas fa-cc-stripe">&#xf1f5;&nbsp;Stripe Credit Card</option>
                                    <option value="fas fa-cc-visa">&#xf1f0;&nbsp;Visa Credit Card</option>
                                    <option value="fas fa-certificate">&#xf0a3;&nbsp;certificate</option>
                                    <option value="fas fa-credit-card">&#xf09d;&nbsp;Credit Card</option>
                                    <option value="fas fa-ethereum">&#xf42e;&nbsp;Ethereum</option>
                                    <option value="fas fa-gem">&#xf3a5;&nbsp;Gem</option>
                                    <option value="fas fa-gift">&#xf06b;&nbsp;gift</option>
                                    <option value="fas fa-google-pay">&#xe079;&nbsp;Google Pay</option>
                                    <option value="fas fa-google-wallet">&#xf1ee;&nbsp;Google Wallet</option>
                                    <option value="fas fa-handshake">&#xf2b5;&nbsp;Handshake</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-key">&#xf084;&nbsp;key</option>
                                    <option value="fas fa-money-check">&#xf53c;&nbsp;Money Check</option>
                                    <option value="fas fa-money-check-alt">&#xf53d;&nbsp;Alternate Money Check</option>
                                    <option value="fas fa-paypal">&#xf1ed;&nbsp;Paypal</option>
                                    <option value="fas fa-receipt">&#xf543;&nbsp;Receipt</option>
                                    <option value="fas fa-shopping-bag">&#xf290;&nbsp;Shopping Bag</option>
                                    <option value="fas fa-shopping-basket">&#xf291;&nbsp;Shopping Basket</option>
                                    <option value="fas fa-shopping-cart">&#xf07a;&nbsp;shopping-cart</option>
                                    <option value="fas fa-star">&#xf005;&nbsp;Star</option>
                                    <option value="fas fa-stripe">&#xf429;&nbsp;Stripe</option>
                                    <option value="fas fa-stripe-s">&#xf42a;&nbsp;Stripe S</option>
                                    <option value="fas fa-tag">&#xf02b;&nbsp;tag</option>
                                    <option value="fas fa-tags">&#xf02c;&nbsp;tags</option>
                                    <option value="fas fa-thumbs-down">&#xf165;&nbsp;thumbs-down</option>
                                    <option value="fas fa-thumbs-up">&#xf164;&nbsp;thumbs-up</option>
                                    <option value="fas fa-trophy">&#xf091;&nbsp;trophy</option>
                                    <option value="fas fa-band-aid">&#xf462;&nbsp;Band-Aid</option>
                                    <option value="fas fa-book-medical">&#xf7e6;&nbsp;Medical Book</option>
                                    <option value="fas fa-cannabis">&#xf55f;&nbsp;Cannabis</option>
                                    <option value="fas fa-capsules">&#xf46b;&nbsp;Capsules</option>
                                    <option value="fas fa-clinic-medical">&#xf7f2;&nbsp;Medical Clinic</option>
                                    <option value="fas fa-disease">&#xf7fa;&nbsp;Disease</option>
                                    <option value="fas fa-eye-dropper">&#xf1fb;&nbsp;Eye Dropper</option>
                                    <option value="fas fa-file-medical">&#xf477;&nbsp;Medical File</option>
                                    <option value="fas fa-file-prescription">&#xf572;&nbsp;File Prescription</option>
                                    <option value="fas fa-first-aid">&#xf479;&nbsp;First Aid</option>
                                    <option value="fas fa-flask">&#xf0c3;&nbsp;Flask</option>
                                    <option value="fas fa-history">&#xf1da;&nbsp;History</option>
                                    <option value="fas fa-joint">&#xf595;&nbsp;Joint</option>
                                    <option value="fas fa-laptop-medical">&#xf812;&nbsp;Laptop Medical</option>
                                    <option value="fas fa-mortar-pestle">&#xf5a7;&nbsp;Mortar Pestle</option>
                                    <option value="fas fa-notes-medical">&#xf481;&nbsp;Medical Notes</option>
                                    <option value="fas fa-pills">&#xf484;&nbsp;Pills</option>
                                    <option value="fas fa-prescription">&#xf5b1;&nbsp;Prescription</option>
                                    <option value="fas fa-prescription-bottle">&#xf485;&nbsp;Prescription Bottle</option>
                                    <option value="fas fa-prescription-bottle-alt">&#xf486;&nbsp;Alternate Prescription Bottle</option>
                                    <option value="fas fa-receipt">&#xf543;&nbsp;Receipt</option>
                                    <option value="fas fa-skull-crossbones">&#xf714;&nbsp;Skull & Crossbones</option>
                                    <option value="fas fa-syringe">&#xf48e;&nbsp;Syringe</option>
                                    <option value="fas fa-tablets">&#xf490;&nbsp;Tablets</option>
                                    <option value="fas fa-thermometer">&#xf491;&nbsp;Thermometer</option>
                                    <option value="fas fa-vial">&#xf492;&nbsp;Vial</option>
                                    <option value="fas fa-vials">&#xf493;&nbsp;Vials</option>
                                    <option value="fas fa-award">&#xf559;&nbsp;Award</option>
                                    <option value="fas fa-balance-scale">&#xf24e;&nbsp;Balance Scale</option>
                                    <option value="fas fa-balance-scale-left">&#xf515;&nbsp;Balance Scale (Left-Weighted)</option>
                                    <option value="fas fa-balance-scale-right">&#xf516;&nbsp;Balance Scale (Right-Weighted)</option>
                                    <option value="fas fa-bullhorn">&#xf0a1;&nbsp;bullhorn</option>
                                    <option value="fas fa-check-double">&#xf560;&nbsp;Double Check</option>
                                    <option value="fas fa-democrat">&#xf747;&nbsp;Democrat</option>
                                    <option value="fas fa-donate">&#xf4b9;&nbsp;Donate</option>
                                    <option value="fas fa-dove">&#xf4ba;&nbsp;Dove</option>
                                    <option value="fas fa-fist-raised">&#xf6de;&nbsp;Raised Fist</option>
                                    <option value="fas fa-flag-usa">&#xf74d;&nbsp;United States of America Flag</option>
                                    <option value="fas fa-handshake">&#xf2b5;&nbsp;Handshake</option>
                                    <option value="fas fa-person-booth">&#xf756;&nbsp;Person Entering Booth</option>
                                    <option value="fas fa-piggy-bank">&#xf4d3;&nbsp;Piggy Bank</option>
                                    <option value="fas fa-republican">&#xf75e;&nbsp;Republican</option>
                                    <option value="fas fa-vote-yea">&#xf772;&nbsp;Vote Yea</option>
                                    <option value="fas fa-ankh">&#xf644;&nbsp;Ankh</option>
                                    <option value="fas fa-atom">&#xf5d2;&nbsp;Atom</option>
                                    <option value="fas fa-bahai">&#xf666;&nbsp;Bahá'í</option>
                                    <option value="fas fa-bible">&#xf647;&nbsp;Bible</option>
                                    <option value="fas fa-church">&#xf51d;&nbsp;Church</option>
                                    <option value="fas fa-cross">&#xf654;&nbsp;Cross</option>
                                    <option value="fas fa-dharmachakra">&#xf655;&nbsp;Dharmachakra</option>
                                    <option value="fas fa-dove">&#xf4ba;&nbsp;Dove</option>
                                    <option value="fas fa-gopuram">&#xf664;&nbsp;Gopuram</option>
                                    <option value="fas fa-hamsa">&#xf665;&nbsp;Hamsa</option>
                                    <option value="fas fa-hanukiah">&#xf6e6;&nbsp;Hanukiah</option>
                                    <option value="fas fa-jedi">&#xf669;&nbsp;Jedi</option>
                                    <option value="fas fa-journal-whills">&#xf66a;&nbsp;Journal of the Whills</option>
                                    <option value="fas fa-kaaba">&#xf66b;&nbsp;Kaaba</option>
                                    <option value="fas fa-khanda">&#xf66d;&nbsp;Khanda</option>
                                    <option value="fas fa-menorah">&#xf676;&nbsp;Menorah</option>
                                    <option value="fas fa-mosque">&#xf678;&nbsp;Mosque</option>
                                    <option value="fas fa-om">&#xf679;&nbsp;Om</option>
                                    <option value="fas fa-pastafarianism">&#xf67b;&nbsp;Pastafarianism</option>
                                    <option value="fas fa-peace">&#xf67c;&nbsp;Peace</option>
                                    <option value="fas fa-place-of-worship">&#xf67f;&nbsp;Place of Worship</option>
                                    <option value="fas fa-pray">&#xf683;&nbsp;Pray</option>
                                    <option value="fas fa-praying-hands">&#xf684;&nbsp;Praying Hands</option>
                                    <option value="fas fa-quran">&#xf687;&nbsp;Quran</option>
                                    <option value="fas fa-star-and-crescent">&#xf699;&nbsp;Star and Crescent</option>
                                    <option value="fas fa-star-of-david">&#xf69a;&nbsp;Star of David</option>
                                    <option value="fas fa-synagogue">&#xf69b;&nbsp;Synagogue</option>
                                    <option value="fas fa-torah">&#xf6a0;&nbsp;Torah</option>
                                    <option value="fas fa-torii-gate">&#xf6a1;&nbsp;Torii Gate</option>
                                    <option value="fas fa-vihara">&#xf6a7;&nbsp;Vihara</option>
                                    <option value="fas fa-yin-yang">&#xf6ad;&nbsp;Yin Yang</option>
                                    <option value="fas fa-atom">&#xf5d2;&nbsp;Atom</option>
                                    <option value="fas fa-biohazard">&#xf780;&nbsp;Biohazard</option>
                                    <option value="fas fa-brain">&#xf5dc;&nbsp;Brain</option>
                                    <option value="fas fa-burn">&#xf46a;&nbsp;Burn</option>
                                    <option value="fas fa-capsules">&#xf46b;&nbsp;Capsules</option>
                                    <option value="fas fa-clipboard-check">&#xf46c;&nbsp;Clipboard with Check</option>
                                    <option value="fas fa-disease">&#xf7fa;&nbsp;Disease</option>
                                    <option value="fas fa-dna">&#xf471;&nbsp;DNA</option>
                                    <option value="fas fa-eye-dropper">&#xf1fb;&nbsp;Eye Dropper</option>
                                    <option value="fas fa-filter">&#xf0b0;&nbsp;Filter</option>
                                    <option value="fas fa-fire">&#xf06d;&nbsp;fire</option>
                                    <option value="fas fa-fire-alt">&#xf7e4;&nbsp;Alternate Fire</option>
                                    <option value="fas fa-flask">&#xf0c3;&nbsp;Flask</option>
                                    <option value="fas fa-frog">&#xf52e;&nbsp;Frog</option>
                                    <option value="fas fa-magnet">&#xf076;&nbsp;magnet</option>
                                    <option value="fas fa-microscope">&#xf610;&nbsp;Microscope</option>
                                    <option value="fas fa-mortar-pestle">&#xf5a7;&nbsp;Mortar Pestle</option>
                                    <option value="fas fa-pills">&#xf484;&nbsp;Pills</option>
                                    <option value="fas fa-prescription-bottle">&#xf485;&nbsp;Prescription Bottle</option>
                                    <option value="fas fa-radiation">&#xf7b9;&nbsp;Radiation</option>
                                    <option value="fas fa-radiation-alt">&#xf7ba;&nbsp;Alternate Radiation</option>
                                    <option value="fas fa-seedling">&#xf4d8;&nbsp;Seedling</option>
                                    <option value="fas fa-skull-crossbones">&#xf714;&nbsp;Skull & Crossbones</option>
                                    <option value="fas fa-syringe">&#xf48e;&nbsp;Syringe</option>
                                    <option value="fas fa-tablets">&#xf490;&nbsp;Tablets</option>
                                    <option value="fas fa-temperature-high">&#xf769;&nbsp;High Temperature</option>
                                    <option value="fas fa-temperature-low">&#xf76b;&nbsp;Low Temperature</option>
                                    <option value="fas fa-vial">&#xf492;&nbsp;Vial</option>
                                    <option value="fas fa-vials">&#xf493;&nbsp;Vials</option>
                                    <option value="fas fa-atom">&#xf5d2;&nbsp;Atom</option>
                                    <option value="fas fa-galactic-republic">&#xf50c;&nbsp;Galactic Republic</option>
                                    <option value="fas fa-galactic-senate">&#xf50d;&nbsp;Galactic Senate</option>
                                    <option value="fas fa-globe">&#xf0ac;&nbsp;Globe</option>
                                    <option value="fas fa-hand-spock">&#xf259;&nbsp;Spock (Hand)</option>
                                    <option value="fas fa-jedi">&#xf669;&nbsp;Jedi</option>
                                    <option value="fas fa-jedi-order">&#xf50e;&nbsp;Jedi Order</option>
                                    <option value="fas fa-journal-whills">&#xf66a;&nbsp;Journal of the Whills</option>
                                    <option value="fas fa-meteor">&#xf753;&nbsp;Meteor</option>
                                    <option value="fas fa-moon">&#xf186;&nbsp;Moon</option>
                                    <option value="fas fa-old-republic">&#xf510;&nbsp;Old Republic</option>
                                    <option value="fas fa-robot">&#xf544;&nbsp;Robot</option>
                                    <option value="fas fa-rocket">&#xf135;&nbsp;rocket</option>
                                    <option value="fas fa-satellite">&#xf7bf;&nbsp;Satellite</option>
                                    <option value="fas fa-satellite-dish">&#xf7c0;&nbsp;Satellite Dish</option>
                                    <option value="fas fa-space-shuttle">&#xf197;&nbsp;Space Shuttle</option>
                                    <option value="fas fa-user-astronaut">&#xf4fb;&nbsp;User Astronaut</option>
                                    <option value="fas fa-ban">&#xf05e;&nbsp;ban</option>
                                    <option value="fas fa-bug">&#xf188;&nbsp;Bug</option>
                                    <option value="fas fa-door-closed">&#xf52a;&nbsp;Door Closed</option>
                                    <option value="fas fa-door-open">&#xf52b;&nbsp;Door Open</option>
                                    <option value="fas fa-dungeon">&#xf6d9;&nbsp;Dungeon</option>
                                    <option value="fas fa-eye">&#xf06e;&nbsp;Eye</option>
                                    <option value="fas fa-eye-slash">&#xf070;&nbsp;Eye Slash</option>
                                    <option value="fas fa-file-contract">&#xf56c;&nbsp;File Contract</option>
                                    <option value="fas fa-file-signature">&#xf573;&nbsp;File Signature</option>
                                    <option value="fas fa-fingerprint">&#xf577;&nbsp;Fingerprint</option>
                                    <option value="fas fa-id-badge">&#xf2c1;&nbsp;Identification Badge</option>
                                    <option value="fas fa-id-card">&#xf2c2;&nbsp;Identification Card</option>
                                    <option value="fas fa-id-card-alt">&#xf47f;&nbsp;Alternate Identification Card</option>
                                    <option value="fas fa-key">&#xf084;&nbsp;key</option>
                                    <option value="fas fa-lock">&#xf023;&nbsp;lock</option>
                                    <option value="fas fa-lock-open">&#xf3c1;&nbsp;Lock Open</option>
                                    <option value="fas fa-mask">&#xf6fa;&nbsp;Mask</option>
                                    <option value="fas fa-passport">&#xf5ab;&nbsp;Passport</option>
                                    <option value="fas fa-shield-alt">&#xf3ed;&nbsp;Alternate Shield</option>
                                    <option value="fas fa-unlock">&#xf09c;&nbsp;unlock</option>
                                    <option value="fas fa-unlock-alt">&#xf13e;&nbsp;Alternate Unlock</option>
                                    <option value="fas fa-user-lock">&#xf502;&nbsp;User Lock</option>
                                    <option value="fas fa-user-secret">&#xf21b;&nbsp;User Secret</option>
                                    <option value="fas fa-user-shield">&#xf505;&nbsp;User Shield</option>
                                    <option value="fas fa-bookmark">&#xf02e;&nbsp;bookmark</option>
                                    <option value="fas fa-calendar">&#xf133;&nbsp;Calendar</option>
                                    <option value="fas fa-certificate">&#xf0a3;&nbsp;certificate</option>
                                    <option value="fas fa-circle">&#xf111;&nbsp;Circle</option>
                                    <option value="fas fa-cloud">&#xf0c2;&nbsp;Cloud</option>
                                    <option value="fas fa-comment">&#xf075;&nbsp;comment</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-folder">&#xf07b;&nbsp;Folder</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-heart-broken">&#xf7a9;&nbsp;Heart Broken</option>
                                    <option value="fas fa-map-marker">&#xf041;&nbsp;map-marker</option>
                                    <option value="fas fa-play">&#xf04b;&nbsp;play</option>
                                    <option value="fas fa-shapes">&#xf61f;&nbsp;Shapes</option>
                                    <option value="fas fa-square">&#xf0c8;&nbsp;Square</option>
                                    <option value="fas fa-star">&#xf005;&nbsp;Star</option>
                                    <option value="fas fa-barcode">&#xf02a;&nbsp;barcode</option>
                                    <option value="fas fa-cart-arrow-down">&#xf218;&nbsp;Shopping Cart Arrow Down</option>
                                    <option value="fas fa-cart-plus">&#xf217;&nbsp;Add to Shopping Cart</option>
                                    <option value="fas fa-cash-register">&#xf788;&nbsp;Cash Register</option>
                                    <option value="fas fa-gift">&#xf06b;&nbsp;gift</option>
                                    <option value="fas fa-gifts">&#xf79c;&nbsp;Gifts</option>
                                    <option value="fas fa-person-booth">&#xf756;&nbsp;Person Entering Booth</option>
                                    <option value="fas fa-receipt">&#xf543;&nbsp;Receipt</option>
                                    <option value="fas fa-shipping-fast">&#xf48b;&nbsp;Shipping Fast</option>
                                    <option value="fas fa-shopping-bag">&#xf290;&nbsp;Shopping Bag</option>
                                    <option value="fas fa-shopping-basket">&#xf291;&nbsp;Shopping Basket</option>
                                    <option value="fas fa-shopping-cart">&#xf07a;&nbsp;shopping-cart</option>
                                    <option value="fas fa-store">&#xf54e;&nbsp;Store</option>
                                    <option value="fas fa-store-alt">&#xf54f;&nbsp;Alternate Store</option>
                                    <option value="fas fa-store-alt-slash">&#xe070;&nbsp;Alternate Store Slash</option>
                                    <option value="fas fa-store-slash">&#xe071;&nbsp;Store Slash</option>
                                    <option value="fas fa-truck">&#xf0d1;&nbsp;truck</option>
                                    <option value="fas fa-tshirt">&#xf553;&nbsp;T-Shirt</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-birthday-cake">&#xf1fd;&nbsp;Birthday Cake</option>
                                    <option value="fas fa-camera">&#xf030;&nbsp;camera</option>
                                    <option value="fas fa-comment">&#xf075;&nbsp;comment</option>
                                    <option value="fas fa-comment-alt">&#xf27a;&nbsp;Alternate Comment</option>
                                    <option value="fas fa-envelope">&#xf0e0;&nbsp;Envelope</option>
                                    <option value="fas fa-hashtag">&#xf292;&nbsp;Hashtag</option>
                                    <option value="fas fa-heart">&#xf004;&nbsp;Heart</option>
                                    <option value="fas fa-icons">&#xf86d;&nbsp;Icons</option>
                                    <option value="fas fa-image">&#xf03e;&nbsp;Image</option>
                                    <option value="fas fa-images">&#xf302;&nbsp;Images</option>
                                    <option value="fas fa-map-marker">&#xf041;&nbsp;map-marker</option>
                                    <option value="fas fa-map-marker-alt">&#xf3c5;&nbsp;Alternate Map Marker</option>
                                    <option value="fas fa-photo-video">&#xf87c;&nbsp;Photo Video</option>
                                    <option value="fas fa-poll">&#xf681;&nbsp;Poll</option>
                                    <option value="fas fa-poll-h">&#xf682;&nbsp;Poll H</option>
                                    <option value="fas fa-retweet">&#xf079;&nbsp;Retweet</option>
                                    <option value="fas fa-share">&#xf064;&nbsp;Share</option>
                                    <option value="fas fa-share-alt">&#xf1e0;&nbsp;Alternate Share</option>
                                    <option value="fas fa-share-square">&#xf14d;&nbsp;Share Square</option>
                                    <option value="fas fa-star">&#xf005;&nbsp;Star</option>
                                    <option value="fas fa-thumbs-down">&#xf165;&nbsp;thumbs-down</option>
                                    <option value="fas fa-thumbs-up">&#xf164;&nbsp;thumbs-up</option>
                                    <option value="fas fa-thumbtack">&#xf08d;&nbsp;Thumbtack</option>
                                    <option value="fas fa-user">&#xf007;&nbsp;User</option>
                                    <option value="fas fa-user-circle">&#xf2bd;&nbsp;User Circle</option>
                                    <option value="fas fa-user-friends">&#xf500;&nbsp;User Friends</option>
                                    <option value="fas fa-user-plus">&#xf234;&nbsp;User Plus</option>
                                    <option value="fas fa-users">&#xf0c0;&nbsp;Users</option>
                                    <option value="fas fa-video">&#xf03d;&nbsp;Video</option>
                                    <option value="fas fa-asterisk">&#xf069;&nbsp;asterisk</option>
                                    <option value="fas fa-atom">&#xf5d2;&nbsp;Atom</option>
                                    <option value="fas fa-bahai">&#xf666;&nbsp;Bahá'í</option>
                                    <option value="fas fa-certificate">&#xf0a3;&nbsp;certificate</option>
                                    <option value="fas fa-circle-notch">&#xf1ce;&nbsp;Circle Notched</option>
                                    <option value="fas fa-cog">&#xf013;&nbsp;cog</option>
                                    <option value="fas fa-compact-disc">&#xf51f;&nbsp;Compact Disc</option>
                                    <option value="fas fa-compass">&#xf14e;&nbsp;Compass</option>
                                    <option value="fas fa-crosshairs">&#xf05b;&nbsp;Crosshairs</option>
                                    <option value="fas fa-dharmachakra">&#xf655;&nbsp;Dharmachakra</option>
                                    <option value="fas fa-fan">&#xf863;&nbsp;Fan</option>
                                    <option value="fas fa-life-ring">&#xf1cd;&nbsp;Life Ring</option>
                                    <option value="fas fa-palette">&#xf53f;&nbsp;Palette</option>
                                    <option value="fas fa-ring">&#xf70b;&nbsp;Ring</option>
                                    <option value="fas fa-slash">&#xf715;&nbsp;Slash</option>
                                    <option value="fas fa-snowflake">&#xf2dc;&nbsp;Snowflake</option>
                                    <option value="fas fa-spinner">&#xf110;&nbsp;Spinner</option>
                                    <option value="fas fa-stroopwafel">&#xf551;&nbsp;Stroopwafel</option>
                                    <option value="fas fa-sun">&#xf185;&nbsp;Sun</option>
                                    <option value="fas fa-sync">&#xf021;&nbsp;Sync</option>
                                    <option value="fas fa-sync-alt">&#xf2f1;&nbsp;Alternate Sync</option>
                                    <option value="fas fa-yin-yang">&#xf6ad;&nbsp;Yin Yang</option>
                                    <option value="fas fa-baseball-ball">&#xf433;&nbsp;Baseball Ball</option>
                                    <option value="fas fa-basketball-ball">&#xf434;&nbsp;Basketball Ball</option>
                                    <option value="fas fa-biking">&#xf84a;&nbsp;Biking</option>
                                    <option value="fas fa-bowling-ball">&#xf436;&nbsp;Bowling Ball</option>
                                    <option value="fas fa-dumbbell">&#xf44b;&nbsp;Dumbbell</option>
                                    <option value="fas fa-football-ball">&#xf44e;&nbsp;Football Ball</option>
                                    <option value="fas fa-futbol">&#xf1e3;&nbsp;Futbol</option>
                                    <option value="fas fa-golf-ball">&#xf450;&nbsp;Golf Ball</option>
                                    <option value="fas fa-hockey-puck">&#xf453;&nbsp;Hockey Puck</option>
                                    <option value="fas fa-quidditch">&#xf458;&nbsp;Quidditch</option>
                                    <option value="fas fa-running">&#xf70c;&nbsp;Running</option>
                                    <option value="fas fa-skating">&#xf7c5;&nbsp;Skating</option>
                                    <option value="fas fa-skiing">&#xf7c9;&nbsp;Skiing</option>
                                    <option value="fas fa-skiing-nordic">&#xf7ca;&nbsp;Skiing Nordic</option>
                                    <option value="fas fa-snowboarding">&#xf7ce;&nbsp;Snowboarding</option>
                                    <option value="fas fa-swimmer">&#xf5c4;&nbsp;Swimmer</option>
                                    <option value="fas fa-table-tennis">&#xf45d;&nbsp;Table Tennis</option>
                                    <option value="fas fa-volleyball-ball">&#xf45f;&nbsp;Volleyball Ball</option>
                                    <option value="fas fa-allergies">&#xf461;&nbsp;Allergies</option>
                                    <option value="fas fa-broom">&#xf51a;&nbsp;Broom</option>
                                    <option value="fas fa-cloud-sun">&#xf6c4;&nbsp;Cloud with Sun</option>
                                    <option value="fas fa-cloud-sun-rain">&#xf743;&nbsp;Cloud with Sun and Rain</option>
                                    <option value="fas fa-frog">&#xf52e;&nbsp;Frog</option>
                                    <option value="fas fa-rainbow">&#xf75b;&nbsp;Rainbow</option>
                                    <option value="fas fa-seedling">&#xf4d8;&nbsp;Seedling</option>
                                    <option value="fas fa-umbrella">&#xf0e9;&nbsp;Umbrella</option>
                                    <option value="fas fa-ban">&#xf05e;&nbsp;ban</option>
                                    <option value="fas fa-battery-empty">&#xf244;&nbsp;Battery Empty</option>
                                    <option value="fas fa-battery-full">&#xf240;&nbsp;Battery Full</option>
                                    <option value="fas fa-battery-half">&#xf242;&nbsp;Battery 1/2 Full</option>
                                    <option value="fas fa-battery-quarter">&#xf243;&nbsp;Battery 1/4 Full</option>
                                    <option value="fas fa-battery-three-quarters">&#xf241;&nbsp;Battery 3/4 Full</option>
                                    <option value="fas fa-bell">&#xf0f3;&nbsp;bell</option>
                                    <option value="fas fa-bell-slash">&#xf1f6;&nbsp;Bell Slash</option>
                                    <option value="fas fa-calendar">&#xf133;&nbsp;Calendar</option>
                                    <option value="fas fa-calendar-alt">&#xf073;&nbsp;Alternate Calendar</option>
                                    <option value="fas fa-calendar-check">&#xf274;&nbsp;Calendar Check</option>
                                    <option value="fas fa-calendar-day">&#xf783;&nbsp;Calendar with Day Focus</option>
                                    <option value="fas fa-calendar-minus">&#xf272;&nbsp;Calendar Minus</option>
                                    <option value="fas fa-calendar-plus">&#xf271;&nbsp;Calendar Plus</option>
                                    <option value="fas fa-calendar-times">&#xf273;&nbsp;Calendar Times</option>
                                    <option value="fas fa-calendar-week">&#xf784;&nbsp;Calendar with Week Focus</option>
                                    <option value="fas fa-cart-arrow-down">&#xf218;&nbsp;Shopping Cart Arrow Down</option>
                                    <option value="fas fa-cart-plus">&#xf217;&nbsp;Add to Shopping Cart</option>
                                    <option value="fas fa-comment">&#xf075;&nbsp;comment</option>
                                    <option value="fas fa-comment-alt">&#xf27a;&nbsp;Alternate Comment</option>
                                    <option value="fas fa-comment-slash">&#xf4b3;&nbsp;Comment Slash</option>
                                    <option value="fas fa-compass">&#xf14e;&nbsp;Compass</option>
                                    <option value="fas fa-door-closed">&#xf52a;&nbsp;Door Closed</option>
                                    <option value="fas fa-door-open">&#xf52b;&nbsp;Door Open</option>
                                    <option value="fas fa-exclamation">&#xf12a;&nbsp;exclamation</option>
                                    <option value="fas fa-exclamation-circle">&#xf06a;&nbsp;Exclamation Circle</option>
                                    <option value="fas fa-exclamation-triangle">&#xf071;&nbsp;Exclamation Triangle</option>
                                    <option value="fas fa-eye">&#xf06e;&nbsp;Eye</option>
                                    <option value="fas fa-eye-slash">&#xf070;&nbsp;Eye Slash</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-folder">&#xf07b;&nbsp;Folder</option>
                                    <option value="fas fa-folder-open">&#xf07c;&nbsp;Folder Open</option>
                                    <option value="fas fa-gas-pump">&#xf52f;&nbsp;Gas Pump</option>
                                    <option value="fas fa-info">&#xf129;&nbsp;Info</option>
                                    <option value="fas fa-info-circle">&#xf05a;&nbsp;Info Circle</option>
                                    <option value="fas fa-lightbulb">&#xf0eb;&nbsp;Lightbulb</option>
                                    <option value="fas fa-lock">&#xf023;&nbsp;lock</option>
                                    <option value="fas fa-lock-open">&#xf3c1;&nbsp;Lock Open</option>
                                    <option value="fas fa-map-marker">&#xf041;&nbsp;map-marker</option>
                                    <option value="fas fa-map-marker-alt">&#xf3c5;&nbsp;Alternate Map Marker</option>
                                    <option value="fas fa-microphone">&#xf130;&nbsp;microphone</option>
                                    <option value="fas fa-microphone-alt">&#xf3c9;&nbsp;Alternate Microphone</option>
                                    <option value="fas fa-microphone-alt-slash">&#xf539;&nbsp;Alternate Microphone Slash</option>
                                    <option value="fas fa-microphone-slash">&#xf131;&nbsp;Microphone Slash</option>
                                    <option value="fas fa-minus">&#xf068;&nbsp;minus</option>
                                    <option value="fas fa-minus-circle">&#xf056;&nbsp;Minus Circle</option>
                                    <option value="fas fa-minus-square">&#xf146;&nbsp;Minus Square</option>
                                    <option value="fas fa-parking">&#xf540;&nbsp;Parking</option>
                                    <option value="fas fa-phone">&#xf095;&nbsp;Phone</option>
                                    <option value="fas fa-phone-alt">&#xf879;&nbsp;Alternate Phone</option>
                                    <option value="fas fa-phone-slash">&#xf3dd;&nbsp;Phone Slash</option>
                                    <option value="fas fa-plus">&#xf067;&nbsp;plus</option>
                                    <option value="fas fa-plus-circle">&#xf055;&nbsp;Plus Circle</option>
                                    <option value="fas fa-plus-square">&#xf0fe;&nbsp;Plus Square</option>
                                    <option value="fas fa-print">&#xf02f;&nbsp;print</option>
                                    <option value="fas fa-question">&#xf128;&nbsp;Question</option>
                                    <option value="fas fa-question-circle">&#xf059;&nbsp;Question Circle</option>
                                    <option value="fas fa-shield-alt">&#xf3ed;&nbsp;Alternate Shield</option>
                                    <option value="fas fa-shopping-cart">&#xf07a;&nbsp;shopping-cart</option>
                                    <option value="fas fa-sign-in-alt">&#xf2f6;&nbsp;Alternate Sign In</option>
                                    <option value="fas fa-sign-out-alt">&#xf2f5;&nbsp;Alternate Sign Out</option>
                                    <option value="fas fa-signal">&#xf012;&nbsp;signal</option>
                                    <option value="fas fa-smoking-ban">&#xf54d;&nbsp;Smoking Ban</option>
                                    <option value="fas fa-star">&#xf005;&nbsp;Star</option>
                                    <option value="fas fa-star-half">&#xf089;&nbsp;star-half</option>
                                    <option value="fas fa-star-half-alt">&#xf5c0;&nbsp;Alternate Star Half</option>
                                    <option value="fas fa-stream">&#xf550;&nbsp;Stream</option>
                                    <option value="fas fa-thermometer-empty">&#xf2cb;&nbsp;Thermometer Empty</option>
                                    <option value="fas fa-thermometer-full">&#xf2c7;&nbsp;Thermometer Full</option>
                                    <option value="fas fa-thermometer-half">&#xf2c9;&nbsp;Thermometer 1/2 Full</option>
                                    <option value="fas fa-thermometer-quarter">&#xf2ca;&nbsp;Thermometer 1/4 Full</option>
                                    <option value="fas fa-thermometer-three-quarters">&#xf2c8;&nbsp;Thermometer 3/4 Full</option>
                                    <option value="fas fa-thumbs-down">&#xf165;&nbsp;thumbs-down</option>
                                    <option value="fas fa-thumbs-up">&#xf164;&nbsp;thumbs-up</option>
                                    <option value="fas fa-tint">&#xf043;&nbsp;tint</option>
                                    <option value="fas fa-tint-slash">&#xf5c7;&nbsp;Tint Slash</option>
                                    <option value="fas fa-toggle-off">&#xf204;&nbsp;Toggle Off</option>
                                    <option value="fas fa-toggle-on">&#xf205;&nbsp;Toggle On</option>
                                    <option value="fas fa-unlock">&#xf09c;&nbsp;unlock</option>
                                    <option value="fas fa-unlock-alt">&#xf13e;&nbsp;Alternate Unlock</option>
                                    <option value="fas fa-user">&#xf007;&nbsp;User</option>
                                    <option value="fas fa-user-alt">&#xf406;&nbsp;Alternate User</option>
                                    <option value="fas fa-user-alt-slash">&#xf4fa;&nbsp;Alternate User Slash</option>
                                    <option value="fas fa-user-slash">&#xf506;&nbsp;User Slash</option>
                                    <option value="fas fa-video">&#xf03d;&nbsp;Video</option>
                                    <option value="fas fa-video-slash">&#xf4e2;&nbsp;Video Slash</option>
                                    <option value="fas fa-volume-down">&#xf027;&nbsp;Volume Down</option>
                                    <option value="fas fa-volume-mute">&#xf6a9;&nbsp;Volume Mute</option>
                                    <option value="fas fa-volume-off">&#xf026;&nbsp;Volume Off</option>
                                    <option value="fas fa-volume-up">&#xf028;&nbsp;Volume Up</option>
                                    <option value="fas fa-wifi">&#xf1eb;&nbsp;WiFi</option>
                                    <option value="fas fa-anchor">&#xf13d;&nbsp;Anchor</option>
                                    <option value="fas fa-biking">&#xf84a;&nbsp;Biking</option>
                                    <option value="fas fa-fish">&#xf578;&nbsp;Fish</option>
                                    <option value="fas fa-hotdog">&#xf80f;&nbsp;Hot Dog</option>
                                    <option value="fas fa-ice-cream">&#xf810;&nbsp;Ice Cream</option>
                                    <option value="fas fa-lemon">&#xf094;&nbsp;Lemon</option>
                                    <option value="fas fa-sun">&#xf185;&nbsp;Sun</option>
                                    <option value="fas fa-swimmer">&#xf5c4;&nbsp;Swimmer</option>
                                    <option value="fas fa-swimming-pool">&#xf5c5;&nbsp;Swimming Pool</option>
                                    <option value="fas fa-umbrella-beach">&#xf5ca;&nbsp;Umbrella Beach</option>
                                    <option value="fas fa-volleyball-ball">&#xf45f;&nbsp;Volleyball Ball</option>
                                    <option value="fas fa-water">&#xf773;&nbsp;Water</option>
                                    <option value="fas fa-bullseye">&#xf140;&nbsp;Bullseye</option>
                                    <option value="fas fa-check-circle">&#xf058;&nbsp;Check Circle</option>
                                    <option value="fas fa-circle">&#xf111;&nbsp;Circle</option>
                                    <option value="fas fa-dot-circle">&#xf192;&nbsp;Dot Circle</option>
                                    <option value="fas fa-microphone">&#xf130;&nbsp;microphone</option>
                                    <option value="fas fa-microphone-slash">&#xf131;&nbsp;Microphone Slash</option>
                                    <option value="fas fa-star">&#xf005;&nbsp;Star</option>
                                    <option value="fas fa-star-half">&#xf089;&nbsp;star-half</option>
                                    <option value="fas fa-star-half-alt">&#xf5c0;&nbsp;Alternate Star Half</option>
                                    <option value="fas fa-toggle-off">&#xf204;&nbsp;Toggle Off</option>
                                    <option value="fas fa-toggle-on">&#xf205;&nbsp;Toggle On</option>
                                    <option value="fas fa-wifi">&#xf1eb;&nbsp;WiFi</option>
                                    <option value="fas fa-archway">&#xf557;&nbsp;Archway</option>
                                    <option value="fas fa-atlas">&#xf558;&nbsp;Atlas</option>
                                    <option value="fas fa-bed">&#xf236;&nbsp;Bed</option>
                                    <option value="fas fa-bus">&#xf207;&nbsp;Bus</option>
                                    <option value="fas fa-bus-alt">&#xf55e;&nbsp;Bus Alt</option>
                                    <option value="fas fa-caravan">&#xf8ff;&nbsp;Caravan</option>
                                    <option value="fas fa-cocktail">&#xf561;&nbsp;Cocktail</option>
                                    <option value="fas fa-concierge-bell">&#xf562;&nbsp;Concierge Bell</option>
                                    <option value="fas fa-dumbbell">&#xf44b;&nbsp;Dumbbell</option>
                                    <option value="fas fa-glass-martini">&#xf000;&nbsp;Martini Glass</option>
                                    <option value="fas fa-glass-martini-alt">&#xf57b;&nbsp;Alternate Glass Martini</option>
                                    <option value="fas fa-globe-africa">&#xf57c;&nbsp;Globe with Africa shown</option>
                                    <option value="fas fa-globe-americas">&#xf57d;&nbsp;Globe with Americas shown</option>
                                    <option value="fas fa-globe-asia">&#xf57e;&nbsp;Globe with Asia shown</option>
                                    <option value="fas fa-globe-europe">&#xf7a2;&nbsp;Globe with Europe shown</option>
                                    <option value="fas fa-hot-tub">&#xf593;&nbsp;Hot Tub</option>
                                    <option value="fas fa-hotel">&#xf594;&nbsp;Hotel</option>
                                    <option value="fas fa-luggage-cart">&#xf59d;&nbsp;Luggage Cart</option>
                                    <option value="fas fa-map">&#xf279;&nbsp;Map</option>
                                    <option value="fas fa-map-marked">&#xf59f;&nbsp;Map Marked</option>
                                    <option value="fas fa-map-marked-alt">&#xf5a0;&nbsp;Alternate Map Marked</option>
                                    <option value="fas fa-monument">&#xf5a6;&nbsp;Monument</option>
                                    <option value="fas fa-passport">&#xf5ab;&nbsp;Passport</option>
                                    <option value="fas fa-plane">&#xf072;&nbsp;plane</option>
                                    <option value="fas fa-plane-arrival">&#xf5af;&nbsp;Plane Arrival</option>
                                    <option value="fas fa-plane-departure">&#xf5b0;&nbsp;Plane Departure</option>
                                    <option value="fas fa-shuttle-van">&#xf5b6;&nbsp;Shuttle Van</option>
                                    <option value="fas fa-spa">&#xf5bb;&nbsp;Spa</option>
                                    <option value="fas fa-suitcase">&#xf0f2;&nbsp;Suitcase</option>
                                    <option value="fas fa-suitcase-rolling">&#xf5c1;&nbsp;Suitcase Rolling</option>
                                    <option value="fas fa-swimmer">&#xf5c4;&nbsp;Swimmer</option>
                                    <option value="fas fa-swimming-pool">&#xf5c5;&nbsp;Swimming Pool</option>
                                    <option value="fas fa-taxi">&#xf1ba;&nbsp;Taxi</option>
                                    <option value="fas fa-tram">&#xf7da;&nbsp;Tram</option>
                                    <option value="fas fa-tv">&#xf26c;&nbsp;Television</option>
                                    <option value="fas fa-umbrella-beach">&#xf5ca;&nbsp;Umbrella Beach</option>
                                    <option value="fas fa-wine-glass">&#xf4e3;&nbsp;Wine Glass</option>
                                    <option value="fas fa-wine-glass-alt">&#xf5ce;&nbsp;Alternate Wine Glas</option>
                                    <option value="fas fa-accessible-icon">&#xf368;&nbsp;Accessible Icon</option>
                                    <option value="fas fa-address-book">&#xf2b9;&nbsp;Address Book</option>
                                    <option value="fas fa-address-card">&#xf2bb;&nbsp;Address Card</option>
                                    <option value="fas fa-baby">&#xf77c;&nbsp;Baby</option>
                                    <option value="fas fa-bed">&#xf236;&nbsp;Bed</option>
                                    <option value="fas fa-biking">&#xf84a;&nbsp;Biking</option>
                                    <option value="fas fa-blind">&#xf29d;&nbsp;Blind</option>
                                    <option value="fas fa-chalkboard-teacher">&#xf51c;&nbsp;Chalkboard Teacher</option>
                                    <option value="fas fa-child">&#xf1ae;&nbsp;Child</option>
                                    <option value="fas fa-female">&#xf182;&nbsp;Female</option>
                                    <option value="fas fa-frown">&#xf119;&nbsp;Frowning Face</option>
                                    <option value="fas fa-hiking">&#xf6ec;&nbsp;Hiking</option>
                                    <option value="fas fa-id-badge">&#xf2c1;&nbsp;Identification Badge</option>
                                    <option value="fas fa-id-card">&#xf2c2;&nbsp;Identification Card</option>
                                    <option value="fas fa-id-card-alt">&#xf47f;&nbsp;Alternate Identification Card</option>
                                    <option value="fas fa-male">&#xf183;&nbsp;Male</option>
                                    <option value="fas fa-meh">&#xf11a;&nbsp;Neutral Face</option>
                                    <option value="fas fa-people-arrows">&#xe068;&nbsp;People Arrows</option>
                                    <option value="fas fa-people-carry">&#xf4ce;&nbsp;People Carry</option>
                                    <option value="fas fa-person-booth">&#xf756;&nbsp;Person Entering Booth</option>
                                    <option value="fas fa-poo">&#xf2fe;&nbsp;Poo</option>
                                    <option value="fas fa-portrait">&#xf3e0;&nbsp;Portrait</option>
                                    <option value="fas fa-power-off">&#xf011;&nbsp;Power Off</option>
                                    <option value="fas fa-pray">&#xf683;&nbsp;Pray</option>
                                    <option value="fas fa-restroom">&#xf7bd;&nbsp;Restroom</option>
                                    <option value="fas fa-running">&#xf70c;&nbsp;Running</option>
                                    <option value="fas fa-skating">&#xf7c5;&nbsp;Skating</option>
                                    <option value="fas fa-skiing">&#xf7c9;&nbsp;Skiing</option>
                                    <option value="fas fa-skiing-nordic">&#xf7ca;&nbsp;Skiing Nordic</option>
                                    <option value="fas fa-smile">&#xf118;&nbsp;Smiling Face</option>
                                    <option value="fas fa-snowboarding">&#xf7ce;&nbsp;Snowboarding</option>
                                    <option value="fas fa-street-view">&#xf21d;&nbsp;Street View</option>
                                    <option value="fas fa-swimmer">&#xf5c4;&nbsp;Swimmer</option>
                                    <option value="fas fa-user-cog">&#xf4fe;&nbsp;User Cog</option>
                                    <option value="fas fa-user-edit">&#xf4ff;&nbsp;User Edit</option>
                                    <option value="fas fa-user-friends">&#xf500;&nbsp;User Friends</option>
                                    <option value="fas fa-user-graduate">&#xf501;&nbsp;User Graduate</option>
                                    <option value="fas fa-user-injured">&#xf728;&nbsp;User Injured</option>
                                    <option value="fas fa-user">&#xf007;&nbsp;User</option>
                                    <option value="fas fa-user-alt">&#xf406;&nbsp;Alternate User</option>
                                    <option value="fas fa-user-alt-slash">&#xf4fa;&nbsp;Alternate User Slash</option>
                                    <option value="fas fa-user-astronaut">&#xf4fb;&nbsp;User Astronaut</option>
                                    <option value="fas fa-user-check">&#xf4fc;&nbsp;User Check</option>
                                    <option value="fas fa-user-circle">&#xf2bd;&nbsp;User Circle</option>
                                    <option value="fas fa-user-clock">&#xf4fd;&nbsp;User Clock</option>
                                    <option value="fas fa-user-lock">&#xf502;&nbsp;User Lock</option>
                                    <option value="fas fa-user-md">&#xf0f0;&nbsp;Doctor</option>
                                    <option value="fas fa-user-minus">&#xf503;&nbsp;User Minus</option>
                                    <option value="fas fa-user-ninja">&#xf504;&nbsp;User Ninja</option>
                                    <option value="fas fa-user-nurse">&#xf82f;&nbsp;Nurse</option>
                                    <option value="fas fa-user-plus">&#xf234;&nbsp;User Plus</option>
                                    <option value="fas fa-user-secret">&#xf21b;&nbsp;User Secret</option>
                                    <option value="fas fa-user-shield">&#xf505;&nbsp;User Shield</option>
                                    <option value="fas fa-user-slash">&#xf506;&nbsp;User Slash</option>
                                    <option value="fas fa-user-tag">&#xf507;&nbsp;User Tag</option>
                                    <option value="fas fa-user-tie">&#xf508;&nbsp;User Tie</option>
                                    <option value="fas fa-user-times">&#xf235;&nbsp;Remove User</option>
                                    <option value="fas fa-users">&#xf0c0;&nbsp;Users</option>
                                    <option value="fas fa-users-cog">&#xf509;&nbsp;Users Cog</option>
                                    <option value="fas fa-users-slash">&#xe073;&nbsp;Users Slash</option>
                                    <option value="fas fa-walking">&#xf554;&nbsp;Walking</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-accessible-icon">&#xf368;&nbsp;Accessible Icon</option>
                                    <option value="fas fa-ambulance">&#xf0f9;&nbsp;ambulance</option>
                                    <option value="fas fa-baby-carriage">&#xf77d;&nbsp;Baby Carriage</option>
                                    <option value="fas fa-bicycle">&#xf206;&nbsp;Bicycle</option>
                                    <option value="fas fa-bus">&#xf207;&nbsp;Bus</option>
                                    <option value="fas fa-bus-alt">&#xf55e;&nbsp;Bus Alt</option>
                                    <option value="fas fa-car">&#xf1b9;&nbsp;Car</option>
                                    <option value="fas fa-car-alt">&#xf5de;&nbsp;Alternate Car</option>
                                    <option value="fas fa-car-crash">&#xf5e1;&nbsp;Car Crash</option>
                                    <option value="fas fa-car-side">&#xf5e4;&nbsp;Car Side</option>
                                    <option value="fas fa-fighter-jet">&#xf0fb;&nbsp;fighter-jet</option>
                                    <option value="fas fa-helicopter">&#xf533;&nbsp;Helicopter</option>
                                    <option value="fas fa-horse">&#xf6f0;&nbsp;Horse</option>
                                    <option value="fas fa-motorcycle">&#xf21c;&nbsp;Motorcycle</option>
                                    <option value="fas fa-paper-plane">&#xf1d8;&nbsp;Paper Plane</option>
                                    <option value="fas fa-plane">&#xf072;&nbsp;plane</option>
                                    <option value="fas fa-rocket">&#xf135;&nbsp;rocket</option>
                                    <option value="fas fa-ship">&#xf21a;&nbsp;Ship</option>
                                    <option value="fas fa-shopping-cart">&#xf07a;&nbsp;shopping-cart</option>
                                    <option value="fas fa-shuttle-van">&#xf5b6;&nbsp;Shuttle Van</option>
                                    <option value="fas fa-sleigh">&#xf7cc;&nbsp;Sleigh</option>
                                    <option value="fas fa-snowplow">&#xf7d2;&nbsp;Snowplow</option>
                                    <option value="fas fa-space-shuttle">&#xf197;&nbsp;Space Shuttle</option>
                                    <option value="fas fa-subway">&#xf239;&nbsp;Subway</option>
                                    <option value="fas fa-taxi">&#xf1ba;&nbsp;Taxi</option>
                                    <option value="fas fa-tractor">&#xf722;&nbsp;Tractor</option>
                                    <option value="fas fa-train">&#xf238;&nbsp;Train</option>
                                    <option value="fas fa-tram">&#xf7da;&nbsp;Tram</option>
                                    <option value="fas fa-truck">&#xf0d1;&nbsp;truck</option>
                                    <option value="fas fa-truck-monster">&#xf63b;&nbsp;Truck Monster</option>
                                    <option value="fas fa-truck-pickup">&#xf63c;&nbsp;Truck Side</option>
                                    <option value="fas fa-wheelchair">&#xf193;&nbsp;Wheelchair</option>
                                    <option value="fas fa-bolt">&#xf0e7;&nbsp;Lightning Bolt</option>
                                    <option value="fas fa-cloud">&#xf0c2;&nbsp;Cloud</option>
                                    <option value="fas fa-cloud-meatball">&#xf73b;&nbsp;Cloud with (a chance of) Meatball</option>
                                    <option value="fas fa-cloud-moon">&#xf6c3;&nbsp;Cloud with Moon</option>
                                    <option value="fas fa-cloud-moon-rain">&#xf73c;&nbsp;Cloud with Moon and Rain</option>
                                    <option value="fas fa-cloud-rain">&#xf73d;&nbsp;Cloud with Rain</option>
                                    <option value="fas fa-cloud-showers-heavy">&#xf740;&nbsp;Cloud with Heavy Showers</option>
                                    <option value="fas fa-cloud-sun">&#xf6c4;&nbsp;Cloud with Sun</option>
                                    <option value="fas fa-cloud-sun-rain">&#xf743;&nbsp;Cloud with Sun and Rain</option>
                                    <option value="fas fa-meteor">&#xf753;&nbsp;Meteor</option>
                                    <option value="fas fa-moon">&#xf186;&nbsp;Moon</option>
                                    <option value="fas fa-poo-storm">&#xf75a;&nbsp;Poo Storm</option>
                                    <option value="fas fa-rainbow">&#xf75b;&nbsp;Rainbow</option>
                                    <option value="fas fa-smog">&#xf75f;&nbsp;Smog</option>
                                    <option value="fas fa-snowflake">&#xf2dc;&nbsp;Snowflake</option>
                                    <option value="fas fa-sun">&#xf185;&nbsp;Sun</option>
                                    <option value="fas fa-temperature-high">&#xf769;&nbsp;High Temperature</option>
                                    <option value="fas fa-temperature-low">&#xf76b;&nbsp;Low Temperature</option>
                                    <option value="fas fa-umbrella">&#xf0e9;&nbsp;Umbrella</option>
                                    <option value="fas fa-water">&#xf773;&nbsp;Water</option>
                                    <option value="fas fa-wind">&#xf72e;&nbsp;Wind</option>
                                    <option value="fas fa-glass-whiskey">&#xf7a0;&nbsp;Glass Whiskey</option>
                                    <option value="fas fa-icicles">&#xf7ad;&nbsp;Icicles</option>
                                    <option value="fas fa-igloo">&#xf7ae;&nbsp;Igloo</option>
                                    <option value="fas fa-mitten">&#xf7b5;&nbsp;Mitten</option>
                                    <option value="fas fa-skating">&#xf7c5;&nbsp;Skating</option>
                                    <option value="fas fa-skiing">&#xf7c9;&nbsp;Skiing</option>
                                    <option value="fas fa-skiing-nordic">&#xf7ca;&nbsp;Skiing Nordic</option>
                                    <option value="fas fa-snowboarding">&#xf7ce;&nbsp;Snowboarding</option>
                                    <option value="fas fa-snowplow">&#xf7d2;&nbsp;Snowplow</option>
                                    <option value="fas fa-tram">&#xf7da;&nbsp;Tram</option>
                                    <option value="fas fa-archive">&#xf187;&nbsp;Archive</option>
                                    <option value="fas fa-blog">&#xf781;&nbsp;Blog</option>
                                    <option value="fas fa-book">&#xf02d;&nbsp;book</option>
                                    <option value="fas fa-bookmark">&#xf02e;&nbsp;bookmark</option>
                                    <option value="fas fa-edit">&#xf044;&nbsp;Edit</option>
                                    <option value="fas fa-envelope">&#xf0e0;&nbsp;Envelope</option>
                                    <option value="fas fa-envelope-open">&#xf2b6;&nbsp;Envelope Open</option>
                                    <option value="fas fa-eraser">&#xf12d;&nbsp;eraser</option>
                                    <option value="fas fa-file">&#xf15b;&nbsp;File</option>
                                    <option value="fas fa-file-alt">&#xf15c;&nbsp;Alternate File</option>
                                    <option value="fas fa-folder">&#xf07b;&nbsp;Folder</option>
                                    <option value="fas fa-folder-open">&#xf07c;&nbsp;Folder Open</option>
                                    <option value="fas fa-keyboard">&#xf11c;&nbsp;Keyboard</option>
                                    <option value="fas fa-newspaper">&#xf1ea;&nbsp;Newspaper</option>
                                    <option value="fas fa-paper-plane">&#xf1d8;&nbsp;Paper Plane</option>
                                    <option value="fas fa-paperclip">&#xf0c6;&nbsp;Paperclip</option>
                                    <option value="fas fa-paragraph">&#xf1dd;&nbsp;paragraph</option>
                                    <option value="fas fa-pen">&#xf304;&nbsp;Pen</option>
                                    <option value="fas fa-pen-alt">&#xf305;&nbsp;Alternate Pen</option>
                                    <option value="fas fa-pen-square">&#xf14b;&nbsp;Pen Square</option>
                                    <option value="fas fa-pencil-alt">&#xf303;&nbsp;Alternate Pencil</option>
                                    <option value="fas fa-quote-left">&#xf10d;&nbsp;quote-left</option>
                                    <option value="fas fa-quote-right">&#xf10e;&nbsp;quote-right</option>
                                    <option value="fas fa-sticky-note">&#xf249;&nbsp;Sticky Note</option>
                                    <option value="fas fa-thumbtack">&#xf08d;&nbsp;Thumbtack</option>

                                </select>
                            </div>
                            <label class="control-label col-md-2">Active</label>
                            <div class="form-check">
                                <input class="form-check-input" name="active" type="checkbox" value="t" id="active">
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                          </div>
                              <div class="modal-footer">
                                  <button class="btn btn-primary" type="submit"><i class="fa fas fa-fw fas fa-lg fas fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" data-dismiss="modal" href="#"><i class="fa fas fa-fw fas fa-lg fas fa-times-circle"></i>Cancel</a>
                              </div>
                      </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
  {{--================================================= End module edit  ====================================--}}


<script>
    function edit(id){
        $("#editModule").modal("show");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                    url: '/module/edit',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN, id:id},
                    dataType: 'JSON',
                    success: function (data) {
                        $.each(data, function(i, value) {
                            const is_show=value.is_show;
                            const active=value.status;
                            $('#moduleId').val(value.id);
                            $('#editName').val(value.name);
                            $('#editIcon').val(value.icon);
                            $('#editSequence').val(value.sequence);
                            $('#editLink').val(value.link);
                            $('#editPrefix_code').val(value.code);
                            //use select must use this code
                            $('#editparent').val(""+value.parent_id);
                            $('#editparent').trigger('change');
                            //end
                            if(is_show=='1'){
                                $(':radio[value="t"]').prop('checked', true);
                            }else{
                                $(':radio[value="f"]').prop('checked', true);
                            }
                            if(active=='1'){
                                $(':checkbox[name="active"]').prop('checked',true);
                            }else{
                                $(':checkbox[name="active"]').prop('checked',false);
                            }

                        });
                    }
            });
        }
        $('.select2').select2();
</script>
<script type="text/javascript">
    function getParent(selectObject) {
        var value = selectObject.value;
        if(value=="null"){
            $("#prefix_code").prop("disabled", false);
        }else{
            $("#prefix_code").prop("disabled", true);
        }
    }
</script>
{{-- ====== disabled and endabled button ======= --}}
{{-- <script type="text/javascript">
    var checkboxes = $(".check-cls"),
    submitButt = $(".submit-btn");

    checkboxes.click(function() {
        submitButt.attr("disabled", !checkboxes.is(":checked"));
    });
</script> --}}
{{-- ============ delelet module access ========= --}}
<script type="text/javascript">
    function delete_access(id){
        module_access_id=id;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                    url: '/module/delete',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN, module_access_id:module_access_id},
                    dataType: 'JSON',
                    success: function (data) {

                        location.reload();
                    },
                    error: function (error) {

                    }
            });

    }
</script>
@endsection

