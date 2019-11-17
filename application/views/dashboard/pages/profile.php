<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img width="100px" height="100px" src="<?= base_url() ?>assets/dashboard/images/user_v1.png" alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3><?= $this->session->userdata('user_id'); ?></h3>
                                <p><?= $this->session->userdata('email'); ?></p>
                                <p>Administrator</p>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    
                                
                                    <li role="presentation" class="active"><a href="#home" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <?php if($this->session->flashdata('text')){ ?>
                                    <p style="display:none;" id="text"><?= $this->session->flashdata('text'); ?></p>
                                    <p style="display:none;" id="icon"><?= $this->session->flashdata('icon'); ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title'); ?></p>
                                <?php } ?>
                                <div class="tab-content">
                                    <div role="tabpanel" style="margin-top:15px;" class="tab-pane fade in active" id="home">
                                        
                                     <?php foreach($profile as $row){ ?>
                                        <form class="form-horizontal" method="post" action="<?= base_url() ?>dashboard/updateProfile/">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Username</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="username" name="username"     value="<?= $this->session->userdata('user_id'); ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" readonly  required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Nama Depan</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Nama Depan" readonly  required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Nama Belakang</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Nama Belakang" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">No Telepon</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"readonly  required>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-9">
                                                    <button id="btnSubmit" type="submit" class="btn btn-danger" style="display:none">SUBMIT</button>
                                                    <button id="btnUpdate" type="button" onClick="updateProfile('<?= $row['email']; ?>','<?= $row['fname']; ?>','<?= $row['lname']; ?>','<?= $row['phone']; ?>')" class="btn btn-default">UPDATE</button>
                                                    <button id="btnCancel" onClick="cancelUpdate()" style="display:none;" type="button"  class="btn btn-default">CANCEL</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    <?php } ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" method="post" action="<?= base_url() ?>dashboard/updatePassword/">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="oldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="username" value="<?= $this->session->userdata('user_id'); ?>">
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="confirmPassword" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>