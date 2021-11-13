<?php
use Faker\Generator as Faker;
use App\Models\Category;
use App\Models\Contents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dt = Carbon::now();
        $categories = [
            "LıfeStyle" ,"Technology" ,"Vıdeo" ,"Travel" , "Features"
        ];
        $categoriesname = [

            "LıfeStyle" => array("LıfeStyle1","LıfeStyle2","LıfeStyle3"),
            "Technology" => array(),
            "Vıdeo" => array(),
            "Travel" => array(),
            "Features" => array("Features1","Features2","Features3")
        ];
        $categoriestype = [

            "LıfeStyle" => "tabs",
            "Technology" => "one",
            "Vıdeo" => "panel",
            "Travel" => "one",
            "Features" => "navdown"
        ];


        foreach ($categories as  $categoriname ) {

            $categoryId = Category::insertGetId([
                "name" => $categoriname,
                "slug" => Str::slug($categoriname),
                "pid" => 0,

                "type" => $categoriestype[$categoriname],
                "created_at" => $dt  ,

            ]) ;

            foreach  ($categoriesname[$categoriname] as $child) {
                $categoryId2 = Category::insertGetId([
                    "name" => $child,
                    "slug" => Str::slug($child),
                    "pid" => $categoryId,
                    "created_at" => $dt  ,



                ]) ;

                for ($i=0; $i < 4 ; $i++) {
                    $title = $faker->realText(30);
                    $contentId =Contents::insertGetId([
                        "title" => $title,
                        "slug" => Str::slug($title),
                        "content" => $faker ->realText(1000),
                        "image" => $faker -> imageUrl($width = 640, $height = 480),
                        "created_at" => $dt  ,



                    ]);

                    DB::table("caco")->insert([
                        "category_id" => $categoryId2,
                        "contents_id" => $contentId,
                        "created_at" => $dt  ,


                    ]);
                }

            }
        }
    }
}
