<?php
/*
 * Template name: Art-Gallery-CPT
 *
 * @package WordPress
 * @subpackage BuddyBoss_Theme_Child
 * 
 */
get_header();
$posts = \RampJournal\Core\ArtGalleryModel::getAllPost();
?>
<div style="display:none">
	<script type='text/javascript'>
		var num = 0;
		var thePost = {};
		
		// var imgArray = [];
		var imgArray = <?php echo json_encode($posts); ?>;

		function slideshow(slide_num) {
			if(!isNaN(slide_num)){
				num = slide_num;
				thePost = imgArray[slide_num];
				reRenderModal(slide_num);
			}
		}

		//next button
		function slideshowUp() {
			num++;
			num = num % imgArray.length;
			slideshow(num);
		}

		//previous button
		function slideshowBack() {
			num--;
			if (num < 0) {num=imgArray.length-1;}
			num = num % imgArray.length;
			slideshow(num);
		}

		/*
		 * Main function (show modal)
		 * @return void
		*/
		function slideshowDOM(event, slide_num) {

			// body
			document.body.style.overflow = 'hidden';

			// modal
			document.getElementById('art-gallery-modal').style.display = 'block';

			slideshow(slide_num);
		}

		/*
		 * Draw or Re-render modal content
		 * @return void
		*/
		function reRenderModal(index){
			const modalDom = document.querySelector('#art-gallery-modal div.content');
			const link = document.querySelector('.gallery-list a[data-index="' + index +'"');

			//01: SETER MODAL [set image, set title, comment]
			modalDom.firstElementChild.querySelector('img').src = link.querySelector('img').getAttribute('src');
			modalDom.querySelector('h2.post_title').innerHTML = thePost.post_title;
			modalDom.querySelector('div.post_content').innerHTML = thePost.post_content;

			// show and hide (comment section)
			paintAllComments();
			const domContentCommentForm = modalDom.querySelector('div.post_comment .content-form');
			if (thePost.comment_status === 'open') {
				domContentCommentForm.style.display = 'block';
			} else {
				domContentCommentForm.style.display = 'none';
			}
		}

		/*
		* Print all comments of the post
		**/
		function paintAllComments(){
			const modalDom = document.querySelector('#art-gallery-modal div.content');
			const domComment = modalDom.querySelector('div.post_comment .content-comment');
			domComment.innerHTML = '';

			//02: load commnets
			jQuery.ajax({
				url : jsVars.api_rest_url + 'wp/v2/comments?post=' + thePost.ID,
				type : 'GET',
				dataType:'json',
				beforeSend: function() {
					domComment.innerHTML = '<p>Loading...</p>';
				},
				success : function(data) {
					let strHTML = '';
					jQuery.each(data, function( index, post ) {
						let langFormat = jsVars.wp_lang.replace('_', '-'); // en-US
						let dataDate = new Date(post.date);
						let printDate = dataDate.toLocaleString(langFormat);

						strHTML += '<div class="item">';
						strHTML += '<strong>' + (post.author_name || 'Anonymus') +': </strong>';
						strHTML += '' + post.content.rendered;
						strHTML += '<br/>';
						strHTML += ''+ printDate +'';
						strHTML += '</div>';
					});
					domComment.innerHTML = strHTML;
				},
				error : function(request,error){
					domComment.innerHTML = '<p>A problem ocurred, try later</p>';
				}
			});
		}

		/*
		 * Validate form
		*/
		function validateFormComment() {
			const theForm = document.querySelector('#frm-comment');
			const theFormRs = document.querySelector('#frm-comment-result');
			const textComment = theForm.querySelector('textarea').value;

			if ( textComment != '') {

				jQuery.ajax({
					url : jsVars.api_rest_url + 'wp/v2/comments',
					type : 'POST',
					dataType:'json',
					data: {
						"post": thePost.ID,
						"content": textComment,
						"author": jsVars.wp_user.ID
					},
					beforeSend: function(xhr) {
						xhr.setRequestHeader( 'X-WP-Nonce', jsVars.wp_nonce );
						theForm.querySelector('fieldset').setAttribute('disabled', 'disabled');
					},
					success : function(data) {
						theForm.reset();
						paintAllComments();

						theForm.querySelector('fieldset').removeAttribute('disabled')
					}
				});

			} else {
				theFormRs.innerHTML = '<span style="color:red">The field cannot be empty</span>';
				setTimeout(function(){ theFormRs.innerHTML = ''; }, 1000);
			}

			return false;
		}

		/*
		 *******************************************
		 * TRICKS - Control click (into modal & out modal)
		 *******************************************
		*/
		function loadForControlModal() {
			var el = document.getElementById("art-gallery-modal");
			el.addEventListener("click", function(){

				// body
				document.body.style.overflow = 'auto';

				// modal
				document.getElementById('art-gallery-modal').style.display = 'none';
			}, false);

			var el2 = document.getElementById('the-grid');
			el2.addEventListener("click", function(event){
				event.stopPropagation();
			}, false);
		}

		document.addEventListener("DOMContentLoaded", loadForControlModal, false);
	</script>
</div>

	<div id="the-primary" style="padding-top: 1em;">
		<main>
			<?php 
				// Print the content
			    if ( have_posts() ) {
			        wp_reset_query();
			        setup_postdata($post); 
			        echo the_content();
			    } else {
			        echo "There are not description content";
			    };
			?>
			<div class="gallery-list">
				<?php foreach ($posts as $key => $post): ?>
					<div class="outer-wrapper">
						<a onclick="slideshowDOM(event, <?php echo $key; ?>)" href="javascript:void(0);"
							data-index="<?php echo $key; ?>">
							<div class="frame">
								<?php if (has_post_thumbnail( $post->ID ) ): ?>
									<?php echo get_the_post_thumbnail($post, 'post-thumbnail', array( 'alt' => $post->post_title)); ?>
								<?php else: ?>
									<img src="https://via.placeholder.com/250" width="250px" height="250px"/>
								<?php endif; ?>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


	<div id="art-gallery-modal" class="art-gallery-modal">
		<div id="the-grid" class="the-grid">
			<div class="arrow-left">
				<a onclick="slideshowBack()" href="javascript:void(0);"><i class="arrow left"></i></a>
			</div>

			<div class="content">
				<div class="text-center">
					<img  class="img-responsive" src="http://mentalhealth.local/wp-content/uploads/2021/08/Andy-Warhol-Ladies-and-Gentleman-1975-_wikiart.jpg">
				</div>
				<br/>
				<h2 class="post_title">100 Cams (1969) / Andy Warrior</h2>
				<div class="post_content">
					<p>Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).</p>
				</div>
				<br/>
				<div class="post_comment">
					<div class="content-form" style="">
						<h3>Comments:</h3>
						<div>
							<form id="frm-comment" method="POST" onsubmit="return validateFormComment();">
								<fieldset>
									<textarea placeholder="Comment here!" style="width:100%; height: 4em; margin-bottom:0.5em"></textarea>
									<br/>
									<input type="submit" name="Send" value="Send">
								</fieldset>
							</form>
							<div id="frm-comment-result"></div>
						</div>
					</div>
					<div class="content-comment">
						<div class="item">
							<strong>Juan Carlos:</strong> <p>Como por ejemplo "Contenido aquí, contenido aquí". Estos textos last comment do it all about Andy is raraly, i think is a pour text.</p>
							<br/>
							2021-08-26 17:27:30
						</div>
						
						<div class="item">
							<strong>Robert Test:</strong> <p>There are more content, contenido aquí". Estos textos last comment do it all about cindy roll, and manager this project.</p>
							<br/>
							2021-08-11 01:10:00
						</div>
					
					</div>
				</div>
			</div>

			<div class="arrow-right">
				<a onclick="slideshowUp()" href="javascript:void(0);"><i class="arrow right"></i></a>
			</div>
		</div>
	</div>
<style type="text/css">

/* Fixeng space not used */
.container{
	max-width: 1090px;
}
.container.site-header-container{
	/*height: auto;*/
}
div#content{
	/*padding-top: 75px;*/
}
.bb-grid{
	display: block;
}
input[type=submit]{
	border-radius: initial;
}

/* css for images list */
.outer-wrapper{
	display: inline-block; 
	overflow: hidden;
	height: 300px;
	margin: 26px;
}
div.frame {
	width: 300px;
	height: 300px;
	border: 1px solid #ccc;
	vertical-align: middle;
	text-align: center;
	display: table-cell;
}

#art-gallery-modal {
	display: none;
}
.art-gallery-modal{
    z-index: 999;
    width: 100%;
    position: fixed;
    top: 0;
    height: 100%;
    background: #0000001f;
    left: 0;
}
.art-gallery-modal .content{
    overflow-y: scroll;
    background: white;
    padding: 1.3em 2em;
    margin:  1.3em 0;
    width: 100%;
}
.art-gallery-modal .arrow-right{
	margin-top: 40%;
}
.art-gallery-modal .arrow-left{
	margin-top: 40%;
}

.the-grid{
	display: flex;
	flex-direction: row;
	width: 1000px;
	margin: 0 auto;
	height: 100%;
}
.the-grid img{
	max-height: 400px;
}
.post_comment .content-comment p {
	padding: 0;
	margin: 0;
	display: inline;
}
.post_comment .content-comment .item{
	margin-bottom: 1em;
}
#frm-comment{
	margin: 0;
	padding: 0;
}
#frm-comment fieldset{
	margin: 0;
	padding: 0;
	border: 0;
}
#frm-comment-result {
	min-height: 42px;
}

/* Component 2: modal */
.arrow {
  border: solid black;
  border-width: 0 0.5em 0.5em 0;
  display: inline-block;
  padding: 1em;
}

.right {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.left {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}

.up {
  transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
}

.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

@media (max-width: 1000px) {
	img.img-responsive{
		width: 250px;
		height: auto;
	}
	.the-grid{
		width: 90%;
	}
	.art-gallery-modal .arrow-right{
		margin-top: 90%;
	}
	.art-gallery-modal .arrow-left{
		margin-top: 90%;
	}

	/* Component 2: modal */
	.arrow {
	  border-width: 0 0.4em 0.4em 0;
	  padding: 0.7em;
	}
	.art-gallery-modal h2 {
		font-size: 1.2em;
	}
	.art-gallery-modal h3 {
		font-size: 1.1em;
	}
}
</style>
<?php
get_footer();

