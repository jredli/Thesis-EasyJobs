  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Poll management
                         <small> Edit or add new polls</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->     
                
                
                
                <div class="row">
                    <div class="col-lg-6">
                         <h2>Poll edit/delete</h2>
                    <?php echo $ankete; ?>                  
                    
                    </div>
                    <div class="col-lg-6">
                        <h2>New poll</h2>
                        <?php echo form_open('administracija/poll/editpoll'); ?>
                        
                        
                        <p class="text-center"><strong>Poll title</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbAnketa','placeholder'=>'Poll title', 'class'=>'form-control input-lg')); ?>                                                      <i class="fa fa-question-circle"></i>
                    </div>

               <p class="text-center"><strong>Answer 1</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbPitanje1','placeholder'=>'Answer 1', 'class'=>'form-control input-lg')); ?>                                                      <i class="fa fa-check-circle"></i>
                    </div>

                <p class="text-center"><strong>Answer 2</strong></p>
                    <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbPitanje2','placeholder'=>'Answer 2', 'class'=>'form-control input-lg')); ?>                                                      <i class="fa fa-check-circle"></i>
                    </div>

                     <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesiAnketu'),'Add new user'); ?>

                                <?php echo form_close(); ?>
                    </div>
               
                </div>
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->