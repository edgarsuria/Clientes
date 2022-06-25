<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();

        return view('admin.customers.index',compact('customers'));
    }


    public function create()
    {

        return view('admin.customers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:customers',

        ]);
        $customer=Customer::create($request->all());
        $report=Report::create([
            'user_id'=>auth()->user()->id,
            'description'=>'Agrego cliente '.$customer->id,
        ]);

        Alert::success('¡Listo!', 'El cliente se creo con éxito');
        return redirect()->route('admin.customers.index');



    }


    public function show($id)
    {
        //
    }


    public function edit(Customer $customer)
    {
       return view('admin.customers.edit',compact('customer'));
    }

    public function update(Customer $customer, Request $request)
    {
        $request->validate([
            'name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:customers,email,'.$customer->id,

        ]);

        $customer->update($request->all());
        $report=Report::create([
            'user_id'=>auth()->user()->id,
            'description'=>'Actualizo cliente '.$customer->id,
        ]);

        Alert::success('¡Listo!','El cliente se actualizó con éxito');
        return redirect()->route('admin.customers.edit',compact('customer'));
    }


    public function destroy(Customer $customer)
    {
        $report=Report::create([
            'user_id'=>auth()->user()->id,
            'description'=>'Eliminó cliente '.$customer->id,
        ]);

        $customer->delete();
        Alert::success('¡Listo!','El cliente se eliminó con éxito');
        return redirect()->route('admin.customers.index');
    }
}
