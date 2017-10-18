<?php use Roots\Sage\Titles; ?>

<div class="page-header">
<h1><?= Titles\title(); ?></h1>
<?php
//the_archive_title( '<h1 class="page-title">', '</h1>' );
the_archive_description( '<div class="taxonomy-description">', '</div>' );
?>
</div>