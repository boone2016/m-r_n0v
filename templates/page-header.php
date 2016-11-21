<?php use Roots\Sage\Titles; ?>


<?php

	$pgTitle = get_field('page_title', 'option');
	if($pgTitle==0):
?>
	<div class="page-header">
		  <h1 class="text-center"><?= Titles\title(); ?></h1>
		  <hr>
	</div>
<?php endif; ?>