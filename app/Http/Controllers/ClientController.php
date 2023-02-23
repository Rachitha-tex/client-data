<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(){
        return view('client.index');
    }
    public function store(Request $request){
        $validate=$request->validate([
            'fullname'=>['required'],
            'address'=>['required'],
            'contact'=>['required','max:10'],
            'gender'=>['required'],
            'dob'=>['required'],
            'membership'=>['required']
        ]);

        if($validate){
            Client::create([
                'fullname'=>$request->fullname,
                'address'=>$request->address,
                'contact'=>$request->contact,
                'gender'=>$request->gender,
                'dob'=>$request->dob,
                'membership'=>$request->membership
            ]);

            return redirect()->back()->with('message','Succcess submitting...');
        }else{
            return redirect()->back()->with('message','Error is submitting...');
        }
    }

    public function show(){

  /*       $client=DB::select("Select CONCAT( SUBSTRING(SUBSTRING(fullname, 1, INSTR(fullname, ' ') - 1), 1, 1), '. ',
        SUBSTRING(fullname, INSTR(fullname, ' ') + 1, char_length(fullname)))
        from clients" ); */

        $client= DB::table('clients as a')
        ->selectRaw('a.fullname as fn ,CONCAT( SUBSTRING(SUBSTRING(fullname, 1, INSTR(fullname, " ") - 1), 1, 1), ". ",SUBSTRING(fullname, INSTR(fullname, " ") + 1, char_length(fullname))) as na, a.address as ad ,IF(SUBSTRING(a.contact,1,2) = "07","Mobile","Landphone") as ph, CONCAT("+94"," ",SUBSTRING(a.contact,2,2), " ",SUBSTRING(a.contact,4)) as ip,a.contact as con, a.gender as g,a.dob as bd, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),a.dob)),"%Y")+0 as age,IF(a.membership=1,"VIP",IF(a.membership = "2","Gold","General")) as m, IF(a.membership="1","6000",IF(a.membership="2","7000","8000")) as val ')
        ->get();
       // dd($client);
       return view('client.show',compact('client'));
    }
}
