  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->               
                <div class="row">
                    
                    
                     <!-- Dodaj novog korisnika -->
                     <div class="row">
            <div class="col-md-12">
                <div class="col-md-3"> </div>
                <div class="col-md-3">
                        <h2>New user</h2>
                         <div class="tile">
                             
             <!-- Forma za unos korisnika -->
                <?php echo form_open_multipart('strane/registracija'); ?>

                <p class="text-center"><strong>Firstname</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbIme','placeholder'=>'Firstname', 'class'=>'form-control input-lg')); ?>                                                      <label class="glyphicon glyphicon-user"></label>
                    </div>

               <p class="text-center"><strong>Lastname</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbPrezime','placeholder'=>'Lastname', 'class'=>'form-control input-lg')); ?>                                                      <label class="glyphicon glyphicon-user"></label>
                    </div>

                <p class="text-center"><strong>Email</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbEmail','placeholder'=>'Email', 'class'=>'form-control input-lg')); ?>                                                      <label class="glyphicon glyphicon-envelope"></label>
                    </div>

                <p class="text-center"><strong>Password</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbLozinka','placeholder'=>'Password', 'class'=>'form-control input-lg')); ?>                                                      <label class="glyphicon glyphicon-eye-open"></label>
                    </div>

                 <p class="text-center"><strong>Image</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_upload(array('name'=>'fKorSlika','placeholder'=>'Users image', 'class'=>'form-control input-lg')); ?>                                                      <label class="glyphicon glyphicon-picture"></label>
                    </div>
                            
                                
                               
                            
                                <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesiKorisnika'),'Add new user'); ?>

                                <?php echo form_close(); ?>
                            <!-- Kraj forme -->
                            
                        </div>
                        </div>
                    </div>
            
            </div> 
                     <!-- Kraj novog korisnika -->
                </div>
                <!-- /.row -->
                <!-- /.row -->

              
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->