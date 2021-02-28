<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;
use App\Folder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request){
        //フォルダモデルのインスタンスを作成
        $folder = new Folder();
        //タイトルに入力値を代入する
        $folder->title = $request->title;

        //ユーザーに紐付けて保存
        Auth::user()->folders()->save($folder);

        //インスタンスの状態をデータベースに書き込む
        $folder->save();

        return redirect()->route("tasks.index",[
            'id' => $folder->id,
        ]);

    }
}
