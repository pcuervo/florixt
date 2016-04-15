<?php

/*
Plugin Name: Business Hub Sample Data
Description: Import sample data for Business Hub
Author: CactusThemes
Version: 1.0.1
Author URI: http://cactusthemes.com
*/

/**
 * @package Business-Hub
 * @version 1.0
 */
 
defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

function businesshub_get_global_sample_theme(){
	return 'business-hub';
}
function businesshub_get_global_sample_menus(){
	return array('primary' => 'Main Menu','secondary-menus' => 'Top Links','footer-menu' => 'Footer menu');
}
function businesshub_get_global_sample_home_page_title(){
	return 'Homepage V1';
}
function businesshub_get_global_sample_blog_page_title(){
	return 'BLOG';
}
function businesshub_get_global_sample_posts_per_page(){
	return 10;
}
function businesshub_get_global_sample_mega_menu(){
	return array('name'=>'main-menu', /* slug of menu */
		'mega_item'=>'', /* name of parent item which is set to PREVIEW MODE */
		'columns_item'=>'Elements' /* name of parent item which is set to COLUMN MODE */
		);
}
function businesshub_get_global_sample_pack_data(){
	return array(
	'all' => array(
		'home' => 'Homepage V1',
		'blog' => 'BLOG',
		'home_content' => '[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1452826988258{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column css=".vc_custom_1452826995379{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][rev_slider alias="home_page"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1451127014540{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 20px !important;padding-bottom: 20px !important;background-color: #e6e6e6 !important;}"][vc_column width="3/4" css=".vc_custom_1451126965790{padding-top: 10px !important;padding-bottom: 10px !important;}"][vc_column_text css_animation="left-to-right" css=".vc_custom_1454325844957{margin-top: 0px !important;margin-bottom: 0px !important;}"]
<h4 style="padding-top: 9px;"><span style="color: #888888;">WE DON\'T JUST SELL, WE BUILD LONG-TERM BUSINESS PARTNERS</span></h4>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1451126975243{padding-top: 10px !important;padding-bottom: 10px !important;}"][vc_column_text css_animation="right-to-left" css=".vc_custom_1452825845521{margin-top: 0px !important;margin-bottom: 0px !important;}"][c_button id="ct_custom_3211448529669" url="#" url_target="0" icon="" style="4" text_color="#fff" bg_color="#333"]OUR COMMITMENT[/c_button][/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content" css=".vc_custom_1444804602792{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column css=".vc_custom_1448531317035{padding-top: 53px !important;padding-bottom: 50px !important;}"][c_iconbox item_width="1_5" count="5"][c_iconbox_item icon="ct-icon-19-tool-computer-monitor-mac" title="Online Business"]We are a friendly team of professionals committed to bringing you the best medical care possible. Our team consists of 6 doctors.[/c_iconbox_item][c_iconbox_item icon="ct-icon-58-interface-favorite-star" title="Best Support"]We pride ourselves with being a very forward thinking practice and we work holistically with our patients and where appropriate their families.[/c_iconbox_item][c_iconbox_item icon="ct-icon-16-ecommerce-box-packaging-pack-goodies" title="Electronic Goods"]We offer home visits to our patients that are unable to come to the surgery. This may be because they are elderly, too unwell to leave the home.[/c_iconbox_item][c_iconbox_item icon="ct-icon-59-document-analytic-graph-up" title="Fraud Detection"]Organizations are increasingly using cognitive computing, to quickly respond to changes in their business, gain insight into customers.[/c_iconbox_item][c_iconbox_item icon="ct-icon-26-web-menu-collapse-down" title="Free Updates"]Our business only works if we are stocking the items that you want to buy, so we have set up this suggestions page for you to tell us.[/c_iconbox_item][/c_iconbox][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1444905341859{margin-top: 0px !important;margin-bottom: 0px !important;background-color: #e6e6e6 !important;}"][vc_column css=".vc_custom_1451014618005{padding-top: 60px !important;}"][c_heading id="ct_custom_3481447381091" style="5" sub_line="HERE ARE JUST SOME OF OUR PRODUCTS" separator_color="#cccccc"]TOP PRODUCTS[/c_heading][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448531757799{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 60px !important;background-color: #e6e6e6 !important;}"][vc_column width="1/2" css=".vc_custom_1451014639255{padding-top: 60px !important;padding-bottom: 0px !important;}"][c_iconbox style="3" item_width="4_12" count="3"][c_iconbox_item id="ct_custom_5751444805371" icon="fa fa-check-circle" title="Trading Experiences" icon_color="#81d742"]Our trading experiences are sourced from all trading in and around the construction industry. [/c_iconbox_item][c_iconbox_item id="ct_custom_8781444805372" icon="fa fa-check-circle" title="Credit Information" icon_color="#81d742"]As well as containing our unique trading experiences, our credit reports include everything else you need to know before extending credit[/c_iconbox_item][c_iconbox_item id="ct_custom_8781444805373" icon="fa fa-check-circle" title="Company Monitoring" icon_color="#81d742"]Our company monitoring service will keep you up to date with any relevant changes to the credit report of a company you are monitoring.[/c_iconbox_item][/c_iconbox][/vc_column][vc_column width="1/2" css=".vc_custom_1451014631547{padding-top: 60px !important;padding-bottom: 0px !important;}"][c_stories id="ct_custom_4901450665541" padding="25px 180px 30px 40px"][c_story avatar="8152"]
<h5>30 days moneyback Guaranteed</h5>
We want you to be fully satisfied with every item that you purchase from us. If you are not satisfied with an item that you have purchased, you may return the item within 30 days from the order date for a full refund of the purchase price, minus the shipping, handling, gift wrap, or other charges.
<p style="padding-top: 2px;"><a style="color: #222; text-decoration: initial;" href="#">&gt; View Policy</a></p>
[/c_story][/c_stories][/vc_column][/vc_row][vc_row css=".vc_custom_1452825872420{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column css=".vc_custom_1452826391071{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_arrow id="ct_custom_3991444905217" color="#e6e6e6"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" css=".vc_custom_1448617066681{margin-bottom: 0px !important;}"][vc_column css=".vc_custom_1450664552343{padding-top: 50px !important;padding-bottom: 80px !important;}"][c_slider post_type="download" taxonomy="download_category" count="5" items_per_slide="5"][/c_slider][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1452825881072{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column width="1/2" css=".vc_custom_1454058756888{padding-top: 50px !important;padding-bottom: 47px !important;background-color: #ffc600 !important;}"][vc_column_text css=".vc_custom_1454058743736{margin-top: 0px !important;margin-bottom: 0px !important;}"]
<h4 style="text-align: center;"><span style="color: #ffffff;">DON\'T SEE WHAT YOU ARE LOOKING FOR? NO WORRY</span></h4>
<p style="text-align: center; padding-top: 30px;">[c_button id="ct_custom_8911444965997" url="#" link_target="" icon="ct-icon-16-ecommerce-box-packaging-pack-goodies" style="3" text_color="#fff" bg_color="#fff"]VIEW ALL PRODUCTS[/c_button]</p>
[/vc_column_text][/vc_column][vc_column width="1/2" css=".vc_custom_1454058528231{padding-top: 50px !important;padding-bottom: 47px !important;background: #222222 url(http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/backgound.jpg?id=5665) !important;}"][vc_column_text css=".vc_custom_1454058585289{margin-top: 0px !important;margin-bottom: 0px !important;}"]
<h4 style="text-align: center;"><span style="color: #ffffff;">WANT CUSTOM PRODUCT FOR YOUR PROJECT?</span></h4>
<p style="text-align: center; padding-top: 30px;">[c_button id="ct_custom_8911444965998" url="#" link_target="" icon="ct-icon-7-setting-setting-equalizer" style="3" text_color="#fff" bg_color="#fff"]GET A QUOTE[/c_button]</p>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content" css=".vc_custom_1449891806145{margin-bottom: 0px !important;padding-top: 80px !important;}"][vc_column width="1/2" css=".vc_custom_1449891785050{margin-bottom: 80px !important;}"][c_heading icon="ct-icon-14-sport-trophy-reward-winner-cup" sub_line="look at some of your archivement"]awwards and archievement[/c_heading][vc_empty_space height="72px"][c_iconbox style="4" item_width="4_12"][c_iconbox_item id="ct_custom_2331444806519" icon="fa fa-cloud-upload" title="Cloud Computing" icon_color="#3f83bf"][/c_iconbox_item][c_iconbox_item id="ct_custom_421448597332" icon="ct-icon-3-building-apartment" title="Location Base" icon_color="#2d9cdb"][/c_iconbox_item][c_iconbox_item id="ct_custom_8401448597332" icon="ct-icon-23-communication-email-envelope-tick-done" title="Location Base" icon_color="#77b727"][/c_iconbox_item][c_iconbox_item id="ct_custom_2331444806520" icon="ct-icon-34-ecommerce-price-tag-tick-done" title="event integrated" icon_color="#f5b12f"][/c_iconbox_item][c_iconbox_item icon="ct-icon-7-setting-setting-equalizer" title="fully controlable"][/c_iconbox_item][c_iconbox_item id="ct_custom_6631448597463" icon="ct-icon-26-tool-game-console-gameboy" title="Gamification" icon_color="#dc285f"][/c_iconbox_item][/c_iconbox][/vc_column][vc_column width="1/2" css=".vc_custom_1449891796044{margin-bottom: 80px !important;}"][c_heading icon="ct-icon-3-communication-bubble-chat-talk-conversation-more" sub_line="see stories shared by our real customers"]successful stories[/c_heading][vc_empty_space height="63px"][c_stories id="ct_custom_4741449119239"][c_story title="Well-designed tools make all the difference" avatar="7779"]How can I better collect leads, educate leads who aren\'t ready to buy and generate more revenue from my existing customers?

[c_button id="ct_custom_8021448597463" url="#" link_target="" icon="fa fa-play-circle" style="4" text_color="#fff" bg_color="#77b727"]WHAT DANNY\'S STORY[/c_button][/c_story][c_story title="Blue Cow finds greener marketing pastures" avatar="7781"]Why did Peter Whynacht name his social media, creative design and video production company BusinessHub?

[c_button id="ct_custom_8021448597464" url="#" link_target="" icon="fa fa-play-circle" style="4" text_color="#fff" bg_color="#77b727"]WHAT PANDA\'S STORY[/c_button][/c_story][c_story title="Vending franchise sees a healthy lift in profits" avatar="7782"]Healthy Vending, the world\'s leading franchisor of socially responsible, healthy vending machine businesses.

[c_button id="ct_custom_8021448597465" url="#" link_target="" icon="fa fa-play-circle" style="4" text_color="#fff" bg_color="#77b727"]WHAT PETER\'S STORY[/c_button][/c_story][/c_stories][/vc_column][/vc_row][vc_row full_width="stretch_row_content" css=".vc_custom_1451118389752{margin-bottom: 0px !important;padding-top: 80px !important;background-color: #222222 !important;}"][vc_column width="1/3" el_class="dark-div" css=".vc_custom_1454059789693{padding-top: 0px !important;padding-bottom: 60px !important;}"][c_heading icon="ct-icon-16-communication-bubble-help-question-support"]FAQ[/c_heading][vc_empty_space height="44px"][vc_tta_accordion][vc_tta_section title="What is business hub?" tab_id="1444808267447-a837951f-bb99"][vc_column_text css=".vc_custom_1454059979776{margin-top: 0px !important;margin-bottom: 0px !important;}"]For us, honesty is the only policy and we strive to complete all projects with integrity, not just with our clients, but also our suppliers and contractors. With thousands of successful projects under our belt, we are one of the most trusted construction companies in US[/vc_column_text][/vc_tta_section][vc_tta_section title="How can business hub fit my needs?" tab_id="1444808267696-8ec0d8e9-1163"][vc_column_text]If you order online there will be a delivery charge based on each item. We try to keep this as low as possible by using light packaging but obviously we want your items to arrive in perfect condition so we make sure they are well wrapped.[/vc_column_text][/vc_tta_section][vc_tta_section title="Do I need pro license to use this resource?" tab_id="1444808514281-aef816c4-905b"][vc_column_text]To keep up to date with our offers and sales follow us on Twitter or Facebook and you will be notified in advance of our 20% off days in store and online or our free postage and packaging days online.[/vc_column_text][/vc_tta_section][vc_tta_section title="Can I use free account forever?" tab_id="1444808515653-5237678f-b010"][vc_column_text]Our business only works if we are stocking the items that you want to buy, so we have set up this suggestions page for you to tell us if you think there is anything missing from our stock that you would like to see or whether there are things you would like to see more of.[/vc_column_text][/vc_tta_section][vc_tta_section title="This is the best theme you\'ve seen?" tab_id="1444808516874-8dafcf19-f9b8"][vc_column_text]We pride ourselves with being a very forward thinking practice and we work holistically with our patients and where appropriate their families to ensure that they receive the treatment and care that works for them.[/vc_column_text][/vc_tta_section][/vc_tta_accordion][/vc_column][vc_column width="1/3" el_class="dark-div" css=".vc_custom_1454059782062{padding-top: 0px !important;padding-bottom: 60px !important;}"][c_heading icon="ct-icon-18-communication-broadcast-megaphone"]ON THE NEWS[/c_heading][vc_empty_space height="60px"][vc_video link="https://vimeo.com/20168424" css=".vc_custom_1448607994326{margin-bottom: 15px !important;}"][vc_column_text css=".vc_custom_1454060007047{margin-top: 0px !important;margin-bottom: 0px !important;}"]For us, honesty is the only policy and we strive to complete all projects with integrity, not just with our clients, but also our suppliers[/vc_column_text][/vc_column][vc_column width="1/3" el_class="dark-div" css=".vc_custom_1454059803634{padding-top: 0px !important;padding-bottom: 60px !important;}"][c_heading icon="ct-icon-30-communication-email-send-contact"]FROM THE BLOG[/c_heading][vc_empty_space height="60px"][c_blog style="list" count="2" cats="templates" schema="1" thumb_size="thumb_1x1"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448609101882{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 84px !important;padding-bottom: 80px !important;background-color: #e6e6e6 !important;}"][vc_column css=".vc_custom_1454060097566{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_heading id="ct_custom_1621448850044" style="3" sub_line="WE HAVE THE LARGEST PARTNERS NETWORK" separator_color="#cccccc"]STRATEGIC [c_icon name="ct-icon-11-setting-plane-airplane"] PARTNERS[/c_heading][/vc_column][/vc_row][vc_row css=".vc_custom_1444966946100{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column css=".vc_custom_1452826365301{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_arrow id="ct_custom_9581444966954" color="#e6e6e6"][/vc_column][/vc_row][vc_row css=".vc_custom_1449732478212{margin-bottom: 0px !important;padding-top: 60px !important;padding-bottom: 40px !important;}"][vc_column][vc_row_inner][vc_column_inner][c_partners][c_partner logo="8126" hover_text="Lorem ipsum dolor sit amet" url="#"][c_partner logo="8127" hover_text="Lorem ipsum dolor sit amet" url="#"][c_partner logo="8128" hover_text="Lorem ipsum dolor sit amet" url="#"][c_partner logo="8129" hover_text="Lorem ipsum dolor sit amet" url="#"][/c_partners][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1449732708658{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column_inner][c_partners][c_partner logo="8130" url="#"][c_partner logo="8131" url="#"][c_partner logo="8132" url="#"][c_partner logo="8133" url="#"][/c_partners][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1452827317083{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 60px !important;padding-bottom: 57px !important;background-color: #fcc427 !important;}"][vc_column][vc_column_text]
<h3 style="text-align: center;"><span style="color: #000000;">WE DON\'T JUST SELL</span></h3>
<h3 style="text-align: center;"><span style="color: #000000;">WE BUILD LONG-TERM BUSINESS PARTNERS</span></h3>
<p style="text-align: center; padding-top: 50px;">[c_button id="ct_custom_3621444966462" url="#" link_target="" icon="ct-icon-16-ecommerce-box-packaging-pack-goodies" style="2" text_color="#FFF" bg_color="#75B736"]SEE PRODUCTS[/c_button][c_button id="ct_custom_1491444966462" url="#" link_target="" icon="ct-icon-27-communication-email-envelope" style="2" text_color="#000" bg_color="#fff"]CONTACT US[/c_button]</p>
[/vc_column_text][/vc_column][/vc_row]',
		'custom_field' => array(
			'meta_nav_style' => 'style_1',
			'meta_header_schema' => 'light',
			'meta_nav_opacity' => 0.5,
			'page_meta_text_heading_style' => 'hidden',
			'meta_page_content' => 'this_page'
		)
	),
	'v2' => array(
		'home' => 'Homepage V2',
		'blog' => 'BLOG',
		'home_content' => '[vc_row full_width="stretch_row" css=".vc_custom_1448871860894{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 160px !important;padding-bottom: 249px !important;background-image: url(http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/home-v2-slider.jpg?id=5376) !important;}"][vc_column][vc_column_text css_animation="appear"]
<h2 style="text-align: center; font-size: 48px; padding-bottom: 19px;"><span style="color: #ffffff;">BOOST YOUR ONLINE BUSINESS</span></h2>
<p style="text-align: center;"><span style="color: #ffffff; font-size: 18px;">We are a small boutique with a cute little shop on the high street and we are now selling some of our gorgeous stock online.</span></p>
<p style="text-align: center; padding-top: 38px;">[c_button id="ct_custom_9721444967950" url="#" link_target="" icon="ct-icon-16-ecommerce-box-packaging-pack-goodies" style="2" text_color="#222" bg_color="#ffd800"]SEE PRODUCTS[/c_button][c_button id="ct_custom_2071444967950" url="#" link_target="" icon="ct-icon-27-communication-email-envelope" style="2" text_color="#222" bg_color="#fff"]CONTACT US[/c_button]</p>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1451118846160{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column width="1/3" css=".vc_custom_1454061571882{margin-top: -110px !important;padding-bottom: 70px !important;}"][vc_column_text css_animation="appear" css=".vc_custom_1454061407447{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_contentbox image="5740" title="Active Marketing" layout="layout_1" button_text="CALL TO ACTION" button_url="#" title_url="no" url_target="0" alignment="left"]<span class="Apple-converted-space"></span>My designs have been sold all over Europe and the USA and I have worked with some of the biggest designers in the industry.[/c_contentbox][/vc_column_text][/vc_column][vc_column width="1/3" css=".vc_custom_1454061579738{margin-top: -110px !important;padding-bottom: 70px !important;}"][vc_column_text css_animation="appear" css=".vc_custom_1454061417886{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_contentbox image="5742" title="our development process" layout="layout_1" button_text="THE PROCESS" button_url="#" title_url="no" url_target="0" alignment="left"]We are a small boutique with a cute little shop on the high street and we are now selling some of our gorgeous stock online.[/c_contentbox][/vc_column_text][/vc_column][vc_column width="1/3" css=".vc_custom_1454061594032{margin-top: -110px !important;padding-bottom: 70px !important;}"][vc_column_text css_animation="appear" css=".vc_custom_1454061425868{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_contentbox image="5741" title="enhance productivity" layout="layout_1" button_text="CASE STUDIES" button_url="#" title_url="no" url_target="0" alignment="left"]This is the place to come to escape day to day life, sit back, have a cuppa or refreshing mineral water and let us pamper you. [/c_contentbox][/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448868541610{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 70px !important;padding-bottom: 60px !important;background-color: #e5e5e5 !important;}"][vc_column css=".vc_custom_1452674666937{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_text css=".vc_custom_1452674755321{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<h3 style="text-align: center;">THE PROJECTS</h3>
<p style="text-align: center; padding-top: 2px;">HERE ARE JUST SOME OF OUR PRODUCTS</p>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1452674598767{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column css=".vc_custom_1452674799469{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_grid post_type="ct_portfolio" row="2" taxonomy="portfolio_cat"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448869043456{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 0px !important;background: #333333 url(http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/v2-bg.png?id=5363) !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column width="1/2" css=".vc_custom_1451119592020{padding-top: 0px !important;padding-right: 43px !important;padding-bottom: 0px !important;}"][vc_single_image image="5360" img_size="full" alignment="right" css_animation="bottom-to-top" css=".vc_custom_1452674831265{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][/vc_column][vc_column width="1/2" css=".vc_custom_1448869502435{padding-top: 70px !important;padding-bottom: 40px !important;}" el_class="dark-div"][c_iconbox style="3" item_width="4_12" count="3"][c_iconbox_item id="ct_custom_5751444805371" icon="fa fa-check-circle" title="Director Monitoring" icon_color="#81d742"]Our director monitoring service will inform you.[/c_iconbox_item][c_iconbox_item id="ct_custom_5751444805372" icon="fa fa-check-circle" title="Chasing Letters" icon_color="#81d742"]Our members are entitled to up to 10 chasing letters each month.[/c_iconbox_item][c_iconbox_item id="ct_custom_8781444805371" icon="fa fa-check-circle" title="Debt Recovery" icon_color="#81d742"]Retention is an amount of money usually between of the contract.[/c_iconbox_item][c_iconbox_item id="ct_custom_8781444805372" icon="fa fa-check-circle" title="Trading Experiences" icon_color="#81d742"]Our trading experiences are sourced from our 2500 members.[/c_iconbox_item][c_iconbox_item id="ct_custom_8781444805373" icon="fa fa-check-circle" title="Credit Information" icon_color="#81d742"]Access to our credit information is unlimited.[/c_iconbox_item][/c_iconbox][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448869770763{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 40px !important;}"][vc_column css=".vc_custom_1454061092721{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_heading style="3" sub_line="TALENT IS OUR TREASURE"]OUR [c_icon name="ct-icon-11-setting-plane-airplane"] TEAM[/c_heading][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1454055240138{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 40px !important;}"][vc_column width="1/4" css=".vc_custom_1454055170786{padding-bottom: 100px !important;}" offset="vc_col-md-3"][c_member style="circle" avatar="5369" name="John Doe" title="CEO, Co-founder" facebook="#" twitter="#" tumblr="#" google="#"]He was named one of Fortune&rsquo;s &ldquo;40 Under 40,&rdquo; and TechCrunch named Drew and Arash their 2014 &ldquo;Founders of the Year.&rdquo;[/c_member][/vc_column][vc_column width="1/4" css=".vc_custom_1449893668469{padding-bottom: 100px !important;}" offset="vc_col-md-3"][c_member style="circle" avatar="5372" name="Samatha Doe" title="Chief Marketing Officer" facebook="#" twitter="#" tumblr="#" google="#"]Samatha Doe leads physical and technica security teams, keeping hundreds of petabytes of data safe. [/c_member][/vc_column][vc_column width="1/4" css=".vc_custom_1449893657313{padding-bottom: 100px !important;}" offset="vc_col-md-3"][c_member style="circle" avatar="5370" name="Michael Buble" title="CTO" facebook="#" twitter="#" tumblr="#" google="#"]Under his leadership, BusinessHub has scaled exponentially while retaining its simplicity and reliability.[/c_member][/vc_column][vc_column width="1/4" css=".vc_custom_1454055179431{padding-bottom: 100px !important;}" offset="vc_col-md-3"][c_member style="circle" avatar="5371" name="Paul Young" title="The Hacker" facebook="#" twitter="#" tumblr="#" google="#"]Formerly President of Americas, he oversaw Business\'s acquisition of Motorole and then served as its CEO.[/c_member][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1449132820969{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 88px !important;padding-bottom: 80px !important;background-color: #e6e6e6 !important;}"][vc_column css=".vc_custom_1454061277017{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_heading id="ct_custom_9921448871740" style="3" sub_line="TALENTS IS YOUR TREASURE" separator_color="#cccccc"]STRATEGIC [c_icon name="ct-icon-11-setting-plane-airplane"] PARTNERS[/c_heading][/vc_column][/vc_row][vc_row css=".vc_custom_1444966946100{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column css=".vc_custom_1454061238340{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_arrow id="ct_custom_9581444966954" width="30" height="20" color="#e6e6e6"][/vc_column][/vc_row][vc_row css=".vc_custom_1449732245755{margin-bottom: 0px !important;padding-top: 60px !important;padding-bottom: 40px !important;}"][vc_column][c_partners][c_partner logo="8126" hover_text="Lorem ipsum dolor sit amet" url="#"][c_partner logo="8127" hover_text="Lorem ipsum dolor sit amet" url="#"][c_partner logo="8128" hover_text="Lorem ipsum dolor sit amet" url="#"][c_partner logo="8129" hover_text="Lorem ipsum dolor sit amet" url="#"][/c_partners][/vc_column][/vc_row][vc_row css=".vc_custom_1449732280282{margin-bottom: 0px !important;padding-top: 20px !important;padding-bottom: 100px !important;}"][vc_column][c_partners][c_partner logo="8130" url="#"][c_partner logo="8131" url="#"][c_partner logo="8132" url="#"][c_partner logo="8133" url="#"][/c_partners][/vc_column][/vc_row]',
		'custom_field' => array(
			'meta_nav_style' => 'style_2',
			'meta_header_schema' => 'light',
			'meta_nav_opacity' => 1,
			'page_meta_text_heading_style' => 'hidden',
			'meta_page_content' => 'this_page'
		)
	),
	'v3' => array(
		'home' => 'Homepage V3',
		'blog' => 'BLOG',
		'home_content' => '[vc_row full_width="stretch_row_content_no_spaces"][vc_column][rev_slider alias="home_v3"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448878032443{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 30px !important;padding-bottom: 30px !important;background-color: #222222 !important;}"][vc_column width="2/3" css=".vc_custom_1451120210949{padding-top: 10px !important;padding-right: 10px !important;padding-bottom: 10px !important;padding-left: 10px !important;}"][vc_column_text css=".vc_custom_1454325920080{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<h4 style="padding-top: 9px;"><span style="color: #ffffff;">WE DON\'T JUST SELL, WE BUILD LONG-TERM BUSINESS PARTNERS</span></h4>
[/vc_column_text][/vc_column][vc_column width="1/3" css=".vc_custom_1451120218284{padding-top: 10px !important;padding-right: 10px !important;padding-bottom: 10px !important;padding-left: 10px !important;}"][c_button id="ct_custom_6531444978533" url="#" style="4" text_color="#222222" bg_color="#ffffff"]OUR COMMITMENT[/c_button][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1454062549586{padding-top: 68px !important;padding-bottom: 80px !important;}"][vc_column css=".vc_custom_1444971148869{padding-top: 0px !important;padding-bottom: 0px !important;}"][c_iconbox style="5" item_width="4_12"][c_iconbox_item id="ct_custom_4861448878206" icon="fa fa-cube" title="TWO-DAY SHIPPING" icon_color="#d3d3d3"]There are portable and fixed air conditioners on the market and a range of factors need to be considered before your perfect match is found.[/c_iconbox_item][c_iconbox_item id="ct_custom_8831448878206" icon="fa fa-smile-o" title="30 DAYS MONEY BACK" icon_color="#d3d3d3"]We can arrange for your alarm or system to be serviced regularly to make sure they continue you to keep you, your belongings and those around you safe.[/c_iconbox_item][c_iconbox_item id="ct_custom_621448878206" icon="fa fa-globe" title="WORLDWIDE SHIPPING" icon_color="#d3d3d3"]We are open for breakfast, lunch and afternoon tea from 8am to 5pm and unlike any other cafe in the town, we are open 7 days per week.[/c_iconbox_item][/c_iconbox][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1444971406593{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column width="1/3" css=".vc_custom_1444971356996{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][c_banner image="5434" title="APPAREL AND SPORT FASHION" sub_line="HERE ARE JUST SOME OF OUR PRODUCTS" button_text="LATEST COLLECTION" button_url="#" overlay_color="rgba\(61,61,61,0.8\)" id="ct_custom_7371444971306"][/vc_column][vc_column width="1/3" css=".vc_custom_1444971365580{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][c_banner image="5435" title="workout equipments" sub_line="HERE ARE JUST SOME OF OUR PRODUCTS" button_text="BROWSE PRODUCTS" button_url="#" overlay_color="rgba\(61,61,61,0.8\)" id="ct_custom_9951444971306"][/vc_column][vc_column width="1/3" css=".vc_custom_1444971374444{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][c_banner image="5436" title="SHOP BY SPORTS?" sub_line="HERE ARE JUST SOME OF OUR PRODUCTS" button_text="CHoOSE YOUR SPORTS" button_url="#" overlay_color="rgba(61,61,61,0.8)" id="ct_custom_8211444971306"][/vc_column][/vc_row][vc_row css=".vc_custom_1448879695906{margin-bottom: 0px !important;padding-top: 70px !important;padding-bottom: 70px !important;}"][vc_column][vc_column_text css=".vc_custom_1454062632799{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<h3 style="text-align: center;">FEATURED [c_icon name="ct-icon-57-goods-shoes"] PRODUCTS</h3>[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content" css=".vc_custom_1448879792782{margin-top: 0px !important;margin-bottom: 0px !important;padding-bottom: 80px !important;}"][vc_column][c_slider post_type="download" count="5" items_per_slide="5" show_excerpt="0"][/c_slider][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448881999421{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 80px !important;padding-bottom: 80px !important;background-image: url(http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/brickwall_@2X.png?id=5399) !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column width="1/2" css=".vc_custom_1454062692745{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_testimonials][c_testimonial name="JOHN DOE" title="CEO Apple Inc" avatar="5369" rate="5"]BusinessHub is exactly what it gives. Provided by a friendly, helpful, and constructive team of people.[/c_testimonial][/c_testimonials][/vc_column][vc_column width="1/2" css=".vc_custom_1454062701777{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_testimonials][c_testimonial name="JOHN DOE" title="CEO Apple Inc" avatar="5372" rate="5"]We are 100% impressed. We trust this company implicitly and would not consider using anybody else now.[/c_testimonial][/c_testimonials][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1449894175804{margin-top: 0px !important;margin-bottom: 0px !important;padding-bottom: 80px !important;}"][vc_column width="1/2" css=".vc_custom_1449894193590{padding-top: 80px !important;}"][c_heading id="ct_custom_7071448882236" icon="ct-icon-14-sport-trophy-reward-winner-cup" sub_line="CLICK TO PLAY THE VIDEO" separator_color="#e6e6e6"]ON THE NEWS[/c_heading][vc_empty_space height="60px"][vc_video link="https://youtu.be/A6E2A4cMGP8"][/vc_column][vc_column width="1/2" css=".vc_custom_1449894184502{padding-top: 80px !important;}"][c_heading id="ct_custom_6661448882236" icon="ct-icon-3-communication-bubble-chat-talk-conversation-more" sub_line="SEE STORIES SHARED BY OUR REAL CUSTOMERS" separator_color="#e6e6e6"]FROM OUR BLOG[/c_heading][vc_empty_space height="60px"][c_blog style="list" count="2" cats="design" thumb_size="thumb_1x1"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1452674018932{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column width="1/2" css=".vc_custom_1449894564096{padding-top: 105px !important;padding-bottom: 92px !important;background-color: #292929 !important;}"][vc_column_text]
<h3 style="text-align: center;"><span style="color: #ffffff;">end of season sale</span></h3>
<p style="color: #777777; text-align: center; font-size: 14px; padding: 17px 0px 21px 0px;">50% OFF FOR ALL PRODUCTS</p>
<p style="text-align: center;">[c_button id="ct_custom_8911444965997" url="#" link_target="" icon="ct-icon-16-ecommerce-box-packaging-pack-goodies" style="2" text_color="#222222" bg_color="#ffd800"]SHOP NOW[/c_button]</p>
[/vc_column_text][/vc_column][vc_column width="1/2" css=".vc_custom_1451122888129{padding-top: 70px !important;padding-right: 130px !important;padding-bottom: 95px !important;padding-left: 130px !important;background-color: #111111 !important;}"][vc_column_text]
<h3 style="text-align: center;"><span style="color: #ffffff;">GET THE APP</span></h3>
<p style="text-align: center; padding: 17px 0px 21px 0px;">Get BusinessHub on Your Device. Looking for a guide to an event or place? Download the completely free BusinessHub app to your mobile device.</p>
<p style="text-align: center;"><a style="display: inline-block;" href="#"><img src="http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/appstore.png" alt="" /></a><a style="display: inline-block;" href="#"><img src="http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/googlepay.png" alt="" /></a></p>
[/vc_column_text][/vc_column][/vc_row]',
		'custom_field' => array(
			'meta_nav_style' => 'style_2',
			'meta_header_schema' => 'dark',
			'meta_nav_opacity' => 0,
			'page_meta_text_heading_style' => 'hidden',
			'meta_page_content' => 'this_page'
		)
	),
	'v4' => array(
		'home' => 'Homepage EDD',
		'blog' => 'BLOG',
		'home_content' => '[vc_row full_width="stretch_row" css=".vc_custom_1448955352212{margin-bottom: 0px !important;padding-top: 68px !important;padding-bottom: 80px !important;background-color: #eeeeee !important;}"][vc_column css=".vc_custom_1444971148869{padding-top: 0px !important;padding-bottom: 0px !important;}"][c_iconbox style="5" item_width="4_12"][c_iconbox_item id="ct_custom_4861448878206" icon="fa fa-cube" title="TWO-DAY SHIPPING" icon_color="#d3d3d3"]We created a built-in comments functionality that allows you to comment on any entry, directly create collaborative teams in the application.[/c_iconbox_item][c_iconbox_item id="ct_custom_8831448878206" icon="fa fa-smile-o" title="30 DAYS MONEY BACK" icon_color="#d3d3d3"]We promise to be your trusted partner for technology by delivering the advice, service and convenience you deserve all at competitive prices. [/c_iconbox_item][c_iconbox_item id="ct_custom_621448878206" icon="fa fa-globe" title="WORLDWIDE SHIPPING" icon_color="#d3d3d3"]Shop from over 850 of the best brands, including BUSINESS HUB&rsquo; own label. Plus, get your daily fix of the freshest style, celebrity and music news.[/c_iconbox_item][/c_iconbox][/vc_column][/vc_row][vc_row css=".vc_custom_1448879695906{margin-bottom: 0px !important;padding-top: 70px !important;padding-bottom: 70px !important;}"][vc_column][vc_column_text]
<h3 style="text-align: center;">NEW [c_icon name="ct-icon-10-document-book-article"] BOOKS</h3>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content" css=".vc_custom_1448879792782{margin-top: 0px !important;margin-bottom: 0px !important;padding-bottom: 80px !important;}"][vc_column][c_slider post_type="download" taxonomy="download_category" taxonomy_slugs="Wordpress" count="5" items_per_slide="5" show_excerpt="0"][/c_slider][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1448881999421{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 80px !important;padding-bottom: 80px !important;background-image: url(http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/brickwall_@2X.png?id=5399) !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column width="1/2" css=".vc_custom_1454063188935{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_testimonials][c_testimonial name="JOHN DOE" title="CEO Apple Inc" avatar="5369" rate="5"]Awesome, Incredibly organized, easy to communicate with, responsive with next iterations, and beautiful work.[/c_testimonial][/c_testimonials][/vc_column][vc_column width="1/2" css=".vc_custom_1454063201944{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][c_testimonials][c_testimonial name="CAROLIN MEYER" title="CIO, Pinebank" avatar="5372" rate="5"]I love the new logo. Particularly how the mark can stand on its own. It feels tall and proud and powerful.[/c_testimonial][/c_testimonials][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1450836057701{margin-top: 0px !important;margin-bottom: 0px !important;padding-bottom: 80px !important;}"][vc_column width="1/2" css=".vc_custom_1450836074940{padding-top: 80px !important;}"][c_heading id="ct_custom_7071448882236" icon="ct-icon-14-sport-trophy-reward-winner-cup" sub_line="CLICK TO PLAY THE VIDEO" separator_color="#e6e6e6"]ON THE NEWS[/c_heading][vc_empty_space height="60px"][vc_video link="https://youtu.be/A6E2A4cMGP8"][/vc_column][vc_column width="1/2" css=".vc_custom_1450836066655{padding-top: 80px !important;}"][c_heading id="ct_custom_6661448882236" icon="ct-icon-3-communication-bubble-chat-talk-conversation-more" sub_line="SEE STORIES SHARED BY OUR REAL CUSTOMERS" separator_color="#e6e6e6"]FROM OUR BLOG[/c_heading][vc_empty_space height="60px"][c_blog style="list" count="2" thumb_size="thumb_1x1"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1453969145512{margin-top: 0px !important;margin-bottom: 0px !important;background-color: #292929 !important;}"][vc_column width="1/2" css=".vc_custom_1452673634169{padding-top: 105px !important;padding-right: 0px !important;padding-bottom: 97px !important;padding-left: 0px !important;background-color: #292929 !important;}"][vc_column_text]
<h3 style="text-align: center;"><span style="color: #ffffff;">end of season sale</span></h3>
<p style="color: #777777; text-align: center; font-size: 14px; padding: 22px 0px 21px 0px;">50% OFF FOR ALL PRODUCTS</p>
<p style="text-align: center;">[c_button id="ct_custom_8911444965997" url="#" link_target="" icon="ct-icon-16-ecommerce-box-packaging-pack-goodies" style="2" text_color="#222222" bg_color="#ffd800"]SHOP NOW[/c_button]</p>
[/vc_column_text][/vc_column][vc_column width="1/2" css=".vc_custom_1449136959166{padding-top: 70px !important;padding-right: 160px !important;padding-bottom: 100px !important;padding-left: 160px !important;background-color: #111111 !important;}"][vc_column_text]
<h3 style="text-align: center;"><span style="color: #ffffff;">GET THE APP</span></h3>
<p style="text-align: center; padding: 22px 0px 21px 0px;">A collaborative learning landscape that extends beyond the classroom, connecting education providers, teachers and students with a mutual goal.</p>
<p style="text-align: center;"><a href="#"><img style="padding: 20px 40px;" src="http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/appstore.png" alt="" /></a><a href="#"><img style="padding: 20px 40px;" src="http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/googlepay.png" alt="" /></a></p>
[/vc_column_text][/vc_column][/vc_row]',
		'custom_field' => array(
			'meta_nav_style' => 'style_2',
			'meta_header_schema' => 'light',
			'meta_nav_opacity' => 1,
			'page_meta_text_heading_style' => 'hidden',
			'meta_page_content' => 'this_page',
			'edd_addon_productnews_content' => 'latest_productnews',
			'edd_addon_banner_area' => 'built_in',
			'edd_addon_big_banner_bg' => array('background-image'=>'http://business-hub.cactusthemes.com/wp-content/uploads/2015/11/Dollarphotoclub_72475853.jpg'),
			'edd_addon_big_banner_content' => '<h3>YOUR ONLINE REVENUE IN GOOD HAND</h3>
<p>Conser que la caarte bailoa mongi helo</p>
<a style="background-color:#77b727;" href="#" class="btn btn-default  btn-style-1 btn-style-2 btn-style-4"><span class="add-style"><span> SHOP THE COLLECTION </span></span></a>',
			'edd_addon_small_banner1_bg' => array('background-image' => 'http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/Dollarphotoclub_69052393_medium.jpg'),
			'edd_addon_small_banner1_text' => '<h4>fitness equipment</h4>
<h4>sale 50%</h4>',
			'edd_addon_small_banner2_bg' => array('background-image'=>'http://business-hub.cactusthemes.com/wp-content/uploads/2015/11/Dollarphotoclub_69917163.jpg'),
			'edd_addon_small_banner2_text' => '<h4>new arrivals</h4>
<h4>basketball</h4>',
			'page_meta_sidebar' => 'hidden'
		)
	),
	'v5' => array(
		'home' => 'Homepage V5',
		'blog' => 'BLOG',
		'home_content' => '[vc_row full_width="stretch_row_content_no_spaces"][vc_column][rev_slider alias="home_v5"][/vc_column][/vc_row][vc_row css=".vc_custom_1448962622353{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 150px !important;padding-bottom: 50px !important;}"][vc_column][c_iconbox style="2" item_width="4_12"][c_iconbox_item id="ct_custom_2951449140820" icon="ct-icon-1-document-article-news-newspaper" title="WHAT TO EXPECT" icon_color="#999999"]There is no limit to the number of companies you can monitor and it is all included in your membership.[/c_iconbox_item][c_iconbox_item id="ct_custom_5741449140820" icon="ct-icon-57-document-analytic-graph" title="HD VIDEO CALL" icon_color="#999999"] Check hundreds or even thousands of companies our price and service levels remain the same. [/c_iconbox_item][c_iconbox_item id="ct_custom_8491449140820" icon="ct-icon-83-document-briefcase-case-bag" title="GROW YOU BUSINESS" icon_color="#999999"]Our trading experiences will tell you what to expect when opening an account to a new customer. [/c_iconbox_item][/c_iconbox][/vc_column][/vc_row][vc_row css=".vc_custom_1445241895332{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 30px !important;padding-bottom: 60px !important;}"][vc_column][c_iconbox style="2" item_width="4_12"][c_iconbox_item id="ct_custom_3281449140820" icon="ct-icon-11-communication-bubble-chat-group-conversation" title="CONNECT WITH FRIENDS" icon_color="#999999"]Our collector&rsquo;s construction industry expertise and experience gives us an advantage over other collection agencies.[/c_iconbox_item][c_iconbox_item id="ct_custom_9521449140820" icon="ct-icon-17-communication-broadcast-megaphone" title="COMMUNICATION" icon_color="#999999"]Keeping track of the individuals behind a company is often as important as monitoring the company itself. [/c_iconbox_item][c_iconbox_item id="ct_custom_1931449140820" icon="ct-icon-16-user-female" title="HERE TO HELP" icon_color="#999999"]Our specialist retention collections team aim to take the hassle out of collecting retention owed to you.[/c_iconbox_item][/c_iconbox][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1449140617872{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 27px !important;padding-bottom: 137px !important;}"][vc_column][vc_column_text css=".vc_custom_1454127236223{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<p style="text-align: center;">[c_button id="ct_custom_1031444984000" url="#" link_target="" icon="" style="1" text_color="#FFF" bg_color="#0084ff"]MORE FEATURES[/c_button]</p>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" el_class="home-v5-parallax"][vc_column][c_parallax media_url="http://business-hub.cactusthemes.com/wp-content/uploads/2016/01/home-v5-parallax.jpg" height="590"][c_parallax_slide align="right" heading="Eveything you ever need to build a website" button_text="FEATURES" button_url="#"]Incididunt ut labore et dolor perspiciatis unde omnis iste nattus sit voluptatem.[/c_parallax_slide][/c_parallax][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1452743793510{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;background-color: #323941 !important;}" el_class="dark-div home-v5-story"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][c_stories][c_story title="Well-designed tools make all the difference" avatar="7779"]How can I better collect leads, educate leads who aren&rsquo;t ready to buy and generate more revenue from my existing customers?

[c_button id="ct_custom_6091448963625" url="#" url_target="0" icon="fa fa-play-circle-o" style="4" text_color="#fff" bg_color="#0084ff"]WATCH DANNY\'S STORY[/c_button][/c_story][c_story title="Blue Cow finds greener marketing pastures" avatar="7781"]Why did Peter Whynacht name his social media, creative design and video production company BusinessHub?

[c_button id="ct_custom_6091448963626" url="#" url_target="0" icon="fa fa-play-circle-o" style="4" text_color="#fff" bg_color="#0084ff"]WATCH DANNY\'S STORY[/c_button][/c_story][c_story title="Vending franchise sees a healthy lift in profits" avatar="7782"]Healthy Vending, the world&rsquo;s leading franchisor of socially responsible, healthy vending machine businesses.

[c_button id="ct_custom_6091448963627" url="#" url_target="0" icon="fa fa-play-circle-o" style="4" text_color="#fff" bg_color="#0084ff"]WATCH DANNY\'S STORY[/c_button][/c_story][/c_stories][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]',
		'custom_field' => array(
			'meta_nav_style' => 'style_2',
			'meta_header_schema' => 'light',
			'meta_nav_opacity' => 0,
			'page_meta_text_heading_style' => 'hidden',
			'meta_page_content' => 'this_page'
		)
	),
	'v6' => array(
		'home' => 'Homepage V6',
		'blog' => 'BLOG',
		'home_content' => '[vc_row full_width="stretch_row" css=".vc_custom_1448968501170{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 175px !important;padding-bottom: 120px !important;background-image: url(http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/slider-v6.jpg?id=5509) !important;}"][vc_column width="1/2" css=".vc_custom_1454131021380{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_single_image image="8185" img_size="large" alignment="center" css_animation="left-to-right" css=".vc_custom_1454132080885{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][/vc_column][vc_column width="1/2" css=".vc_custom_1454132287276{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-right: 40px !important;padding-bottom: 0px !important;padding-left: 10px !important;}"][vc_column_text css_animation="right-to-left" el_class="ct-custom-cf7" css=".vc_custom_1454131366959{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 18px !important;padding-bottom: 0px !important;}"]
<h2 style="font-size: 36px; line-height: 48px; color: #ffffff; letter-spacing: 0.2em;">MAKING YOUR LIFE EASIER WITH US</h2>
<p style="color: #ffffff; font-size: 18px; line-height: 36px; padding-top: 22px; padding-bottom: 27px;">BusinessHub helps you plan your jobs, communicate as a company, and execute effectively regardless of your contracting size or specialty.</p>
[contact-form-7 id="5525" title="Slider v6"]
<p style="padding-top: 27px;"><a href="#"><img src="http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/app-store-v5.png" alt="" /></a><a href="#"><img src="http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/google-play-v5.png" alt="" /></a><a href="#"><img src="http://business-hub.cactusthemes.com/wp-content/uploads/2015/12/amazone.png" alt="" /></a></p>
[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1448970915635{margin-bottom: 0px !important;}"][vc_column css=".vc_custom_1448970960058{padding-top: 70px !important;padding-bottom: 60px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454133440388{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<h3 style="text-align: center;">ON THE [c_icon name="ct-icon-57-goods-shoes"] PRESS</h3>
[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1454133373840{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 30px !important;}"][vc_column width="1/4" css=".vc_custom_1454133260773{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 50px !important;}"][vc_single_image image="5533" img_size="full" alignment="center" css_animation="bottom-to-top" css=".vc_custom_1454132868190{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454132595883{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<p style="text-align: center;">&ldquo;BusinessHub is everything you need to get motivated, stay on track, and accomplish your goals.&rdquo;</p>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1454133285742{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 50px !important;}"][vc_single_image image="5534" img_size="full" alignment="center" css_animation="bottom-to-top" css=".vc_custom_1454132785076{margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454132606505{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<p style="text-align: center;">&ldquo;Discover which days you&rsquo;re more productive. Track how much you improve over time. &rdquo;</p>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1454133293125{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 50px !important;}"][vc_single_image image="5778" img_size="full" alignment="center" css_animation="bottom-to-top" css=".vc_custom_1454132902486{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454132615018{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<p style="text-align: center;">&ldquo;Insanely great - beautiful and simple. The best habit tracker, hands down.&rdquo;</p>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1454133299622{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 50px !important;}"][vc_single_image image="8191" img_size="full" alignment="center" css_animation="bottom-to-top" css=".vc_custom_1454133145635{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454132631566{margin-top: 0px !important;margin-bottom: 8px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<p style="text-align: center;">&ldquo;We are what we repeatedly do. Excellence, then, is not an act, but a habit.&rdquo;</p>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1451125404738{background: #282828 url(http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/v2-bg.png?id=5363) !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column width="1/12" offset="vc_col-lg-offset-0 vc_col-xs-12" el_class="dark-div"][/vc_column][vc_column width="5/12" offset="vc_col-lg-offset-0 vc_col-lg-5 vc_col-md-12 vc_col-xs-12" el_class="dark-div" css=".vc_custom_1454133973273{padding-top: 120px !important;padding-bottom: 60px !important;}"][c_iconbox style="3" item_width="3_12"][c_iconbox_item id="ct_custom_6461444990528" icon="fa fa-check-circle" title="UNLIMITED HISTORY CAPACITY" icon_color="#3abaf1"]Paste extends system clipboard capacity up to unlimited and allows you to get back the stuff you\'ve copied before.[/c_iconbox_item][c_iconbox_item id="ct_custom_6461444990529" icon="fa fa-check-circle" title="EVERYTHING IN ONE PLACE" icon_color="#3abaf1"]Paste automatically recognizes and stores text, images, links, files and any other type of content.[/c_iconbox_item][c_iconbox_item id="ct_custom_9041444990528" icon="fa fa-check-circle" title="RULES AND EXCEPTIONS" icon_color="#3abaf1"]Paste works with any application and allows you to exclude applications with sensitive information.[/c_iconbox_item][c_iconbox_item id="ct_custom_9041444990528" icon="fa fa-check-circle" title="FLEXIBLE PRICING" icon_color="#3abaf1"]Every month we take you behind-the-scenes with one of our talented artists to see what inspired.[/c_iconbox_item][/c_iconbox][/vc_column][vc_column width="5/12" css=".vc_custom_1454133836918{padding-top: 60px !important;}" offset="vc_hidden-md vc_hidden-sm vc_hidden-xs"][vc_single_image image="5360" img_size="full" css_animation="bottom-to-top" css=".vc_custom_1452673230839{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][/vc_column][vc_column width="1/12"][/vc_column][/vc_row][vc_row css=".vc_custom_1454133648088{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 85px !important;padding-bottom: 120px !important;}"][vc_column width="1/4" css=".vc_custom_1451124357593{padding-right: 45px !important;padding-bottom: 30px !important;padding-left: 45px !important;}"][vc_single_image image="5647" img_size="200x200" alignment="center" style="vc_box_rounded" css_animation="bottom-to-top" css=".vc_custom_1449049320470{margin-bottom: 20px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454133492360{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<h4 style="text-align: center;">EASY CONNECT</h4>
<p style="text-align: center;">All the changes you make are logged, giving you the ability to go back in time alterations.</p>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1451124362712{padding-right: 45px !important;padding-bottom: 30px !important;padding-left: 45px !important;}"][vc_single_image image="5669" img_size="200x200" alignment="center" style="vc_box_circle_2" css_animation="bottom-to-top" css=".vc_custom_1449053456117{margin-bottom: 20px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454133504449{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<h4 style="text-align: center;">STAY FIT</h4>
<p style="text-align: center;">Track time effortless and save it to Toggl fast and easy with simple interactions.</p>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1451124369161{padding-right: 45px !important;padding-bottom: 30px !important;padding-left: 45px !important;}"][vc_single_image image="5670" img_size="200x200" alignment="center" style="vc_box_circle" css_animation="bottom-to-top" css=".vc_custom_1449053548379{margin-bottom: 20px !important;}"][vc_column_text css_animation="bottom-to-top" css=".vc_custom_1454133512390{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]
<h4 style="text-align: center;">WORKING TOGETHER</h4>
<p style="text-align: center;">Your data is always safe and available through the amazing platform of BusinessHub.</p>
[/vc_column_text][/vc_column][vc_column width="1/4" css=".vc_custom_1451124377120{padding-right: 45px !important;padding-bottom: 30px !important;padding-left: 45px !important;}"][vc_single_image image="5780" img_size="200x200" alignment="center" style="vc_box_circle" css_animation="bottom-to-top" css=".vc_custom_1454133524269{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_text css_animation="bottom-to-top"]
<h4 style="text-align: center;">MOBILE FIRST</h4>
<p style="text-align: center;">You and your team will always be on the same page when it comes to project specifications.</p>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1452673294069{margin-top: 0px !important;margin-bottom: 0px !important;}"][vc_column css=".vc_custom_1451012021965{padding-right: 0px !important;padding-left: 0px !important;}"][c_parallax media_url="http://business-hub.cactusthemes.com/wp-content/uploads/2015/10/backgoundV6-full.jpg" height="720"][c_parallax_slide align="right" heading="NO MORE MEANINGLESS NOTIFICATION"]Specify is like having your very own time machine. All the changes you make are logged, giving you the ability to go back in time and see previous alterations.[/c_parallax_slide][/c_parallax][/vc_column][/vc_row][vc_row css=".vc_custom_1449141955209{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][c_comparetable id="compare-table-v6"][c_column column_size="3" title="Standard plan" price="$49" sub_text="PER MONTH" column_class="first-column"][c_row]Dev &amp; Freelancer Friendly[/c_row][c_row]Unlimited Domain Use[/c_row][c_row]Free Theme Updates[/c_row][c_row]Support Forum Access[/c_row][c_row]Dev &amp; Freelancer Friendly[/c_row][c_row]24/7 Customer Support[/c_row][c_row][c_button id="ct_custom_3551444988954" style="1" bg_color="#45BAF1" text_color="#FFF"]SIGN UP NOW[/c_button][/c_row][/c_column][c_column id="ct_custom_5671452765441" is_special="1" tag_color="#ffffff" tag_bg="#ffd54a" column_size="3" title="FEATURED PLAN" price="$59" sub_text="PER MONTH" tag="GREAT" column_class="second-column"][c_row]Unlimited Access[/c_row][c_row]Unlimited Bandwidth[/c_row][c_row]Unlimited Storage[/c_row][c_row]Unlimited Contributors[/c_row][c_row]Developer Platform[/c_row][c_row]Mobile Website[/c_row][c_row]Custom Domain FREE[/c_row][c_row][c_button id="ct_custom_201444988954" style="1" bg_color="#45BAF1" text_color="#FFF"]SIGN UP NOW[/c_button][/c_row][/c_column][c_column column_size="3" title="PRO PLAN" price="$69" sub_text="PER MONTH" column_class="third-column"][c_row]Dev &amp; Freelancer Friendly[/c_row][c_row]Unlimited Domain Use[/c_row][c_row]Claritas est etiam processus dynamicus[/c_row][c_row]Support Forum Access[/c_row][c_row]24/7 Customer Support[/c_row][c_row][c_button id="ct_custom_2991444988954" style="1" bg_color="#45BAF1" text_color="#FFF"]SIGN UP NOW[/c_button][/c_row][/c_column][/c_comparetable][/vc_column][/vc_row]',
		'custom_field' => array(
			'meta_nav_style' => 'style_2',
			'meta_header_schema' => 'dark',
			'meta_nav_opacity' => 0,
			'page_meta_text_heading_style' => 'hidden',
			'meta_page_content' => 'this_page'
		)
	));
}

add_action( 'admin_init', 'businesshub_importer' );
function businesshub_importer() {
	global $wpdb;
	
	$sample_data_folder = plugin_dir_path(__FILE__);
	
	$pack = isset($_GET['pack']) ? $_GET['pack'] . '/' : 'all/';
	$sample_data_folder = $sample_data_folder . $pack; //choose pack

	if( current_user_can( 'manage_options' ) && isset($_GET['import_data']) && isset($_GET['option_only']) && $_GET['option_only']==1 ){
		if(!isset($_GET['imported'])){
					// insert sample homepages
					$_sample_pack_data = businesshub_get_global_sample_pack_data();
					
					foreach($_sample_pack_data as $key => $page){
						businesshub_create_sample_pages($key);
					}
					
					/* Import Theme Options */
					$sample_data_uri = plugin_dir_path(__FILE__);
					$sample_data_uri = $sample_data_uri . $pack;
					
					/* Import Theme Options */
					$theme_options_txt = $sample_data_uri . 'theme-options.txt'; // theme options data file

					$theme_options_txt = wp_remote_get( $theme_options_txt );

					if(is_array($theme_options_txt)){
						$data = unserialize( base64_decode( $theme_options_txt['body'])  );
						businesshub_import_themeoptions($data);
						
					}
					echo 'Import Theme Options...DONE!<br/>';
					
					/* Import Widget Settings */
					$widgets_json = $sample_data_uri . 'widget_data.json'; // widgets data file
					$widgets_json = wp_remote_get( $widgets_json );
					if(is_array($widgets_json)){
						$widget_data = $widgets_json['body'];
						$import_widgets = businesshub_import_widgets( $widget_data );
					}
					
					echo 'Import Widget Settings...DONE!<br/>';

					
					businesshub_set_homepage(isset($_GET['pack'])?$_GET['pack']:'');

					echo '<script type="text/javascript">';
					echo 'setTimeout(function(){location.href = "' . admin_url( 'themes.php?page=cactus-welcome&tab=sample&imported=success&pack='.@$_GET['pack'] ) . '";},1000)';
					echo '</script>';
					exit;
		} else {
			wp_redirect( admin_url( 'themes.php?page=cactus-welcome&tab=sample&imported=success&pack='.@$_GET['pack'] ) );
		}
		
	} elseif ( current_user_can( 'manage_options' ) && isset( $_GET['import_data'] ) ) {	
		
					
		if(!isset($_GET['imported'])){
				$pidx = isset($_GET['pidx']) ? $_GET['pidx'] : 1;
				$limit = 50;

				if($pidx == 1){
					// trying to remove old menus
					$_sample_menus = businesshub_get_global_sample_menus();
					foreach($_sample_menus as $slug=>$name){
						wp_delete_nav_menu($name);
					}
				}
				
				$import_done = businesshub_import_posts($pidx, $limit, $pack);
				if($import_done){
					
					/* Setting Menu Locations */
					$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
					$menus = wp_get_nav_menus(); // registered menus
					$_sample_menus = businesshub_get_global_sample_menus();
					if($menus) {
						foreach($menus as $menu) { // assign menus to theme locations
							foreach($_sample_menus as $slug=>$name){
								if( $menu->name == $name) {
									$locations[$slug] = $menu->term_id;
								}
							}
						}
					}

					set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations
					//echo 'Setting sample menu...DONE!<br/>';

					$sample_data_uri = plugin_dir_path(__FILE__);
					$sample_data_uri = $sample_data_uri . $pack;
					
					/* Import Theme Options */
					$theme_options_txt = $sample_data_uri . 'theme-options.txt'; // theme options data file

					$theme_options_txt = wp_remote_get( $theme_options_txt );
					if(is_array($theme_options_txt)){
						$data = unserialize( base64_decode( $theme_options_txt['body'])  );
						businesshub_import_themeoptions($data);
					}
					echo 'Import Theme Options...DONE!<br/>';
					
					/* Import Widget Settings */
					$widgets_json = $sample_data_uri . 'widget_data.json'; // widgets data file
					$widgets_json = wp_remote_get( $widgets_json );
					if(is_array($widgets_json)){
						$widget_data = $widgets_json['body'];
						$import_widgets = businesshub_import_widgets( $widget_data );
					}
					
					echo 'Import Widget Settings...DONE!<br/>';
					
					businesshub_set_reading_options(isset($_GET['pack']) ? $_GET['pack']:'');
					
					businesshub_set_mega_menu();
					
					echo '<script type="text/javascript">';
					echo 'setTimeout(function(){location.href = "' . admin_url( 'themes.php?page=cactus-welcome&import_data=true&pack='.@$_GET['pack'].'&imported=true' ) . '";},1000)';
					echo '</script>';
					exit;
					
				} else {
					
			
					echo '<h3>importing posts from ' . $pidx . ' to ' . ($pidx + $limit) . '... please wait...</h3><br/>';
					echo '<script type="text/javascript">';
					echo 'setTimeout(function(){location.href = "' . admin_url( 'themes.php?page=cactus-welcome&import_data=true&pack='.@$_GET['pack'].'&pidx=' . ($pidx+$limit)) . '";},1000)';
					echo '</script>';
					exit;
				}
		} else {
			// try to increase timeout
			set_time_limit(300);
			
			$offset = (isset($_GET['offset']) ? $_GET['offset'] : 0);
			
			if(!businesshub_reset_feature_images($offset,@$_GET['pack'])){
				wp_redirect( admin_url( 'themes.php?page=cactus-welcome&import_data=true&imported=feature_images&pack='.@$_GET['pack'].'&offset=' . (intval($offset) + 40) ) );
			} else {
				// finally redirect to success page
				wp_redirect( admin_url( 'themes.php?page=cactus-welcome&tab=sample&imported=success&pack='.@$_GET['pack'] ) );
			}
		}		
	}
}

/**
 * Return true if reached the end of posts
 */
function businesshub_import_posts($start, $limit, $pack=''){
	
	if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
			
	if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
		include ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	}
	
	$sample_data_folder = plugin_dir_path(__FILE__);

	include $sample_data_folder . 'includes/wordpress-importer/wordpress-importer.php';
	
	$sample_data_folder = $sample_data_folder . $pack; //choose pack

	$importer = new Custom_WP_Import();

	/* Import Menus, Posts, Pages */
	$_sample_theme = businesshub_get_global_sample_theme();
	$theme_xml = $sample_data_folder . $_sample_theme . '.xml.gz';
	ob_start();

	add_filter( 'import_post_meta_key', array( $importer, 'is_valid_meta_key' ) );
	add_filter( 'http_request_timeout', array( &$importer, 'bump_request_timeout' ) );
	$importer->import_start($theme_xml);
	$total = count($importer->posts);
	$importer->get_author_mapping();
	wp_suspend_cache_invalidation( true );
	
	if($start == 1){
		$importer->process_categories();
		$importer->process_tags();
		$importer->process_terms();
	}
	
	$importer->process_posts($start, $limit);

	wp_suspend_cache_invalidation( false );

	// update incorrect/missing information in the DB
	$importer->backfill_parents();
	$importer->backfill_attachment_urls();
	$importer->remap_featured_images();
	
	if($start+$limit-1 >= $total) {
		$importer->import_end();
		ob_end_clean();
		return true; // done
	} else{
		ob_end_clean();
	}
	
	return false;
}

function businesshub_import_themeoptions($data){
	/* get settings array */
	$settings = get_option( 'option_tree_settings' );
		
	/* validate options */
	if ( is_array( $settings ) ) {
	
	  foreach( $settings['settings'] as $setting ) {
	  
		if ( isset( $data[$setting['id']] ) ) {
		  
		  $content = ot_stripslashes( $data[$setting['id']] );
		  
		  $data[$setting['id']] = ot_validate_setting( $content, $setting['type'], $setting['id'] );
		  
		}
	  
	  }
	
	}
	
	/* execute the action hook and pass the theme options to it */
	do_action( 'ot_before_theme_options_save', $data );
  
	/* update the option tree array */
	update_option( 'option_tree', $data );
}

/* Set reading options */
function businesshub_set_reading_options($pack=''){
	$_sample_posts_per_page = businesshub_get_global_sample_posts_per_page();
	$_sample_pack_data = businesshub_get_global_sample_pack_data();
	$homepage = get_page_by_title( $_sample_pack_data[$pack]['home'] );
	$posts_page = get_page_by_title( $_sample_pack_data[$pack]['blog'] );
	
	if($homepage && $homepage->ID) {
		update_post_meta( $homepage->ID, '_wp_page_template', 'page-templates/front-page.php' );
		update_option('show_on_front', 'page');
		update_option('page_on_front', $homepage->ID); // Front Page
		if($posts_page && $posts_page->ID){
			update_option('page_for_posts', $posts_page->ID); // Blog Page
		}
		update_option('posts_per_page', $_sample_posts_per_page);
	}
	
	// remove hello world post
	wp_delete_post(1);
}

// Import Widget Settings
// Thanks to http://wordpress.org/plugins/widget-settings-importexport/
function businesshub_import_widgets($widget_data){
	$json_data = $widget_data;
	$json_data = json_decode( $json_data, true );

	$sidebar_data = $json_data[0];
	$widget_data = $json_data[1];
	
	foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
		$widgets[ $widget_data_title ] = '';
		foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
			if( is_int( $widget_data_key ) ) {
				$widgets[$widget_data_title][$widget_data_key] = 'on';
			}
		}
	}
	unset($widgets[""]);

	foreach ( $sidebar_data as $title => $sidebar ) {
		$count = count( $sidebar );
		for ( $i = 0; $i < $count; $i++ ) {
			$widget = array( );
			$widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
			$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
			if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
				unset( $sidebar_data[$title][$i] );
			}
		}
		$sidebar_data[$title] = array_values( $sidebar_data[$title] );
	}

	foreach ( $widgets as $widget_title => $widget_value ) {
		foreach ( $widget_value as $widget_key => $widget_value ) {
			$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
		}
	}

	$sidebar_data = array( array_filter( $sidebar_data ), $widgets );

	businesshub_parse_import_data( $sidebar_data );
}

function businesshub_parse_import_data( $import_array ) {
	$sidebars_data = $import_array[0];
	$widget_data = $import_array[1];
	$current_sidebars = get_option( 'sidebars_widgets' );
	$new_widgets = array( );
	foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :
		$current_sidebars[$import_sidebar] = array(); // clear current widgets in sidebar
		
		foreach ( $import_widgets as $import_widget ) :
			//if the sidebar exists
			if ( isset( $current_sidebars[$import_sidebar] ) ) :
				
				$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
				$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
				$current_widget_data = get_option( 'widget_' . $title );
				$new_widget_name = businesshub_get_new_widget_name( $title, $index );
				$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

				if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
					while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
						$new_index++;
					}
				}
				$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
				if ( array_key_exists( $title, $new_widgets ) ) {
					$new_widgets[$title][$new_index] = $widget_data[$title][$index];
					$multiwidget = $new_widgets[$title]['_multiwidget'];
					unset( $new_widgets[$title]['_multiwidget'] );
					$new_widgets[$title]['_multiwidget'] = $multiwidget;
				} else {
					$current_widget_data[$new_index] = $widget_data[$title][$index];
					$current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
					$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
					$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
					unset( $current_widget_data['_multiwidget'] );
					$current_widget_data['_multiwidget'] = $multiwidget;
					$new_widgets[$title] = $current_widget_data;
				}

			endif;
		endforeach;
	endforeach;

	if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
		update_option( 'sidebars_widgets', $current_sidebars );

		foreach ( $new_widgets as $title => $content )
			update_option( 'widget_' . $title, $content );

		return true;
	}

	return false;
}

function businesshub_get_new_widget_name( $widget_name, $widget_index ) {
	$current_sidebars = get_option( 'sidebars_widgets' );
	$all_widget_array = array( );
	foreach ( $current_sidebars as $sidebar => $widgets ) {
		if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
			foreach ( $widgets as $widget ) {
				$all_widget_array[] = $widget;
			}
		}
	}
	while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
		$widget_index++;
	}
	$new_widget_name = $widget_name . '-' . $widget_index;
	return $new_widget_name;
}

/* Run through all posts and reset feature images to the dummy image */
function businesshub_reset_feature_images($offset,$pack=''){
	$posts = query_posts(array('post_status' => 'publish','posts_per_page'=>40,'offset'=>$offset));
	$pack = $pack ? '/'.$pack : '';
	if(have_posts()){
		session_start();
		if(isset($_SESSION["dummy_id"])){
			$attach_id = $_SESSION["dummy_id"];
		}else{
			// download feature image
			$upload_dir = wp_upload_dir();
			$file_name = uniqid('feature_') . '.png';
			copy(plugin_dir_path(__FILE__) . $pack . '/dummy.png', $upload_dir['path'] . '/'. $file_name);
			$filename = $upload_dir['path'] . '/' . $file_name;
			// insert
			$wp_filetype = wp_check_filetype(basename($filename), null );
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
				'post_content' => '',
				'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			wp_update_attachment_metadata( $attach_id, $attach_data );
			
			$_SESSION["dummy_id"] = $attach_id;
		}
					
		while ( have_posts() ) : the_post();
			businesshub_set_featured_image(get_the_ID(), $attach_id);
		endwhile;

		wp_reset_query();
		
		return false;
	} else {
		return true;
	}
}

/*
 * $post_id: ID of post which attachment image is set to
 * $filename: absolute path of image on server (in /uploads directory)
 */
function businesshub_set_featured_image($post_id, $attach_id) {
	set_post_thumbnail($post_id, $attach_id); // images regenerate thumbnails must be done later
}

function businesshub_set_widget_logic($pack=''){
	$pack = $pack ? $pack : '';
	global $wp_registered_widgets, $wp_registered_widget_controls, $wl_options;

	// IMPORT ALL OPTIONS
	$import = explode("\n",file_get_contents(plugin_dir_path(__FILE__) .$pack. '/widget_logic_options.txt', false));
	if (array_shift($import)=="[START=WIDGET LOGIC OPTIONS]" && array_pop($import)=="[STOP=WIDGET LOGIC OPTIONS]")
	{	foreach ($import as $import_option)
		{	list($key, $value)= explode("\t",$import_option);
			$wl_options[$key]=json_decode($value);
		}
		
		$wl_options['msg']= esc_html__('Success! Options file imported','widget-logic');
	}
	else
	{	
		$wl_options['msg']= esc_html__('Invalid options file','widget-logic'); // should never happen here
	}

	update_option('widget_logic', $wl_options);
	
}

function businesshub_set_mega_menu(){
	$_sample_mega_menu = businesshub_get_global_sample_mega_menu();
	
	if(isset($_sample_mega_menu)){
		$items = wp_get_nav_menu_items($_sample_mega_menu['name']); // menu slug
		
		if(!$items) return;
		
		foreach ( (array) $items as $key => $menu_item ) {
			$title = $menu_item->title;
			$not_default = false;
			if(isset($_sample_mega_menu['mega_item'])){
				if($title == $_sample_mega_menu['mega_item']){
					$options =  array ( 'menu-item-isMega' => 'on',
												'menu-item-menu_style' => 'preview',
												'menu-item-addSidebar' => 0,
												'menu-item-displayLogic' => 'both' 
											);
					
					delete_post_meta($menu_item->ID, '_mashmenu_options');
					update_post_meta( $menu_item->ID, '_mashmenu_options', $options);
					$not_default = true;
				}
			}
			
			if(isset($_sample_mega_menu['columns_item'])){
				if($title == $_sample_mega_menu['columns_item']){
					$options =  array ( 'menu-item-isMega' => 'off',
												'menu-item-menu_style' => 'columns',
												'menu-item-addSidebar' => 0,
												'menu-item-displayLogic' => 'both' 
											);
					
					delete_post_meta($menu_item->ID, '_mashmenu_options');
					update_post_meta( $menu_item->ID, '_mashmenu_options', $options);
					
					$not_default = true;
				}
			}
			
			if(!$not_default){
				$options =  array ( 'menu-item-isMega' => 'off',
											'menu-item-menu_style' => 'list',
											'menu-item-addSidebar' => 0,
											'menu-item-displayLogic' => 'both' 
										);
				
				delete_post_meta($menu_item->ID, '_mashmenu_options');
				update_post_meta( $menu_item->ID, '_mashmenu_options', $options);
			}
		}
	}
}

/* Create sample post */
function businesshub_create_sample_pages($key){
	$_sample_pack_data = businesshub_get_global_sample_pack_data();
	$post_title = $_sample_pack_data[$key]['home'];
	$post_description = $_sample_pack_data[$key]['home_content'];
	$custom_field = @$_sample_pack_data[$key]['custom_field'];
	
	$page = get_page_by_title($post_title);
	if(!$page){
		$post_post = array(
		  'post_content'   => $post_description,
		  'post_name' 	   => sanitize_title($post_title), //slug
		  'post_title'     => $post_title,
		  'post_status'    => 'publish',
		  'post_type'      => 'page'
		);
		if($new_ID = wp_insert_post( $post_post, false )){
			if($post_title == 'Homepage EDD'){
				update_post_meta( $new_ID, '_wp_page_template', 'templates/edd-page-template.php' );
			} else {
				update_post_meta( $new_ID, '_wp_page_template', 'page-templates/front-page.php' );
			}
			if(is_array($custom_field)){
				foreach($custom_field as $key=>$value){
					update_post_meta( $new_ID, $key, $value );
				}
			}
			
			return $new_ID;
		}
	} else {
		return $page->ID;
	}
}

/* Set homepage */
function businesshub_set_homepage($pack='all'){

	$id = businesshub_create_sample_pages($pack);

	if($id){
		update_option('show_on_front', 'page');
		update_option('page_on_front', $id); // Front Page
	}
}