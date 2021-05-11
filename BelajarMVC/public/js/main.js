function slideRight() {
    document.getElementById("main-left").style.display = "block";

    anime({
        targets: '.main-left',
        translateX: -400,

    });
}



function slideLeft() {

    anime({
        targets: '.main-left',
        translateX: 400,

    });
    document.getElementById("main-left").style.display = "none";
}

let w = window.innerWidth;
if (w < 800) {
    $(".row-sidebar").click(function () {
        slideLeft();
    });

    $(".burger").click(function () {
        slideRight();
    })
}



function munculkanNewNote() {
    document.getElementById("myFrame").style.display = "block";
    anime({
        targets: '.newNoteSection',
        translateY: -300,
        // display:'block',
        opacity: 1
    });
}

function tutupNewNote() {

    anime({
        targets: '.newNoteSection',
        translateY: 400,
        // display:'block',
        opacity: 0
    });
    document.getElementById("myFrame").style.display = "none";
}


$(document).ready(function () {
    const nameDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
    const nameMonth = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    const fulldate = new Date();

    const day = fulldate.getDay();
    const date = fulldate.getDate();
    const month = fulldate.getMonth();
    const year = fulldate.getFullYear();
    const newDate = nameDay[day] + ", " + date + " " + nameMonth[month] + " " + year;
    console.log(newDate);
    $(".date").html(newDate);

    //dibawah ini function untuk merubah tanggalan

    // function untuk mengambil nama hari,awaltangggal,dan akhir tanggal pada sebuah bulan
    function ambilAwalAkhir(x, y) {
        let ambilHari = new Date(x, y, 1).getDay();
        let ambilFirstDate = new Date(x, y, 1).getDate(); // hasilnya 3
        let ambilLastDate = new Date(x, y + 1, 0).getDate();
        let result = [ambilHari, ambilFirstDate, ambilLastDate];
        return result;

    }
    //men-set secara default bulan dan tahun adalah tanggal hari ini
    $(".month").val(nameMonth[month]);
    $(".year").val(year);


    //mengubah nama bulan menjadi integer
    var monthTemporary = $(".month").val();
    var selectMonth = nameMonth.indexOf(monthTemporary);
    //variable untuk set tahun
    var selectYear = $(".year").val();


    //memanggil function dengan parameter tersebut
    const gitar = ambilAwalAkhir(selectYear, selectMonth);


    //function untuk mengubah innerHTML menjadi urutan tanggal
    function changeDate(param) {
        for (let i = 0; i < param[2]; i++) {
            let indexTanggal = param[0] + (param[1] + i);
            let awalTanggal = "box-" + indexTanggal;
            document.getElementById(awalTanggal).innerHTML = i + 1;
        }
    }

    //function untuk mengganti ulang semua tanggal
    function eraseAll() {
        $(".box").html("D");
    }

    //function untuk mengubah color pada tanggal yg berubah
    function changeColorDate() {
        for (let j = 1; j < 43; j++) {
            let nama = "box-" + j;
            let cek = document.getElementById(nama).textContent;

            if (cek != "D") {
                document.getElementById(nama).style.backgroundColor = '#eee';
                document.getElementById(nama).style.color = '#444';
            } else {
                document.getElementById(nama).style.color = '#ccc';
            }

        }
    }

    function forgotColorMode() {
        for (let j = 1; j < 43; j++) {
            let boncabe = "box-" + j;

            document.getElementById(boncabe).style.backgroundColor = '#eee';
            document.getElementById(boncabe).style.color = '#ccc';
        }
    }
    //function untuk uniqColor hari ini
    function uniqStyleForToday() {
        var cekValueMonth = $(".month").val();
        var cekValueYear = $(".year").val();


        if (cekValueMonth == nameMonth[month] && cekValueYear == year) {
            for (let j = 1; j < 43; j++) {
                let kursi = "box-" + j;
                let cek = document.getElementById(kursi).textContent;

                if (cek == date) {
                    document.getElementById(kursi).style.backgroundColor = '#30475e';
                    document.getElementById(kursi).style.color = '#f1f1f1';
                }

            }
            console.log(nameMonth[month]);
        } else {
            console.log(false);
        }


    }

    //eksekusi function untuk default tanggal hari ini
    changeDate(gitar);
    changeColorDate();
    uniqStyleForToday();


    //apabila bulan berubah
    $(".month").change(function () {

        monthTemporary = this.value;
        selectMonth = nameMonth.indexOf(monthTemporary);
        let piano = ambilAwalAkhir(selectYear, selectMonth);
        forgotColorMode();
        eraseAll();
        changeDate(piano);
        changeColorDate();
        uniqStyleForToday();

    })
    //apabila tahun berubah
    $(".year").change(function () {

        selectYear = this.value;
        let piano = ambilAwalAkhir(selectYear, selectMonth);
        forgotColorMode();
        eraseAll();
        changeDate(piano);
        changeColorDate();
        uniqStyleForToday();

    })

    $(".previousMonth").click(function () {
        let previousMonth = nameMonth[nameMonth.indexOf(($(".month").val())) - 1];

        if (previousMonth == undefined) {
            previousMonth = nameMonth[nameMonth.length - 1];
            $(".year").val(($(".year").val() - 1));
        }


        $(".month").val(previousMonth);
        monthTemporary = $(".month").val();
        selectMonth = nameMonth.indexOf(monthTemporary);
        let piano = ambilAwalAkhir(selectYear, selectMonth);
        forgotColorMode();
        eraseAll();
        changeDate(piano);
        changeColorDate();
        uniqStyleForToday();
        // console.log($(".month").val());

    })

    $(".nextMonth").click(function () {
        let nextMonth = nameMonth[nameMonth.indexOf(($(".month").val())) + 1];

        if (nextMonth == undefined) {
            nextMonth = nameMonth[0];
            let nextyear = parseInt($(".year").val()) + 1;
            $(".year").val(nextyear);
        }


        $(".month").val(nextMonth);
        monthTemporary = $(".month").val();
        selectMonth = nameMonth.indexOf(monthTemporary);
        let piano = ambilAwalAkhir(selectYear, selectMonth);
        forgotColorMode();
        eraseAll();
        changeDate(piano);
        changeColorDate();
        if (monthTemporary == nameMonth[month] && selectYear == year) {
            uniqStyleForToday();
        } else {
            changeColorDate();
        }



    })


    $('.button-tanggal').click(function () {
        $('.date-tanggal').val(date);
        $('.date-bulan').val(nameMonth[month]);
        $('.date-tahun').val(year);
    })


    //untuk toggle styleButtonNote
    $(".buttonDefault").mouseenter(function () {
        $(this).addClass("button-style");
    })
    $(".buttonDefault").mouseleave(function () {
        $(this).removeClass("button-style");
    })

    //mengganti font pada iframe




    //this is styling
    $('#newNoteModal .red-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#e5707e",
            'color': '#f1f1f1'
        })
        $('.modal-content .form-control').css({
            "color": "#f1f1f1"
        });
        $("#codeColorNew").val("red-style");
    })

    //this is styling
    $('#newNoteModal .orange-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#f69e7b",
            'color': '#f1f1f1'
        })
        $('.modal-content .form-control').css({
            "color": "#f1f1f1"
        });
        $("#codeColorNew").val('orange-style');
    })
    //this is styling
    $('#newNoteModal .yellow-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#faf0af",
            'color': '#444'
        })
        $('.modal-content .form-control').css({
            "color": "#444"
        })
        $("#codeColorNew").val('yellow-style')
    })

    $('#newNoteModal .green-style').click(function () {

        $('.modal-content').css({
            'background-color': "#a3ddcb",
            'color': '#444'
        })
        $('.modal-content .form-control').css({
            "color": "#444"
        })
        $("#codeColorNew").val('green-style')
    })

    $('#newNoteModal .blue-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#6a8caf",
            'color': '#f1f1f1'
        })
        $('.modal-content .form-control').css({
            "color": "#f1f1f1"
        })
        $("#codeColorNew").val('blue-style')
    })
    $('#newNoteModal .purple-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#b590ca",
            'color': '#f1f1f1'
        })
        $('.modal-content .form-control').css({
            "color": "#f1f1f1"
        })
        $("#codeColorNew").val('purple-style')
    })
    $('#newNoteModal .brown-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#fabea7",
            'color': '#444'
        })
        $('.modal-content .form-control').css({
            "color": "#444"
        })
        $("#codeColorNew").val('brown-style')
    })
    $('#newNoteModal .white-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#f4f4f4",
            'color': '#444'
        })
        $('.modal-content .form-control').css({
            "color": "#444"
        })
        $("#codeColorNew").val('white-style')
    })
    $('#newNoteModal .dark-style').click(function () {
        
        $('.modal-content').css({
            'background-color': "#444",
            'color': '#f1f1f1'
        });
        $('.modal-content .form-control').css({
            "color": "#f1f1f1"
        });
        $("#codeColorNew").val('dark-style');
    })


    $(this).addClass('red-style');
    $(this).removeClass('button-style');


    $('.button-notif').click(function () {
        $(this).toggleClass('red-style');
        $(this).toggleClass('button-style');
    })

    function toggleTabExist() {
        anime({
            targets: '#showExistNote',
            translateY: -400,
        });

    }

    $("#closeTabExist").click(function () {
        toggleTabExist();
        document.getElementById("showExistNote").style.display = "none";
        $("#pageExistNote").removeClass().addClass("pageExistNote");
    })

    $('#makeNotifNote').click(function(){
        $('#notifNote').val("1");
    })


})
$(".buttonCloseNFU").click(function () {
    $(".noteForUser").remove();
});
$('#toggleRegister').click(function () {
    $('#cardLogin').toggleClass('umpetin');
    $('#cardRegister').toggleClass('umpetin');
})
$('#toggleLogin').click(function () {
    $('#cardLogin').toggleClass('umpetin');
    $('#cardRegister').toggleClass('umpetin');
})

