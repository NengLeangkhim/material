<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1><i class="fas fa-code-branch"></i> Form Step by Step</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
{{-- Content --}}
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header"> </div> --}}
                    <div class="card-body">
                        <div id="smartwizard" style="border: none !important;">
                            <ul class="nav" style="background-color: #FFFFFF; border: none !important;">
                                <li><a class="nav-link" href="#step-1">Step 1</a></li>
                                <li><a class="nav-link" href="#step-2">Step 2</a></li>
                                <li><a class="nav-link" href="#step-3">Step 3</a></li>
                                <li><a class="nav-link" href="#step-4">Step 4</a></li>
                            </ul>
                            <div class="mt-4">
                                {{-- Form-1 --}}
                                <div id="step-1">
                                    <div class="row">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Name" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Email" required> </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Password" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Repeat password" required> </div>
                                    </div>
                                </div>
                                {{-- Form-2 --}}
                                <div id="step-2">
                                    <div class="row">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Address" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="City" required> </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="State" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Country" required> </div>
                                    </div>
                                </div>
                                {{-- Form-3 --}}
                                <div id="step-3">
                                    <div class="row">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Number" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Holder Name" required> </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="CVV" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Mobile Number" required> </div>
                                    </div>
                                </div>
                                {{-- Form-4 --}}
                                <div id="step-4">
                                    <div class="row">
                                        <div class="col-md-12"> <span>Thanks For submitting your details with BBBootstrap.com. we will send you a confirmation email. We will review your details and revert back.</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Script --}}
<script type="text/javascript">
    // Form step
    $(document).ready(function(){
        $('#smartwizard').smartWizard({
            'selected': 0,
            'theme': 'arrows',
            'justified': true,
            'autoAdjustHeight': true,
            'enableURLhash': false,
            'transition': {
                'animation': 'slide-horizontal',
                'speed': '400',
                'easing':''
            },
        });
    });
</script>
