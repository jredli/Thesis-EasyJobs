 <div class="container">

        <div class="celaSirina">

            <!-- Blog Entries Column -->
                <h3 class="page-header">
                    Contact
                    <small>us</small>
                </h3>
            </div>           

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
              
              <?php print validation_errors('<div class="alert alert-danger" role="alert">','</div>');?>
                      <?php print form_open('strane/kontakt'); ?>
  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <?php print form_label('Name:');?>
                        <?php print form_input(array('name' => 'tbIme', 'class'=>'form-control', 'placeholder'=>'Your name')); ?>
                    </div>
 
     <div class="form-group">
        <?php print form_label('Email:');?>  
           <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
    <?php print form_input(array('name' => 'tbEmail', 'class'=>'form-control')); ?>
           </div>
     </div>
                    </div>
          <div class="col-md-6">
                        <div class="form-group">
         <?php print form_label('Message:');?>  
        <?php print form_textarea(array('name' => 'taPoruka', 'class'=>'form-control', 'rows'=>'9', 'cols'=>'25','placeholder'=>'Message')); ?>
                             </div>
                    </div>
    <div class="col-md-12">
     
    <?php print form_submit(array('name' => 'btnUnesi', 'value' => 'Send message','class'=>'button', 'class'=>'btn btn-primary btn-lg btn-block'), 'Send message') ?>
        
    </div>
                </div>
        <?php print form_close(); ?>
            </div>
            
            <?php echo $this->session->flashdata('uspeh'); ?>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>