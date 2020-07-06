<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vastuTeq</title>

    <!-- FAVICON -->
    <link rel="icon" href="<?php echo base_url('assets/icons/favicon.ico') ?>" type="image/ico">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.min.css') ?>">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/main.css') ?>">


    <!-- JQUERY -->
    <script src="<?php echo base_url('js/helper/jquery.min.js') ?>"></script>
    <!-- POPPER JS -->
    <script src="<?php echo base_url('js/helper/popper.min.js') ?>"></script>
    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url('js/helper/bootstrap.min.js') ?>"></script>
    <!-- FONTAWESOME JS -->
    <script src="<?php echo base_url('assets/fontawesome/js/all.min.js') ?>"></script>
    <!-- D3 JS -->
    <script src="<?php echo base_url('js/d3.min.js') ?>"></script>
    <!-- CUSTOM JS -->
    <script src="<?php echo base_url('js/dashboard.js') ?>" type="module" defer></script>
    <!-- Ajax library -->
    <script src="<?php echo base_url('js/MyScriptLibrary.js') ?>"></script>
    <!-- Notify library -->
    <script src="<?php echo base_url('js/bootstrap-notify.min.js') ?>"></script>
    <script>const base_url = '<?php echo base_url() ?>'</script>
</head>

<body>
    <!-- 
    //////////////////////////////// --- H E A D E R ---  ////////////////////////////////
    -->
    <section class="header" style="position:unset">
        <div class="title-bar">
            <img class="logo" src="<?php echo base_url('assets/logo/logo2.svg') ?>" alt="logo" width="130">
        </div>
        <div id="dynamicBar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Client & Property</li>
                </ol>
            </nav>
            <div class="dynamicbar-right">
                
                <img class="profile thumbnail rounded-circle" src="<?php echo base_url('assets/images/thumbnail.png') ?>" alt="user" width="20" id="profileButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileButton">
                    <a class="dropdown-item modal__trigger" href="#" data-modal="#modal3"><i class="fas fa-cog"></i>&nbsp;&nbsp;Setting</a>
                    <a class="dropdown-item" href="<?php echo base_url('Main/logout')?>"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign Out</a>
                </div>
            </div>
        </div>
    </section>










    <!-- 
    //////////////////////////////// --- Client & Property Form ---  ////////////////////////////////
    -->
    <div class="container">
        <div class="row">
            <div class="card col-md-12 p-0 mt-5">
                <div class="card-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Property
                    </h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('Main/addUser')?>" method="post" id="clientInfo">
                        <div>
                            <div class="form-row">
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Consultant name" required/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Mobile No.</label>                                    
                                    <input type="number" class="form-control form-control-sm" name="mNumber" placeholder="Consultant Phone Number" required />
                                    
                                   
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email"  class="form-control form-control-sm" name="email"  placeholder="Consultant email address" required>
                                   
                                </div>
                                
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                    <label for="inputEmail4">Password</label>
                                    <input type="text"  class="form-control form-control-sm" name="password"  placeholder="Password@#$1234" required>
                                   
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputAddress">Address</label>
                                    <textarea class="form-control form-control-sm" name="address"  placeholder="Consultant Address" required/>
                                    </textarea>
                                </div>
                            </div>
                            


                        </div>
                </div>
                <div class="card-footer text-muted">
                    <input type="submit" value="Save Info" class="btn btn-outline-primary btn-sm rounded-0 float-right">

                </div>
                </form>
            </div>

        </div>
    </div>
   
    </div>
    <?php if (!empty($this->session->flashdata('error'))) { ?>
        <script>
            let error = '<?php echo $this->session->flashdata('error'); ?>';
            showAlert(error, 'danger');
        </script>
    <?php } ?>
    <?php if (!empty($this->session->flashdata('success'))) { ?>
        <script>
            let error = '<?php echo $this->session->flashdata('success'); ?>';
            showAlert(error, 'success');
        </script>
    <?php } ?>
</body>

</html>