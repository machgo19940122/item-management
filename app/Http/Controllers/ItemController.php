<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        $items = Item::where('items.status', 'active')
            ->sortable()
            ->select()
            ->get();

            $season = [
                "1"=>"SS",
                "2"=>"FW",];

            $type = [
                "1"=>"Mens",
                "2"=>"Womens",
                "3"=>"Unisex"];

            $category = [
                "1"=>"Outer",
                "2"=>"Bottoms",
                "3"=>"Shirts",
                "4"=>"Others",];


      return view('item/index', [
        'items'=>$items,
        'season'=>$season,
        'type'=>$type,
        'category'=>$category,
      ]);


        // return view('item.index', compact('items'));
    }


    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'season' => 'required',
                'type' => 'required',
                'category' => 'required',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'season' => $request->season,
                'category'=>$request->category,
                'detail'=>$request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }


    // 商品削除
    public function delete(Request $request,int $item_id){
        // urlから受け取ったidをパラメーターとしてDBから一件取得し、消去
            Item::where('id',$item_id)->delete();
            return redirect('/items');
    }

    //編集ページの表示
        //編集画面の表示 
        public function get_edit (int $item_id){
            
            $item= Item::find($item_id);
      
            return view('item/edit_item', [

              'item'=>$item,
            ]);
      
          }

    //編集処理
    public function edit_item(int $item_id, request $request)
    {
        // urlから受け取ったidをパラメーターとしてDBから一件取得
        $item= Item::find($item_id);
        
        // //バリデーション
        $this->validate($request,[
            'name' => 'required|max:100',
            'season' => 'required',
            'type' => 'required',
            'category' => 'required',
        ]);

        // postされた要素とDBの要素入紐付け
        $item->name= $request->name;
        $item->category = $request->category;
        $item->type = $request->type;
        $item->season= $request->season;
        $item->detail = $request->detail;

        //保存したら遷移
        $item->save();
        return redirect('/items');
    }
}
