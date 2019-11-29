<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UserTbaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class,2)->create();

        $user = User::create([
            'name' => 'Kodai',
            'email' => 'kodai@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avator' => 'uploads/avator/sample.jpg',
            'about' => 'Lorem ipam jamm kodai okabr just right',
            'facebook' => 'http://www.facebook.com/kodai',
            'linkedin' => 'http://www.linkedin.com/kodai',
        ]);

        $user = User::create([
            'name' => 'Sakai',
            'email' => 'sakai@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avator' => 'uploads/avator/sample.jpg',
            'about' => 'Lorem ipam jamm kodai okabr just right alco and peace',
            'facebook' => 'http://www.facebook.com/sakai',
            'linkedin' => 'http://www.linkedin.com/sakai',
        ]);

    }
}
