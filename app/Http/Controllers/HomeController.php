<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Helper;
use Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $transactions = $user->transactions()->orderBy('created_at', 'DESC')->take(5)->get();

        return view('company.home')->with(['transactions' => $transactions]);
    }

    /**
     * Show the application transactions list
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function transactions(Request $request)
    {
        $request->validate([
            'q' => 'nullable|integer',
            'paginate' => 'nullable|integer',
            'orderBy' => [
                'nullable',
                Rule::in(['DESC', 'ASC']),
            ],
        ]);

        $user = Auth::user();

        $paginate = 5;
        $orderBy = 'DESC';
        $transactions = $user->transactions();

        if (request()->get('q') != null) {
            $q = request()->get('q');
            $transactions->where("id", "LIKE", "%" . $q . "%");
        }

        if (request()->get('paginate') != null) {
            $paginate = request()->get('paginate');
        }

        if (request()->get('orderBy') != null) {
            $orderBy = request()->get('orderBy');
        }

        $transactions = $transactions->orderBy('created_at', $orderBy)->paginate($paginate);
        return view('company.transactions.index')->with(['transactions' => $transactions]);
    }

    /**
     * Show the application balance top-up page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function balance()
    {
        return view('company.balance');
    }

    /**
     * Balance top-up request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function balanceTopUp(Request $request)
    {
        $user = Auth::user();

        Transaction::create([
            'user_id'   => $user->id,
            'paid_by'   => $request->paid_by,
            'currency'  => $request->currency,
            'rate'      => Helper::getCurrencyRate($request->currency),
            'amount'    => $request->amount,
            'type'      => 'IN',
            'note'      => $request->note,
            'done_at'   => Carbon::now()->timestamp
        ]);
        return redirect('/home');
    }
}
