<?php

namespace App\Http\Controllers;

use App\Models\TransactionId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionIdController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateTransactionId($length)
    {
        //
        $vowels = 'AEUY';
        $consonants = '0123456789BCDFGHJKLMNPQRSTVWXZ';
        $idnumber = '';
        $alt = time() % 2;
        for ($i = 0;$i < $length;$i++) {
            if ($alt == 1) {
                $idnumber.= $consonants[(rand() % strlen($consonants)) ];
                $alt = 0;
            } else {
                $idnumber.= $vowels[(rand() % strlen($vowels)) ];
                $alt = 1;
            }
        }
        return $idnumber;
    }

    public function getTransactionId(){
        $exist_in_table = "";
        $tran_id = $this->generateTransactionId(15);
        $exist_in_table = DB::table('transactionid')->where('transactionid', $tran_id)->value('id');

        while($exist_in_table != ""){
            $tran_id = $this->generateTransactionId(15);
            //check if exist in table
            $exist_in_table = DB::table('transactionid')->where('transactionid', $tran_id)->value('id');
        }

        //insert transaction Id in DB
        $transRec = new TransactionId();
        $transRec->transactionid = $tran_id;
        $transRec->save();
        //$resp = DB::insert('insert into transactionid (transactionid) values (?)', [$tran_id]);

        return $tran_id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionId  $transactionId
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionId $transactionId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionId  $transactionId
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionId $transactionId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionId  $transactionId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionId $transactionId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionId  $transactionId
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionId $transactionId)
    {
        //
    }
}
