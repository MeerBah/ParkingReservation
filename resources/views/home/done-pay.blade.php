
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/todak.ico')}} ">
    <title>Parking Reservation System</title>
    <link href="{{asset('css/icons/customcss.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/pages/data-table.css')}}" rel="stylesheet">
</head>

<body>
    <div style="padding-top: 150px;">
    <center>
    <img src="{{asset('images/completestat.png')}}" width="120px"><p>
    <h3 style="font-weight: 600; font-size: 26px;">Payment Successful</h3><p>
    <div class="emailspan">
    <span>Your reservation has been placed<p></span><br><br>
    </div>
    <a class="waves-effect waves-light btn" href="{{route('parking')}}" style="width:300px; height:50px; border-radius:100px; padding-top:8px; font-weight:700;">Back to Home</a>
    </center>
</div>
<script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="{{asset('libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/app.init.js')}}"></script>
<script src="{{asset('js/app-style-switcher.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('extra-libs/DataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/pages/datatable/datatable-basic.init.js')}}"></script>
</body>
</html>
