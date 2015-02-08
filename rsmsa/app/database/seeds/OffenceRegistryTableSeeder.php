<?php
class OffenceRegistryTableSeeder extends Seeder{
	
	public function run()
	{
		$arrays = array(
				array('nature'=>'use of motor vehicle without registration','section'=>'S.8(1)(2)',
                'relating'=>'motor vehicle',
                'amount'=>'30000'),
				array('nature'=>'Failure to fix identification marks','section'=>'S.14(1)(2)(3)(5)',
                    'relating'=>'motor vehicle',
                    'amount'=>'30000'),
				array('nature'=>'Failure to carry certificate of registration in the vehicle','section'=>'S.13(1)(2)',
                        'relating'=>'motor vehicle',
                        'amount'=>'30000'),
				array('nature'=>'Driving without a valid driving license','section'=>'S.19(1)(2)',
                            'relating'=>'motor vehicle',
                            'amount'=>'30000'),
				array('nature'=>'Failure to display identification marks for vehicle used for driving lessons','section'=>'S22',
                                'relating'=>'motor vehicle',
                                'amount'=>'30000'),
				array('nature'=>'Offences relating to driving instructions','section'=>'S.37(a)(b)(c)(e)',
                                    'relating'=>'motor vehicle',
                                    'amount'=>'30000'),
				array('nature'=>'Offences relating to condition of motor vehicle for use on a road','section'=>'S.39(1)(a)(b)(2)(3)',
                                        'relating'=>'motor vehicle',
                                        'amount'=>'30000'),
				array('nature'=>'Failure to tighten a safety belt and or failure to wear a helmet','section'=>'S.39(11)(12)',
                                            'relating'=>'motor vehicle',
                                            'amount'=>'30000'),
				array('nature'=>'Failure to stop at Railway crossing','section'=>'S.55',
                                                'relating'=>'motor vehicle',
                                                'amount'=>'30000'),
				array('nature'=>'Driving unreasonably slowly','section'=>'S.56',
                                                    'relating'=>'motor vehicle',
                                                    'amount'=>'30000'),
				array('nature'=>'Riding in dangerous position','section'=>'S.58(1)(2)(3)(4)',
                                                        'relating'=>'motor vehicle',
                                                        'amount'=>'30000'),
				array('nature'=>'Restriction on pillion riding','section'=>'S.59(1)(2)',
                                                            'relating'=>'motor vehicle',
                                                            'amount'=>'30000'),
				array('nature'=>'Obstructing a driver of motor vehicle','section'=>'S.43&60',
                                                                'relating'=>'motor vehicle',
                                                                'amount'=>'30000'),
				array('nature'=>'Causing damage to a motor vehicle','section'=>'S.61(1)(2)(3)',
                                                                    'relating'=>'motor vehicle',
                                                                    'amount'=>'30000'),
				array('nature'=>'Careless or inconsiderate use of motor vehicle','section'=>'S.50',
                                                                        'relating'=>'motor vehicle',
                                                                        'amount'=>'30000'),
				array(
						'nature'=>'Owner of a public service vehicle failing to mark/print name and address,
                                                                            maximum number of passenger and weight of goods on the right or off side of a vehicle',
						'section'=>'R.47(1)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				
				),
				array(
						'nature'=>'Conveying on motor omnibus goods not belonging to passengers',
						'section'=>'R.53(1)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				
				),
				array(
						'nature'=>'Failing to carry reflectors on motor vehicle',
						'section'=>'R.44(1)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				
				),
				array(
						'nature'=>'Unnecessary sounding of horns etc',
						'section'=>'R.39(3)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'				
				),
				array(
						'nature'=>'Stopping the motor vehicle within twenty-five feet from comer in township',
						'section'=>'R.35(2)(b)',
						'relating'=>'motor vehicle',
						'amount'=>'30000',				
				),
				array(
						'nature'=>'Stopping the motor vehicle on the left or near side of the road when stopping in township',
						'section'=>'R.36(h)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Failing to stop a vehicle',
						'section'=>'S.113(2)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Failing to comply with road Traffic',
						'section'=>'S.113',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Driving a commercial vehicle;heavy duty or public service vehicle beyond speed limit',
						'section'=>'R.60&S.51',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Driving or causing a motor vehicle or trailer to be driven with a load not well secured',
						'section'=>'R.30(1)(e)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Driving or causing a motor vehicle to be driven with defective tyres',
						'section'=>'R.30(1)(i)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Employer failing to keep record of a driver',
						'section'=>'R.79',
						'relating'=>'motor vehicle',
						'amount'=>'30000'				
				),
				array(
						'nature'=>'Failure of the owner or hirer of a motor vehicle to give identity of a driver',
						'section'=>'S.80(a)(b)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'				
				),
				array(
						'nature'=>'Failure to remove broken down vehicle',
						'section'=>'S.85(1)(2)(a)(b)(3)(a)(b)(d)(4)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Failure to remove a vehicle from packing place',
						'section'=>'S.86',
						'relating'=>'motor vehicle',
						'amount'=>'30000'				
				),
				array(
						'nature'=>'Driving or packing a motor vehicle on a footpath',
						'section'=>'S.86',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Offences relating to overtaking use of lanes,carriageways and conduct at intersections',
						'section'=>'S.50 OF RTA No.30/1973 and S.11 of Act No.16/1996(amendment)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11)(12)(13)(14)(15)(16)(17)(18)(19)(20)(21)(22)(23)(24)(25)(26)(27)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'				
				),
				array(
						'nature'=>'Failure to use dipped light when approaching an oncoming traffic',
						'section'=>'S.39 of Act No.30/1973 and S.8 of Act No.16/1996',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Taking motor vehicle without owners consent',
						'section'=>'S.62 of Act No.30/1973',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Failure to observe pedestrian crossing',
						'section'=>'S.65 of Act No.30/1973',
						'relating'=>'motor vehicle',
						'amount'=>'30000'				
				),
				array(
						'nature'=>'Offence relating to parking and standing',
						'section'=>'S.71 and 71(A) OF Act No.30/1973 and S.16 of Act No.16/1996(amendment)(1)(2)(3)(4)(5)(6)(7)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Failure to observe instructions conveyed by traffic sign,traffic signals and road markings',
						'section'=>'S.73 and 73(1) of Act No.30/1973 and S.17 of Act No.16/1996(amendment)(2)(3)(4)',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Failure to carry reflectors on a motor vehicle',
						'section'=>'R.44',
						'relating'=>'motor vehicle',
						'amount'=>'30000'
				),
				array(
						'nature'=>'Riding a bicycle in prohibited manner',
						'section'=>'S.101',
						'relating'=>'bicycle/tricycle',
						'amount'=>'20000'
				),
				array(
						'nature'=>'Riding a bicycle,which has no effective brake',
						'section'=>'R.32',
						'relating'=>'bicycle/tricycle',
						'amount'=>'20000'
				),
				array(
						'nature'=>'Using a bicycle/tricycle which has no horns,bell or other prescribed instruments',
						'section'=>'S.107',
						'relating'=>'bicycle/tricycle',
						'amount'=>'20000'
				),
				array(
						'nature'=>'Riding a bicycle/tricycle which has no lights',
						'section'=>'R.43',
						'relating'=>'bicycle/tricycle',
						'amount'=>'20000'
				),
				array(
						'nature'=>'Failing to carry reflector on a bicycle',
						'section'=>'R.44(10)(ii)',
						'relating'=>'bicycle/tricycle',
						'amount'=>'20000'
				)
		);
		DB::table('rsmsa_offence_registry')->delete();
		
		foreach($arrays as $arr)
		{
			OffenceRegistry::create($arr);
		}
	}
}