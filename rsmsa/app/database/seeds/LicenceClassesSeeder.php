<?php
class LicenceClassesSeeder extends Seeder{

    public function run()
    {
        $arrays = array(
            array('name'=>'A','description' => ''),
            array('name'=>'A1','description' => ''),
            array('name'=>'A2','description' => ''),
            array('name'=>'A3','description' => ''),
            array('name'=>'B','description' => ''),
            array('name'=>'C','description' => ''),
            array('name'=>'C1','description' => ''),
            array('name'=>'C2','description' => ''),
            array('name'=>'C3','description' => ''),
            array('name'=>'D','description' => ''),
            array('name'=>'E','description' => ''),
            array('name'=>'F','description' => ''),
            array('name'=>'G','description' => ''),
        );
        DB::table('rsmsa_driving_classes')->delete();

        foreach($arrays as $arr)
        {
            DrivingClasses::create($arr);
        }
    }
}