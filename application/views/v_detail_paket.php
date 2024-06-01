<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url()?>">Home</a></li>
                            <li>Detail Paket Wisata</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog">
	<div class="container">
		<div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog_content">
                        <div class="blog_title text-center"><?= $paket->nama_paket ?></div>
                        <div class="blog_image text-center">
                            <img src="<?= base_url('foto/gambar_paket/'.$paket->gambar_paket) ?>" style="width: 80%;">
                        </div><br><br>
						<center>
						<div class="event_info">
							<h3>Harga : Rp. <?= number_format($paket->harga_paket, 0, ',', '.') ?></h3> 
						</div>
						</center>
                        <div class="isi-paket text-justify">
                            <p><?= $paket->ket_paket ?></p>
                        </div>
						<div class="back_button_container text-center">
                            <a href="<?= base_url('home/paket') ?>" class="btn btn-primary mx-auto">Back to Paket Wisata</a>
                        </div>
                    </div>
		        </div>
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
