<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminSignupRequest;
use App\Http\Requests\AdminSigninRequest;
use App\Http\Requests\AdminBusRequest;
use App\Http\Requests\AdminScheduleRequest;
use App\Http\Requests\AdminChangeRequest;

class AdminController extends Controller
{
        
    function adminSigninView(){

        return view('AdminSignin');
    }        
    function adminSignupView(){
    
        return view('AdminSignup');
    }        
    function adminHome(){

        $phone= session('phone');
        return view('AdminHome',compact('phone'));
    }

    function adminSignup(AdminSignupRequest $request){
        if($request->pass == $request->rePass){

        DB::insert('insert into companies (admin, phone, name, password) values (?, ?,?,?)',
                           [$request->admin, $request->phone,$request->name,$request->pass]);

       // $message="Dear ".$request->admin.", Your BTRS account verification code is ". $code;
       // Utility::sendMessage($request->phone, $message);






       $company = DB::table('companies')
       ->select('companyId','name','admin','phone')
       ->where('phone',$request->phone)
       ->where('password',$request->pass)
       ->get();


if(count($company)==1){

   foreach($company as $company){
       $request->session()->put('companyId',$company->companyId);
       $request->session()->put('name',$company->name);
       $request->session()->put('admin',$company->admin);
       $request->session()->put('phone',$company->phone);
   }
   return view('AdminHome',compact('company'));
       }
else{
   
   echo "<script>alert('Login Failed!');</script>";
           return redirect('/admin@signin');
   }
        }
        else{
            return "<script>alert('Entered passwords are not same!');</script>";
           // return redirect('/signup');

        }

    }

    function adminSignin(AdminSigninRequest $request){


        $company = DB::table('companies')
            ->select('companyId','name','admin','phone')
            ->where('phone',$request->phone)
            ->where('password',$request->pass)
            ->get();


    if(count($company)==1){

        foreach($company as $company){
            $request->session()->put('companyId',$company->companyId);
            $request->session()->put('name',$company->name);
            $request->session()->put('admin',$company->admin);
            $request->session()->put('phone',$company->phone);
        }
        return view('AdminHome',compact('company'));
            }
     else{
        
        echo "<script>alert('Login Failed!');</script>";
                return redirect('/admin@signin');
        }
    }

    function adminChange(){

        $admin = DB::table('companies')
            ->select('companyId','name','admin','phone')
            ->where('companyId',session('companyId'))
            ->get();

        return view('AdminChange',compact('admin'));
    }    
    
    function changeAdmin(AdminChangeRequest $request){

        if($request->pass == $request->repass){
            DB::update('update companies set admin = ?, phone = ?, password = ? where companyId = ?',[$request->admin,$request->phone,$request->pass,session('companyId')]);
      
        }
        return redirect('/admin@change');
    }   



    function bus(){

    $bus = DB::table('buses')
    ->select('bussNo','totalSeat','serviceType')
    ->where('companyId',session('companyId'))
    ->get();

        return view('AdminBus',compact('bus'));
    }

    function addBus(AdminBusRequest $request){

        DB::table('buses')
           ->updateOrInsert(
            ['bussNo' => $request->bussNo, 'totalSeat' => $request->totalSeat, 'serviceType' =>  $request->serviceType],
            ['companyId' => session('companyId')]
        );
        return redirect('/admin@bus');
    }   

    function schedule(){

        $schedule = DB::table('schedules')
        ->select('bussNo','time','from','to','ticketPrice')
        ->where('companyId',session('companyId'))
        ->get();

        return view('AdminSchedule',compact('schedule'));
    } 
    function addSchedule(AdminScheduleRequest $request){


        DB::table('schedules')
           ->updateOrInsert(
            ['bussNo' => $request->bussNo, 'time' => $request->time, 'from' =>  $request->from, 'to' => $request->to, 'ticketPrice' =>  $request->ticketPrice],
            ['companyId' => session('companyId')]
        );

        return redirect('/admin@schedule');
    }


    function out(Request $request){

        $request->session()->forget(['name', 'status']);
        $request->session()->flush();

        return redirect('/admin@signinview');
    }
}
