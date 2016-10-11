 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php foreach($post as $p){ ?>
                
                <!-- Title -->
                <h1><?php echo $p->naslov; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $p->ime . ' '. $p->prezime; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $p->datum; ?></p>

                <hr>
                <img class="img-responsive" src="<?php echo base_url() . $p->p_slika; ?>" alt=""/>

                <!-- Post Content -->
                <div class="well">
              <p><?php echo $p->tekst; ?></p>
              
              <!-- Upload Cv-ja  -->
              <?php echo form_open_multipart('postovi/cvupload/'.$p->id_oglas); ?>
              
               <div class="form-group icon-addon addon-lg">
                         <?php echo form_upload(array('name'=>'fCv', 'class'=>'form-control')); ?>
                         <label class="glyphicon glyphicon-cloud-upload"></label>
                </div>
                          <?php echo form_submit(array('class'=>'btn btn-info btn-lg btn-block','name'=>'btnUnesiCv'),'Upload CV'); ?>
              
              <?php echo form_close(); ?>
              <!-- Kraj upload cv-ja -->
              
              
              
              
                </div>
                <?php } ?>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                   
                     <div class="form-group">
                    <h4>Leave a Comment:</h4>                    
                  
                    <form action="<?php echo base_url(); ?>komentari/dodaj_komentar/<?php echo $post[0]->id_oglas; ?>" method="post">                       
                        <?php echo form_textarea(array('class'=>'form-control', 'name'=>'taKomentar', 'rows'=>'3')); ?>   
                        <br/>
                        <?php echo form_button(array('type'=>'submit','name'=>'btnKomentar', 'class'=>'btn btn-primary'), 'Submit comment'); ?>
                    </form>                 
                    
                     </div>
                </div>
            
                <hr>

                <!-- Posted Comments -->

                <!-- K -->
                <?php foreach($komentari as $komentar){?>
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <!-- Slika korisnika -->
                       
                        <img class="slikakomentar" src="<?php echo base_url().$komentar->slika_thumb;  ?>"  alt="">
                        <!-- Kraj slika korisnika -->
                    </a>
                    <div class="well">
                    <div class="media-body">
                       
                            <small><?php echo $komentar->ime.' '.$komentar->prezime.' ';?>posted on: <?php echo $komentar->datum; ?></small>
                        
                            <p><?php echo $komentar->komentar; ?></p>
                    </div>
                    </div>
                </div>
                <!-- Kraj komentara -->
                <?php } ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                  

                  </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
         

    </div>
        