<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // l_1_11
//        $query = DB::insert("INSERT INTO `posts` (title, content) VALUES (?, ?)", ['Статья 4', 'Описание статьи 4']);
//        var_dump($query);

//        DB::update("UPDATE `posts` SET created_at = ?, updated_at = ? WHERE created_at IS NULL OR updated_at IS NULL", [NOW(), NOW()]);

//        DB::delete("DELETE FROM `posts` WHERE id = ?", [4]);

//        DB::beginTransaction();
//        try {
//            DB::update("UPDATE `posts` SET created_at = ? WHERE created_at IS NULL", [NOW()]);
////            DB::update("UPDATE `posts` SET updated_at = ? WHERE updated_at2 IS NULL", [NOW()]);
//            DB::update("UPDATE `posts` SET updated_at = ? WHERE updated_at IS NULL", [NOW()]);
//            DB::commit();
//        } catch (\Exception $e) {
//            DB::rollBack();
//            echo $e->getMessage();
//        }
//
//
//        $posts = DB::select("SELECT * FROM `posts`");
//        $posts = DB::select("SELECT * FROM `posts` WHERE id > :id", ['id' => 2]);
////        var_dump($posts);
//        return $posts;

        // l_1_9
//        dump($_ENV['DB_HOST']);
//        dump(env('DB_HOST', 'localhost'));
//        dump($_ENV);
//        dump(config());
//        dump(config('app.timezone'));
//        dump(config('database.connections.mysql.database'));

        // l_1_12
//        $data = DB::table('country')->get();
//        $data = DB::table('country')->limit(5)->get();
//        $data = DB::table('country')->select('Code', 'Name')->limit(5)->get();
//        $data = DB::table('country')->select(['Code', 'Name'])->limit(5)->get();
//        $data = DB::table('country')->select('Code', 'Name')->first();
//        $data = DB::table('country')->select('Code', 'Name')->orderBy('Code', 'desc')->first();

//        $data = DB::table('city')->select('ID', 'Name')->find(2);
//        $data = DB::table('city')->select('ID', 'Name')->where('id', 2)->get();
//        $data = DB::table('city')->select('ID', 'Name')->where('id', '=', 2)->get();
//        $data = DB::table('city')->select('ID', 'Name')->where('id', '<', 5)->get();
//        $data = DB::table('city')->select('ID', 'Name')->where([
//            ['id', '>', 1],
//            ['id', '<', 5],
//        ])->get();
//        $data = DB::table('city')->where('id', '<', 5)->value('Name');
//        $data = DB::table('country')->limit(10)->pluck('Name');

//        $data = DB::table('country')->count();
//        $data = DB::table('country')->max('Population');
//        $data = DB::table('country')->min('Population');
//        $data = DB::table('country')->sum('Population');
//        $data = DB::table('country')->avg('Population');

//        $data = DB::table('city')->select('CountryCode')->distinct()->get();
//
//        $data = DB::table('city')->select('city.ID', 'city.Name AS city_name', 'country.Code', 'country.Name AS country_name')->limit(10)
//            ->join('country', 'city.CountryCode', '=', 'country.Code')
//            ->orderBy('city.ID')
//            ->get();
//        dd($data);

        // l_1_13
        $post_model = new PostModel();
        $post_model->title = 'Статья 2';
//        $post_model->content = 'Lorem ipsum 1';
        $post_model->save();

        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function test()
    {
        return __METHOD__;
    }
}
