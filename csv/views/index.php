

        <!-- Banner Start -->
        <div class="slider-area-wrapper" id="slider-wrapper">
            
            <?php
                $slider_images_list = $db->where('status=1')->get("slider_images");
                if($slider_images_list){
            ?>
            <div id="rev_slider_11_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="business-classic" data-source="gallery">
                <div id="rev_slider_11_1" class="rev_slider fullwidthabanner" data-version="5.4.7">
                    <ul>
                <?php
                        
                        $rs_value = 27;
                        foreach ($slider_images_list as $slider_image) {
                ?>
                        <!-- SLIDE  -->
                        <li data-index="rs-<?php echo $rs_value; ?>" data-transition="slotslide" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-title="Slide">
                            <!-- MAIN IMAGE -->
                            <?php
                                if($slider_image['image']!=''){
                                    echo '<img src="' . $slider_image['image'] . '" alt="Lakshya" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="15" class="rev-slidebg" data-no-retina>';
                                }else{
                                    echo '<img src="' . $base_url . 'photonics/images/photonics-bg-1.jpg" alt="Lakshya" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="15" class="rev-slidebg" data-no-retina>';
                                }

                            ?>
                            <!-- End Main Image -->
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-resizeme slide-heading" data-x="['left','left','center','center']" data-hoffset="['122','122','0','0']" data-y="['top','top','top','top']" data-voffset="['100','100','100','20']" data-fontsize="['51','51','33','22']" data-fontweight="['700']" data-lineheight="['55','55','35','24']]" data-width="['750','750','600','340']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"split":"lines","splitdelay":0.1,"speed":600,"split_direction":"forward","frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' data-textAlign="['left']">
                                <?php echo $slider_image['heading']; ?><br>
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme slide-txt subheading" data-x="['right','right','right','right']" data-hoffset="['122','124','2','0']" data-y="['top','top','top','top']" data-voffset="['230','200','180','100']" data-fontsize="['45','45','33','26']" data-fontweight="['700']" data-width="['700','600','600','320']" data-height="none" data-whitespace="normal" data-visibility="['on','on','on','on']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":360,"split":"lines","splitdelay":0.1,"speed":500,"split_direction":"forward","frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" >
                                <?php echo $slider_image['sub_heading']; ?>
                            </div>
                        </li>
                        <?php
                        $rs_value++;
                    }
                    ?>
                    </ul>
                    <div class="tp-bannertimer tp-bottom"></div>
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
        <!-- Banner End -->
        
        
        <section class="wrapper welcome-wrapper">
            <div class="container">
                <div class="row">

            <?php
                $index_details_data   = $db->where('id',1)->getone('index_terms_data');
                $why_section_data     = $index_details_data['why_section'];
                $about_section_data   = $index_details_data['about_section'];    
                
                if($why_section_data || $about_section_data){
            ?>    
                    <div class="col-12 col-md-6 col-lg-7">
                        <div class="d-flex">
                            <h1>Welcome to ISP</h1>
                        <?php
                            if($why_section_data){
                        ?>    
                            <div class="welcome-data">
                                <h3>Why Photonics ?</h3>
                                <p>
                                    <?php echo $why_section_data ?>
                                </p>
                                <a href="<?php $base_url ?>page?id=about-us" class="btn">Read More</a>
                            </div>
                        <?php
                            }
                            if($about_section_data){
                        ?>    
                            <div class="welcome-data">
                                <h3>About Us</h3>
                                <p>
                                    <?php echo $about_section_data ?>
                                </p>
                                <a href="<?php $base_url ?>page?id=about-us" class="btn">Read More</a>
                            </div>
                        <?php } ?>    
                        </div>
                    </div>
            
            <?php
                }
            ?>

           

            </div>
        </section>

        <?php
                $home_posts = $db->rawQuery('SELECT a.home_posts_cat_id,b.post_id,c.* FROM index_terms_data a join post_categories b ON   a.home_posts_cat_id=b.category_id join posts c ON b.post_id=c.id WHERE a.id=1 AND c.status=1 ORDER BY c.id DESC LIMIT 3');
                
                if($home_posts){
                    $home_posts_count = 1;
                    if(($home_posts[1]) || ($home_posts[2])){
        ?>
        
                            <section class="wrapper highlight-wrapper">
                                <div class="container">
                                    <div class="row">
                                    <?php
                                        if(isset($home_posts[2])){
                                    ?>    
                                        <div class="col-12 col-md-6 pr-0">
                                            <div class="d-flex bg-blue">
                                                <h6>
                                                    <?php echo $home_posts[2]['excerpt'] ?>
                                                </h6>
                                                <div class="highlight-btn">
                                                    <!-- <a href="#!" class="btn">Register</a> -->
                                                    <a href="<?php $base_url ?>post?id=<?php echo $home_posts[2]['slug'] ?>" class="btn">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                        }
                                        if(isset($home_posts[1])){
                                    ?>    
                                        <div class="col-12 col-md-6 pr-0">
                                            <div class="d-flex bg-yellow">
                                                <h6>
                                                    <?php echo $home_posts[1]['excerpt'] ?>
                                                </h6>
                                                <div class="highlight-btn">
                                                    <!-- <a href="#!" class="btn">Register</a> -->
                                                    <a href="<?php $base_url ?>post?id=<?php echo $home_posts[1]['slug'] ?>" class="btn">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </section>

            <?php 
                    }
                    if(isset($home_posts[0])){
                 ?>        
                            <section class="wrapper video-wrapper">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <h4><?php echo $home_posts[0]['post_title'] ?></h4>
                                                <!-- <h6>Live Streaming</h6> -->
                                                <a href="<?php $base_url ?>post?id=<?php echo $home_posts[0]['slug'] ?>">
                                                    <p>
                                                        <?php 
                                                            if($home_posts[0]['excerpt']!=''){
                                                                echo $home_posts[0]['excerpt'];
                                                            }else{
                                                                echo implode(' ', array_slice(explode(' ',  $home_posts[0]['post_content']), 0, 6)); 
                                                            }
                                                        ?>
                                                    </p>
                                                </a>
                                                <!-- <a href="#!" class="zoom-link">Click here to join through Zoom</a>
                                                <a href="#!" class="video-modal" data-toggle="tooltip"  data-placement="top" title="Play Video">
                                                    <img src="<?php $base_url ?>photonics/images/video-logo.png" alt="" />
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                    <?php 
                    }
                }    
                    ?>        

        <?php  ?>
        
         
        
    
        
        <?php
            $latest_news_post = $db->rawQuery('SELECT a.latest_news_cat_id,b.post_id,c.* FROM index_terms_data a join post_categories b ON   a.latest_news_cat_id=b.category_id join posts c ON b.post_id=c.id WHERE a.id=1 AND c.status=1 ORDER BY c.id DESC LIMIT 4');
            if($latest_news_post){
        ?>

        <section class="wrapper news-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-header">
                            <h3>Latest News from ISP</h3>
                        </div>
                    </div>
            <?php
                $latest_news_post_count = 1;
                foreach($latest_news_post as $latest_news){
                    if($latest_news_post_count == 1){      
            ?>    

                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="image-wrapper">
                            <?php 
                                if($latest_news['post_image'] != ""){
                                    echo '<img style="width: 100%;height: 250px" src="'.$latest_news['post_image'].'" alt="" />';    
                                }else{
                                    echo '<img style="width: 100%;height: 250px" src="'.$base_url.'photonics/images/images.png" alt="" />';      
                                }
                            ?>
                                <div class="date-wrapper">
                                    <h5><?php echo date('d', strtotime($latest_news['published_date'])); ?></h5>
                                    <h6><?php echo date('M', strtotime($latest_news['published_date'])); ?></h6>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4><?php echo $latest_news['post_title']; ?></h4>
                                <span>Published on <?php echo date('M jS  Y', strtotime($latest_news['published_date'])); ?></span>
                                <p>
                                    <?php
                                            echo $latest_news['excerpt'];
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="<?= $base_url.'post?id='.$latest_news['slug'] ?>" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php
                    }else{
                        if($latest_news_post_count == 2){
            ?>        
                    <div class="col-12 col-md-6 old-news">
            <?php
                        }
            ?>            
                        <div class="card">
                            <div class="date-wrapper">
                                <h5><?php echo date('d', strtotime($latest_news['published_date'])); ?></h5>
                                <h6><?php echo date('M', strtotime($latest_news['published_date'])); ?></h6>
                            </div>
                            <div class="news-right">
                                <div class="card-header">
                                    <h4><?php echo $latest_news['post_title']; ?></h4>
                                    <span>Published on <?php echo date('M jS  Y', strtotime($latest_news['published_date'])); ?></span>
                                </div>
                                <div class="card-body">
                                    <p>
                                        <?php
                                            echo $latest_news['excerpt'];
                                        ?>
                                    </p>
                                </div>
                                <div class="card-footer"><br><br>
                                    <a href="<?= $base_url.'post?id='.$latest_news['slug'] ?>" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                <?php
                        if($latest_news_post_count == 4){
                ?>                
                    </div>
                <?php
                        }
                    }
                    $latest_news_post_count++;
                  }  
                ?>    
                    <div class="col-12 view-news">
                        <a href="<?= $base_url ?>news_section" class="btn btn-dragon">Read More</a>
                    </div>
                </div>
            </div>
        </section>
        <?php
            }
        ?>
        

       
        <style >
            #sample_display{
              /*background:hsla(210,100%,50%,1);*/
              height:60px;
              width:100%;
              overflow:hidden;
              position:relative;
            }

            #sample_text{
              /*background:hsla(90,100%,50%,.5);*/
              cursor:pointer;
              overflow:hidden;
              position:absolute;/*
              left:10px;
              margin-right:10px;
              top:10px;*/
            }

            .slider-area-wrapper .slide-txt {
                color: #fff !important;
                font-size: 18px !important;
                font-weight: 600 !important;
                line-height: 22px !important;
                text-transform: none !important;
                min-width: 1228px!important;
                width: 100%!important;
            }

            .forcefullwidth_wrapper_tp_banner{
                background-image: url('<?php echo $base_url ?>/photonics/images/photonics-bg-1.jpg'); 
            }

            @media (max-width: 991.98px) {
                .slider-area-wrapper .slide-txt {
                    font-size: 14px !important;
                    line-height: 18px !important;
                    text-align: center !important;
                }
            }
            @media (max-width: 480px) {
                .slider-area-wrapper .slide-txt 
                {
                    display: none !important;
                }
            }

</style>

        