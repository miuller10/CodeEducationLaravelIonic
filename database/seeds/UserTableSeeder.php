<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(CodeDelivery\models\User::class)->create([
                                                            'name' => 'User',
                                                            'email' => 'user@email.com',
                                                            'password' => bcrypt(123456),
                                                            'remember_token' => str_random(10),
        ])->client()->save(factory(CodeDelivery\models\Client::class)->make());

        factory(CodeDelivery\models\User::class)->create([
                                                            'name' => 'Admin',
                                                            'email' => 'admin@email.com',
                                                            'password' => bcrypt(123456),
                                                            'role' => 'admin',
                                                            'remember_token' => str_random(10),
        ])->client()->save(factory(CodeDelivery\models\Client::class)->make());
        //

        factory(CodeDelivery\models\User::class, 10)->create()->each(function($u){
        	$u->client()->save(factory(CodeDelivery\models\Client::class)->make());
        });

        factory(CodeDelivery\models\User::class, 3)->create([                                                            
                                                            'role' => 'deliveryman'                                                            
                                                        ]);
    }
}
