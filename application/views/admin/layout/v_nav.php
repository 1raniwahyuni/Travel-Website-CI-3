<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
                            <li>
                                <a href="<?= base_url('admin')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            
                            <!-- user -->
                            <li>
                                <a href="#"><i class="fa fa-user"></i> User <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('penulis')?>"> Penulis</a>
                                    </li>
                                    <li>
                                    <a href="<?= base_url('anggota')?>"> Anggota</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#"><i class="fa fa-server"></i> Konten <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('konten')?>">Isi Konten</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Artikel</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('coming')?>">Coming Soon</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('gallery')?>">Gallery</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-shopping-bag"></i> Shop <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Merchandise</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="active">
                                <a href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out"></i>Logout</a>
    
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header"><?=$title2?></h2>


                
