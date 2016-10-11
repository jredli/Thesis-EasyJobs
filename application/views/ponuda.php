 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h3 class="page-header">
                    EasyJobs
                    <small>Search for jobs</small>
                </h3>

               
                <?php 
                    foreach($postovi as $post){ ?>
              <!-- First Blog Post -->
                <h2>
                    <?php echo anchor('postovi/post/'.$post->id_oglas, $post->naslov); ?>
                    
                </h2>
              <h4><?php echo $post->imeVrste; ?></h4>
                <p>
                   <?php if($post->idTip==1){ 
                       echo 'Offer';
                       } else {
                           echo 'Demand';                           
                    } ?>  by <a href="index.php"><?php echo $post->ime . ' '. $post->prezime; ?></a> <i class="fa fa-clock-o"></i><?php echo $post->datum; ?> 
                </p>
                <p></p>
                <hr>
                <a href="blog-post.html">
                     <img class="img-responsive" src="<?php echo base_url() . $post->p_slika; ?>" alt=""/>
                </a>
                <hr>
                <p><?php echo $post->tekst; ?></p>
                <?php echo anchor('postovi/post/'.$post->id_oglas, 'Read more', array('class'=>'btn btn-primary')); ?>
              

                <hr>
                <?php }  ?>

                </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                
                    
             <div class="well">
             <div class="single-footer-widget">              
                <h4>Job types</h4> 
                <p>Filter job posts by type and line:</p>
                <?php echo form_open('postovi/filter'); ?>
              <div class="btn-group">
                     
                  <div class="form-group">
                                <select name="ddlTip" class='btn btn-inverse dropdown-toggle'>
                                <?php
                            foreach($tipFilter as $tip)
                            {
                            ?>
                            <option value = "<?php echo $tip->idTip?>"><?php echo $tip->tip; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                 </div>
                  
                  <div class="form-group">
                                <select name="ddlGrana" class='btn btn-inverse dropdown-toggle'>
                                <?php
                            foreach($granaFilter as $grana)
                            {
                            ?>
                            <option value = "<?php echo $grana->granaposlaId?>"><?php echo $grana->grana; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                            </div>
                             
      <?php echo form_submit(array('class'=>'btn btn-info btn-lg btn-block','name'=>'btnFilter'),'Filter'); ?>
              
            
      </div>
              </div>
             </div>
                <?php echo form_close(); ?>
               
       
            </div>

        </div>
        <!-- /.row -->
<div>
<?php  echo $strane; ?>
<!--            <ul class="pagination">
              <li class="previous"><a href="#fakelink" class="fui-arrow-left"></a></li>
              <li class="active"><a href="#fakelink">1</a></li>
              <li><a href="#fakelink">2</a></li>
              <li><a href="#fakelink">3</a></li>
              <li><a href="#fakelink">4</a></li>
              <li><a href="#fakelink">5</a></li>
              <li><a href="#fakelink">6</a></li>
              <li><a href="#fakelink">7</a></li>
              <li><a href="#fakelink">8</a></li>
              <li><a href="#fakelink">9</a></li>
              <li><a href="#fakelink">10</a></li>
              <li class="pagination-dropdown dropup">
                <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fui-triangle-up"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#fakelink">10–20</a></li>
                  <li><a href="#fakelink">20–30</a></li>
                  <li><a href="#fakelink">40–50</a></li>
                </ul>
              </li>
              <li class="next"><a href="#fakelink" class="fui-arrow-right"></a></li>
            </ul>-->
          </div>
       