<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 2/19/2015
 * Time: 10:27 AM
 */

class InsuranceController extends BaseController{

    public function saveInsurance(){

        $insurance = new Insurance;
        $insurance -> company_name = Input::json()-> get('name');
        $insurance -> principal_officer = Input::json()-> get('officer');
        $insurance -> type = Input::json()-> get('type');
        $insurance -> phone_number = Input::json()-> get('phone_no');
        $insurance -> policy_number = Input::json()-> get('policy_no');
        $insurance -> policy_period = Input::json()-> get('policy_period');
        $insurance -> address = Input::json()-> get('physical_address');
        $insurance -> po_box = Input::json()-> get('address');
        $insurance -> email = Input::json()-> get('email');
        $insurance -> website = Input::json()-> get('website');
        $insurance -> fax = Input::json()-> get('fax');

        $insurance->save();
    }

    public function getCompanies(){

        return Insurance::all();
    }

}