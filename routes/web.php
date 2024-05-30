<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use \App\Models\User;
use \App\Models\Role;
use \App\Models\Country;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//
//
//    return view('welcome');
//});



//Route::get("/posts/{title}/{id}", [PostsController::class, "index"]);
//Route::resource('/posts', PostsController::class);
//
//Route::get("/contact", [PostsController::class, "contact"]);
//Route::get("/message/{name}", [PostsController::class, "greet_person"]);
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//Route::get("/insert", function (){
//  $rowsAffected = DB::insert("insert into posts(title, content) values (?, ?)", ["Laravel is the next big thing", "Laravel is the best thing to happen to PHP"]);
//
//  return $rowsAffected;
//});
//
//Route::get("/select", function (){
//    $posts = DB::select("select * from posts");
//
//    return $posts;
//});
//
//Route::get("select/{id}", function ($id){
//    $posts= DB::select("select * from posts where id = ?", [$id]);
//
//    foreach ($posts as $post){
//       echo $post->title." => ".$post->content;
//    }
//});
//
//Route::get("/update/{id}", function ($id){
//   $affectedRows = DB::update("update posts set title ='Updated title' where id = ?", [$id]);
//
//   return $affectedRows;
//});
//
//Route::get("/delete/{id}", function ($id){
//    $affectedRows = DB::delete("delete from posts where id=?", [$id]);
//    return $affectedRows;
//});


//ELOQUENT ORM

//Route::get("/read", function (){
//    $posts = Post::all();
//
//    foreach ($posts as $post){
//        echo ("<h1>".$post->title."</h1>");
//    }
//});

//Route::get("find/{id}", function ($id){
//    $post = Post::all()->firstWhere("id", "=", $id);
//
//    return  $post;
//});

//Route::get("/findwhere", function (){
//    $posts = Post::where("id", "=", 3)->orderBy("id", "ASC")->take(1)->get();
//
//    return $posts;
//});


//Route::get("/findmore", function (){
////    $posts =Post::findOrFail(1);
////
////    return $posts;
//
//    $post = Post::where("users_count", "<", 50 )->firstOrFail();
//
//
//});

//Route::get("/basicinsert", function (){
//
//    $post  = new Post();
//    $post->title = "I am learning laravel";
//    $post->content="So far so good";
//
//    $post->save();
//
//    return $post;
//
//});

//Route::get("/basicupdate", function (){
//    $post = Post::find(7);
//    $post->title="Updated title";
//
//    $post->save();
//    return $post;
//});


//Route::get("/create", function (){
//    $created = Post::create([
//       "title"=>"The create method",
//       "content"=>"Wao, I am learning alot with Edwin"
//    ]);
//
//    return $created;
//});
//
//Route::get("/upsert", function (){
//   $upserted = Post::upsert([
//        ['title'=>"This is the first tile",'content'=>"Post content", "id"=>3],
//        ['title'=>"This updates post with the id of 7",'content'=>'updated content', 'id'=>7]
//    ], ['id'], ['title']);
//
//   return $upserted;
//});

//Route::get("/delete", function (){
//
//   $post = Post::find(3);
//    $post->delete();
//    return $post;
//});

//Route::get("/delete2", function (){
//   Post::destroy([5,6]);
//});

//Route::get("/softdelete", function (){
//    $deleted = Post::find(18);
//
//    return $deleted;
//});

//Route::get("/readsoftdelete", function (){
//    $deleted = Post::onlyTrashed()->get();
//    return $deleted;
//});


//Route::get("/restoresoftdelete", function (){
//    $post = Post::withTrashed()->where('id', 17)->restore();
//
//    return $post;
//});

//One to One relationship
//Route::get("/user/{id}/post", function (string $id){
//    return User::find($id)->post;
//});
//
//Route::get("/post/{id}/user", function (string $id){
//        return Post::find($id)->user;
//});

//Route::get('/posts', function (){
//    $user = User::find(1);
//
//    foreach ($user->posts as $post){
//        echo $post->title."<br/>";
//    }
//
//});

//Route::get("/user/{id}/roles", function (string $id){
//    return User::find($id)->roles()->orderBy('id', 'DESC')->get();
//});
//
//Route::get("/role/{id}/users", function (string $id){
//    return Role::find($id)->users;
//});
//
//Route::get("user/pivot",function (){
//    $user  = User::find(1);
//    foreach ($user->roles  as $role){
//    echo $role->pivot->created_at;
//    }
//});

//Route::get("/user/country", function (){
//    return Country::find(1)->posts;
//});

//Route::get('/user/{id}', function ($id){
//
//    $user = User::find($id);
//
//    return $user->photo;
//
//});

Route::get("/post/{id}/comments", function ($id){
    $post = Post::find($id);

    return $post->comments;
});

Route::get("/comment", function (){
    $comment = \App\Models\Comment::find(1);

    return $comment->commentable;
});


Route::get("post/{id}/tags", function ($id){
    $post = Post::find($id);

    return $post->tags;
});

Route::get("tags", function (){
    $tag = \App\Models\Tag::find(3);

    return $tag->posts;
});
require __DIR__.'/auth.php';
