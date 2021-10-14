<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'bisnis' => 'Bisnis', 
            'edukasi' => 'Edukasi', 
            'konferensi' => 'Konferensi', 
            'konser' => 'Konser', 
            'seminar' => 'Seminar', 
            'theater' => 'Theater', 
            'ui/ux' => 'UI/UX', 
            'webinar' => 'Webinar'];

        foreach($categories as $label => $name) { 
            $category = Category::create([
                'label' => $label,
                'name' => $name,
            ]);
        }
    }
}
