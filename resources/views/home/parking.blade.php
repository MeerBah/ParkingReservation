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
                            <i class="small material-icons">settings</i>&nbsp;&nbsp;<h5 class="font-medium m-b-0">Reservation</h5>
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
                                      <div class="table-responsive">
                                        
                                          <a class="waves-effect waves-light btn indigo right modal-trigger" href="#modal1">View Available Parking</a>
                                          
                                          <table class="table striped m-b-20" id="editable-datatable">
                                              <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Vehicle Number</th>
                                                      <th>Parking Slot</th>
                                                      <th>Parking Size</th>
                                                      <th>Parking Date</th>
                                                      <th>Parking Time</th>
                                                      <th class="center">Action</th>
                                                  </tr>
                                              </thead>
                  
                                              <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($reserve as $reservation)
                                                <tr>
                                                  <td>{{$no}}</td>
                                                  <td>{{$reservation->vehicle_number}}</td>
                                                  <td>{{$reservation->parking_slot}}</td>
                                                  <td>{{$reservation->parking_size}}</td>
                                                  <td>{{$reservation->parking_date}}</td>
                                                  <td>{{$reservation->time}}</td>
                                                  <td class="center">
                                                    <span class="label label-ready sa-delete" data-parking-id="{{$reservation->id}}">Cancel</span>
                                                  </td>
                                                </tr>
                                                @php
                                                    $no ++;
                                                @endphp
                                                @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>  
                              </div>  
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          {{-- </div> --}}
  
  <!-- Modal Add Budget -->
  <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
      <h4 class="modalheader">View Available Parking</h4>
      <span>Please select a date</span>
      <form id="form" method="GET" action="{{route('available')}}">
      @csrf
          <div class="row">
              <div class="input-field col s12 l6">
                  <h6 class="labelform">Date</h6>
                  <input id="date" name="date" type="date" required>
  
              </div>
          </div>
          <div class="row">  
              <div class="col s12">
                  <center>
                      <a href="#" id="modalbutton"><button type="submit" id="add-budget" class="waves-effect waves-light btn indigo right modal-trigger">View</button></a>&nbsp;&nbsp;
                  </center>
              </div>
          </div>
      </form>
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

        $(function() {
          $('#editable-datatable').DataTable();  
      });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
      <script>
  
        $('.sa-delete').click(function() {
        var deleteButton = $(this); 
        swal({
            title: "Are you sure?",
            text: "This reservation will be cancel!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it",
            closeOnConfirm: false
        }).then((result) => {
            if (result.value) {
                var orderId = deleteButton.data('parking-id');
                var deleteUrl = "{{ route('cancel', ['id' => 'TEMP_ID']) }}";
                deleteUrl = deleteUrl.replace('TEMP_ID', orderId);
                window.location.href = deleteUrl;
            }
        });
        });

      </script>
  
  </body>
  </html>

