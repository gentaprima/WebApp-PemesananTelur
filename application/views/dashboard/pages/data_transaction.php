


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="<?= base_url(); ?>dashboard/"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="<?= base_url(); ?>dashboard/list_transaksi/"><i class="material-icons">library_books</i> Data Transaksi</a></li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Transaksi
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
                                            <th>ID Transaksi</th>
                                            <th>ID Pesanan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Toko</th>
                                            <th >Produk</th>
                                            <th>Kualitas</th>
                                            <th>Jumlah Beli</th>
                                            <th style="width:250px;">Total</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Transaksi</th>
                                            <th>ID Pesanan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Toko</th>
                                            <th >Produk</th>
                                            <th>Kualitas</th>
                                            <th>Jumlah Beli</th>
                                            <th style="width:250px;">Total</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 0; foreach($transaksi as $row){ $i++; ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['id_transaksi']; ?></td>
                                            <td><?= $row['id_order']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['lname']; ?></td>
                                            <td><?= $row['shop']; ?></td>
                                            <td><?= $row['product_name']; ?></td>
                                            <td><?= $row['quality']; ?></td>
                                            <td><?= number_format($row['jumlah_order'],0,",","."); ?></td>
                                            <td style="width:250px;">Rp. <?= number_format($row['total_transaksi'],2,",","."); ?></td>
                                            <td><?= $row['tgl']; ?></td>
                                            <?php if($row['status_order'] == 1){ ?>
                                                <td>
                                                <center>
                                                <button class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" style="margin-bottom:4px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sedang Diproses" aria-describedby="tooltip4850">
                                                        <i class="material-icons">update</i> 
                                                </button>
                                                </center>
                                                </td>
                                            <?php }else if($row['status_order'] == 2){ ?>
                                                <td>
                                                <center>
                                                <button class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" style="margin-bottom:4px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sedang Dikirim" aria-describedby="tooltip4850">
                                                        <i class="material-icons">local_shipping</i> 
                                                </button>
                                                </center>
                                                </td>
                                            <?php }else if($row['status_order'] == 3){ ?>
                                                <td>
                                                <center>
                                                <button class="btn bg-cyan btn-circle waves-effect waves-circle waves-float" style="margin-bottom:4px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sudah Diterima" aria-describedby="tooltip4850">
                                                        <i class="material-icons">checked</i> 
                                                </button>
                                                </center>
                                                </td>
                                            <?php } ?>
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

