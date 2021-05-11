<section class="main">
    <!-- leftside -->
    <div class="main-left" id="main-left">
        <div class="main-sidebar">
            <a href="<?= BASEURL ?>/home/index" class="m-0">
                <div class="row-sidebar border border-bottom" id="toggleSidebar">
                    <div class="button">
                        <i class="fa fa-sticky-note fa-lg" aria-hidden="true"></i>
                    </div>
                    <h5>Dashboard</h5>
                </div>
            </a>
            <a href="<?= BASEURL ?>/home/notification" class="m-0">
                <div class="row-sidebar aktif border border-bottom" id="toggleSidebar">
                    <div class="button">
                        <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
                    </div>
                    <h5>Notification Note</h5>
                </div>
            </a>
            <a href="<?= BASEURL ?>/home/archieve" class="m-0">
                <div class="row-sidebar border border-bottom" id="toggleSidebar">
                    <div class="button">
                        <i class="fa fa-archive fa-lg" aria-hidden="true"></i>
                    </div>
                    <h5>Archive Note</h5>
                </div>
            </a>
            <a href="<?= BASEURL ?>/home/trash" class="m-0">
                <div class="row-sidebar border border-bottom" id="toggleSidebar">
                    <div class="button">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </div>
                    <h5>Trash</h5>
                </div>
            </a>
            <a href="<?= BASEURL ?>/home/account" class="m-0">
                <div class="row-sidebar" id="toggleSidebar">
                    <div class="button">
                        <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
                    </div>
                    <h5>User Setting</h5>
                </div>
            </a>
        </div>
    </div>
    <!-- mainside -->
    <div class="main-center">
        <div class="main-content">
            <div class="container mt-5">
                <div class="row date-session">
                    <div class="col-9"></div>
                    <div class="col-3 date-col">
                        <div class="date"></div>
                    </div>
                </div>
                <div class="row header-section">
                    <div class="col-md-7 col-7">
                        <div class="text-content">
                            <h2>Notes Notification</h2>
                            <h4>Ini adalah beberapa note yang dijadikan pengingat.</h4>
                            <br><br>
                            <small class=" bg-warning">*maaf untuk fitur ini belum bisa dimaksimalkan karna ada beberapa metode yang masih belum saya pelajari, terutama dalam membuat bot sending email ke user untuk pengingat note yang diinginkan</small>
                        </div>
                    </div>
                    <div class="col-md-5 col-5">
                        <div class="illustrasi-content">
                            <img src="<?= BASEURL; ?>/img/undraw_Done_checking_re_6vyx.svg" alt=""><br>
                        </div>
                    </div>
                </div>

                <div class="row sectionNoteExist">
                    <?php foreach ($data['notes'] as $note) : ?>
                        <div class="col-md-3 ">
                            <!-- Button trigger modal -->

                            <div class="existNote <?= $note['kode_color']; ?> border border-secondary">
                                <p class="date-note"><?= $note['date_note']; ?></p>
                                <br>
                                <bold class="title"><?= $note['title_note']; ?></bold>
                                <small>ID Note : <?= $note['id_note']; ?></small>

                                <p style="height:48px;overflow:hidden;"><?= $note['main_note']; ?></p>
                                <br>
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <?php if ($note['Notification'] > 0) : ?>
                                            <div class="btn button-style">
                                                <i class="fa fa-bell" aria-hidden="true"></i>
                                            </div>
                                        <?php else : ?>
                                            <div class="btn button-exist">
                                                <i class="fa fa-bell" aria-hidden="true"></i>
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?= BASEURL; ?>/home/moveToArchive/<?= $note['id_note']; ?>">
                                            <div class="btn button-exist <?= $note['kode_color']; ?>">
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                        <a href="<?= BASEURL; ?>/home/moveToTrash/<?= $note['id_note']; ?>">
                                            <div class="btn button-exist <?= $note['kode_color']; ?> moveToTrash">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="form-row align-items-center">
                                    <div type="button" class="w-100" data-toggle="modal" data-target="#Modal<?= $note['id_note']; ?>">
                                        <div class="btn button-exist">
                                            Edit Note
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade " id="Modal<?= $note['id_note']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content <?= $note['kode_color']; ?>">
                                        <form action="<?= BASEURL; ?>/home/update/<?= $note['id_note']; ?>" method="post">
                                            <div class="modal-header">
                                                <div class="modal-title" id="exampleModalLongTitle">
                                                    <input type="text" name="titleNote" class="w-100 form-control form-section <?= $note['kode_color']; ?>" value="<?= $note['title_note']; ?>">
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="<?= $note['kode_color']; ?>">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea name="mainNote" id="" class="form-control form-section <?= $note['kode_color']; ?>" rows="15"><?= $note['main_note']; ?></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto my-1">
                                                        <?php if ($note['Notification'] > 0) : ?>
                                                            <div class="btn button-style">
                                                                <i class="fa fa-bell" aria-hidden="true"></i>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="btn button-exist">
                                                                <i class="fa fa-bell" aria-hidden="true"></i>
                                                            </div>
                                                        <?php endif; ?>

                                                        <a href="<?= BASEURL; ?>/home/moveToArchive/<?= $note['id_note']; ?>">
                                                            <div class="btn button-exist <?= $note['kode_color']; ?>">
                                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                            </div>
                                                        </a>
                                                        <a href="<?= BASEURL; ?>/home/moveToTrash/<?= $note['id_note']; ?>">
                                                            <div class="btn button-exist moveToTrash">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($data['notes'])) : ?>
                        <div class="w-100  mt-5 mb-5 text-center">
                            <img src="<?= BASEURL; ?>/img/undraw_empty_xct9.svg" width="300px" height="300px">
                            <h1 class="text-secondary">Catatan masih kosong</h1>
                            <h3 class="text-secondary">Mulai buat catatan</h3>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>

    </div>
    <!-- rightside -->
    <div class="main-right">
        <div class="main-calendar">
            <h3 class="titleCalendar">Calendar</h3>

            <div class="monthYearSection">
                <i class="fa fa-chevron-left previousMonth" aria-hidden="true"></i>
                <div class="col-auto my-1">
                    <select class="custom-select month">
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <select class="custom-select year">
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                </div>
                <i><i class="fa fa-chevron-right nextMonth" aria-hidden="true"></i></i>
            </div>
            <div class="nameDay">
                <div class="day">M</div>
                <div class="day">S</div>
                <div class="day">S</div>
                <div class="day">R</div>
                <div class="day">K</div>
                <div class="day">J</div>
                <div class="day">S</div>
            </div>
            <div class="boxDate">
                <div class="box" id="box-1">D</div>
                <div class="box" id="box-2">D</div>
                <div class="box" id="box-3">D</div>
                <div class="box" id="box-4">D</div>
                <div class="box" id="box-5">D</div>
                <div class="box" id="box-6">D</div>
                <div class="box" id="box-7">D</div>
                <div class="box" id="box-8">D</div>
                <div class="box" id="box-9">D</div>
                <div class="box" id="box-10">D</div>
                <div class="box" id="box-11">D</div>
                <div class="box" id="box-12">D</div>
                <div class="box" id="box-13">D</div>
                <div class="box" id="box-14">D</div>
                <div class="box" id="box-15">D</div>
                <div class="box" id="box-16">D</div>
                <div class="box" id="box-17">D</div>
                <div class="box" id="box-18">D</div>
                <div class="box" id="box-19">D</div>
                <div class="box" id="box-20">D</div>
                <div class="box" id="box-21">D</div>
                <div class="box" id="box-22">D</div>
                <div class="box" id="box-23">D</div>
                <div class="box" id="box-24">D</div>
                <div class="box" id="box-25">D</div>
                <div class="box" id="box-26">D</div>
                <div class="box" id="box-27">D</div>
                <div class="box" id="box-28">D</div>
                <div class="box" id="box-29">D</div>
                <div class="box" id="box-30">D</div>
                <div class="box" id="box-31">D</div>
                <div class="box" id="box-32">D</div>
                <div class="box" id="box-33">D</div>
                <div class="box" id="box-34">D</div>
                <div class="box" id="box-35">D</div>
                <div class="box" id="box-36">D</div>
                <div class="box" id="box-37">D</div>
                <div class="box" id="box-38">D</div>
                <div class="box" id="box-39">D</div>
                <div class="box" id="box-40">D</div>
                <div class="box" id="box-41">D</div>
                <div class="box" id="box-42">D</div>

            </div>
        </div>

    </div>
</section>