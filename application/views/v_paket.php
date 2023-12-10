<div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="<?= base_url()?>">Home</a></li>
                                <li>Paket Wisata</li>
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
                        <h2>Paket Wisata Tourist View</h2>
                    </div>
                    <div class="row events_row justify-content-center">
                        <?php foreach ($paket as $key => $value) { ?>
                            <div class="col-lg-4 event_col">
                                <div class="event event_left">
                                    <div class="event_image">
                                        <img src="<?= base_url('foto/gambar_paket/'.$value->gambar_paket ) ?>" width="350px" height="350px">
                                    </div>
                                    <div class="event_body d-flex flex-row align-items-start justify-content-start">
                                        <div class="event_content">
                                            <h3 class="course_title">
                                                <a href="<?= base_url('home/detail_paket/'.$value->id_paket ) ?>">
                                                    <?= $value->nama_paket  ?>
                                                </a>
                                            </h3>
                                            <div class="event_info_container">
                                                <div class="event_info text-center">
                                                    <h5>Rp. <?= number_format($value->harga_paket , 0, ',', '.') ?></h5> 
                                                </div>
                                                    <a href="<?= base_url('home/detail_paket/'.$value->id_paket ) ?>" class="btn btn-primary">Join Now</a>
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
