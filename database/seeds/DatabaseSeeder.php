<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);

        Model::reguard();
    }
    
}
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        $usuarios = User::get();
 
        if($usuarios->count() == 0) {
            User::create(array(
                'name'  => 'marcelo',
                'email' => 'marcelosousa46@gmail.com',
                'password' => Hash::make('admin')
            ));
        }
    }
}    
