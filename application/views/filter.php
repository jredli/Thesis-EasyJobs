 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h3 class="page-header">
                    EasyJobs
                    <small>Filtered jobs</small>
                </h3>
              
                
                <?php 
                if($postoviFilter==NULL){ 
                    echo "<h5>There are no jobs with those criterias.</h5>";
                }else{
                    foreach($postoviFilter as $f){ ?>
              <!-- First Blog Post -->
                <h2>
                    <?php echo anchor('postovi/post/'.$f->id_oglas, $f->naslov); ?>
                    
                </h2>
              
                <p>
                   <?php if($f->idTip==1){ 
                       echo 'Offer';
                       } else {
                           echo 'Demand';                           
                    } ?>  by <a href="index.php"><?php echo $f->ime . ' '. $f->prezime; ?></a> <i class="fa fa-clock-o"></i><?php echo $f->datum; ?> 
                </p>
                <p></p>
                <hr>
                <a href="blog-post.html">
                     <img class="img-responsive" src="<?php echo base_url() . $f->p_slika; ?>" alt=""/>
                </a>
                <hr>
                <p><?php echo $f->tekst; ?></p>
                <?php echo anchor('postovi/post/'.$f->id_oglas, 'Read more', array('class'=>'btn btn-primary')); ?>
              

                <hr>
                <?php } } ?>

                </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                
                    
             <div class="well">
             
             </div>
                <?php echo form_close(); ?>
               
       
            </div>

        </div>
        <!-- /.row -->
<div>

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
       