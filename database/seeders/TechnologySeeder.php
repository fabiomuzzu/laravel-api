<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = [
            "HTML",
            "CSS",
            "JavaScript",
            "SCSS",
            "PHP",
            "Laravel",
            "Phyton",
        ];

        foreach ($tecnologies as $item) {
            
            $technology = New Technology();

            $technology->name = $item;
            $technology->slug = Str::slug($item, '-');
            
            $technology->save();
        }
    }
}
