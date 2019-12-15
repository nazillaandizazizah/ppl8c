<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://funkyimg.com/i/2XPkm.png">
    <title>Tersekuy</title>
    <!-- Bootstrap -->
    <link href="https://sipos.miqdad.codes/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="https://sipos.miqdad.codes/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('/css/admin.css') !!}">
    
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a class="site_title"><img src="https://funkyimg.com/i/2XQTL.png" style="width: 35px;"> <span>Tersekuy</span></a>
                    </div>

                    <div class="clearfix"></div>
                    <br/>

                    <!-- MENU SIDEBAR --> 
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">

                                <li><a href="http://localhost:8000/admin/home"><img src="https://funkyimg.com/i/2XQQF.png" style="width: 30px;"> Home</a>
                                </li>

                                <li><a href="http://localhost:8000/admin/dokter"><img src="https://funkyimg.com/i/2XQQH.png" style="width: 32px;"> Dokter</a></li>

                                <li><a href="http://localhost:8000/admin/peternak"><img src="https://funkyimg.com/i/2YDRT.png" style="width: 32px;"> Peternak</a></li>

                                <li><a href="http://localhost:8000/admin/langganan"><img src="https://funkyimg.com/i/2XS4F.png" style="width: 32px;"> Langganan</a></li>

                                <li><a href="http://localhost:8000/admin/transaksi"><img src="https://funkyimg.com/i/2YDRS.png" style="width: 32px;"> Transaksi</a></li>

                            </ul>
                        </div>
                    </div>                
                </div>
            </div>

            <!-- TOP NAVIGATION -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><img src="https://funkyimg.com/i/2XQWe.png" style="width: 27px;"></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="http://localhost:8000/" class="user-profile dropdown-toggle" >
                                    <img src="https://funkyimg.com/i/2XQWf.png">Logout
                                    
                                </a>
                                
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- FOOTER -->
            <footer>
                <div class="pull-right">
                    Tersekuy Team :)
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://sipos.miqdad.codes/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://sipos.miqdad.codes/vendors/bootstrap/dist/js/bootstrap.min.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="https://sipos.miqdad.codes/build/js/custom.min.js"></script>
    <script  type="text/javascript">
        var ctvChart = document.getElementById('afjgyxvisktmocuwrebqhzpnd').getContext('2d');
        function afjgyxvisktmocuwrebqhzpnd_create(data) {
            afjgyxvisktmocuwrebqhzpnd_rendered = true;
            document.getElementById("afjgyxvisktmocuwrebqhzpnd_loader").style.display = 'none';
            document.getElementById("afjgyxvisktmocuwrebqhzpnd").style.display = 'block';
            window.afjgyxvisktmocuwrebqhzpnd = new Chart(document.getElementById("afjgyxvisktmocuwrebqhzpnd").getContext("2d"), {
                type: data[0].type,
                data: {
                    labels: [1,2,3,4,5,6,7,8,9,10,11,12],
                    datasets: data
                },
                options: {"maintainAspectRatio":false,"scales":{"xAxes":[{"scaleLabel":{"display":true,"labelString":"Bulan"}}],"yAxes":[{"ticks":{"beginAtZero":true,"stepSize":5},"scaleLabel":{"display":true,"labelString":"Jumlah anak"}}]}},
                plugins: []
            });
        }
        let afjgyxvisktmocuwrebqhzpnd_rendered = false;
        let afjgyxvisktmocuwrebqhzpnd_load = function () {
            if (document.getElementById("afjgyxvisktmocuwrebqhzpnd") && !afjgyxvisktmocuwrebqhzpnd_rendered) {
                afjgyxvisktmocuwrebqhzpnd_create([{"borderWidth":2,"backgroundColor":"rgb(141, 204, 150, 0.3)","data":[4,3,3,3,3,3,4,4,4,5,3,4],"label":"Kehadiran","type":"bar"}])
            }
        };
        window.addEventListener("load", afjgyxvisktmocuwrebqhzpnd_load);
        document.addEventListener("turbolinks:load", afjgyxvisktmocuwrebqhzpnd_load);
    </script>
</body>
</html>
