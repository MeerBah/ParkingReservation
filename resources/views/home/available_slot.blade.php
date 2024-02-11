<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/todak.ico')}}">
    <title>Parking Reservation System</title>
    <link href="{{asset('extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/pages/data-table.css')}}" rel="stylesheet">
    <link href="{{asset('libs/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">TODAK</p>
            </div>
        </div>

        <header class="topbar">
            <nav>
                <div class="nav-wrapper">
                    <a href="{{route('dashboard')}}" class="brand-logo">
                        <span class="icon">
                            <img class="light-logo" src="{{asset('images/todak.png')}}" width="23%">
                        </span>
                    </a>

                    <ul class="right">
                        <li><a class="dropdown-trigger tooltipped" data-tooltip="Profile" href="javascript: void(0);" data-target="user_dropdown"><img src="{{asset('images/users/2.jpg')}}" alt="user" class="circle profile-pic"></a>
                            <ul id="user_dropdown" class="mailbox dropdown-content dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="{{asset('images/users/2.jpg')}}" alt="user"></div>
                                        <div class="u-text">
                                            <h4>{{Auth::user()->name}}</h4>
                                            <p>{{Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('logout')}}"><i class="material-icons">power_settings_new</i> Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

            <div class="card">
                <div class="row">
                    <div class="col s12">
                        <div class="card-content">
                            <div class="d-flex align-items-center">
                                <i class="small material-icons">settings</i>&nbsp;&nbsp;<h5 class="font-medium m-b-0">Parking List</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                          <div class="row">
                              <div class="col s12">
                                  <div class="card-content">
                                    <a href="{{route('parking')}}"><span class="label label-blue">Back To Home</span></a>
                                    <br><br><br>
                                    <form action="{{route('payment')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col s3">
                                                <h6>Time</h6>
                                                <select id="sizeFilter" name="time_id">
                                                    @foreach ($time as $times)
                                                    <option value="{{$times->time_id}}" selected>{{$times->time}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col s3">
                                                <h6 class="labelform">Vehicle Number</h6>
                                                <input type="text" name="vehicle" placeholder="Please insert your vehicle number plate" required>
                                            </div>
                                            <div class="col s3">
                                                <h6 class="labelform">Phone Number</h6>
                                                <input type="number" name="phone" placeholder="Please insert your phone number" required>
                                            </div>
                                            <div class="col s3">
                                                <h6 class="labelform">Date</h6>
                                                <input type="text" name="date" value="{{$date}}" readonly>
                                            </div>
                                        </div><br><br>
                                        <table class="table striped m-b-20" id="editable-datatable">
                                            <thead>
                                                <tr>
                                                    <th>Parking Slot</th>
                                                    <th class="center">Small Size</th>
                                                    <th class="center">Medium Size</th>
                                                    <th class="center">Large Size</th>
                                                </tr>
                                            </thead>
                
                                            <tbody>
                                            @foreach($parking as $park)
                                            <tr data-id="{{$park->parking_id}}">
                                                <td style="display: none;" class="data-row" data-size="{{$park->parking_time_id}}"></td>
                                                <td>{{$park->parking_slot}}</td>
                                                <td class="center">
                                                    @php
                                                        $reserve = DB::table('reservation')->where('parking_slot', $park->parking_slot)
                                                                    ->where('parking_size', 'Small')
                                                                    ->where('parking_date', $date)
                                                                    ->where('parking_time_id', $park->parking_time_id)
                                                                    ->count();
                                                    @endphp 
                                                    @if ($reserve == 0)
                                                    <label>
                                                        <input name="parking" id="Small" type="radio" data-parking-id="{{$park->parking_id}}">
                                                        <span>Available</span>
                                                    </label>
                                                    @else
                                                    <label>
                                                        <input name="parking" id="Small" type="radio" disabled>
                                                        <span>Unavailable</span>
                                                    </label>
                                                    @endif    
                                                </td>
                                                <td class="center">
                                                    @php
                                                        $reserve = DB::table('reservation')->where('parking_slot', $park->parking_slot)
                                                                    ->where('parking_size', 'Medium')
                                                                    ->where('parking_date', $date)
                                                                    ->where('parking_time_id', $park->parking_time_id)
                                                                    ->count();
                                                    @endphp 
                                                    @if ($reserve == 0)
                                                    <label>
                                                        <input name="parking" id="Medium" type="radio" data-parking-id="{{$park->parking_id}}">
                                                        <span>Available</span>
                                                    </label>
                                                    @else
                                                    <label>
                                                        <input name="parking" id="Medium" type="radio" disabled>
                                                        <span>Unavailable</span>
                                                    </label>
                                                    @endif   
                                                </td>
                                                <td class="center">
                                                    @php
                                                        $reserve = DB::table('reservation')->where('parking_slot', $park->parking_slot)
                                                                    ->where('parking_size', 'Large')
                                                                    ->where('parking_date', $date)
                                                                    ->where('parking_time_id', $park->parking_time_id)
                                                                    ->count();
                                                    @endphp 
                                                    @if ($reserve == 0)
                                                    <label>
                                                        <input name="parking" id="Large" type="radio" data-parking-id="{{$park->parking_id}}">
                                                        <span>Available</span>
                                                    </label>
                                                    @else
                                                    <label>
                                                        <input name="parking" id="Large" type="radio" disabled>
                                                        <span>Unavailable</span>
                                                    </label>
                                                    @endif   
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table><br>
                                        <div class="row">
                                            <div class="col s12 l3"></div>
                                            <div class="col s12 l6">
                                                
                                                <button type="submit" class="btnpaynow waves-effect waves-light sa-success">Make Payment</button>
                                            </div>
                                        </div><br>
                                    </form>                                      
                                  </div>  
                              </div>  
                            </div>
                        </div>
                    </div>
                  </div>
            </div>

    </div>
    
    <script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('js/materialize.min.js')}}"></script>
    <script src="{{asset('libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/app.init.horizontal.js')}}"></script>
    <script src="{{asset('js/app-style-switcher.horizontal.js')}}"></script>
    <script src="{{asset('js/app-style-switcher.js')}}"></script>

    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('extra-libs/DataTables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('extra-libs/jquery-datatables-editable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('libs/sweetalert2/dist/sweetalert2.min.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>

    <script>
        function filterTableByRole() {
            const selectedSize = document.getElementById("sizeFilter").value;
            const dataRows = document.getElementsByClassName("data-row");

            for (let row of dataRows) {
                const rowSize = row.getAttribute("data-size");
                if (selectedSize === rowSize) {
                    row.parentElement.style.display = "";
                } else {
                    row.parentElement.style.display = "none";
                }
            }
        }

        document.getElementById("sizeFilter").addEventListener("change", filterTableByRole);
        filterTableByRole();


    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.querySelector('form');
            var submitButton = form.querySelector('.btnpaynow');

            submitButton.addEventListener('click', function (event) {
                event.preventDefault(); 
                var selectedParking = getSelectedRadioValue('parking');

                var parkingInput = document.createElement('input');
                parkingInput.type = 'hidden';
                parkingInput.name = 'parking';
                parkingInput.value = selectedParking;
                
                form.appendChild(parkingInput);
                form.submit();
            });

            function getSelectedRadioValue(name) {
                var selectedRadio = form.querySelector('input[name="' + name + '"]:checked');

                if (selectedRadio) {
                    var parkingId = selectedRadio.getAttribute('data-parking-id');
                    var type = selectedRadio.id;
                    return parkingId + '/' + type;
                }

                return null;
            }
        });
    </script>

</body>
</html>

