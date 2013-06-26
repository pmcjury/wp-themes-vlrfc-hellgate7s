<?php
$newerPostText = !empty( $newerPostText ) ? $newerPostText : 'Newer Entries &raquo;';
$olderPostText = !empty( $olderPostText ) ? $olderPostText : '&laquo; Older Entries';
?>
	<div class="paged-navigation">
		<div class="paged-alignleft">&nbsp;<?php next_posts_link( $olderPostText ); ?></div>
      	<div class="paged-alignright"><?php previous_posts_link( $newerPostText ); ?>&nbsp;</div>
	</div>
<?php 