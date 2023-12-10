<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="<?= base_url('')?>">
									<div class="logo_text">Tourist <span>View</span></div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="<?= base_url('')?>">Home</a></li>
									
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Our Journey
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="<?= base_url('home/konten_nusantara')?>">Nusantara</a>
										<a class="dropdown-item" href="<?= base_url('home/konten_mancanegara')?>">Mancanegara</a>
										</div>
									</li>
									<li><a href="<?= base_url('home/coming_soon')?>">Coming Soon</a></li>
									<li><a href="<?= base_url('home/artikel')?>">Artikel</a></li>
									<li><a href="<?= base_url('home/gallery')?>">Gallery</a></li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Shop
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="<?= base_url('home/merchandise')?>">Merchandise</a>
										<a class="dropdown-item" href="<?= base_url('home/paket')?>">Paket Wisata</a>
										</div>
									</li>
								</ul>
								

								<!-- Hamburger -->
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="#" class="header_search_form">
								<input type="search" class="search_input" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			
	</header>

    <!-- mobile -->
    	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li><a href="<?= base_url()?>">Home</a></li>
				<li><a href="<?= base_url('home/konten_nusantara')?>">Nusantara</a></li>
				<li><a href="<?= base_url('home/konten_mancanegara')?>">Mancanegara</a></li>
				<li><a href="<?= base_url('home/coming_soon')?>">Coming Soon</a></li>
				<li><a href="<?= base_url('home/artikel')?>">Artikel</a></li>
				<li><a href="<?= base_url('home/gallery')?>">Gallery</a></li>
				<li><a href="<?= base_url('home/merchandise')?>">Merchandise</a></li>
				<li><a href="<?= base_url('home/paket')?>">Paket Wisata</a></li>
			</ul>
		</nav>
	</div>