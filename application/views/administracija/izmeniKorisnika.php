  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Korisnici
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->               
                <div class="row">
                    
                     <!-- Svi korisnici -->
                    
                     <!-- Kraj korisnika -->
                     
                     <!-- Dodaj novog korisnika -->
                    <div class="col-lg-4">
                        <h2>New user</h2>
                         <div class="tile">
                             
             <!-- Forma za unos korisnika -->
                <?php echo form_open_multipart('administracija/admin/izmeniKorisnika/'.$id); ?>

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


                  <p class="text-center"><strong>User role</strong></p>
                                    <div class="form-group icon-addon addon-lg">
                                     <?php echo form_dropdown('ddlUloge', array('0'=>'Choose...','1'=>'User', '2'=>'Admin'), 'korisnik', "class='btn btn-default dropdown-toggle'");?>
                                      
                                    </div>                                
                                
                               
                            
                                <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnPromeni'),'Add new user'); ?>

                                <?php echo form_close(); ?>
                            <!-- Kraj forme -->
                            
                        </div>
                    </div>
                     <!-- Kraj novog korisnika -->
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <h2>Contextual Classes</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Visits</th>
                                        <th>% New Visits</th>
                                        <th>Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr class="success">
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>Bootstrap Docs</h2>
                        <p>For complete documentation, please visit <a target="_blank" href="http://getbootstrap.com/css/#tables">Bootstrap's Tables Documentation</a>.</p>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->