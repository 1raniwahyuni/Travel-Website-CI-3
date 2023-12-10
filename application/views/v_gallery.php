	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Gallery Foto</li>
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
						<h2 class="section_title">Welcome To Gallery Foto </h2>
					</div>
				</div>
			</div>
			<div class="row about_row">
				<?php foreach ($gallery as $key => $value) { ?>
                    <div class="col-lg-4 about_col about_col_left mx-auto">
                        <div class="about_item text-center">
                            <div class="about_item_image"><img src="<?= base_url('foto/sampul_gallery/'.$value->sampul_gallery) ?>" width="350px" height="250px"  class="mx-auto"></div>
                            <div class="about_item_title"><a href="<?= base_url('home/detail_gallery/'.$value->id_gallery) ?>">Gallery Foto <?= $value->nama_gallery ?></a></div>
                            <div class="about_item_text ">
                                Jumlah : <?= $value->jml_foto ?> Foto
                            </div>
                        </div>
                    </div>
				<?php } ?>
			</div>
		</div>
	</div>



    <div class="newsletter">
     <div class="newsletter_background" style="background-image:url(<?= base_url()?>template/front-end/images/newsletter.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for updates and offers</div>
							<div class="newsletter_subtitle">Nantikan Konten Kami Selanjutnya !!</div>
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




