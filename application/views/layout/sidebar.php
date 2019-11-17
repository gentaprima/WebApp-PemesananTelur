<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url() ?>assets/dashboard/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('user_id'); ?></div>
                    <div class="email"><?= $this->session->userdata('email'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?= base_url() ?>dashboard/profile/"><i class="material-icons">person</i>Profile</a></li>
                            
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url(); ?>login/logout/"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class= <?php if(!empty($active_home)){echo "active";} ?> >
                        <a href="<?= base_url(); ?>dashboard/">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php if(!empty($active_courier) || !empty($active_agent) || !empty($active_product)){ echo "active";} ?>">
                        <a href="javascript:void(0);" class="menu-toggle ">
                            <i class="material-icons">menu</i>
                            <span>Data Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(!empty($active_product)){echo $active_product;} ?>">
                                <a href="<?= base_url(); ?>dashboard/list_product/" class="">
                                    <span>Data Product</span>
                                </a>
                            </li>
                            <li class="<?php if(!empty($active_agent)){echo $active_agent;} ?>">
                                <a href="<?=  base_url()?>dashboard/list_agent/" class="">
                                    <span>Data Agent</span>
                                </a>
                            </li>
                            <li class="<?php if(!empty($active_courier)){echo $active_courier;} ?>">
                                <a href="<?= base_url(); ?>dashboard/list_kurir"" class="">
                                    <span>Data Kurir</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if(!empty($active_orders)){echo $active_orders;} ?>">
                        <a href="<?= base_url(); ?>dashboard/list_order">
                            <i class="material-icons">shopping_basket</i>
                            <span>Data Pemesanan</span>
                        </a>
                    </li>
                    <li class="<?php if(!empty($active_transaksi)){echo $active_transaksi;} ?>">
                        <a href="<?= base_url(); ?>dashboard/list_transaksi/">
                            <i class="material-icons">today</i>
                            <span>Data Transaksi</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019<a href="#"> Dashboard - Perusahaan Telor</a>.
                </div>
                <div class="version">
                    <!-- <b>Version: </b> 1.0.5 -->
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->