<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $num) {
            DB::table('comics')->insert([
                'shelf_id' => 1,
                'title' => "サンプルshlef {$num}",
                'release_date' => Carbon::now()->addDay($num),
                'purchase_status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
