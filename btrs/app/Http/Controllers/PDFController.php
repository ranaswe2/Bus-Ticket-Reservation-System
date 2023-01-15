<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TicketRequest;

class PDFController extends Controller
{
    function generatePDF(TicketRequest $request){      // USER_TICKET

        
        $user = DB::table('end_users')
        ->select('userId','name','phone','created_at')
        ->where('phone',session('phone'))
        ->get();

        $userId = DB::table('end_users')
        ->select('userId')
        ->where('phone',session('phone'))
        ->value('userId');
  
        $booked= DB::table('books')
        ->join('buses', 'books.bussNo', '=', 'buses.bussNo')
        ->join('companies', 'buses.companyId', '=', 'companies.companyId')
        ->join('schedules', 'companies.companyId', '=', 'schedules.companyId')
        ->select('companies.name','schedules.from','schedules.to','books.time','books.journeyDate','books.bussNo','books.seat','books.ticketPrice','books.amount','books.txn','books.userId')
        ->where('books.userId', '=', $userId)
        ->where('books.txn', '=', $request->txn)
        ->distinct()
        ->get();
        /*
foreach($books as $books){
        echo $books->name."<>".$books->from."<>".$books->to."<>".$books->time."<>".$books->journeyDate."<>".$books->bussNo."<>".$books->seat."<>".$books->ticketPrice."<>".$books->amount."<>".$books->txn."<>".$books->userId."</br>";
}
*/
      // $booked = array_unique($books);

        $pdf = Pdf::loadView('BusTicket', compact('user','booked'));
        return $pdf->download('ticket100'.$userId.'.pdf');
    }

    function adminDailyReport(){
        
        $report= DB::table('books')
        ->join('buses', 'books.bussNo', '=', 'buses.bussNo')
        ->join('companies', 'buses.companyId', '=', 'companies.companyId')
        ->select('companies.name','books.ticketPrice')
        ->where('companies.companyId', '=', session('companyId'))
        ->get();

        $totalPrice = 0;
        $totalSold = count($report);
        
        foreach($report as $report){
        $totalPrice += $report->ticketPrice;
        }

        
        $pdf = Pdf::loadView('AdminDailyReport', compact('totalSold','totalPrice'));
        return $pdf->download('report'.date('d-m-y-h-i-s').'.pdf');
    }
}
