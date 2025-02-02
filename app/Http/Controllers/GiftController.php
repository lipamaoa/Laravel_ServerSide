<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\gift;


class GiftController extends Controller
{

    function getAllGifts(){
        $gifts = $this->getGifts();

      
      
        return view('gifts.gifts', compact('gifts'));
      }  
    
    

    function getGifts()
    {
        $gifts = DB::table('gifts')
            ->join('users', 'gifts.user_id', '=', 'users.id')
            ->select('gifts.id', 'gifts.giftName', 'gifts.priceExpected', 'gifts.amountSpent', 'users.name as user_name')
            ->get();

            foreach ($gifts as $gift) {
                $gift->difference = $gift->priceExpected - $gift->amountSpent;

                
           
            }
        return $gifts;
    }

    function getGiftById($id)
    {
        $gift = DB::table('gifts')
            ->join('users', 'gifts.user_id', '=', 'users.id')
            ->select('gifts.id', 'gifts.giftName', 'gifts.priceExpected', 'gifts.amountSpent', 'users.name as user_name')
            ->where('gifts.id', $id)
            ->first();

        // dd($gift);
       
        return view('gifts.gift_view', compact('gift'));
    }

    function deleteGiftFromDB($id)
    {
        DB::table('gifts')->where('id', $id)->delete();
        return back();
    }

    function addGiftForm()
    {
        $usersSelection = DB::table('users')->select('id', 'name')->get();

        return view('gifts.add_gift', compact('usersSelection'));
    }

    function addGiftIntoDB(Request $request)
    {
        // dd($request->all());

      
      $request->validate([
            'giftName' => 'required|string|min:3',
            'priceExpected' => 'required|integer',
            'amountSpent' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        gift::insert([
            'giftName' => $request->giftName,
            'priceExpected' => $request->priceExpected,
            'amountSpent' => $request->amountSpent,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('gifts')->with('message', 'Gift added successfully!');
    }


    public function updateGiftForm($id){
    $gift = DB::table('gifts')->where('id', $id)->first();
    $usersSelection = DB::table('users')->select('id', 'name')->get();

    return view('gifts.update_gift', compact('gift', 'usersSelection'));
}



public function updateGift(Request $request, $id)
{
    $request->validate([
        'giftName' => 'required|string|min:3',
        'priceExpected' => 'required|integer',
        'amountSpent' => 'required|integer',
        'user_id' => 'required|integer',
    ]);

    DB::table('gifts')->where('id', $id)->update([
        'giftName' => $request->giftName,
        'priceExpected' => $request->priceExpected,
        'amountSpent' => $request->amountSpent,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('gifts')->with('message', 'Gift updated successfully!');
}

}