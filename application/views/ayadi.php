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
    <link rel="stylesheet" href="<?php echo base_url('css/ayadi.css')?>">


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
</head>
<body>
    <section class="ayadi-container p-4">
        <div class="card p-2 pb-4">
            <h4 class="text-center">Ayadi Calculator</h4>
            <div class="container d-flex justify-content-center overflow-auto">
                <div class="w-25 border p-2">

                    <div class="container text-center border-bottom">
                        Property Dimensions
                    </div>

                    <div class="container mt-2">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm" for="exampleFormControlInput1">Length</label><span class="text-sm ml-2 text-danger unit-text">Feet</span>
                                    <input type="number" class="form-control form-control-sm text-sm" id="exampleFormControlInput1" placeholder="" name="length">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm" for="exampleFormControlInput1">Breadth</label><span class="text-sm ml-2 text-danger unit-text">Feet</span>
                                    <input type="number" class="form-control form-control-sm text-sm" id="exampleFormControlInput1" placeholder="" name="breadth">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm" for="exampleFormControlInput1">1 Hasta</label><span class="text-sm ml-2 text-danger">Inch</span>
                                    <input type="number" class="form-control form-control-sm text-sm" id="exampleFormControlInput1" placeholder="" name="hasta" value="33">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm" for="exampleFormControlInput1">Unit</label>
                                    <select class="form-control form-control-sm text-sm" name="dimension-unit">
                                        <option value="feet" selected>Feet</option>
                                        <option value="inch">Inch</option>
                                        <option value="meter">Meter</option>
                                        <option value="yard">Yard</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                       <div class="form-row">
                           <div class="col-md-6">
                               <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                    <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                    Aaya
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Vaara
                                     </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Amsha
                                     </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Dravya
                                     </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Rina
                                     </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Nakshatra
                                     </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Tithi
                                     </label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Yoga
                                     </label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Aayu
                                     </label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Vash Mandal
                                     </label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Vyaya
                                     </label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Yoni
                                     </label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-check">
                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                     <label class="form-check-label text-sm overflow-elipsis" for="defaultCheck1">
                                     Tarabala
                                     </label>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-sm" for="exampleFormControlInput1">Owners Nakshatra</label>
                                    <select class="form-control form-control-sm text-sm" name="owner-nakshatra">
                                    </select>
                                </div>
                             </div>
                       </div> 
                    </div>

                    <div class="container">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label text-sm overflow-elipsis" for="exampleRadios1">
                                      Detail Report
                                    </label>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label text-sm overflow-elipsis" for="exampleRadios1">
                                      Summary Report
                                    </label>
                                  </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-2 border-top pt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-primary btn-sm btn-block calculate-btn">Calculate</button>
                        </div>
                    </div>

                </div>

                <div class="w-75 border p-3 display-report-area overflow-auto text-center">
                    Ayadi Report Will Appear Here
                </div>
            </div>
        </div>
    </section>

    <script src="js/ayadi.js" type="module" defer></script>
</body>
</html>