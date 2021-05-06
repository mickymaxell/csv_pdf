<!doctype html>
<html lang="en">
    <head>
        <!-- Required Meta Tags -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta property="og:type" content="website" />
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta name="description" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />

        <link rel="stylesheet" href="<?= $base_url ?>plugins/ekko-lightbox/ekko-lightbox.css">

        <title>International School of Photonics CUSAT</title>
    </head>
    <body>
    	<?php
            $contact_data = $db->getone("contact_details");
        ?>
        <header class="position-fixed">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="header-conatct">
                                    <p><i class="fas fa-phone-square-alt"></i><?php echo $contact_data['mobile_no'].', '.$contact_data['mobile_no2'] ?></p>
                                    <p><i class="fas fa-envelope"></i> <?php echo $contact_data['email_id'] ?></p>
                                </div>
                                <div class="header-search">
                                    <input class="form-control" type="text" placeholder="Search" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

                $custom_logo_image = $db->where('status',1)->getone('custom_logo');
                if($custom_logo_image){
                    $custom_logo = $custom_logo_image['logo_image'];
                }else{
                    $custom_logo = $base_url.'photonics/images/isp-logo.jpg';
                }

                $header_image_data = $db->where('status',1)->getone('header_image');
                if($header_image_data){
                    $header_image_url = $header_image_data['image'];
                }else{
                    $header_image_url = $base_url.'photonics/images/photonics-txt.jpg';
                }
            ?>

            <div class="logo-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex">
                                <a href="<?php echo $base_url ?>"><img src="<?php echo $custom_logo  ?>" alt="" /></a>
                                <a href="<?php echo $base_url ?>"><img style="height: 91px;width: 499px;" src="<?php echo $header_image_url ?>" alt="" /></a>
                                <a href="<?php echo $base_url ?>"><img src="<?php $base_url ?>photonics/images/thejasi-logo.jpg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            		function check_url($url){

            			if(filter_var($url, FILTER_VALIDATE_URL))
						{
						    return "yes";		    
						}else{
							return "no";
						}
            		}

                    $top_menu  = $db->where('display_position',1)->getone('menu');
                    $top_menu_id = $top_menu['id'];
                    $menu_list = $db->rawQuery('SELECT * FROM menu_structure WHERE status=1 AND parent_menu=0 AND menu_id='.$top_menu_id.' ORDER BY menu_order');
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex">
                            <nav class="navbar navbar-expand-lg w-100" id="main_navbar">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar top-bar"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>	
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                    <?php
                                    if($menu_list){
                                        foreach($menu_list as $menu_item){
                                        	$menu_link = $menu_item['menu_link'];
                                        	$menu_type = $menu_item['item_type'];
                                        	$submenu_list = $db->rawQuery('SELECT * FROM menu_structure WHERE status=1 AND parent_menu= '.$menu_item['id'].' ORDER BY menu_order');
                                    		if($submenu_list){
                                    
                                    ?>    	
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle"  id="<?php $menu_item['menu_label'].$menu_item['id'] ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                	<?php  echo $menu_item['menu_label']; ?>		
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="<?php $menu_item['menu_label'].$menu_item['id'] ?>">
                                                <?php 
                                                	foreach($submenu_list as $submenu_item){
                                                		$submenu_link = $submenu_item['menu_link'];
                                                		$submenu_type = $submenu_item['item_type'];
                                                		$submenu2_list = $db->rawQuery('SELECT * FROM menu_structure WHERE status=1 AND parent_menu='.$submenu_item['id'].' ORDER BY menu_order');
                                                		if($submenu2_list){
                                                ?>
                                                			<li class="nav-item dropdown">
		                                                		<a class="dropdown-item dropdown-toggle" id="<?php $submenu_item['menu_label'].$submenu_item['id'] ?>" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                                                			<?php echo $submenu_item['menu_label'] ?>
		                                                		</a>
		                                                		<ul class="dropdown-menu" aria-labelledby="<?php $submenu_item['menu_label'].$submenu_item['id'] ?>">
		                                                		<?php 
		                                                			foreach($submenu2_list as $submenu2_item){
		                                                				$submenu2_link  = $submenu2_item['menu_link'];
		                                                				$submenu2_type  = $submenu2_item['item_type'];
		                                                				$submenu3_list  = $db->rawQuery('SELECT * FROM menu_structure WHERE status=1 AND parent_menu='.$submenu2_item['id'].' ORDER BY menu_order');
		                                                				if($submenu3_list){
		                                                		?>		
		                                                					<li class="nav-item dropdown">
		                                                						<a class="dropdown-item dropdown-toggle" href="" id="<?php $submenu2_item['menu_label'].$submenu2_item['id'] ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                                                					<?php echo $submenu2_item['menu_label']; ?>
				                                                				</a>
				                                                				<ul class="dropdown-menu" aria-labelledby="<?php $submenu2_item['menu_label'].$submenu2_item['id'] ?>">
				                                                				<?php
				                                                					foreach($submenu3_list as $submenu3_item){	
				                                                						$submenu3_link = $submenu3_item['menu_link'];
                                                                                        $submenu3_type = $submenu3_item['item_type'];
                                                                                        if($submenu3_type == "page"){
                                                                                            $submenu3_link_href = "page?id=".$submenu3_link;
                                                                                        }else if($submenu3_type == "post"){
                                                                                            $submenu3_link_href = "post?id=".$submenu3_link;
                                                                                        }else{
                                                                                            $submenu3_link_href = $submenu3_link;
                                                                                        }
				                                                				?>	
				                                                					<li>
				                                                						<a class="dropdown-item" <?php if(check_url($submenu3_link) == "yes"){?> href="<?php echo $submenu3_link; ?>" <?php }else{ ?>
				                                                						href="<?= $base_url.$submenu3_link_href ?>" <?php } ?> >
				                                                							<?php echo $submenu3_item['menu_label']; ?>
				                                                						</a>
				                                                					</li>
				                                                				<?php
				                                                					}
				                                                				?>	
				                                                				</ul>
		                                                					</li>	
		                                                		<?php			
		                                                				}else{
		                                                						if($submenu2_type == "page"){
								                                    				$submenu2_link_href = "page?id=".$submenu2_link;
								                                    			}elseif($submenu2_type == "post"){
								                                    				$submenu2_link_href = "post?id=".$submenu2_link;
								                                    			}else{
                                                                                    $submenu2_link_href = $submenu2_link;
                                                                                }
		                                                		?>	
				                                                			<li>
				                                                				<a class="dropdown-item" <?php if(check_url($submenu2_link) == "yes"){?> href="<?php echo $submenu2_link; ?>" <?php }else{ ?>
				                                                						href="<?= $base_url.$submenu2_link_href ?>" <?php } ?>>
				                                                					<?php echo $submenu2_item['menu_label']; ?>
				                                                				</a>
				                                                			</li>
		                                                		<?php
		                                                				}
		                                                			}
		                                                		?>
		                                                		</ul>	
		                                                	</li>
                                                <?php			
                                                		}else{
                                                				if($submenu_type == "page"){
				                                    				$submenu_link_href = "page?id=".$submenu_link;
				                                    			}elseif($submenu_type == "post"){
				                                    				$submenu_link_href = "post?id=".$submenu_link;
				                                    			}else{
                                                                    $submenu_link_href = $submenu_link;
                                                                }
                                                ?>		
		                                                	<li>
		                                                		<a class="dropdown-item" <?php if(check_url($submenu_link) == "yes"){?> href="<?php echo $submenu_link; ?>" <?php }else{ ?> href="<?= $base_url.$submenu_link_href ?>" <?php } ?>>
		                                                			<?php echo $submenu_item['menu_label'] ?>
		                                                		</a>
		                                                	</li>
                                                <?php 
                                                		}
                                                	}
                                                ?>	
                                                </ul>	
                                            </li>
                                    <?php			

                                    		}else{

                                    			if($menu_type == "page"){
                                    				$menu_link_href = "page?id=".$menu_link;
                                    			}elseif($menu_type == "post"){
                                    				$menu_link_href = "post?id=".$menu_link;
                                    			}else{
                                                    $menu_link_href = $menu_link;
                                                }
                                    ?>    	
	                                            <li class="nav-item ">
	                                                <a class="nav-link" <?php if(check_url($menu_link) == "yes"){?> href="<?php echo $menu_link; ?>" <?php }else{ ?>href="<?= $base_url.$menu_link_href ?>" <?php } ?>>
	                                                	<?php  echo $menu_item['menu_label']; ?>
	                                                </a>
	                                            </li>
                                    <?php
                                        	}
                                        }    
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <script >
        
            var index_url = window.location;

            $('ul.navbar-nav a').filter(function() {
                return this.href == index_url;
            }).closest('li').addClass('active');

                        // $('ul.navbar-nav a').filter(function() {
                        //     return this.href == index_url;
                        // }).parentsUntil('.navbar-nav > .nav-link').parent('li a').addClass('active');
         

        
        </script>
    