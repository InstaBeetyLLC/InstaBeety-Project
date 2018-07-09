<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\ProductPromoter;
use App\Store;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accounts = Account::all();

        return view('accounts.index', compact('accounts'));
    }

    public function accountPromoters(Request $request)
    {
        $promoters = ProductPromoter::where('account_id', $request->account_id)->get();
        return view('accounts.account_promoters', compact('promoters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $stores = Store::all();
        return view('accounts.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(AccountRequest $request)
    {
        $account = new Account();

        $account->name = $request->input("name");
        $account->store_id = $request->input("store_id");

        $account->save();

        return redirect()->route('accounts.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $account = Account::findOrFail($id);

        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $account = Account::findOrFail($id);
        $stores = Store::all();

        return view('accounts.edit', compact('stores', 'account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(AccountRequest $request, $id)
    {
        $account = Account::findOrFail($id);

        $account->name = $request->input("name");
        $account->store_id = $request->input("store_id");
        $account->save();

        return redirect()->route('accounts.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('accounts.index')->with('message', 'Item deleted successfully.');
    }

}
