<?php
//
if(!function_exists('job_shortcode_query')){ 
	function job_shortcode_query($cat='',$ids='',$count='',$order='',$orderby='',$date_expired=''){
		$args = array();
		if($ids!=''){ //specify IDs
			$ids = explode(",", $ids);
			$args = array(
				'post_type' => 'ct_job',
				'posts_per_page' => $count,
				'order' => $order,
				'orderby' => $orderby,
				'meta_key' => $meta_key,
				'post__in' => $ids,
				'ignore_sticky_posts' => 1,
			);
		}elseif($ids==''){
			$args = array(
				'post_type' => 'ct_job',
				'posts_per_page' => $count,
				'order' => $order,
				'orderby' => $orderby,
				'ignore_sticky_posts' => 1,
			);
			if($cat){
				if(!is_array($cat) && $cat!='') {
					$cats = explode(",",$cat);
					if(is_numeric($cats[0])){
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'job_cat',
								'field'    => 'id',
								'terms'    => $cats,
								'operator' => 'IN',
							)
						);
					}else{
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'job_cat',
								'field'    => 'slug',
								'terms'    => $cats,
								'operator' => 'IN',
							)
						);
					}
				}elseif(count($cat) > 0 && $cat!=''){
					$args['tax_query'] = array(
						array(
							'taxonomy' => 'job_cat',
							'field'    => 'id',
							'terms'    => $cat,
							'operator' => 'IN',
						)
					);
				}
			}
			$time_now =  strtotime("now");
			if($date_expired=='1'){
					if($order==''){$order='DESC';}
					$args += array('meta_key' => 'job-expired', 'meta_value' => $time_now, 'meta_compare' => '<=','orderby' => 'meta_value_num', 'order' => $order);
			}
		}
		$args['suppress_filters'] = 0;
		$shortcode_query = new WP_Query($args);
		return $shortcode_query;
	}
}
