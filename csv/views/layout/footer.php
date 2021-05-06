<footer>
            <div class="container">
                <div class="row">
                    <?php
                     $index_details_data   = $db->where('id',1)->getone('index_terms_data');
                        $why_section_data     = $index_details_data['why_section'];  
                
                        if($why_section_data){
                    ?> 
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="d-flex footer-about">
                            <h5>Why Photonics ?</h5>
                            <p>
                                <?php echo $why_section_data ?>
                            </p>
                        </div> 
                    </div>
                    <?php
                        }
                    ?>

                    <?php
                            $latest_post_list = $db->rawQuery('SELECT * FROM posts ORDER BY id DESC LIMIT 3');
                            if($latest_post_list){
                    ?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="d-flex footer-news">
                                        <h5>Latest News</h5>
                                        <?php
                                            foreach($latest_post_list as $latest_post){
                                        ?>
                                        <div class="news-card">
                                            <div class="img-wrapper">
                                                <?php
                                                    if($latest_post['post_image']!=''){
                                                ?>
                                                    <img src="<?php echo $latest_post['post_image'] ?>" alt="" />
                                                <?php
                                                    }else{
                                                ?>
                                                    <img src="<?php $base_url ?>photonics/images/download.png" alt="" />
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="news-data-wrapper">
                                                <a href="<?= $base_url.'post?id='.$latest_post['slug'] ?>">
                                                    <?php echo $latest_post['post_title'] ?>
                                                </a>
                                                <span><?php  echo date('M, jS  Y', strtotime($latest_post['published_date'])); ?></span>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div> 
                                </div>
                    <?php
                            }
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="d-flex footer-contact">
                            <h5>Contact Us</h5>
                            
                            <div class="home-contact-card">
                                <div class="icon-wrapper">
                                    <i class="far fa-map-marker-alt"></i>
                                </div>
                                <div class="news-data-wrapper">
                                    <?php
                                        echo ' <p>' . $contact_data['address'] . '</p>';
                                    ?>
                                </div>
                            </div>
                            <div class="home-contact-card email-card">
                                <div class="icon-wrapper">
                                    <i class="far fa-mobile"></i>
                                </div>
                                <div class="news-data-wrapper">
                                <?php
                                    echo ' <a href="tel:' . $contact_data['mobile_no'] . '">' . $contact_data['mobile_no'] . '</a>';
                                    echo ' <a href="tel:' . $contact_data['mobile_no2'] . '">' . $contact_data['mobile_no2'] . '</a>';
                                ?>
                                </div>
                            </div>
                            <div class="home-contact-card email-card">
                                <div class="icon-wrapper">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="news-data-wrapper">
                                    <a href="mailto:<?php echo $contact_data['email_id'] ?>">
                                        <?php echo $contact_data['email_id'] ?>
                                    </a>
                                    <a href="mailto:<?php echo $contact_data['email_id2'] ?>">
                                        <?php echo $contact_data['email_id2'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-12 col-md-6">
                        <div class="d-flex footer-newsletter">
                            <h5>Newsletter</h5>
                            <div class="footer-subscribe">
                                <h6>To get the latest updates Please subscribe our newsletter</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                    <a href="#!" class="btn btn-yellow">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
            <?php if(!empty($contact_data['facebook_url']) || !empty($contact_data['twitter_url']) || !empty($contact_data['linkedin_url']) || !empty($contact_data['instagram_url']) || !empty($contact_data['youtube_url']) || !empty($contact_data['pinintrest_url'])) {?>        
                    <div class="col-12 col-md-6">
                        <div class="d-flex footer-social">
                            <h5>Social Links</h5>
                            <ul>
                                <?php if(!empty($contact_data['facebook_url'])){ ?>    <li><a href="<?php echo $contact_data['facebook_url'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php } if(!empty($contact_data['twitter_url'])){ ?>    <li><a href="<?php echo $contact_data['twitter_url'] ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php } if(!empty($contact_data['linkedin_url'])){ ?>    <li><a href="<?php echo $contact_data['linkedin_url'] ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                <?php } if(!empty($contact_data['instagram_url'])){ ?>    <li><a href="<?php echo $contact_data['instagram_url'] ?>"><i class="fab fa-instagram"></i></a></li>
                                <?php } if(!empty($contact_data['pinintrest_url'])){ ?>    <li><a href="<?php echo $contact_data['pinintrest_url'] ?>"><i class="fab fa-pinterest-p"></i></a></li>
                                <?php } if(!empty($contact_data['youtube_url'])){ ?>    <li><a href="<?php echo $contact_data['youtube_url'] ?>"><i class="fab fa-youtube"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
            <?php } ?>       

            <?php
                $footer_menu = $db->rawQuery('SELECT a.*,b.* FROM menu a INNER JOIN menu_structure b ON a.id=b.menu_id WHERE a.display_position=3 ORDER BY menu_order asc');
            ?>
                    <div class="col-12">
                        <div class="d-flex footer-copyright">
                            <?php
                                if($footer_menu){
                                    echo '<ul>';
                                        foreach($footer_menu as $menu){
                                            $menu_type = $menu['item_type'];
                                            $menu_link = $menu['menu_link'];
                                            if($menu_type == "page"){
                                                $menu_link_href = "page?id=".$menu_link;
                                            }elseif($menu_type == "post"){
                                                $menu_link_href = "post?id=".$menu_link;
                                            }else{
                                                $menu_link_href = $menu_link;
                                            }
                                            if(check_url($submenu2_link) == "yes"){
                                                $menu_link_href = $menu_link;
                                            }else{
                                               $menu_link_href = $base_url.$menu_link_href;
                                            }
                                            echo '<li><a href="'.$menu_link_href.'">'.$menu['menu_label'].'</a></li>';
                                        }
                                    echo '</ul>';
                                }
                            ?>
                            <p>&copy; 2021, <b>Photonics CUSAT</b>. All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>