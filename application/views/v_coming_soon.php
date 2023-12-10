<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= base_url()?>">Home</a></li>
                            <li>Coming Soon</li>
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
                    <h2>Preview Wisata yang Akan Datang dengan Tourist View</h2>
                </div>
                </div>
            <div class="row events_row justify-content-center">
                <?php foreach ($coming_soon as $key => $value) { ?>
                    <div class="col-lg-4 event_col">
                        <div class="event event_left" onclick="showAlert('<?= date('d-m-y', strtotime($value->jadwal_upload)) ?>')">
                            <div class="event_image">
                                <img src="<?= base_url('foto/gambar_coming/'.$value->gambar_coming) ?>" width="350px" height="250px">
                            </div>

                            <div class="event_body d-flex flex-row align-items-start justify-content-start">
                                <div class="event_date">
                                    <div class="d-flex flex-column align-items-center justify-content-center trans_200 text-center">
                                        <p><?= date('d-m-y', strtotime($value->jadwal_upload)) ?></p>
                                    </div>
                                </div>

                                <div class="event_content">
                                    <div class="event_title text-center"><h3><?= $value->judul_coming ?></h3></div>
                                    <div class="event_info_container">
                                        <div class="event_info text-center"><h5>Oleh <?= $value->nama_penulis ?></h5></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    function showAlert(jadwal) {
        alert("Sorry! This Content Is Currently Unavailable. We Will Uploaded This On " + jadwal);
    }
</script>
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