 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h3 class="page-header">
                    EasyJobs
                    <small>CV's</small>                    
                </h3>
                
                <?php echo $tabela; ?>
                
                </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                
                    
             <div class="well">
             <div class="single-footer-widget">              
               <div class="single-footer-widget">              
                <h4>Latest job posts</h4>         
              <ul style="list-style-type: none;">
                  <?php foreach($poslednji as $po){ ?>
             <li><span class="fa fa-caret-right "></span><?php echo anchor('postovi/post/'.$po->id_oglas, $po->naslov); ?> </a></li>
                  <?php } ?>
              </ul>
              </div>
              </div>
             </div>
                
                 
       
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
       