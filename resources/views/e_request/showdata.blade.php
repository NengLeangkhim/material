<section class="content">
    <div class="header">
        <div class="row">
            <div class="col-sm-12">
                <p class="title_khleave"​​​ style="margin-top: 10px;margin-left: 0px;font-size: 23px">មើលសំណើផ្ទាល់ខ្លួន:</p>
            </div>
        </div>
    </div>
        @php
            echo $st;
        @endphp
        <div class="modal fade bd-example-modal-xl" id='more_detail' tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                 <div class="modal-content" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-family:khmer,cursive">ព័ត៌មានបន្ថែម</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id='modal_content_detail'></div>
                    ...
                </div>
            </div>
        </div>
</section>