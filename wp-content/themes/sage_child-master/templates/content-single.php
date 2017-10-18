<?php while (have_posts()) : the_post(); ?>
<article <?php post_class("sing-docs"); ?>>
<header>
<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php get_template_part('templates/entry-meta'); ?>
</header>
<div class="entry-content">
<?php if ( has_post_thumbnail() )://有缩略图则显示这段代码，没有就算了不显示了 ?>
<div class="entry-thumb"><?php the_post_thumbnail( 'medium' );//缩略图 ?></div>
<?php endif; ?>
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
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</footer>
<?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>