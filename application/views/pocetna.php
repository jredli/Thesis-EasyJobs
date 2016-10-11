 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h3 class="page-header">
                    EasyJobs
                    <small>Sign in or Register</small>
                    
                </h3>

            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-4x">
                              <i style="color:#34495E" class="fa fa-circle fa-stack-2x"></i>
                              <i style="color:mintcream" class="fa fa-list-alt  fa-stack-1x fa-warrning"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <p>Posts:</p><div id="count-test"></div>
                    </div>
                </div>
            </div>
                <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-4x">
                              <i  style="color:#34495E" class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i style="color:mintcream" class="fa fa-users fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <p>Users:</p><div id="count-test1"></div>
                    </div>
                </div>
            </div>
                <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-4x">
                              <i  style="color:#34495E" class="fa fa-circle fa-stack-2x text-muted"></i>
                              <i style="color:mintcream" class="fa fa-comments fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <p>Comments:</p><div id="count-test2"></div>
                    </div>
                </div>
            </div>
                
                <div class="col-md-12">

                <!-- First Blog Post -->
              
                <a href="blog-post.html">
                    <img class="img-responsive img-hover" src="<?php echo base_url() ?>/assets/img/jobs.jpg" alt="">
                </a>
                <hr>
                

                

            </div>
              

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuerySimpleCounter.js"></script>
	<script type="text/javascript">

		$('#count-test').jQuerySimpleCounter({
			end:<?php echo $brOglasa; ?>,
			duration: 2000
		});

	</script>
         <script type="text/javascript">

		$('#count-test1').jQuerySimpleCounter({
			end:<?php echo $brKor; ?>,
			duration: 2000
		});

	</script>
        <script type="text/javascript">

		$('#count-test2').jQuerySimpleCounter({
			end:<?php echo $brKom; ?>,
			duration: 2000
		});

	</script>


                </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                    <!-- Login forma -->
                   
                            <?php if(!isset($session['uloga'])){?>
                     <div class="tile">
                                    <?php print form_open('postovi/index',$formaAttr); ?>
                                        <h4>Sign in here!</h4>
                                             <div class="form-group icon-addon addon-lg">
                                                    <?php print form_input($username); ?>                                                 
                                                    <label class="glyphicon glyphicon-user"></label>
                                             </div>
                                             <div class="form-group icon-addon addon-lg">                                                 
                                                    <?php print form_input($password); ?>
                                                    <label class="glyphicon glyphicon-lock"></label>
                                             </div>
                                 <div class="form-group">
                                                     <?php print form_button($dugme);?>
                                                     <?php echo anchor('strane/registracija', 'Register here', 'class="btn btn-block btn-sm btn-inverse"');?>
                                    
                                 </div>
                                    <?php print form_close(); ?>
                    </div>
                    
                  
                                                
                        <div class="col-md-12">
                            <div id="anketaPrikaz">
                              <div class="tile">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-signal"></span>Poll 
                    </h3>
                </div>
                <div class="panel-body">
                     
                         <table>
                         <tr>
                         <?php foreach ($sveAnkete as $anketa): ?>
                         <td colspan="2"><?php echo $anketa->Naziv ?></td>
                         <td></td>
                         <?php endforeach; ?>
                         </tr>
                         <tr id='rezultatAnkete'>
                         <?php
                         $i = 0;
                         foreach ($anketeOdgovori as $odgovori): $i++;
                         ?>
                         <td <?php if ($i % 2 == 0) { ?>class='padding-right-
                        30'<?php } ?>><input type="radio" <?php if ($i % 2 == 0) { ?>
                        checked="true" <?php } ?> name="<?php echo $odgovori['idAnketa']
                        ?>" value="<?php echo $odgovori['id']; ?>"/><?php echo
                        $odgovori['Odgovor'] ?></td>
                         <?php endforeach; ?>
                         </tr>
                         </table>
                         <br>
                         <?php if ($sveAnkete): ?>
                         <button type="button" class="anketaGlasaj btn btn-primary btn-sm">Glasaj</button>
                         <?php endif; ?>
                </div>
              
            </div>
        </div>

                    </div>
                    
                    </div>
                    
                    <?php }  else{?>
                     <!-- /.input-group -->
                     
                    <!-- Novi oglas -->
                    <div class="tile">
                        <img src="<?php echo base_url(); ?>img/icons/png/cc.png" alt="Infinity-Loop" class="tile-image">
                        
                        <p>Vector-based shapes and minimum of layer styles.</p>
                        <a class="btn btn-primary btn-large btn-block" href="<?php echo base_url().'postovi/novi_post'?>">New post</a>
                       
                    </div>
                    

                                         <!-- Kraj novog oglasa -->
                         <?php } ?>
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
       