<?php
function parse_businesshub_member($atts, $content){
	$ID = isset($atts['ID']) ? $atts['ID'] : 'member_'.rand(10,9999);
	$avatar = isset($atts['avatar']) ? $atts['avatar'] : '';
	$name = isset($atts['name']) ? $atts['name'] : '';
	$title = isset($atts['title']) ? $atts['title'] : '';
	$style = isset($atts['style']) ? $atts['style'] : '';
	$facebook = isset($atts['facebook']) ? $atts['facebook'] : '';
	$twitter = isset($atts['twitter']) ? $atts['twitter'] : '';
	$linkedin = isset($atts['linkedin']) ? $atts['linkedin'] : '';
	$tumblr = isset($atts['tumblr']) ? $atts['tumblr'] : '';
	$google = isset($atts['google']) ? $atts['google'] : '';
	$pinterest = isset($atts['pinterest']) ? $atts['pinterest'] : '';
	$email = isset($atts['email']) ? $atts['email'] : '';
	$schema = isset($atts['schema']) ? $atts['schema'] : '';
	$custom_social_account_icon = isset($atts['custom_social_account_icon']) ? $atts['custom_social_account_icon'] : '';
	$custom_social_account_profile = isset($atts['custom_social_account_profile']) ? $atts['custom_social_account_profile'] : '';
	if($custom_social_account_icon != ''){
		$custom_social_account_icon = explode(",",$custom_social_account_icon);
	}
	if($custom_social_account_profile != ''){
		$custom_social_account_profile = explode(",",$custom_social_account_profile);
	}
	//display
	ob_start();
	if($schema=='1'){
		echo '<div class="dark-div">';
	} ?>
    <div class="ct-sc-member <?php echo $ID;?> <?php if($style=='circle'){ echo ' style-2 ';}?>">
    	<?php if($avatar){ ?>
            <div class="sc-m-picture">
            	<?php
				if(is_numeric($avatar)){
					$thumbnail = wp_get_attachment_image_src($avatar,'full', true); 
				}elseif(strpos($avatar, 'http://') !== false || strpos($avatar, 'https://') !== false){
					$thumbnail[0] = $avatar;
				}?>
                <img src="<?php echo esc_url($thumbnail[0]); ?>" alt="<?php echo esc_attr($name); ?>">
            </div>
        <?php }?>
        <div class="ct-m-content">
        	<?php if($name){ ?>
            	<div class="ct-m-name h4"><?php echo esc_attr($name); ?></div>
            <?php } ?>
            <?php if($title){ ?>
            	<div class="ct-m-job"><?php echo esc_attr($title); ?></div>
            <?php } ?>
            <?php if($content){ ?>
            <div class="ct-m-excerpt"><?php echo $content ?></div>
            <?php } ?>
            <div class="ct-m-social-share">
                <ul class="social-listing list-inline">
                  <?php if($facebook){ ?> 	 
                      <li class="facebook"><a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <?php }
				  if($twitter){ ?>
                      <li class="twitter"><a href="<?php echo esc_url($twitter); ?>"  target="_blank"><i class="fa fa-twitter"></i> </a></li>
                  <?php }
				  if($linkedin){ ?>
                      <li class="linkedin"><a href="<?php echo esc_url($linkedin); ?>"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
                  <?php }
				  if($tumblr){ ?>
                      <li class="tumblr"><a href="<?php echo esc_url($tumblr); ?>"  target="_blank"><i class="fa fa-tumblr"></i></a></li>
                  <?php }
				  if($google){ ?>
                      <li class="google-plus"><a href="<?php echo esc_url($google); ?>"  target="_blank"><i class="fa fa-google-plus"></i></a></li>
                  <?php }
				  if($pinterest){ ?>
                      <li class="pinterest"><a href="<?php echo esc_url($pinterest); ?>"  target="_blank"><i class="fa fa-pinterest"></i></a></li>
                  <?php }
				  if($email){ ?>
                      <li class="email"><a href="mailto:<?php echo esc_url($email); ?>"><i class="fa fa-envelope"></i></a></li>
                  <?php }?>
                  <?php if( !empty($custom_social_account_icon) ) : 
				  	foreach ($custom_social_account_icon as $index => $socia_account) { 
						$profile_url =  isset($custom_social_account_profile[$index]) ? $custom_social_account_profile[$index] : '#';
					?>
                    	<li id="<?php echo 'ct-custom-social-account-'.rand(1,999) ?>" class="ct-custom-social-account <?php echo esc_attr($socia_account)?>"><a href="<?php echo esc_url($profile_url); ?>"  target="_blank"><i class="<?php echo esc_attr($socia_account)?>"></i></a></li>
                  <?php } endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
	if($schema=='1'){
		echo '</div>';
	}
	//return
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'c_member', 'parse_businesshub_member' );
add_action( 'after_setup_theme', 'reg_c_member' );
function reg_c_member(){
	if(function_exists('vc_map')){
		$map_array = array(
		   "name" => esc_html__("Member","cactus"),
		   "base" => "c_member",
		   "class" => "",
		   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_member.png",
		   "controls" => "full",
		   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
		   "params" => array(
			  array(
			  	 "admin_label" => true,
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => esc_html__("Style", 'cactus'),
				 "param_name" => "style",
				 "value" => array(
					esc_html__('Square', 'cactus') => '',
					esc_html__('Circle', 'cactus') => 'circle',
				 ),
				 "description" => ''
			  ),	
			  array(
				"type" => "attach_image",
				"heading" => esc_html__("Avatar", "cactus"),
				"param_name" => "avatar",
				"value" => "",
				"description" => esc_html__("ID/URL of image", 'cactus'),
			  ),
			  array(
			  	"admin_label" => true,
				"type" => "textfield",
				"heading" => esc_html__("Name", "cactus"),
				"param_name" => "name",
				"value" => "",
				"description" => esc_html__("Name of person", "cactus"),
			  ),
			  array(
			  	"admin_label" => true,
				"type" => "textfield",
				"heading" => esc_html__("Title", "cactus"),
				"param_name" => "title",
				"value" => "",
				"description" => esc_html__("Title of person", "cactus"),
			  ),
			  array(
				  "type" => "textarea",
				  "heading" => esc_html__("Member content", "cactus"),
				  "param_name" => "content",
				  "value" => "",
				  "description" => "",
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Facebook", "cactus"),
				"param_name" => "facebook",
				"value" => "",
				"description" => esc_html__("Full URL to social networks. If empty, icon is hidden", "cactus"),
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Twitter", "cactus"),
				"param_name" => "twitter",
				"value" => "",
				"description" => esc_html__("Full URL to social networks. If empty, icon is hidden", "cactus"),
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("LinkedIn", "cactus"),
				"param_name" => "linkedin",
				"value" => "",
				"description" => esc_html__("Full URL to social networks. If empty, icon is hidden", "cactus"),
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Tumblr", "cactus"),
				"param_name" => "tumblr",
				"value" => "",
				"description" => esc_html__("Full URL to social networks. If empty, icon is hidden", "cactus"),
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Google-plus", "cactus"),
				"param_name" => "google",
				"value" => "",
				"description" => esc_html__("Full URL to social networks. If empty, icon is hidden", "cactus"),
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Pinterest", "cactus"),
				"param_name" => "pinterest",
				"value" => "",
				"description" => esc_html__("Full URL to social networks. If empty, icon is hidden", "cactus"),
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Email", "cactus"),
				"param_name" => "email",
				"value" => "",
				"description" => esc_html__("Email of member. If empty, icon is hidden", "cactus"),
			  ),
			  array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Schema", "cactus"),
				"param_name" => "schema",
				"value" => array(
					esc_html__('Light', 'cactus') => '',
					esc_html__('Dark', 'cactus') => '1',
				 ),
				"description" => "",
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Custom Social Account Icon", "cactus"),
				"param_name" => "custom_social_account_icon",
				"value" => "",
				"description" => esc_html__("CSS Class Name of Social Account Icon (separated by a comma)", "cactus"),
			  ),
			  array(
				"type" => "textfield",
				"heading" => esc_html__("Custom Social Account Profile", "cactus"),
				"param_name" => "custom_social_account_profile",
				"value" => "",
				"description" => esc_html__("URL to profile page (separated by a comma)", "cactus"),
			  ),
		   )
		);
		vc_map($map_array);
	}
}