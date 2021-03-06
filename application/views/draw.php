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
    <link rel="stylesheet" href="<?php echo base_url('css/main.css')?>">
    <!-- MODAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/modal.css')?>">


    <!-- JQUERY -->
    <script src="<?php echo base_url('js/helper/jquery.min.js')?>"></script>
    <!-- POPPER JS -->
    <script src="<?php echo base_url('js/helper/popper.min.js')?>"></script>
    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url('js/helper/bootstrap.min.js')?>"></script>
    <!-- GREINER - HORMANN POLYGON CLIPPING ALGORITHM -->
    <script src="<?php echo base_url('js/helper/clip.js')?>"></script>
    <!-- D3 JS SCRIPT -->
    <script src="<?php echo base_url('js/d3.min.js')?>"></script>
    <!-- FONTAWESOME JS -->
    <script src="<?php echo base_url('assets/fontawesome/js/all.min.js')?>"></script>
    <!-- APP CLASS JS -->
    <script src="<?php echo base_url('js/app.class.js')?>" type="module" defer></script>
    <!-- MODAL JS -->
    <script src="<?php echo base_url('js/modal.js')?>"></script>

</head>

<body>
    <!-- 
    //////////////////////////////// --- H E A D E R ---  ////////////////////////////////
    -->
    <section class="header">
        <div class="title-bar">
            <img class="logo" src="<?php echo base_url('assets/logo/logo2.svg')?>" alt="logo" width="130">
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-item" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            File
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" data-menu-item="new file" id="open-btn">New File</a>
                            <a class="dropdown-item" href="#" data-menu-item="import map">Import Map</a>
                            <input class="import-map-file" type="file" style="display:none">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-menu-item="add image">Add Image</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-item" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Edit
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Undo</a>
                            <a class="dropdown-item" href="#">Redo</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Clear</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-item" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Options
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown ml-2 mr-2">
                        <a class="nav-link tool menu-item" href="#" role="button"><img data-tool="select" src="<?php echo base_url('assets/icons/select.svg')?>" alt="tool" width="20"></a>
                    </li>
                    <li class="nav-item dropdown ml-2 mr-2">
                        <a class="nav-link tool menu-item" href="#" role="button"><img data-tool="select" src="<?php echo base_url('assets/icons/text.svg')?>" alt="tool" width="20"></a>
                    </li>
                    <li class="nav-item dropdown ml-2 mr-2">
                        <a class="nav-link tool menu-item" href="#" role="button"><img data-tool="select" src="<?php echo base_url('assets/icons/pen.svg')?>" alt="tool" width="20"></a>
                    </li>
                    <li class="nav-item dropdown ml-2 mr-2">
                        <a class="nav-link tool menu-item" href="#" role="button"><img data-tool="select" src="<?php echo base_url('assets/icons/rectangle.svg')?>" alt="tool" width="20"></a>
                    </li>
                    <li class="nav-item dropdown ml-2 mr-2">
                        <a class="nav-link tool menu-item" href="#" role="button"><img data-tool="select" src="<?php echo base_url('assets/icons/line.svg')?>" alt="tool" width="20"></a>
                    </li>
                    <li class="nav-item dropdown ml-2 mr-2">
                        <a class="nav-link tool menu-item" href="#" role="button"><img data-tool="select" src="<?php echo base_url('assets/icons/bezier.svg')?>" alt="tool" width="20"></a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="nav-link object-toggle dropdown-toggle" href="#" id="abc">
                            <img src="<?php echo base_url('assets/objects/sofa_icon.svg')?>" alt="" width="20">
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="abc" name="align-center">
                            <img src="<?php echo base_url('assets/icons/chevron.svg')?>" alt="" width="20">
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="abc" name="print">
                            <img src="<?php echo base_url('assets/icons/print.svg')?>" alt="" width="20">
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-1">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="zoom-state" data-zoom-state="disable" name="zoom-state">
                            <img src="<?php echo base_url('assets/icons/zoom-disable.svg')?>" alt="" width="20">
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <div class="container mr-1">
                            <input type="number" class="form-control form-control-sm zoom-display" value="100">
                            <a href="#" class="dropdown-toggle zoom-options" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                            <span class="percent-icon">%</span>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" data-zoom="35">35 %</a>
                                <a class="dropdown-item" href="#" data-zoom="50">50 %</a>
                                <a class="dropdown-item" href="#" data-zoom="100">100 %</a>
                                <a class="dropdown-item" href="#" data-zoom="200">200 %</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-zoom="fit">Fit to screen</a>
                            </div>
                        </div>

                        <!-- <a class="nav-link dropdown-toggle menu-item zoom-display" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            100 %
                        </a> -->
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <!-- 
    //////////////////////////////// --- D R A W  A R E A ---  ////////////////////////////////
    -->
    <section id="drawArea"></section>

    <!-- 
    //////////////////////////////// --- O B J E C T B A R ---  ////////////////////////////////
    -->
    <section id="objectbar" class="overflow-auto">
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/singe_sofa.svg')?>">
            <img src="<?php echo base_url('assets/objects/sofa_icon.svg')?>" alt="" width="20" title="single sofa">
        </div>
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/single_bed.svg')?>">
            <img src="<?php echo base_url('assets/objects/single_bed_icon.svg')?>" alt="" width="20" title="single bed" title="chair icon">
        </div>
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/double_bed.svg')?>">
            <img src="<?php echo base_url('assets/objects/double_bed_icon.svg')?>" alt="" width="20" title="double bed">
        </div>
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/bathtub_icon.svg')?>">
            <img src="<?php echo base_url('assets/objects/bathtub_icon.svg')?>" alt="" width="20" title="bathtub">
        </div>
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/bookshelf_icon.svg')?>">
            <img src="<?php echo base_url('assets/objects/bookshelf_icon.svg')?>" alt="" width="20" title="bookshelf">
        </div>
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/table01.svg')?>">
            <img src="<?php echo base_url('assets/objects/dining_table_icon.svg')?>" alt="" width="20" title="dinning table">
        </div>
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/wardrobe_02_icon.svg')?>">
            <img src="<?php echo base_url('assets/objects/wardrobe_02_icon.svg')?>" alt="" width="20" title="wardrobe">
        </div>
        <div class="d-flex justify-content-center align-items-center object-item" data-src="<?php echo base_url('assets/objects/study_table.svg')?>">
            <img src="<?php echo base_url('assets/objects/table_01_icon.svg')?>" alt="" width="20" title="table">
        </div>

    </section>

    <!-- 
    //////////////////////////////// --- R I G H T  S I D E B A R ---  ////////////////////////////////
    -->
    <section id="rightSidebar">

        <div class="actionbox container p-2 border mb-3"></div>

        <div class="properties-section structure pb-2  border-bottom d-none">
            <h5 class="text-uppercase text-sm overflow-elipsis properties-title object">canvas</h5>
            <div class="row no-gutters">
                <div class="col-md-5 ml-2 mr-2">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">X</span>
                        </div>
                        <input data-object-attribute="x" type="number" class="form-control text-sm" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <div class="col-md-5 ml-2 mr-2">
                    <div class=" input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Y</span>
                        </div>
                        <input data-object-attribute="y" type="number" class="form-control text-sm" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>

                <div class="col-md-5 ml-2 mr-2">
                    <div class=" input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">W</span>
                        </div>
                        <input data-object-attribute="width" type="number" class="form-control text-sm" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>

                <div class="col-md-5 ml-2 mr-2">
                    <div class=" input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">H</span>
                        </div>
                        <input data-object-attribute="height" type="number" class="form-control text-sm" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>

                <div class="col-md-5 ml-2 mr-2">
                    <div class=" input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><img src="<?php echo base_url('assets/icons/angle.svg')?>" alt="angle" width="12"></span>
                        </div>
                        <input data-object-attribute="angle" type="number" class="form-control text-sm" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>
        </div>

        <!-- OPACITY ATTRIBUTE -->
        <div class="properties-section opacity structure pb-2  border-bottom ">
            <h5 class="text-uppercase text-sm overflow-elipsis properties-title object">opacity</h5>
            <div class="col-md-12 ml-2 mr-2">
                <div class="slide-container d-flex justify-content-between align-items-center">
                    <input type="range" min="0.1" max="1" step="0.1" value="1" class="slider" id="myRange">
                    <span class="range-value">1</span>
                  </div>
            </div>
        </div>

        <div class="mt-3 properties-section fill d-none">
            <h5 class="text-uppercase text-sm overflow-elipsis properties-title"> Fill</h5>
            <div class="row border-bottom no-gutters">
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#E1F5FE" style="background-color: #E1F5FE;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#29B6F6"  style="background-color: #29B6F6;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#FFCDD2"  style="background-color: #FFCDD2;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete active" data-color="#EF5350"  style="background-color: #EF5350;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#E1BEE7"  style="background-color: #E1BEE7;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#AB47BC"  style="background-color: #AB47BC;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#C8E6C9"  style="background-color: #C8E6C9;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#66BB6A"  style="background-color: #66BB6A;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#FFF9C4"  style="background-color: #FFF9C4;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#FFEE58"  style="background-color: #FFEE58;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#FFCCBC"  style="background-color: #FFCCBC;"></div></div>
                <div class="col-md-1 ml-2 mr-2 mb-3"><div class="color-pallete" data-color="#FF7043"  style="background-color: #FF7043;"></div></div>
            </div>
        </div>
        <div class="mt-3 properties-section stroke d-none">
            <h5 class="text-uppercase text-sm overflow-elipsis properties-title">Stroke</h5>
            <div class="row border-bottom no-gutters">
                <div class="col-md-4 ml-2 mr-2">
                    <div class=" input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><img src="<?php echo base_url('assets/icons/stroke.svg')?>" alt="angle" width="10"></span>
                        </div>
                        <input type="text" class="form-control text-center text-sm stroke-width" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="1">
                    </div>
                </div>
                <div class="col-md-6 ml-2 mr-2">
                    <div class=" input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><div class="color-box rounded-circle border"></div></span>
                        </div>
                        <input type="text" class="form-control text-center text-sm stroke-color" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="6495ED">
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 pb-3 properties-section decs">
            <h5 class="text-uppercase text-sm overflow-elipsis properties-title">Description</h5>
            <div class="container p-2 border property description text-sm overflow-scroll">

            </div>
        </div>
    </section>


    <!-- 
    //////////////////////////////// --- A P P  M O D A L ---  ////////////////////////////////
    -->

    <div class="modal fade bd-example-modal-lg" id="appModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header p-1 pl-3 pr-3">
              <h5 class="modal-title" id="exampleModalLongTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
          </div>
        </div>
    </div>

    <!-- 
    //////////////////////////////// --- A P P  A L E R T ---  ////////////////////////////////
    -->

    <div class="alert alert-dismissible pt-1 pb-1 pl-2 pr-2 fade" role="alert" id="appAlert">
        <strong class="text-capitalize text-bold"></strong> <span class="text-normal"></span>
        <button type="button" class="close p-0 pr-2" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- 
    //////////////////////////////// --- A P P  T O A S T ---  ////////////////////////////////
    -->

    <div class="modal" tabindex="-1" role="dialog" id="appToast">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header p-1 pl-3 pr-3">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p></p>
            </div>
            <div class="modal-footer p-1 pl-3 pr-3">
              <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal"></button>
            </div>
          </div>
        </div>
    </div>

</body>

</html>