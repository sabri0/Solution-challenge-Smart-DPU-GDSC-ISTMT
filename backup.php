<header class="site-header">
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                          
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-items-center">
                              
                                <li><a href="AjouterPatient.php">Ajouter patient</a></li>
                              

                                
								<li class="call-btn button gradient-bg mt-3 mt-md-0">
                                    <a class="d-flex justify-content-center align-items-center" href="index.php"><img src="images/R.png"> Retour</a>
                                </li>
								
                            </ul>
                        </nav><!-- .site-navigation -->

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>accueil</h1>

                <div class="breadcrumbs">
                    <ul class="d-flex flex-wrap align-items-center p-0 m-0">
                        <li>Home</li>
                        <li> accueil</li>
						<li>Patient</li>
                    </ul>
                </div><!-- .breadcrumbs -->
            </div>
        </div>
    </div>
        <div class="swiper-container hero-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide hero-content-wrap" style="background-image: url('images/S1.jpg')">
                    <div class="hero-content-overlay position-absolute w-100 h-100">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                    <header class="entry-header">
                                        <h2 style="color:black;">Dossier de 	 <?php  echo $patient["prenom"];?><?php echo " "; echo $patient['nom'];?></h2>
                                    </header><!-- .entry-header -->

                                   
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .container -->
                    </div><!-- .hero-content-overlay -->
                </div><!-- .hero-content-wrap -->
            </div><!-- .swiper-wrapper -->

           
        </div><!-- .hero-slider -->
    </header><!-- .site-header -->

    <div class="homepage-boxes">
        <div class="container">
            <div class="row">
<div class="col-md-6">

<h2 style="color:black;"> Video</h2>
   <form method="POST" enctype="multipart/form-data" >
<input type="file" name="filed" class="button " >
</br></br>
  <input type="submit" value="upload" name="upvid" class="button gradient-bg">
 
 </form>

</div>
            <div class="col-md-6">
			<h2 style="color:black;"> Document/Image</h2>
   <form method="POST" enctype="multipart/form-data" >
<input type="file" name="filed" class="button " >
</br></br>
  <input type="submit" value="upload" name="updoc" class="button gradient-bg">
 
 </form>
 </div>
            <div class="col-md-6">
            <h2 style="color:black;"> Image Radio </h2>
    <form method="POST" enctype="multipart/form-data" >
	
<input type="file" name="file" class="button">
</br></br>
  <input type="submit" value="upload" name="upim" class="button gradient-bg">
 
</form>
 </div>

            <div class="col-md-6">
			<h2 style="color:black;"> Archive</h2>
   <form method="POST" enctype="multipart/form-data" >
<input type="file" name="filed" class="button " >
</br></br>
  <input type="submit" value="upload" name="upzip" class="button gradient-bg">
 
 </form>
 </div>
 
 <div class="col-md-8" style="margin-top:15px; ">
 <form method='POST' action='post-note.php'>
 <textarea style="color:black;font-weight: bold;" rows="3" class="form-control" name='note' placeholder="Note"></textarea>
         
            <div class="pull-right">
            <input type="submit" value="save" name="setNote" style="margin-top:15px; " class="button gradient-bg">
            </div>

</form>
             </div>


           </div>
        </div>



        <div class="container">
            <div class="row">
            <div class="adv-table">
            <h3>LES Notes</h3>              
            <table style="color:black; font-weight: bold;" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                    
                                    <th class="hidden-phone">Note</th>
                                    <th class="hidden-phone">Date</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                        
                        foreach ($notes as $note)
                              {
                      ?>
                                    <tr class="gradeC">
                                        <td><?php echo $note["Note"]; ?></td>
                                        <td><?php echo $note["Date"]; ?></td>
                                        
                                      
                                
                                    </tr>
                                  <!--  -->
                                    <?php
                                        }

                                           

                                        ?>
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>

    <div class="our-departments">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="our-departments-wrap">
                        <h2>DICOM</h2>

                        <div class="row">
						<?php
$images=scandir("$updirim") ;
for($a=2;$a<count($images);$a++){
	$d="$updirim $images[$a]";
	$info = pathinfo($d);
if ($info["extension"] == "jpg") { 
 ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="our-departments-cont">
                                    <header class="entry-header d-flex flex-wrap align-items-center">
									<h3></h3>
									
									

 
 <a href="<?php echo $updirim,$images[$a] ; ?>"onclick="window.open(this.href); return false;"><img src="<?php echo $updirim,$images[$a] ; ?>" width="150" height="150" alt="" ></br><?php echo $images[$a] ; ?></a>
 <a href="<?php echo $updirim,$images[$a-1] ; ?>"><img src="images/D.png" alt=""></a>

                                        

                                        
                                    </header>

                                 
                                </div>
                            </div>
  <?php
 }  
}
   ?>
                          
                                </div>
                            </div>

                           

                            
                        </div>
                    </div>
                </div>
            </div>
   
<div class="the-news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Document Zip DICOM</h2>

                    <div class="row">
                         <?php
$zip=scandir("$updirzip") ;
for($a=2;$a<count($zip);$a++){
 ?>
 
 
 
                      

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="the-news-wrap">
                               
<a href="<?php echo $updirzip,$zip[$a] ; ?>"><img src="images/DICOM.png" alt=""></a>
        </br><?php echo $zip[$a] ; ?>                      

                                
                            </div>
                        </div>
						 <?php
   
}
   ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="the-news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Document non DICOM</h2>

                    <div class="row">
                         <?php
$doc=scandir("$updirdoc") ;
for($a=2;$a<count($doc);$a++){
 ?>
 
 
 
                      

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="the-news-wrap">
                               
<a href="<?php echo $updirdoc,$doc[$a] ; ?>"><img src="images/DOC.png" alt=""></a>
        </br><?php echo $doc[$a] ; ?>                      

                                
                            </div>
                        </div>
						 <?php
   
}
   ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
	 <div class="the-news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Video</h2>

                    <div class="row">
                         <?php
$vid=scandir("$updirvid") ;
for($a=2;$a<count($vid);$a++){
 ?>
 
 
 
                      

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="the-news-wrap">
                                          

  
<video width="320" height="240" controls>
  <source src="<?php echo $updirvid,$vid[$a] ; ?>" type="video/mp4">

  Your browser does not support the video tag.
  
</video>       
   <embed type="application/x-vlc-plugin"
pluginspage="http://www.videolan.org"version="VideoLAN.VLCPlugin.2"  width="100%"        
height="100%" id="vlc" loop="yes"autoplay="yes" target="<?php echo $updirvid,$vid[$a] ; ?>"></embed>        

		   </div>
                        </div>
						 <?php
   
}
   ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <i class="fa fa-copyright    "></i>SabriBarbaria</i>
            </div><!-- .container -->
        </div><!-- .footer-widgets -->
    </footer><!-- .site-footer -->
