


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-cyan">
                    <li><a href="<?= base_url(); ?>dashboard/"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Data Master</a></li>
                    <li class="active"><i class="material-icons">archive</i> Data Agent</li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Agent
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                <a href="" style="text-decoration:none; color: #010;" ><i style="cursor:pointer;" class="material-icons">add_circle</i> <span style="position:relative;bottom:4px;" class="icon-name">Tambah Data</span></a>
                                </li>
                            </ul>
                        </div>
                        <?php if($this->session->flashdata('text')){ ?>
                            <p style="display:none;" id="text"><?= $this->session->flashdata('text'); ?></p>
                            <p style="display:none;" id="icon"><?= $this->session->flashdata('icon'); ?></p>
                            <p style="display:none;" id="title"><?= $this->session->flashdata('title'); ?></p>
                        <?php } ?>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Agent</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Toko</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Terverifikasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Agent</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Toko</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Terverifikasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php $i = 0; foreach($agent as $row){ $i++;?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['id_agent']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['lname']; ?></td>
                                            <td><?= $row['shop']; ?></td>
                                            <td><?= $row['street']; ?></td>
                                            <td><?= $row['phone']; ?></td>
                                            <?php if($row['is_verified'] == 1){ ?>
                                            <td> <center> <i class="material-icons">check_circle</i> </center> </td>
                                            <?php }else{ ?>
                                            <td></td>
                                            <?php } ?>
                                            <td>
                                                <center>
                                                <button style="" type="button" style="margin-bottom:4px;" class="btn bg-cyan btn-circle waves-effect waves-circle waves-float"><i class="material-icons">create</i> </button>
                                                <button onClick="deleteAgent('<?= $row['username']; ?>')" data-toggle="modal" data-target="#UPDATE" style="margin-bottom:10px;" type="button" class="btn bg-default btn-circle waves-effect waves-circle waves-float"><i class="material-icons">delete</i> </button>
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
        </div>
    </section>

      <!-- MODAL UPDATE -->
      <div class="modal fade" id="UPDATE" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-col-teal">
                        <div class="modal-header" style="border-bottom:2px solid #fff;">
                            <h4 class="modal-title" style="margin-bottom:10px;"  id="defaultModalLabel">Hapus Data Agent</h4>
                            
                        </div>
                        <div class="modal-body"  style="background-color:;">
                        <form id="form" action="<?= base_url() ?>dashboard/deleteAgent/" method="post">
                            <div class="row clearfix" style="margin-top:20px;">
                                    <div class="col-sm-12">
                                        <center>
                                        <h1>WARNING !!</h1>
                                        <h5>Anda yakin ingin menghapus data tersebut ?</h5>
                                        </center>
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
