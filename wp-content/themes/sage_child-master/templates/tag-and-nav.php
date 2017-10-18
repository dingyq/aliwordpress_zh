<div class="get-the-tag-list text-right">
<?php
if(get_the_tag_list()) {
echo get_the_tag_list('<ul class="list-inline"><li>','</li><li>','</li></ul>',$id);
}
?>
</div>