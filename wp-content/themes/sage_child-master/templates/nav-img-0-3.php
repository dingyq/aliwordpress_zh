<div class="nav-img-0"><div class="container"><div class="content"><div class="row">
<?php
$args=array(
'cat' => 5,   // 分类ID 布袋
'posts_per_page' => 4, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-sm-3"><div class="ent-content"><div class="ent-thumbnail">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a></div>
<h3 class="ent-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<div class="ent-summary"><span class="ent-price"><?php the_field('价格');?>元起</span></div></div></div>
<?php endwhile; endif; wp_reset_query(); ?>
</div></div></div></div>
<div class="nav-img-1"><div class="container"><div class="content"><div class="row">
<?php
$args=array(
'cat' => 6,   // 分类ID 骨架
'posts_per_page' => 4, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-sm-3"><div class="ent-content"><div class="ent-thumbnail">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a></div>
<h3 class="ent-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<div class="ent-summary"><span class="ent-price"><?php the_field('价格');?>元起</span></div></div></div>
<?php endwhile; endif; wp_reset_query(); ?>
</div></div></div></div>
<div class="nav-img-2"><div class="container"><div class="content"><div class="row">
<?php
$args=array(
'cat' => 4,   // 分类ID 配件
'posts_per_page' => 4, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-sm-3"><div class="ent-content"><div class="ent-thumbnail">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a></div>
<h3 class="ent-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<div class="ent-summary"><span class="ent-price"><?php the_field('价格');?>元起</span></div></div></div>
<?php endwhile; endif; wp_reset_query(); ?>
</div></div></div></div>
<div class="nav-img-3"><div class="container"><div class="content"><div class="row">
<?php
$args=array(
'cat' => 3,   // 分类ID 设备
'posts_per_page' => 4, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-sm-3"><div class="ent-content"><div class="ent-thumbnail">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a></div>
<h3 class="ent-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<div class="ent-summary"><span class="ent-price"><?php the_field('价格');?>元起</span></div></div></div>
<?php endwhile; endif; wp_reset_query(); ?>
</div></div></div></div>