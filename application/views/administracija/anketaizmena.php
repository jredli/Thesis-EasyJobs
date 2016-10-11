  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit poll
                             <small> Edit current or add new polls</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->               
                <div class="row">
                    
                     <!-- Svi korisnici -->
                    
                     <!-- Kraj korisnika -->
                     
                     <!-- Dodaj novog korisnika -->
                    <div class="col-lg-12">
                        <h2>New user</h2>
                         <div class="tile">
                             
             <!-- Forma za unos korisnika -->
                <?php echo form_open_multipart('administracija/poll/izmenapoll/'.$id); ?>
 
                        <p class="text-center"><strong>Poll title</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbAnketa','placeholder'=>'Poll title', 'class'=>'form-control input-lg')); ?>                                                      <i class="fa fa-question-circle"></i>
                    </div>


                     <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnAnketaIzmena'),'Add new user'); ?>

                                <?php echo form_close(); ?>
                            <!-- Kraj forme -->
                            
                        </div>
                    </div>
                     <!-- Kraj novog korisnika -->
                </div>
                <!-- /.row -->
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->