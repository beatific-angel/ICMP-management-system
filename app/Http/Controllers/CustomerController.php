<?php
/*
 * Created by Beatific Angel
 *  20222/3/22 11.00am
 * */
namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Group;
use App\Models\Customer;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'short_name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postcode' => 'required'
        ]);

        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $shortname = $request->input('short_name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $postcode = $request->input('postcode');

        $customer = new Customer([
            'first_name' => $firstname,
            'last_name' => $lastname,
            'short_name' => $shortname,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'postcode' => $postcode
        ]);

        $customer->save();

        return redirect()->back()->with("success", "New Customer has been created.");
    }

    public function edit($id)
    {
        $customer = Customer::where('id', '=', $id)->get();
        return view('customers.edit', ['customer' => $customer[0]]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'short_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required'
        ]);

        $customerid = $request->input('customerid');
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $shortname = $request->input('short_name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $postcode = $request->input('postcode');


        $customer = Customer::findOrFail($customerid);

        $customer->first_name = $firstname ;
        $customer->last_name = $lastname;
        $customer->short_name = $shortname;
        $customer->phone = $phone;
        $customer->email = $email;
        $customer->address = $address;
        $customer->city = $city;
        $customer->state = $state;
        $customer->postcode = $postcode;
        $customer->save();

        return redirect()->back()->with("success", "The Customer has been updated.");
    }

    public function delete($id)
    {
        $customer_query = "delete from customers where id = '$id'";
        $customer_query_res = DB::select($customer_query);
        return redirect()->back()->with("success", "The Customer has been deleted.");
    }
}
