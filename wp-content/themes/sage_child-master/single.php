<?php
//$content_single_post="3,4";
//if ( in_category( array( 3,4 ) ) ) {//迭代品如下
if ( in_category( $content_post ) ) {//在 function 有挂载 lib/content-post.php
get_template_part('templates/content-single-item', get_post_type()); // 包含的ID使用
} else {
get_template_part('templates/content-single', get_post_type()); // 否则使用默认模板
}
?>
