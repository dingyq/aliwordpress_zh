<div class="col-md-12">
<article <?php post_class("cate-docs row"); ?>>
<?php if ( has_post_thumbnail() )://有缩略图则显示这段代码，没有就算了不显示了 ?>
<div class="col-sm-3"><div class="entry-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?></a></div></div>
<?php endif; ?>
<div class="col-sm-<?php if(has_post_thumbnail()){echo "9";}else{echo "12";}//如果有缩略图则为9，否则为12?>">
<header>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php get_template_part('templates/entry-meta'); ?></header>
<div class="entry-summary"><?php the_excerpt();//内容摘要 ?></div></div>
</article>
</div>
