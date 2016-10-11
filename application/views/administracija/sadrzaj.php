  <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Content
                             <small> Add/delete menu links and add new user roles</small>
                        </h1>                       
                    </div>
                </div>
                
                
                <div class="row">
                    
                    <!-- Unos linka -->
                    <div class="col-lg-6">                        
                        <h2>Insert menu link</h2>
                        <?php echo form_open();?>
                         <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbMenu','placeholder'=>'Menu reference', 'class'=>'form-control input-lg')); ?>                                                      <i class="fa fa-road"></i>
                    </div>
                         <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbLink','placeholder'=>'Menu link', 'class'=>'form-control input-lg')); ?>                                                      <label class="glyphicon glyphicon-link"></label>
                    </div>
                        <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesiLink'),'Add new link'); ?>
                        <?php echo form_close(); ?>
                        <h2>Delete menu link</h2>
                        <?php echo $tabela; ?>  
                    </div>
                    <!-- Kraj unosa linka -->
                    
                    <!-- Unog uloge -->
                    <div class="col-lg-6">                        
                          <h2>Insert user role</h2>
                           <?php echo form_open('administracija/sadrzaj/stranice');?>
                           <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbUloga','placeholder'=>'User role', 'id'=>'dugme', 'class'=>'form-control input-lg')); ?>                                                     <i class="fa fa-user"></i>
                    </div>
                          <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUloga'),'Add new role'); ?>
                        <?php echo form_close(); ?>
                   <!-- kraj unos uloge -->
                          
                          <h2>Delete user role</h2>
                          <?php echo $uloge; ?>  
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->