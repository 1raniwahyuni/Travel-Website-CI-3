	<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Detaill Gallery Foto</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>





	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Gallery Foto <?= $nama_gallery->nama_gallery ?></h2>
					</div>
				</div>
			</div>
			<div class="row about_row mx-auto">
				<?php foreach ($gallery as $key => $value) { ?>
				<div class="col-lg-4 about_col about_col_left">
					<div class="about_item text-center">
						<div class="about_item_image"><img src="<?= base_url('foto/foto_gallery/'.$value->foto_gallery) ?>" width="100%" height="230px" class="mx-auto">
                    </div>
					<div class="about_item_title"><a href="#"><?= $value->ket_foto ?></a></div><br>
					</div>
				</div>
				<?php } ?>
				
			</div>
			<div class="back_button_container text-center">
                    <a href="<?= base_url('home/gallery') ?>" class="btn btn-primary mx-auto">Back to Gallery</a>
                </div>
		</div>
	</div>






	<div class="newsletter">
		<div class="newsletter_background" style="background-image:url(<?= base_url() ?>template/front-end/images/newsletter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for news and offers</div>
							<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->












