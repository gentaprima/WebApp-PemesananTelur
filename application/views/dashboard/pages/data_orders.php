


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="<?= base_url(); ?>dashboard/"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="<?= base_url(); ?>dashboard/list_order/"><i class="material-icons">library_books</i> Data Pemesanan</a></li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pemesanan
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Order</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Toko</th>
                                            <th>Nama Produk</th>
                                            <th>Kualitas</th>
                                            <th>Jumlah Order</th>
                                            <th>Alamat</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <<th>#</th>
                                            <th>ID Order</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Toko</th>
                                            <th>Nama Produk</th>
                                            <th>Kualitas</th>
                                            <th>Jumlah Order</th>
                                            <th>Alamat</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 0; foreach($order as $row){ $i++; ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['id_order']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['lname']; ?></td>
                                            <td><?= $row['shop']; ?></td>
                                            <td><?= $row['product_name']; ?></td>
                                            <td><?= $row['quality']; ?></td>
                                            <td><?= $row['jumlah_order']; ?></td>
                                            <td><?= $row['street']; ?></td>
                                            <td><?= $row['tgl']; ?></td>
                                            <td>
                                                <center>
                                                <div class="js-modal-buttons">
                                                <button onclick="insertOrder('<?= $row['id_order']; ?>','<?= $row['total_transaksi']; ?>',<?= $row['jumlah_order']; ?>,'<?= $row['id_product']; ?>')"data-color="teal" style="margin-bottom:10px;" type="button" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float"><i class="material-icons">forward</i> </button>
                                                </div>
                                                <!-- <div class="js-modal-buttons"> -->
                                                <button onClick="updateOrder('<?= $row['id_order']; ?>','<?= $row['id_product']; ?>','<?= $row['jumlah_order']; ?>')" data-toggle="modal" data-target="#UPDATE" style="margin-bottom:10px;" type="button" class="bbtn bg-cyan btn-circle waves-effect waves-circle waves-float"><i class="material-icons">create</i> </button>
                                                <!-- </div> -->
                                                <button type="button" class="btn bg-default btn-circle waves-effect waves-circle waves-float"><i class="material-icons">delete</i> </button>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($this->session->flashdata('text')){ ?>
                <p style="display:none;" id="text"><?= $this->session->flashdata('text'); ?></p>
                <p style="display:none;" id="icon"><?= $this->session->flashdata('icon'); ?></p>
                <p style="display:none;" id="title"><?= $this->session->flashdata('title'); ?></p>
            <?php } ?>

            <!-- #END# Basic Examples -->
             <!-- For Material Design Colors -->
             <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="margin-bottom:10px;"  id="defaultModalLabel">Konfirmasi Pesanan</h4>
                        </div>
                        <div class="modal-body"  style="background-color:#fff;">
                        <form action="<?= base_url() ?>dashboard/prosesInsert/" method="post">
                            <div class="row clearfix" style="margin-top:20px;">
                                    <div class="col-sm-12">
                                         <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="id_transaksi" readonly value="TRN-<?= time(); ?>" id="transaksi" class="form-control">
                                                <label class="form-label">ID Transaksi</label>
                                            </div>

                                        </div>
                                        <input type="hidden" id="idOrder" name="id_order" readonly>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="id_courier" class="form-control show-tick">
                                                    <option value="">-- Pilih Kurir --</option>
                                                    <?php foreach($courier as $row){ ?>
                                                        <option  value="<?= $row['id_courier'] ?>"> <?= $row['fname']; ?> <?= $row['lname']; ?></option>
                                                    <?php } ?>
                                                </select>
                                               
                                            </div>
                                        </div>

                                        <input type="hidden" name="total" id="totalTransaksi">
                                        <input type="hidden" name="entity" id="entity">
                                        <input type="hidden" name="idProduct" id="idProduct">

                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

             <!-- MODAL UPDATE -->
             <div class="modal fade" id="UPDATE" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-col-teal">
                        <div class="modal-header">
                            <h4 class="modal-title" style="margin-bottom:10px;"  id="defaultModalLabel">Ubah Pesanan</h4>
                        </div>
                        <div class="modal-body"  style="background-color:#fff;">
                        <form action="<?= base_url() ?>dashboard/updateOrder/" method="post">
                            <div class="row clearfix" style="margin-top:20px;">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="id_order" id="id_order" readonly>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="entity" autofocus value="" id="entity" class="form-control">
                                                <label class="form-label">Jumlah Beli</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="id_product" id="id_product" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach($product as $row){ ?>
                                                        <option value="<?= $row['id_product']; ?>"><?= $row['quality']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                
                                            </div>
                                        </div>

                                        

                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </section>

