<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="nvbr">
                    <div class="nvbr-brand">
                        <h1>Remember Me</h1>
                    </div>

                    <form class="nvbr-search" action="<?= BASEURL; ?>/home/search" method="post">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" name="keySearch" placeholder="Cari Sesuatu.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="nvbr-akun">
                        <p><?= $data; ?></p>
                        <img src="<?= BASEURL; ?>/img/Ellipse 1.svg" width="24px" height="24px" alt="">
                    </div>

                    <div class="burger">
                        <div class="link1"></div>
                        <div class="link2"></div>
                        <div class="link3"></div>
                    </div>
                </div>
                <form class="search-outer" action="<?= BASEURL; ?>/home/search" method="post">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" name="keySearch" placeholder="Cari Sesuatu.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</header>