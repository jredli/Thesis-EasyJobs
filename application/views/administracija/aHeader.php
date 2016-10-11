<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

         <!-- Bootstrap Core CSS -->
     <!-- Loading Bootstrap -->
    <link href="<?php echo base_url(); ?>dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="<?php echo base_url(); ?>dist/css/flat-ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>assets/css/footer-distributed-with-address-and-phones.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>dist/css/contact.css" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/sb-admin.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url(); ?>"><i class="fa fa-backward"></i> <strong>Back to website</strong></a></li>
         
           </ul>
       
        </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <ul class="nav navbar navbar navbar-nav side-nav">
                    
                    
                    <li>
                        <?php echo anchor('administracija/admin/dashboard', '<i class="fa fa-fw fa-users"></i> Users'); ?>
                    </li>                   
                    
                    <li>
                        <?php echo anchor('administracija/oglasi/aOglasi', '<i class="fa fa-fw fa-navicon"></i> Job list'); ?>
                    </li>
                     
                    <li>
                        <?php echo anchor('administracija/sadrzaj/stranice', '<i class="fa fa-fw fa-link"></i> Menu and roles'); ?>
                    </li>
                     <li>
                        <?php echo anchor('administracija/akomentari/objavakom', '<i class="fa fa-fw fa-comments"></i> Comments'); ?>
                    </li>
                    <li>
                        <?php echo anchor('administracija/poll/editpoll', '<i class="fa fa-fw fa-question"></i> Poll management'); ?>
                    </li>
                     <li>
                        <?php echo anchor('administracija/vrstatip/tip', '<i class="fa fa-fw fa-sitemap"></i> Job types'); ?>
                    </li>
                </ul>
            <!-- /.navbar-collapse -->
        </nav>
        
      