<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url()?>">Home</a></li>
                            <li>Mancanegara</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses_search_container text-center">
                    <h2>Konten Wista Mancanegara</h2>
                </div>
                <style>
                    .events_col {
                        margin-bottom: 50px;
                    }
                </style>
                    <div class="row events_row justify-content-center"> 
                        <?php foreach ($konten_mancanegara as $key => $value) { ?>
                            <div class="col-lg-4 event_col">
                                <div class="course">
                                    <div class="">
                                        <img src="<?= base_url('foto/gambar_konten/'.$value->gambar_konten) ?>" width="360px" height="240px">
                                    </div>
                                    <div class="course_body">
                                        <h3 class="course_title">
                                            <a href="<?= base_url('home/detail_konten_mancanegara/'.$value->id_konten) ?>">
                                                <?= $value->judul_konten ?>
                                            </a>
                                        </h3>
                                        <div class="course_teacher">Penulis : <?= $value->nama_penulis ?></div>
                                        <div class="course_text">
                                            <p><?= substr(strip_tags($value->sub_judul),0,30) ?>...</p>
                                        </div>
                                    </div>
                                    <div class="course_footer">
                                        <div class="course_footer_content d-flex flex-row align-items-center justify-content-center">
                                            <div class="course_info">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <span ><?= $value->tgl_konten ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
					
                    <div class="row pagination_row">
                        <div class="col">
                            <?php 
                                if (isset($paginasi)) {
                                    echo $paginasi;
                                }
                            ?>
                        </div>
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