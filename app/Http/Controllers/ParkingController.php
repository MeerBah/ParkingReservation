<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\Reservation;
use App\Models\Size;
use App\Models\Time;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ParkingController extends Controller
{
    public function showParking()
    {
        if(Auth::check()){
            
            $size = Size::all();
            $parking = Parking::all();
            $reserve = Reservation::join('parking_time', 'parking_time.time_id','=','reservation.parking_time_id')
                        ->where('user_id', Auth::user()->id)->get();

            return view('home.parking')->with([
                'size' => $size,
                'parking' => $parking,
                'reserve' => $reserve
            ]);
        }
  
        return redirect()->to('login')->withSuccess('You are not allowed to access');
    }

    public function AvailableSlot(Request $request)
    {
        if(Auth::check()){

            $date = $request['date'];
            $date_format = date_format(new Datetime($date), 'd/m/Y');

            $size = Size::all();
            $time = Time::all();
            $parking = Parking::join('parking_time', 'parking_time.time_id','=','parking.parking_time_id')
                        ->get();

            return view('home.available_slot')->with([
                'date' => $date_format,
                'size' => $size,
                'time' => $time,
                'parking' => $parking
            ]);
        }
    
        return redirect()->to('login')->withSuccess('You are not allowed to access');
    }

    public function paymentPage(Request $request)
    {
        $parking = $request['parking'];
        $vehicle = $request['vehicle'];
        $time = $request['time_id'];
        $date = $request['date'];

        $explode = explode("/", $parking);
        $slot = $explode[0];
        $size = $explode[1];

        $slot_name = Parking::where('parking_id', $slot)->value('parking_slot');

        $reserve = new Reservation();
        $reserve->user_id = Auth::user()->id;
        $reserve->vehicle_number = $vehicle;
        $reserve->parking_slot = $slot_name;
        $reserve->parking_size = $size;
        $reserve->parking_date = $date;
        $reserve->parking_time_id = $time;
        $reserve->status = 1;
        $reserve->save();

        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $phone = $request->input('phone');
        $total_price = 10;
        $harga = $total_price * 100;

        $post_data = [
            'userSecretKey' => 'a9ro1vjp-2v2g-mp6u-ek8e-o0a77bewwwad',
            'categoryCode' => 'n9cwr6sw',
            'billName' => 'Parking Payment',
            'billDescription' => 'Parking Reservation Payment',
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $harga,
            'billReturnUrl' => 'http://127.0.0.1:8000/updateStatus?id='.$reserve->id,
            'billCallbackUrl' => 'http://127.0.0.1:8000/failedPay',
            'billExternalReferenceNo' => '',
            'billTo' => $name,
            'billEmail' => $email,
            'billPhone' => $phone,
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => 0,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://dev.toyyibpay.com/index.php/api/createBill',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post_data,
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $obj = json_decode($result, true);
        $billcode = $obj[0]['BillCode'];

        return redirect("https://dev.toyyibpay.com/{$billcode}");

    }

    public function updateStatus(Request $request)
    {
        $id = $request['id'];
        $reserve = Reservation::find($id);
        $reserve->status = 2;
        $reserve->save();

        return view('home.done-pay');
    }

    public function failedPay()
    {
        return view('home.failed-pay');
    }

    public function cancelReservation($id)
    {
        $delete = Reservation::find($id);
        $delete->delete();

        return redirect()->back();
    }

}
