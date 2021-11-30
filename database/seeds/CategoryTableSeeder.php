<?php

use App\Models\Author;
use Faker\Generator as Faker;
use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::insert([

            "name" => "mehmet hamza ay",
            "email" => "hamzaininal@gmail.com",
            "password" => Hash::make("12345678"),
        ]);
        Setting::insert([
            "logo" => "/images/logo/footer_logo.png",
            "braking" => "Parquet Courts on Resisting Nihilism & Why Tourism in Dubai is booming the world.",
            "facebook" => "https://tr-tr.facebook.com/",
            "twitter" => "https://twitter.com/",
            "pinterest" => "https://tr.pinterest.com/",
            "google" => "https://www.google.com.tr/",
            "ad1" => "/images/banner/sidebar-banner1.jpg",
            "ad2" => "images/banner/banner4.png",

        ]);
        $authorId = Author::insertGetId([
            "name" => "Elon Musk",
            "twitter" => "elonmusk",
            "facebook" => "TheElonmusk",
            "google" =>  null,
            "linkedin" => "spacex",
            "cinsiyet" => "erkek",
            "image"  => "/images/avater/author2.png",
            "statement" => "Zamansan geçişlerin getirdiği eksiliklerin ve  hataların değişmez sıkıtısı genel problemdir",
        ]);

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
                        // "image" => $faker -> imageUrl($width = 640, $height = 480),
                        "image" => "https://perezcarreno.com/wp-content/uploads/2013/01/lorempixel-image.jpeg",
                        "created_at" => $dt  ,
                        "author_id" => $authorId,



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
