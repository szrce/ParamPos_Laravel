<?php

namespace App\Http\Controllers;
use App\Helpers\ParamPos\ParamPos;

class PaymentAPIController extends Controller
{

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function AddCardPayment(Request $request, ParamPos $ParamPos)
    {

        if ($ParamPos->AddCardPayment()['result']) {
            return response()->json(array('kguid' => $ParamPos->AddCardPayment()['ks_guid']));
        }
        return response()->json(array('status' => 'fail'), 422);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function DeleteCardPayment(Request $request,ParamPos $ParamPos)
    {

        $validator = Validator::make($request->all(), [
            'r_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(array('status' => 'fail'), 422);
        }

        if (!$ParamPos->DeleteCardPayment($request->r_id)) {
            return response()->json(array('status' => 'fail'), 422);
        }
        return response()->json(array('status' => 'ok'), 422);
    }
  
   /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetCardPaymentList(Request $request, ParamPos $ParamPos)
    {
        //
        print_r($ParamPos->GetCardPaymentList(array('test')));
        die();
    }

  
}
