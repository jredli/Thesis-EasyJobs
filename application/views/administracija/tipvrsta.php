  <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Job types
                             <small> Edit/delete/add types and categories of work</small>
                        </h1>                       
                    </div>
                </div>
                
                
                          
                <div class="row">
                    
                    <!-- Unos tipa -->
                    <div class="col-lg-4">                        
                        <h3>Insert job type</h3>
                        <?php echo form_open('administracija/vrstatip/tip');?>
                         <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbTip','placeholder'=>'Type name', 'class'=>'form-control input-lg')); ?>                                                   <i class="fa fa-arrow-right"></i>
                    </div>
                       
                        <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesiTip'),'Add new type'); ?>
                        <?php echo form_close(); ?>
                        <h3>Delete job type</h3>
                        <?php echo $tabela; ?>
                    </div>
                    <!-- Kraj unosa tipa -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!-- Unog vrste -->
                    <div class="col-lg-8"> 
                       
                        
                        <div class="col-lg-6">
                           <h3>Insert job category</h3>
                           
                        <?php echo form_open('administracija/vrstatip/tip');?>
                           <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbNovaGrana','placeholder'=>'Type job category', 'id'=>'Granadugme', 'class'=>'form-control input-lg')); ?>                                                     <i class="fa fa-arrow-right"></i>
                    </div>
                          
                           
                           <h3>Choose a line of work</h3>
                           <div class="form-group">
                                <select name="ddlGranaNova" class='btn btn-inverse dropdown-toggle'>
                                <?php
                                foreach($granaposla as $grana)
                                    {
                                    ?>
                                    <option value = "<?php echo $grana->granaposlaId?>"><?php echo $grana->grana; ?></option>
                                    <?php
                                    }
                                ?>
                                </select>
                            </div>
                           <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesiVrstu'),'Add new category'); ?>
                           
                        <?php echo form_close(); ?>
                           <h3>Delete job category</h3>
                             <?php echo $tabela1; ?>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         <div class="col-lg-6">
                          <h3>Insert line of work</h3>
                           <?php echo form_open('administracija/vrstatip/tip');?>
                           <div class="form-group icon-addon addon-lg">
                      <?php echo form_input(array('name'=>'tbNovaGrana','placeholder'=>'Type line of work', 'id'=>'Granadugme', 'class'=>'form-control input-lg')); ?>                                                     <i class="fa fa-arrow-right"></i>
                    </div>
                          <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesiGranu'),'Add new category'); ?>
                        <?php echo form_close(); ?>
                   <!-- kraj unos uloge -->
                          
                          
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        
     