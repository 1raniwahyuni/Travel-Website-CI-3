<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url()?>">Home</a></li>
                            <li>Detail Konten Nusantara</li>
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
                        <div class="blog_title text-center"><?= $konten_nusantara->judul_konten ?></div>
                        <div class="blog_meta text-center">
                            <ul>
                                <li style="font-size: medium;" >Posted on <?= $konten_nusantara->tgl_konten ?></a></li>
                                <li style="font-size: medium;">Ditulis Oleh <?= $konten_nusantara->nama_penulis ?></a></li>
                            </ul>
                        </div>
                        <div class="blog_image text-center">
                            <img src="<?= base_url('foto/gambar_konten/'.$konten_nusantara->gambar_konten) ?>" style="width: 80%;">
                        </div><br><br>
                        <div class="sub_judul text-center">
                            <h3><?= $konten_nusantara->sub_judul ?></h3>
                        </div>
                        <div class="isi-konten text-justify">
                            <p><?= $konten_nusantara->isi_konten ?></p>
                        </div>
                        <div class="back_button_container text-center">
                            <a href="<?= base_url('home/konten_nusantara') ?>" class="btn btn-primary mx-auto">Back to Konten Nusantara</a>
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
