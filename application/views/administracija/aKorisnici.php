  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small> Edit, delete or add new users to the system</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->               
                <div class="row">
                    
                     <!-- Svi korisnici -->
                    <div class="col-lg-8">
                        <h2>Edit/Delete user</h2>
                        <div class="table-responsive">                            
                          <?php echo $tabela; ?>
                        </div>
                    </div>
                     <!-- Kraj korisnika -->
                     
                     <!-- Dodaj novog korisnika -->
                    <div class="col-lg-4">
                        <h2>New user</h2>
                         <div class="tile">
                             
             <!-- Forma za unos korisnika -->
                <?php echo form_open_multipart('administracija/admin/dashboard'); ?>

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

                  <p class="text-center"><strong>User role</strong></p>
                                    <div class="form-group icon-addon addon-lg">
                                     <?php echo form_dropdown('ddlUloge', array('0'=>'Choose...','1'=>'Admin', '2'=>'User'), 'korisnik', "class='btn btn-default dropdown-toggle'");?>
                                      
                                    </div>                                
                                
                               
                            
                                <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesiKorisnika'),'Add new user'); ?>

                                <?php echo form_close(); ?>
                            <!-- Kraj forme -->
                            
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