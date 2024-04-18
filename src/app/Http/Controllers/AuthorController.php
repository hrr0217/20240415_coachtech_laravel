<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    //データ一覧ページ
    public function index()
    {
        $authors = Author::all();
        return view('index',['authors' => $authors]);
    }
    //データ追加用ページ
    public function add(){
        return view('add');
    }
    //データ追加機能
    public function create(Request $request){
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }
    //データ編集ページ
    public function edit(Request $request){
        $author = Author::find($request->id);
        return view('edit',['form' => $author]);
    }
    //更新機能
    public function update(Request $request){
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }
    //データ削除用ページ
    public function delete(Request $request){
        $author = Author::find($request->id);
        return view('delete',['author' => $author]);
    }
    //削除機能
    public function remove(Request $request){
        Author::find($request->id)->delete();
        return redirect('/');
    }
}