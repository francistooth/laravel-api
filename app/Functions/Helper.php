<?php

namespace App\Functions;

use App\Models\Project;
use Illuminate\Support\Str;

class Helper{

    public static function generateSlug($string, $model){


        $slug = Str::slug($string, '-');
        $original_slug = $slug;


        $exists = Project::where('slug', $slug)->first();


        $c = 1;


        while($exists){
            $slug = $original_slug . '-' . $c;
            $exists = Project::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
