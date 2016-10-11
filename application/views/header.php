<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EasyJobs</title>
   <script type="text/javascript"  
               src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquer  
               y-ui.min.js"></script>  
        
    <!-- Loading Bootstrap -->
    <link href="<?php echo base_url(); ?>dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="<?php echo base_url(); ?>dist/css/flat-ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>assets/css/footer-distributed-with-address-and-phones.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>dist/css/contact.css" rel="stylesheet" type="text/css"/>
    
    <link rel="shortcut icon" href="../img/logic.png">  
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>

 <script>
        $(document).ready(function(){
        
      $("#ddlGrana").change(function() {
        var grana_id = {"grana_id" : $('#ddlGrana').val()};
        console.log(grana_id);
      
        $.ajax({
          type: "POST",
          data: grana_id,
          url: "<?= base_url() ?>postovi/ajaxVrsta",
          
         success: function(data){
            
              var $el = $("#ddlVrsta");
                    $el.empty(); // remove old options
                    $el.append($("<option></option>")
                            .attr("value", '').text('Please Select'));
             
            $.each(data, function(i, data){
            $('#ddlVrsta').append("<option value='"+data.idVrstaPosla+"'>"+data.imeVrste+"</option>");
            });
           
             
           }
           
           
         });
       });
     });
</script>


<script>
 $(document).ready(function () {
 $(".anketaGlasaj").click(function () {
 var odgovori = [];
 $('input[type="radio"]:checked').each(function () {
 odgovori.push($(this).val());
 });
 $.ajax({
 type: "POST",
 url: '<?php echo base_url('anketa/odgovori'); ?>',
 data: {odgovori: odgovori},
 success: function (data) {
 $('#rezultatAnkete').empty();
 $('.anketaGlasaj').hide();
 $('#rezultatAnkete').append(data);
 }
 });
 });
 });
</script>

</head>

<body>

 <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
         <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="#">EasyJobs</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
               <?php if(isset($session['uloga'])){ ?> 
                     <?php if($session['uloga']=='admin'){ ?>
                             <?php foreach($meni1 as $m){ ?> 
                                 <li><?php echo anchor($m->putanja,$m->link); ?></li>
                             <?php } ?>              
                               
                     <?php } else if ($session['uloga']=='korisnik'){ ?>
                             <?php foreach($meni2 as $m){ ?> 
                                 <li><?php echo anchor($m->putanja,$m->link); ?></li>
                            
               <?php }}}else {
                   foreach($meni as $m){ ?> 
                    
                    <li><?php echo anchor($m->putanja,$m->link); ?></li>
                    
                    <?php }   ?>
                    <?php 
               } 
                      ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    