 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h3 class="page-header">
                    EasyJobs
                    <small>Choose a type of a Job advertisement</small>
                    
                </h3>
          
              
                 <div class="col-md-12">               
               <img class="img-responsive img-hover" src="<?php echo base_url() ?>/assets/img/job.jpg" alt=""> 
                   <?php echo anchor('postovi/ponuda', 'earn money', 'class="btn btn-block btn-sm btn-inverse"');?>
                <p>Want to earn some money with your knowledge? Maybe one job post will grab your attention!</p>
                 </div>
                <hr>
                
                 <div class="col-md-12">               
               <img class="img-responsive img-hover" src="<?php echo base_url() ?>/assets/img/offer.png" alt="">
               
               <?php echo anchor('postovi/novi_post', 'Solve a problem', 'class="btn btn-block btn-sm btn-inverse"');?>
             
               <p>This is the place where you can solve your problems</p>
                 </div>
              


                </div>

            <!-- Blog Sidebar Widgets Column -->
          
                      <div class="col-md-4">
             <div class="well">
             <div class="single-footer-widget">              
                <h4>Latest job posts</h4>         
              <ul style="list-style-type: none;">
                  <?php foreach($poslednji as $po){ ?>
             <li><span class="fa fa-caret-right "></span><?php echo anchor('postovi/post/'.$po->id_oglas, $po->naslov); ?> </a></li>
                  <?php } ?>
              </ul>
              </div>
             </div>
                          <div class="well text-center">
                              <a href="cv"><button class="btn btn-inverse" type="button"> Applications <span class="badge"><?php echo $brcv; ?></span> </button></a>
                             <blockquote>
                                <p>Number of recived CV's</p>
                              </blockquote>
                        
                          </div>
             </div>
         </div>
            </div>

  
       