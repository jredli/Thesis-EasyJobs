 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h3 class="page-header">
                    EasyJobs
                    <small>Choose a type of a Job advertisement</small>
                    
                </h3>

                
                <?php foreach($postovi as $post){ ?>
              <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post->naslov; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post->ime . ' '. $post->prezime; ?></a>
                </p>
                <p><i class="fa fa-clock-o"></i><?php echo $post->datum; ?></p>
                <hr>
                <a href="blog-post.html">
                     <img class="img-responsive" src="<?php echo base_url() . $post->p_slika; ?>" alt=""/>
                </a>
                <hr>
                <p><?php echo $post->tekst; ?></p>
                <a class="btn btn-primary" href="#">Read More <i class="fa fa-angle-right"></i></a>

                <hr>
                <?php } ?>


                </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                  
                   
                      
                    
                    
                    
                    
                 
                     
                    <!-- Novi oglas -->
                    <div class="tile">
                        <img src="<?php echo base_url(); ?>img/icons/png/cc.png" alt="Infinity-Loop" class="tile-image">
                        
                        <p>Vector-based shapes and minimum of layer styles.</p>
                        <a class="btn btn-primary btn-large btn-block" href="<?php echo base_url().'postovi/novi_post'?>">New post</a>
                       
                    </div>
                    

                                         <!-- Kraj novog oglasa -->
                    
            </div>

        </div>
        <!-- /.row -->
<div>
<!--   echo $strane; -->
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
       