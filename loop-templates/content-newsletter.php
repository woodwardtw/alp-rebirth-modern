<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('newsletter'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ),
			'</h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
		<?php the_content();?>
		<div id="mc_embed_shell">
		  <!-- <style type="text/css">
		        #mc_embed_signup{background:#fff; false;clear:left; font:14px Helvetica,Arial,sans-serif; width: 600px;}
		        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
		           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
		</style> -->
		<div id="mc_embed_signup">
		    <form action="https://alplearn.us22.list-manage.com/subscribe/post?u=4312a0b9ec5cc92302c41a63e&amp;id=8a1b3c03d1&amp;f_id=009cd5e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
		        <div id="mc_embed_signup_scroll">
		            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
		            <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div><div class="mc-field-group"><label for="mce-FNAME">First Name <span class="asterisk">*</span></label><input type="text" name="FNAME" class="required text" id="mce-FNAME" required="" value=""></div><div class="mc-field-group"><label for="mce-LNAME">Last Name </label><input type="text" name="LNAME" class=" text" id="mce-LNAME" value=""></div><div class="mc-field-group"><label for="mce-MMERGE6">Job Title </label><input type="text" name="MMERGE6" class=" text" id="mce-MMERGE6" value=""></div><div class="mc-field-group"><label for="mce-MMERGE7">Associated Company/Organization </label><input type="text" name="MMERGE7" class=" text" id="mce-MMERGE7" value=""></div>
		<div hidden=""><input type="hidden" name="tags" value="22825"></div>
		        <div id="mce-responses" class="clear">
		            <div class="response" id="mce-error-response" style="display: none;"></div>
		            <div class="response" id="mce-success-response" style="display: none;"></div>
		        </div><div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_4312a0b9ec5cc92302c41a63e_8a1b3c03d1" tabindex="-1" value=""></div><div class="clear"><input type="submit" name="subscribe" id="mc-embedded-subscribe-alp" class="btn btn-alp btn-learn btn-number-1" value="Subscribe"></div>
		    </div>
		</form>
		</div>
		<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[6]='MMERGE6';ftypes[6]='text';fnames[7]='MMERGE7';ftypes[7]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>
		<?php
		//the_excerpt();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
