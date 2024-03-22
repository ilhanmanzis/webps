<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-done d-lg-black bg-color-white">
                                <img width="100%" height="100%"src="<?= BASEURL;?>/public/img/login.svg" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Edit Data Admin
                                        </h1>
                                        <?php
                                        Flasher::flash();
                                        ?>
                                    </div>
                                    <form action="<?=BASEURL;?>/admin/editdataadmin" method="post" class="user">
                                    <div class="form-group">
                                        <input type="hidden" name="id_admin" value="<?=$data['admin']['id_admin']?>">
                                        <label for="username">Username</label>
                                            <input type="text" name="username" autocomplete="off" required id="exampleInputUsername" class="form-control form-control-user" aria-destribedby="emailHelp" placeholder="Enter Username..." value="<?= $data['admin']['username'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" required autocomplete="off" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="<?=$data['admin']['password']?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="simpan">
                                            Simpan
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>