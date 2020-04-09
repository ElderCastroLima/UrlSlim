<?php

namespace App\Http\Controllers;

use App\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\PartnerController;

class RedirectController extends Controller
{
    private $Resources;
    private $PartnerController;
    public function __construct(Resources $Resources,
                                PartnerController $PartnerController){
        $this->Resources = $Resources;
        $this->PartnerController = $PartnerController;
    }
    public function store(Request $request){
        if ($this->PartnerController->isPartner($request->partner,$request->partner_key)){
            $this->Resources->owner = $request->partner;
            $this->Resources->resource = uniqid();
            $this->Resources->redirect = $request->redirect;
            $this->Resources->expires_at = $request->expires_at;
            $this->Resources->date = now();
            $this->Resources->save();
            $res = $this->Resources->where('resource',$this->Resources->resource)->get();

            foreach ($res as $value) {
                $response['expires_at'] = $value->expires_at;
                $response['link'] = ENV('APP_URL').'/'.$value->resource;
            }
            return response()->json($response, 200, []);
        }else{
            return response()->json('Parceiro não encontrado', 404, []);
        }
    }

    public function redirect(Request $request)
    {
        $res = $this->Resources->where('resource',$request->redirect)->get();
        foreach ($res as $value) {
            return redirect($value->redirect);
        }
    }
}
