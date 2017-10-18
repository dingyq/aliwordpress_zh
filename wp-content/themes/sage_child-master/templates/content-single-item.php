<?php while (have_posts()) : the_post(); ?>
<article <?php post_class("sing-item"); ?>>
<header class="row">
<div class="col-sm-12">
<div class="entry-sku">
<div class="row">
<div class="col-sm-2"><h2 class="sku-h">
<?php $category = get_the_category(); ?>
<?php
$args=array(
'cat' => $category[0]->term_id,   // 分类ID 设备，当前内容页的id
'posts_per_page' => 1, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
<?php endwhile; endif; wp_reset_query(); ?>
</h2></div>
<div class="col-sm-10"><ul class="list-inline sku-posts">
<li>进一步了解：</li>
<?php
$args=array(
'cat' => $category[0]->term_id,   // 分类ID 设备，当前内容页的id
'posts_per_page' => 100, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<li><a class="sku-title" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php
if(get_field('小标题')){//判断是否有这个字段
the_field('小标题');//如果有显示它
}else{
the_title();//如果没有显示它
}
?></a></li>
<?php endwhile; endif; wp_reset_query(); ?>
</ul></div>
</div>
</div>
</div>
<div class="col-sm-12 text-center">
<div class="thumbnail-medium"><?php the_post_thumbnail( 'medium' );//缩略图 ?></div>
</div>
<div class="col-sm-12 text-center">
<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</div>
</header>
<div class="entry-content">
<?php the_content(); ?>
</div>
<footer>
<div class="row">
<div class="col-sm-6">
<?php comments_template('/templates/bd-share-buttom.php'); ?>
</div>
<div class="col-sm-6">
<?php comments_template('/templates/tag-and-nav.php'); ?>
</div>
<div class="col-sm-12">
<div class="current-category-next-link">
<?php
$args=array(
'cat' => $category[0]->term_id,   // 分类ID 设备，当前内容页的id
'posts_per_page' => 100, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<a class="sku-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3>继续了解：<?php single_cat_title(); ?>的<?php
if(get_field('小标题')){//判断是否有这个字段
the_field('小标题');//如果有显示它
}else{
the_title();//如果没有显示它
}
?> <i class="fa fa-chevron-right"></i></h3></a>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
</div>
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</footer>
<?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>