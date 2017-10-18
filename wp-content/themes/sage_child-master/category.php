<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
<div class="alert alert-warning">
<?php _e('Sorry, no results were found.', 'sage'); ?>
</div>
<?php get_search_form(); ?>
<?php endif; ?>

<div class="row">
<?php while (have_posts()) : the_post(); ?>
<?php
//$content_item_post=="3,4";
//if ( in_category( array( 3,4 ) ) ) {//迭代品如下
if ( in_category( $content_post ) ) {//在 function 有挂载 lib/content-post.php
get_template_part('templates/content-item', get_post_type() != 'post' ? get_post_type() : get_post_format());// 包含的ID使用（产品列表模板）
} else {
get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());// 否则使用默认模板（普通文档列表模板）
}
?>
<?php endwhile; ?>
<?php echo $content_item_post ?>
</div>

<?php the_posts_navigation(); ?>