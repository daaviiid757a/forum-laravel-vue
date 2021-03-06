<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Answer;
use App\User;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->delete();
        DB::table('users')->delete();
        DB::table('questions')->delete();

        factory(User::class, 3)->create()->each(function ($u) {
            $u->questions()->saveMany(
                factory(Question::class, rand(1, 10))->make()
            )->each(function ($q) {
                $q->answers()->saveMany(factory(Answer::class, rand(1, 5))->make());
            });
        });
    }
}
