<div class="flasher w-100 position-fixed px-5 mt-5">
    <?= Flasher::flash(); ?>
</div>
<div class="landing-page">
    <div class="card" id="cardLogin">
        <div class="card-bg login-tab">
            <div class="card-body">
                <h4 class="card-title font-weight-bold">Login</h4>

                <form action="<?= BASEURL ?>/signin/login" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="userEmailPhone" aria-describedby="emailHelp" placeholder="Enter email/username/phone number">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" name="rememberMe" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        <a href="">
                            <h6>Lupa Password?</h6>
                        </a>
                    </div>
                    <button type="submit" class="btn button-style w-100">Submit</button>
                </form>
            </div>
        </div>
        <div class="card-bg cardGreatings text-center text-light">
            <div class="card-body">
                <h3 class="card-title font-weight-bold">Hallo, Kita Bertemu lagi!</h3>
                <p>Masukan data diri anda<br>dan mulai perjalanankita</p>
                <button class="btn button-second mt-5 font-weight-bold" id="toggleRegister">Belum punya
                    akun?</button>
            </div>
        </div>
    </div>
    <div class="card umpetin" id="cardRegister">
        <div class="card-bg cardGreatings text-center text-light">
            <div class="card-body">
                <h3 class="card-title font-weight-bold">Hallo, Selamat Datang!</h3>
                <p>Masukan data diri anda<br>dan mulai perjalanankita</p>
                <button class="btn button-second mt-5 font-weight-bold" id="toggleLogin">Belum punya akun?</button>
            </div>
        </div>
        <div class="card-bg register-tab">
            <div class="card-body">
                <h4 class="card-title font-weight-bold">Register</h4>
                <form action="<?= BASEURL ?>/signin/register" method="post">
                    <div class="form-group">
                        <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Enter Your Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your E-mail">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Create Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="rePassword" class="form-control" id="rePassword" placeholder="Confirm Password">
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" name="rememberMe" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn button-style w-100">Submit</button>
                </form>
            </div>
        </div>

    </div>
    <!--  -->
</div>