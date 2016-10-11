 
<div class="container">
    <div class="celaSirina">

 

            <!-- Blog Entries Column -->
                <h3 class="page-header">
                    New
                        <small>job post</small>
                </h3>
            </div>         
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3"></div>                
                          
                <!-- Forma za registraciju -->
                    <div class="col-md-6">
                        <div class="tile">
                  
                             <?php echo form_open_multipart('postovi/novi_post', array('role'=>'form')); ?>
                             <p class="text-left"><strong>Job title</strong></p>
                            <div class="form-group icon-addon addon-lg">
                                <?php echo form_input(array('name'=>'tbNaslov','placeholder'=>'Title', 'class'=>'form-control input-lg')); ?>                                                      <label class="glyphicon glyphicon-pencil"></label>
                            </div>
                             
                            <p class="text-left"><strong>Job description</strong></p>
                            <div class="form-group">
                                <?php echo form_textarea(array('name'=>'taTekst', 'class'=>'form-control','rows'=>'4')); ?>
                            </div>
                            
                            
                             
                            
                                
                           
                            
                             <p class="text-left"><strong>Company banner / logo</strong></p>
                            <div class="form-group icon-addon addon-lg">
                                
                                       
                                                                
                                <?php echo form_upload(array('name'=>'fSlika', 'class'=>'form-control')); ?>
                                <label class="glyphicon glyphicon-cloud-upload"></label>
                            </div>
                             
                             
                             <p class="text-left"><strong>Job type</strong></p>
                           
                             <div class="form-group">
                                <select name="ddlTipOgl" class='btn btn-inverse dropdown-toggle'>
                                <?php
                            foreach($tipoglasa as $tip)
                            {
                            ?>
                            <option value = "<?php echo $tip->idTip?>"><?php echo $tip->tip; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                            </div>
                             
                       
  
                   
    
    
    
                             
                            <p class="text-left"><strong>Line of work</strong></p>
                            <!-- Biranje grane posla -->
                             <div class="form-group">
                                <select name="ddlGrana" id="ddlGrana" class='btn btn-inverse dropdown-toggle'>
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
                            <!-- Kraj biranja grane posla -->
                            
                            <div id="gif"></div>
                                <p class="text-left"><strong>Job position</strong></p>
                            <div class="form-group">
                                
                             
                            <select name="ddlVrsta" id="ddlVrsta" class='btn btn-inverse dropdown-toggle'>
                                        <option value="">-- Select Type --</option>
                                        
                            </select>
                                <br/>
                             
                                </div>
                                
                       <?php echo form_submit(array('class'=>'btn btn-primary btn-lg btn-block','name'=>'btnUnesi'),'Next step'); ?>
                           
                        <?php echo form_close(); ?>
                        
                    </div>
                <!-- Kraj forme -->
                <div class="col-md-3"></div>
            </div>
             </div>
      </div>
    
    