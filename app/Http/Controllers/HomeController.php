<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // l_1_11
//        $query = DB::insert("INSERT INTO `posts` (title, content) VALUES (?, ?)", ['Статья 4', 'Описание статьи 4']);
//        var_dump($query);

//        DB::update("UPDATE `posts` SET created_at = ?, updated_at = ? WHERE created_at IS NULL OR updated_at IS NULL", [NOW(), NOW()]);

//        DB::delete("DELETE FROM `posts` WHERE id = ?", [4]);

        DB::beginTransaction();
        try {
            DB::update("UPDATE `posts` SET created_at = ? WHERE created_at IS NULL", [NOW()]);
//            DB::update("UPDATE `posts` SET updated_at = ? WHERE updated_at2 IS NULL", [NOW()]);
            DB::update("UPDATE `posts` SET updated_at = ? WHERE updated_at IS NULL", [NOW()]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }


        $posts = DB::select("SELECT * FROM `posts`");
        $posts = DB::select("SELECT * FROM `posts` WHERE id > :id", ['id' => 2]);
//        var_dump($posts);
        return $posts;

        // l_1_9
        dump($_ENV['DB_HOST']);
        dump(env('DB_HOST', 'localhost'));
        dump($_ENV);
        dump(config());
        dump(config('app.timezone'));
        dump(config('database.connections.mysql.database'));
        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function test()
    {
        return __METHOD__;
    }
}
