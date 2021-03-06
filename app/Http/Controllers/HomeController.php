<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\PostModel;
use App\Models\Rubric;
use App\Models\Tag;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        // l_1_36 (Logging)
        Log::warning('Test');
        Debugbar::warning($request);

        // l_1_24 (Cookie)
//        Cookie::queue('test', 'Test cookie', 5);
//        Cookie::queue(Cookie::forget('test'));
//        dump(Cookie::get('test'));
//        dump($request->cookie('test'));

        // l_1_20
//        $posts = PostModel::query()->orderBy('id', 'desc')->get();

        // l_1_24 (Cache)
//        Cache::put('key', 'Value', 60);
//        Cache::put('key', 'Value');
//        Cache::forever('key', 'Value');
//        if (Cache::has('posts')) {
//            $posts = Cache::get('posts');
//        } else {
//            $posts = PostModel::query()->orderBy('id', 'desc')->get();
//            Cache::put('posts', $posts);
//        }

//        Cache::put('key', 'Value', 300);
//        dump(Cache::pull('key'));
//        Cache::forget('key');
//        dump(Cache::get('key'));
//        Cache::flush();

        // l_1_33 (Pagination)
        $posts = PostModel::query()->orderBy('created_at', 'desc')
            ->paginate(3);
//            ->simplePaginate(3);

        $title = 'Home Page';

        return view('home', compact('title', 'posts'));
    }

    public function create()
    {
        $title = 'Create Post';
        $rubrics = Rubric::query()->pluck('title', 'id')->all();

        return view('create', compact('title', 'rubrics'));
    }

    public function store(Request $request)
    {
//        dump($request->input('title'));
//        dump($request->input('content'));
//        dd($request->input('rubric_id'));
//        dd($request->all());

        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer',
        ]);

//        $rules = [
//            'title' => 'required|min:5|max:100',
//            'content' => 'required',
//            'rubric_id' => 'integer',
//        ];
//        $rules = [
//            'title' => ['required', 'min:5', 'max:100'],
//            'content' => ['required'],
//            'rubric_id' => ['integer'],
//        ];
//        $messages = [
//            'title.required' => '?????????????????? ???????? ????????????????',
//            'title.min' => '?????????????? 5 ???????????????? ?? ????????????????',
//            'rubric_id.integer' => '???????????????? ?????????????? ???? ????????????',
//        ];
//
//        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        PostModel::query()->create($request->all());

        // l_1_23
        $request->session()->flash('success', '???????????? ??????????????????');

        return redirect()->route('home');
    }

    public function l_1_23(Request $request)
    {
        // l_1_23
        $request->session()->put('test', 'Test value');
        session(['cart' => [
            ['id' => 1, 'title' => 'Product 1',],
            ['id' => 2, 'title' => 'Product 2',],
        ]]);
//        $request->session()->flash('success', '?????????????????? ????????????????????.');

        dump(session('test'));
        dump(session('cart')[1]['title']);
        dump($request->session()->get('cart')[0]['title']);

//        $request->session()->push('cart', ['id' => 3, 'title' => 'Product 3',]);

//        dump($request->session()->pull('test'));
        $request->session()->forget('test');
//        $request->session()->flush();

//        dump($request->session()->all());
        dump(session()->all());


        $posts = PostModel::query()->orderBy('id', 'desc')->get();
        $title = 'Home Page';

        return view('home', compact('title', 'posts'));
    }

    public function l_1_18()
    {
        // l_1_18
        $title = 'Home Page';
        $hi = '<h1>Home Page</h1>';
        $data_1 = range(1, 20);
        $data_2 = [
            'title' => 'Title',
            'content' => 'Content',
            'keywords' => 'Keywords',
        ];

        return view('home', compact('title', 'hi', 'data_1', 'data_2'));
    }

    public function l_1_16()
    {
        // l_1_16
//        $rubric = Rubric::query()->find(1);
//        $posts = Rubric::query()->find(1)->posts()
//            ->select('title')->where('id', '>', '2')->get();
//        dump($rubric->title, $rubric->posts, $posts);

//        $posts = PostModel::query()->with('rubric')->where('id', '>', 1)->get();
//
//        foreach ($posts as $post) {
//            dump($post->title, $post->rubric->title);
//        }

        $post = PostModel::query()->find(2);
        dump($post->title);
        foreach ($post->tags as $tag) {
            dump($tag->title);
        }

        $tag = Tag::query()->find(1);
        dump($tag->title);
        foreach ($tag->posts as $post) {
            dump($post->title);
        }

        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function l_1_15()
    {
        // l_1_15
//        $post = PostModel::query()->find(2);
//        dump($post->title, $post->rubric->title);
//        $rubric = Rubric::query()->find(3);
//        dump($rubric->title, $rubric->post->title);

        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function l_1_14()
    {
        // l_1_14
//        $data = Country::all();
//        $data = Country::limit(5)->get();
//        $data = Country::query()->limit(5)->get();
//        $data = City::query()->find(5);
//        $data = Country::query()->find('AGO');
//        dd($data);

//        $post_model = new PostModel();
//        $post_model->title = 'Post 4';
//        $post_model->content = 'Lorem ipsum 4';
//        $post_model->save();

//        PostModel::query()->create(['title' => 'Post 5', 'content' => 'Lorem ipsum 5']);
//        $post_model = new PostModel();
//        $post_model->fill(['title' => 'Post 7', 'content' => 'Lorem ipsum 7']);
//        $post_model->save();

//        $post_model = PostModel::query()->find(6);
//        $post_model->content = 'Lorem ipsum 7.1';
//        $post_model->save();

//        PostModel::query()->where('id', '>', 3)->update(['updated_at' => NOW()]);

//        $post_model = PostModel::query()->find(6);
//        $post_model->delete();

//        PostModel::destroy(4);
//        PostModel::destroy([4, 5]);
//        PostModel::destroy(4, 5);

        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function l_1_13()
    {
        // l_1_13
        $post_model = new PostModel();
        $post_model->title = '???????????? 2';
//        $post_model->content = 'Lorem ipsum 1';
        $post_model->save();

        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function l_1_12()
    {
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
        $data = DB::table('city')->select('city.ID', 'city.Name AS city_name', 'country.Code', 'country.Name AS country_name')->limit(10)
            ->join('country', 'city.CountryCode', '=', 'country.Code')
            ->orderBy('city.ID')
            ->get();
        dd($data);


        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function l_1_11()
    {
        // l_1_11
//        $query = DB::insert("INSERT INTO `posts` (title, content) VALUES (?, ?)", ['???????????? 4', '???????????????? ???????????? 4']);
//        var_dump($query);
//
//        DB::update("UPDATE `posts` SET created_at = ?, updated_at = ? WHERE created_at IS NULL OR updated_at IS NULL", [NOW(), NOW()]);
//
//        DB::delete("DELETE FROM `posts` WHERE id = ?", [4]);
//
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


        $posts = DB::select("SELECT * FROM `posts`");
        $posts = DB::select("SELECT * FROM `posts` WHERE id > :id", ['id' => 2]);
//        var_dump($posts);
        return $posts;


        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function l_1_9()
    {
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
