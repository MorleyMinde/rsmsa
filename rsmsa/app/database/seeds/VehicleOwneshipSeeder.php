<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/12/15
 * Time: 8:38 AM
 */
class VehicleOwnershipSeeder extends Seeder{

    public function run()
    {
        $arrays = array(
            array('name'=>'Citizen of Tanzania'),
            array('name'=>'Parastatal'),
            array('name'=>'Company'),
            array('name'=>'Expatriate'),
            array('name'=>'Other Agencies/Associations/clubs'),
            array('name'=>'Partnership'),
            array('name'=>'Sole Proprietor'),
            array('name'=>'Financial Institution'),
            array('name'=>'Local Government'),
            array('name'=>'Other Government Organisation'),
            array('name'=>'Diplomat/ Foreign Mission'),
            array('name'=>'International Organisation'),
            array('name'=>'Cooperative Society'),
            array('name'=>'Religious Organisation'),
        );
        DB::table('vehicle_owner_category')->delete();

        foreach($arrays as $arr)
        {
            VehicleOwnership::create($arr);
        }
    }
}