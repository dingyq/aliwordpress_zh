<div class="col-xs-6 col-md-3">
<article <?php post_class("cate-item"); ?>>
<header>
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
</header>
<div class="entry-summary">
<span class="price">价格：<?php the_field('价格'); ?>元</span>
<span class="chengjiao">成交：<?php post_views('', ''); ?></span>
</div>
</article>
</div>