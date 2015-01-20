<?php
class OffenceRegistryTableSeeder extends Seeder{
	
	public function run()
	{
		$arrays = array(
				array('nature'=>'use of motor vehicle without registration','section'=>'S.8(1)(2)'),
				array('nature'=>'Failure to fix identification marks','section'=>'S.14(1)(2)(3)(5)'),
				array('nature'=>'Failure to carry certificate of registration in the vehicle','section'=>'S.13(1)(2)'),
				array('nature'=>'Driving without a valid driving license','section'=>'S.19(1)(2)'),
				array('nature'=>'Failure to display identification marks for vehicle used for driving lessons','section'=>'S22'),
				array('nature'=>'Offences relating to driving instructions','section'=>'S.37(a)(b)(c)(e)'),
				array('nature'=>'Offences relating to condition of motor vehicle for use on a road','section'=>'S.39(1)(a)(b)(2)(3)'),
				array('nature'=>'Failure to tighten a safety belt and or failure to wear a helmet','section'=>'S.39(11)(12)'),
				array('nature'=>'Failure to stop at Railway crossing','section'=>'S.55'),
				array('nature'=>'Driving unreasonably slowly','section'=>'S.56'),
				array('nature'=>'Riding in dangerous position','section'=>'S.58(1)(2)(3)(4)'),
				array('nature'=>'Restriction on pillion riding','section'=>'S.59(1)(2)'),
				array('nature'=>'Obstructing a driver of motor vehicle','section'=>'S.43&60'),
				array('nature'=>'Causing damage to a motor vehicle','section'=>'S.61(1)(2)(3)'),
				array('nature'=>'Careless or inconsiderate use of motor vehicle','section'=>'S.50')
		);
		DB::table('offence_registry')->delete();
		
		foreach($arrays as $arr)
		{
			OffenceRegistry::create($arr);
		}
	}
}