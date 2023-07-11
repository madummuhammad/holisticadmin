<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
class UserFactory extends Factory
{

  public function definition(): array
  {
    $year = now()->format('Y');
    $month = now()->format('m');
    $type = $this->faker->randomElement(['profesional', 'seeker', 'both']);
    $count = DB::table('users')
    ->whereYear('created_at', $year)
    ->whereMonth('created_at', $month)
    ->count();
    $num=1;
    if($type=='profesional'){
      $num=1;
   }
   if($type=='seeker'){
      $num=2;
   }
   if($type=='both'){
      $num=3;
   }

   $sequence = $count + 1;
   $user_id = $year.$month.$num.$sequence;
   return [
    'id' => Str::uuid()->toString(),
    'user_id'=>$user_id,
    'no_hp' => $this->faker->phoneNumber,
    'password' => bcrypt('password123'),
    'first_name' => $this->faker->firstName,
    'last_name' => $this->faker->lastName,
    'email' => $this->faker->unique()->safeEmail,
    'country' => $this->faker->country,
    'type' => $type,
    'password_text' => 'password123',
    'active' => $this->faker->boolean,
    'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
    'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
    'deleted_at' => null,
 ];
}
}
