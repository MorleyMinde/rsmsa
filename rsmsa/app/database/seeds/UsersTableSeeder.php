<?php
/**
 * Created by PhpStorm.
 * User: PAUL
 * Date: 1/29/2015
 * Time: 12:49 PM
 */

class UsersTableSeeder extends Seeder{

    public function run(){
        DB::table('rsmsa_users')->delete();

        User::create(
            array(
                'username' => 'R6478',
                'password' => Hash::make('1234'),
                'level' => 'Police Officer',
                'person_id' => '1'
            )
        );

        User::create(
            array(
                'username' => 'R6488',
                'password' => Hash::make('1234'),
                'level' => 'Police Officer',
                'person_id' => '2'
            )
        );

        User::create(
            array(
                'username' => 'R6278',
                'password' => Hash::make('1234'),
                'level' => 'Police Officer',
                'person_id' => '3'
            )
        );

        User::create(
            array(
                'username' => 'R1111',
                'password' => Hash::make('1234'),
                'level' => 'Police Officer',
                'person_id' => '4'
            )
        );
    }

} 