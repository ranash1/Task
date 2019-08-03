<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function postCreate(Request $request)
        {
            $this->validate($request,[
                'name' => 'required',
                'quantity' =>'required|numeric',
                'price'=>'required|numeric',
            ]);
            try {
                $productInfo = Storage::disk('local')->exists('products.json') ? json_decode(Storage::disk('local')->get('products.json')) : [];
                $inputData = $request->only(['name', 'quantity', 'price']);
                $inputData['datetime_submitted'] = date('Y-m-d H:i:s');
                array_push($productInfo,$inputData);
                Storage::disk('local')->put('products.json', json_encode($productInfo));
                return redirect()->back();
            } catch(Exception $e) {
                return ['error' => true, 'message' => $e->getMessage()];
            }

        }

    public function getProducts()
    {
       try {
            $productInfo = Storage::disk('local')->exists('products.json') ? json_decode(Storage::disk('local')->get('products.json')) : [];
            $total = 0;
            foreach ($productInfo as $obj) {
                $total = $total + $obj->price * $obj->quantity;
           }
           return view('welcome',['products'=> $productInfo , 'total' => $total]);
        } catch(Exception $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }


}
