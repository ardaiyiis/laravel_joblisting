<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();
        
        // every job created will have these three tags
        Job::factory(20)->hasAttached($tags)->create(new Sequence([
            'featured'=> false,
            'schedule'=> 'Full Time'
        ],[
            'featured'=> true,
            'schedule'=> 'Part Time'
        ])); 
        //Sequence will put one of these in every sequence
    
    }
}
