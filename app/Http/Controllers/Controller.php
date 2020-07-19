<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

use App\Booking;
use App\Coupon;
use App\Stk;
use App\Account;
use App\Event;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     

     public function bookingCodeGenerator()
        {            
            $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
            $rand_str2 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2));
            $rand_int = mt_rand(10, 100);

            $rand_code = $rand_str1.$rand_str2.$rand_int;
            while (Booking::where('booking_code', $rand_code)->exists()) {
		            $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
		            $rand_str2 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2));
                    $rand_int = mt_rand(10, 100);
                    $rand_code = $rand_str1.$rand_str2.$rand_int;
            }
            return $rand_code;
        }
        public function couponCodeGenerator()
        {            
            $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
            $rand_str2 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2));
            $rand_int = mt_rand(10, 100);

            $rand_code = $rand_str1.$rand_str2.$rand_int;
            while (Coupon::where('code', $rand_code)->exists()) {
                    $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
                    $rand_str2 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2));
                    $rand_int = mt_rand(10, 100);
                    $rand_code = $rand_str1.$rand_str2.$rand_int;
            }
            return $rand_code;
        }
        public function accountCodeGenerator()
        {            
            $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
            $rand_str2 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2));
            $rand_int = mt_rand(10, 100);

            $rand_code = $rand_str1.$rand_str2.$rand_int;
            while (Account::where('Account', $rand_code)->exists()) {
                    $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2));
                    $rand_str2 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2));
                    $rand_int = mt_rand(10, 100);
                    $rand_code = $rand_str1.$rand_str2.$rand_int;
            }
            return $rand_code;
        }
         public function classEventsCodeGenerator()
        {            
            $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
            $rand_int = mt_rand(10, 100);

            $rand_code = $rand_str1.'-'.$rand_int;
            while (Event::where('code', $rand_code)->exists()) {
                    $rand_str1 = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
                    $rand_int = mt_rand(10, 100);
                    $rand_code = $rand_str1.'-'.$rand_int;
            }
            return $rand_code;
        }


    public function mpesaSTK($user, $amount, $eventTitle, $slots, $booking_id)
    {
        $mpesa= new \Safaricom\Mpesa\Mpesa();


        $BusinessShortCode = '181195';
        $LipaNaMpesaPasskey = 'c105ce97905337aba0176e06982a2eacd7da226beac4f0b2fc930d033934bf46';
        $TransactionType = 'CustomerPayBillOnline';

        $Amount = $amount;
        $PartyA = $user;
        $PartyB = $BusinessShortCode;
        $PhoneNumber = $user;
        $CallBackURL = 'https://app.swiftpayafrica.com/zlDprOsOdrlDkaVSdd2ipGZcpuDH8a';
        $AccountReference = $user;
        $TransactionDesc = Str::limit($slots.' slot(s) for '.$eventTitle, 196);
        $Remarks = 'Thank you for using SwiftPay Africa Ticketing system.';

        $trans_push =$mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);
        $stkresponse = json_decode($trans_push);
        $stkpushResponse = new Stk();

        $stkpushResponse->PartyA = $PartyA;
        $stkpushResponse->PartyB = $PartyB;
        $stkpushResponse->Amount = $Amount;
        $stkpushResponse->TransactionType = $TransactionType;
        $stkpushResponse->booking_id = $booking_id;
        $stkpushResponse->chatuser_id = $PartyA;

        if ( array_key_exists('errorMessage', $stkresponse) ) {
                $stkpushResponse->errorCode = $stkresponse->errorCode;
                $stkpushResponse->errorMessage = $stkresponse->errorMessage;
                $stkpushResponse->CustomerMessage  = $stkresponse->requestId;
        } else{
        $stkpushResponse->MerchantRequestID = $stkresponse->MerchantRequestID;
        $stkpushResponse->CheckoutRequestID = $stkresponse->CheckoutRequestID;
        $stkpushResponse->ResponseCode = $stkresponse->ResponseCode;
        $stkpushResponse->ResponseDescription = $stkresponse->ResponseDescription;
        $stkpushResponse->CustomerMessage  = $stkresponse->CustomerMessage;
         }

        $stkpushResponse->save(); 
    }

}
