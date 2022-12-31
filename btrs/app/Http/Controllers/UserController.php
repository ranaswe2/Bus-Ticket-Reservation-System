<?php

namespace App\Http\Controllers;
  

use Carbon\Carbon;
use App\Http\Controllers\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EndUser;
use App\Http\Requests\StoreEndUserRequest;
use App\Http\Requests\VerifyRequest;
use App\Http\Requests\ScheduleSearchResultsRequest;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SeatRequest;

class UserController extends Controller
{
    function seatView(ScheduleRequest $request){

        $companyName = $request->companyName;
        $bussNo = $request->bussNo;
        $ticketPrice = $request->ticketPrice;
        $date = $request->date;
        $time = $request->time;
        $from = $request->from;
        $to = $request->to;


        return view('Seat', compact('companyName','bussNo','ticketPrice','date','time','from','to'));
    }

    function signUp(){
        return view('SignUp');
    }

    function signIn(){
        return view('SignIn');
    }

    function verify(){
        return view('Verify');
    }

    function schedulesearchresults(ScheduleSearchResultsRequest $request){

        $details = DB::table('schedules')
        ->join('buses', 'schedules.bussNo', '=', 'buses.bussNo')
        ->join('companies', 'buses.companyId', '=', 'companies.companyId')
        ->select('companies.name','schedules.from','schedules.to','schedules.time','buses.serviceType','schedules.ticketPrice','schedules.bussNo')

        ->where('schedules.from','=',$request->from)
        ->where('schedules.to','=',$request->to)
        ->get();

        $dateToday = Carbon::parse(date('Y-m-d'));
        $dateJourney = Carbon::parse($request->date);

        if ($dateToday->lessThanOrEqualTo($dateJourney)) {
          return view('ScheduleSearchResults',compact('details','dateJourney'));
        }
        else{
            return "<script>alert('Entered date is passed!');</script>";
        }
    }

    function sourcetodest(){

        $place = DB::table('schedules')
            ->select('from as dst');

        $district = DB::table('schedules')
            ->select('to as dst')
            ->union($place)
            ->get();


        return view('SourceToDest',compact('district'));
    }




    

    function storeUserInfo(StoreEndUserRequest $request){
        if($request->pass == $request->rePass){
            
        $code=Utility::sendCode();

        $endUser= new EndUser;
        $endUser->name=$request->name;
        $endUser->phone=$request->phone;
        $endUser->pass=$request->pass;
        $endUser->systemCode=$code;
        $endUser->save();

        $message="Dear ".$request->name.", Your BTRS account verification code is ". $code;
        Utility::sendMessage($request->phone, $message);

        return redirect('/verify');
        }
        else{
            return "<script>alert('Entered passwords are not same!');</script>";
           // return redirect('/signup');

        }

    }

    function verification(VerifyRequest $request){
        
        $systemCode=DB::table('end_users')
                    ->select('systemCode')
                    ->where('phone', $request->phone)
                    ->value('systemCode');

                       // return "<script>alert('".$request->phone."=>".$systemCode."');</script>";
                     
               if($systemCode == $request->userCode){

                $action= DB::table('end_users')
                    ->where('phone', $request->phone)
                    ->update(['userCode' => $request->userCode]);

                    if($action==true){
                        return redirect('/sourcetodest');
                    }
                    else{
                        return redirect('/verify');
                    }
              }
              else{
                  return redirect('/verify');
              }
    }


    function signInVerify(SignInRequest $request){

        $userCode = DB::table('end_users')
            ->select('userCode')
            ->where('phone',$request->phone)
            ->value('userCode');
            
        $pass = DB::table('end_users')
        ->select('pass','systemCode','userCode')
        ->where('phone',$request->phone)
        ->where('systemCode', $userCode)
        ->value('pass');

            if($pass == $request->pass){
                return redirect('/sourcetodest');
            }
            else{
                return redirect('/signin');
           //return "<script>alert('".$pass."');</script>";
            }
    }

    function selectSeat(SeatRequest $request){

        return "<script>alert('Seat No: ".$request->seatNo."');</script>";
    }
}
