<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Filters\ArticleFilter;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(){

        $categories = Category::all();
        $articles = Article::published()->limit(4);

        return view('home', compact('categories', 'articles'));
    }

    public function about_us(){

        return view('about_us');
    }

    public function contacts(){

        return view('contacts');
    }

    public function sendOrder(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($validator->passes()){

            $order = new Order();

            $order->name = $request->name;
            $order->email = $request->email;
            $order->comment = $request->comment;
            $order->products = json_decode($request->session()->get('favorites'));
            $order->save();

            return response()->json(['success'=> true, 'message' => trans('common.success_form')]);
        }
        else {
            return response()->json(['success'=> false, 'message' => $validator->errors()]);
        }

    }


    public function updateFavorite(Request $request){

        $id = Product::find($request->id);

        if($id){

            if($key = array_search($id->get('id'), $request->session()->get('favorites'))){
                $request->session()->pull('favorites.'.$key);
            }
            else {
                $request->session()->push('favorites', $id->get('id'));
            }

            $ids = $request->session()->get('favorites');
            $count  = count($ids);
            if($count > 0){
                $products = Product::whereIn('id', $ids)->get();
                $html =  view('partials.favorites', compact('products'));
                return response()->json(['success'=> true, 'count' => $count, 'message' => '', 'html' => $html]);
            }
            else {
                return response()->json(['success'=> true, 'message' => '', 'html' => '']);
            }

        }
        else {

            return response()->json(['success'=> false, 'message' => trans('common.product_not_found')]);
        }


    }

    public function articles(Request $request,ArticleFilter $filter){

        $articles = Article::published()->filter($filter)->paginate(6);
        if($request->ajax() && $request->has('filter') && $request->filter && !$request->has('page')){
            return response()->json([
                'fragments'=>[
                    'mainList'=>view('partials.articles_main',compact('articles'))->render()
                ]
            ]);
        }
        $tags = Tag::has('articles')->get();
        return view('articles', compact('articles','tags'));
    }


    public function article($slug){

        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::where('id', '!=', $article->id)->get();
        return view('article', compact('article', 'articles'));
    }
}
