<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=Expense::orderBy('id','desc')->paginate(20);
        return view('admin.expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	"date_from"=>"required",
			"date_to"=>"required"
		]);

        $expense=new Expense();
        $expense->campus_id=Session::get('campus_id');
        $expense->date_from=$request->date_from;
        $expense->date_to=$request->date_to;
        $expense->expenses=json_encode($request->expenses);
        if($expense->save()){
        	return back()->with('message','Expense Added');
		}else{
        	return back()->with('hasError','Error Occurred');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
    	$campus=Campus::find(Session::get('campus_id'));
        return view('admin.expenses.show',compact('expense','campus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('admin.expenses.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
		$request->validate([
			"date_from"=>"required",
			"date_to"=>"required"
		]);


		$expense->date_from=$request->date_from;
		$expense->date_to=$request->date_to;
		$expense->expenses=json_encode($request->expenses);
		if($expense->save()){
			return back()->with('message','Expense Updated');
		}else{
			return back()->with('hasError','Error Occurred');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
