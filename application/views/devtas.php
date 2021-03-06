<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vastuTeq</title>
    <!-- FAVICON -->
    <link rel="icon" href="<?php echo base_url('assets/icons/favicon.ico')?>" type="image/ico">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css')?>">
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css')?>">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/devtas.css')?>">
    <script>const base_url = '<?php echo base_url()?>'</script>
</head>
<body>
    <section class="p-2 devtas-main d-flex justify-content-between align-items-center pl-3 pr-3">
        <section class="leftside">
        </section>
        <section class="rightside">
            <img src="<?php echo base_url('assets/images/chakra.png')?>" alt="" width="500">
        </section>
    </section>

    <!-- 
    //////////////////////////////// --- A P P  M O D A L ---  ////////////////////////////////
    -->

    <div class="modal fade bd-example-modal-lg " id="appModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header p-1 pl-3 pr-3">
              <h5 class="modal-title" id="devtaTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row" id="desc-container">
                    <div class="col-md-4 border-right">
                        <div class="top container">
                            <div class="devta-image">
                                <img id="devta-img" src="" alt="devta-img">
                            </div>
                        </div>
                        <div class="bottom container mt-3">
                            <div class="row">
                                <div class="col-md-4 text-uppercase text-sm" style="font-family: 'Raleway-SemiBold'">name:</div>
                                <div id="devta-name" class="col-md-7 text-uppercase text-sm"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-uppercase text-sm" style="font-family: 'Raleway-SemiBold'">direction:</div>
                                <div id="devta-direction" class="col-md-7 text-uppercase text-sm"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-uppercase text-sm" style="font-family: 'Raleway-SemiBold'">color:</div>
                                <div id="devta-color" class="col-md-7 text-uppercase text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 overflow-auto">
                        <div class="col-md-12">
                            <h5 class="title">Devta Sloka</h5>
                            <p id="devta-sloka" class="desc"></p>
                        </div>
                        <div class="col-md-12">
                            <h5 class="title">Devta Description</h5>
                            <p id="devta-description" class="desc"></p>
                        </div>
                        <div class="col-md-12">
                            <h5 class="title">Other Details</h5>
                            <ul id="other-details" class="desc"></ul>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>


    <!-- JQUERY -->
    <script src="<?php echo base_url('js/helper/jquery.min.js')?>"></script>
    <!-- POPPER JS -->
    <script src="<?php echo base_url('js/helper/popper.min.js')?>"></script>
    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url('js/helper/bootstrap.min.js')?>"></script>
    <!-- D3 JS SCRIPT -->
    <script src="<?php echo base_url('js/d3.min.js')?>"></script>
    <!-- FONTAWESOME JS -->
    <script src="<?php echo base_url('assets/fontawesome/js/all.min.js')?>"></script>
    <!-- CUSTOM JS -->
    <script src="<?php echo base_url('js/devtas.js')?>"></script>

</body>
</html>