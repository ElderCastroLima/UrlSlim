<?php

namespace App\Http\Controllers;

use App\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    private $partners;
    public function __construct(Partners $partners)
    {
        $this->partners = $partners;
    }
    public function isPartner($partner,$partner_key){
        $partner = $this->partners::where('partner',$partner)->get();
        foreach ($partner as $value) {
            if (Hash::check(trim($partner_key), $value->secret_key)){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
}
