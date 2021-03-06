<?php

namespace App\Http\Controllers;

use App\Books;
use App\Orders;
use App\Storeinfo;
use Illuminate\Http\Request;
use JWTAuth;

class ProductController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
	}
	public function index()
	{
	    return $this->user
	        ->books()
	        ->paginate(15)
			->toArray();
	}
	public function show($bname)
	{
		$input = $this->user->books()->where('bname','LIKE','%'.$bname.'%')->paginate(15)->toArray();
    	if (!$input) {
    		return response()->json([
	            'success' => true,
	            'message' => 'Sorry, book with name ' . $bname . ' cannot be found'
	        ]);
    	}

    	return $input;
	    
	}
	public function store(Request $request)
	{
	    $this->validate($request, [
			'bname' => 'required',
			'ISBN' => 'required',
			'author' => 'required',
			'role' => 'required|integer',
			'pub_year' => 'required|integer',
			'publisher' => 'required',
			'img_s' => 'required',
	        'img_m' => 'required',
	        'img_l' => 'required',
			'quantity' => 'required|integer',
			'price' => 'required',
	    ]);

	    $book = new Books();
	    $book->bname = $request->bname;
	    $book->ISBN = $request->ISBN;
	    $book->author = $request->author;
	    $book->role = $request->role;
	    $book->pub_year = $request->pub_year;
	    $book->publisher = $request->publisher;
	    $book->img_s = $request->img_s;
	    $book->img_m = $request->img_m;
	    $book->img_l = $request->img_l;
	    $book->price = $request->price;
	    $book->quantity = $request->quantity;

	    if ($this->user->books()->save($book))
	        return response()->json([
	            'success' => true,
	            'book' => $book
	        ]);
	    else
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, book could not be added'
	        ]);
	}
	public function update(Request $request)
	{
		$book = $this->user->books()->find($request->id);

		if (!$book) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, book with id ' . $id . ' cannot be found'
	        ]);
	    }

	    $updated = $book->fill($request->all())->save();
        
	    if ($updated) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, book could not be updated'
	        ]);
	    }
	
	}
	public function destroy(Request $request)
	{
	    $book = $this->user->books()->find($request->id);

	    if (!$book) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, book with id ' . $id . ' cannot be found'
	        ]);
	    }

	    if ($book->delete()) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Book could not be deleted'
	        ]);
	    }
	}
	public function business()
	{
		$uid = $this->user->id;
		return Orders::join('books', 'orders.bid', '=', 'books.id')
			->where('books.user_id', '=', $uid)
			->select('orders.*', 'books.bname')
	        ->paginate(15)
			->toArray();
	}
	public function shiplist()
	{
		$uid = $this->user->id;
		return Orders::join('books', 'orders.bid', '=', 'books.id')
			->where([
				['books.user_id', '=', $uid],
				['orders.role', '=', '0'],
			])
			->select('orders.*', 'books.bname')
	        ->paginate(15)
			->toArray();
	}
	public function checkship(Request $request)
	{
		$order = Orders::find($request->id);
		
		if (!$order) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, order with id ' . $request->id . ' cannot be found'
	        ]);
	    }

	    $updated = $order->update(['role' => 1]);;
        
	    if ($updated) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, order could not be checked'
	        ]);
	    }
	}
	public function allbusiness()
	{
		return Storeinfo::orderBy('created_at', 'desc')
			->paginate(15)
			->toArray();
		
	}

	public function storebusiness(Request $request)
	{
		return Orders::join('books', 'orders.bid', '=', 'books.id')
			->join('storeinfos', 'storeinfos.user_id', '=', 'books.user_id')
			->where('storeinfos.id', '=', $request->id)
			->select('orders.*', 'books.bname', 'books.user_id as seller_id', 'storeinfos.sname')
	        ->paginate(15)
			->toArray();
	}
}
