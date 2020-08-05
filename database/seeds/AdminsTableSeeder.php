<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Date craeted && Inserted Data in Admin Tables Using this seeder

    	DB::table('admins')->delete();
    	$adminRecords =[
    		['id'=>1,'name'=>'admin','type'=>'admin','mobile'=>'7290944755','email'=>'admin@gmail.com','password'=>'$2y$10$8z6zKNzRISpsCtt3UBMofu71qmEGLdYUM2shP/.adUWSDx.cWE9Nu','image'=>'','status'=>1],
    		['id'=>2,'name'=>'saurabh','type'=>'subadmin','mobile'=>'7290944755','email'=>'saurabh@gmail.com','password'=>'$2y$10$8z6zKNzRISpsCtt3UBMofu71qmEGLdYUM2shP/.adUWSDx.cWE9Nu','image'=>'','status'=>1],
    		['id'=>3,'name'=>'abhi','type'=>'subadmin','mobile'=>'7290944755','email'=>'abhi@gmail.com','password'=>'$2y$10$8z6zKNzRISpsCtt3UBMofu71qmEGLdYUM2shP/.adUWSDx.cWE9Nu','image'=>'','status'=>1],
    	];

    	DB::table('admins')->insert($adminRecords);

    	/*
    	foreach ($adminRecords as $key => $record) {
    		\App\Admin::create($record);	
    	}
    	*/
    }
}
