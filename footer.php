
			<?php echo (!is_home())?'</div>':'' ?> <!-- clear -->
			<?php echo (!is_home())?'</div>':'' ?>

			<footer id="footer">
				&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>
			</footer>

		</div> <!-- page wrap -->

			<?php if(is_single()): ?>
				<aside id="comment-sidebar">
					<?php comments_template(); ?>
				</aside>
			<?php endif; ?>
	</div>

		<?php wp_footer(); ?>

		<?php /*
		<p>
		<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">MassivePress</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://massivemobile.com/massivepress/" property="cc:attributionName" rel="cc:attributionURL">Duane Wilson</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.<br />Based on a work at <a xmlns:dct="http://purl.org/dc/terms/" href="https://github.com/arrizalamin/MediumPress" rel="dct:source">https://github.com/arrizalamin/MediumPress</a>.
		</p>
		*/ ?>

		<!-- Don't forget analytics -->

</div>

	<?php if(is_single()): ?>
	<script type="text/javascript">
		var a = $('.post-content p, .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6, .post-content img');
		a.each(function(){
			/*
			$(this).prepend('<div class="comment-count" style="background:url(<?php bloginfo('template_url') ?>/images/bubble.png) no-repeat center bottom;"><p style="text-align:center;line-height:1;"><?php comments_number('+',1,'%') ?></p></div>');
			*/
		});
		a.hover(function(){
			/* $(this).addClass('comment-visible'); */
		},function(){
			/* $(this).removeClass('comment-visible'); */
		});

		var comment1 = $("#comment1");
		var comment2 = $("#comment2");
		var nav_form_comment = $(".nav-form-comment");
		var input_name = $("#author");
		var input_email = $("#email");
		var p = $("#pic-and-name");
		var my_name = $("#my-name");

		nav_form_comment.click(function(e){
			e.preventDefault();
			if($(this).text() == "Next" && input_name.val() != "" && input_email.val() != ""){
				if($("#url").val() != ""){
					p.wrap('<a href="'+$("#url").val()+'" />');
				}
				my_name.text(input_name.val());
				comment1.slideUp('slow', function(){
					comment2.slideDown('slow');
				});
			} else if($(this).text() == "Back"){
				comment2.slideUp('slow', function(){
					comment1.slideDown('slow');
				});
			}
		});
	</script>
	<?php endif; ?>

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</body>
</html>
