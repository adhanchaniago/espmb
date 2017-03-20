<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

use Gate;
use App\Http\Requests;
use App\ItemCategory;
use App\Rating;
use App\TermOfPayment;
use App\Vendor;
use App\VendorType;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('Vendor Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        return view('vendor.material.vendor.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('Vendor Management-Create')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['vendortypes'] = VendorType::where('active', '1')->orderBy('vendor_type_name')->get();
        $data['itemcategories'] = ItemCategory::where('active','1')->orderBy('item_category_name')->get();
        $data['termofpayments'] = TermOfPayment::where('active','1')->orderBy('term_of_payment_name')->get();
        $data['ratings'] = Rating::where('active','1')->orderBy('rating_name')->get();
        return view('vendor.material.vendor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
        	'vendor_type_id' => 'required',
            'vendor_name' => 'required|max:100',
            'vendor_address' => 'required',
            'vendor_email' => 'required|unique:vendors,vendor_email|max:100',
            'vendor_phone' => 'digits_between:10, 14',
            'term_of_payment_id' => 'required',
            'term_of_payment_value' => 'numeric',
            'vendor_status' => 'required',
            'item_category_id[]' => 'array',
            'rating_id[]' => 'array',
        ]);

        $obj = new Vendor;
        $obj->vendor_type_id = $request->input('vendor_type_id');
        $obj->vendor_name = $request->input('vendor_name');
        $obj->vendor_address = $request->input('vendor_address');
        $obj->vendor_email = $request->input('vendor_email');
        $obj->vendor_phone = $request->input('vendor_phone');
        $obj->vendor_fax = $request->input('vendor_fax');
        $obj->vendor_note = $request->input('vendor_note');
        $obj->term_of_payment_id = $request->input('term_of_payment_id');
        $obj->term_of_payment_value = $request->input('term_of_payment_value');
        $obj->vendor_status = $request->input('vendor_status');
        $obj->active = '1';
        $obj->created_by = $request->user()->user_id;

        $obj->save();

        Vendor::find($obj->vendor_id)->ratings()->sync($request->input('rating_id'));
        Vendor::find($obj->vendor_id)->itemcategories()->sync($request->input('item_category_id'));

        $request->session()->flash('status', 'Data has been saved!');

        return redirect('vendor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Gate::denies('Vendor Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['vendor'] = Vendor::with('vendortype','termofpayment','itemcategories','ratings')->find($id);
        
        return view('vendor.material.vendor.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Gate::denies('Vendor Management-Update')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['vendor'] = Vendor::with('vendortype','termofpayment','itemcategories','ratings')->find($id);
        $data['vendortypes'] = VendorType::where('active', '1')->orderBy('vendor_type_name')->get();
        $data['itemcategories'] = ItemCategory::where('active','1')->orderBy('item_category_name')->get();
        $data['termofpayments'] = TermOfPayment::where('active','1')->orderBy('term_of_payment_name')->get();
        $data['ratings'] = Rating::where('active','1')->orderBy('rating_name')->get();

        return view('vendor.material.vendor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
        	'vendor_type_id' => 'required',
            'vendor_name' => 'required|max:100',
            'vendor_address' => 'required',
            'vendor_email' => 'required|unique:vendors,vendor_email,'.$id.',vendor_id|max:100',
            'vendor_phone' => 'digits_between:10, 14',
            'term_of_payment_id' => 'required',
            'term_of_payment_value' => 'numeric',
            'vendor_status' => 'required',
            'item_category_id[]' => 'array',
            'rating_id[]' => 'array',
        ]);

        $obj = Vendor::find($id);

        $obj->vendor_type_id = $request->input('vendor_type_id');
        $obj->vendor_name = $request->input('vendor_name');
        $obj->vendor_address = $request->input('vendor_address');
        $obj->vendor_email = $request->input('vendor_email');
        $obj->vendor_phone = $request->input('vendor_phone');
        $obj->vendor_fax = $request->input('vendor_fax');
        $obj->vendor_note = $request->input('vendor_note');
        $obj->term_of_payment_id = $request->input('term_of_payment_id');
        $obj->term_of_payment_value = $request->input('term_of_payment_value');
        $obj->vendor_status = $request->input('vendor_status');
        $obj->updated_by = $request->user()->user_id;

        $obj->save();

        Vendor::find($id)->itemcategories()->sync($request->input('item_category_id'));
        Vendor::find($id)->ratings()->sync($request->input('rating_id'));

        $request->session()->flash('status', 'Data has been updated!');

        return redirect('vendor');
    }

    public function apiList(Request $request)
    {
        $current = $request->input('current') or 1;
        $rowCount = $request->input('rowCount') or 10;
        $skip = ($current==1) ? 0 : (($current - 1) * $rowCount);
        $searchPhrase = $request->input('searchPhrase') or '';
        
        $sort_column = 'vendor_id';
        $sort_type = 'asc';

        if(is_array($request->input('sort'))) {
            foreach($request->input('sort') as $key => $value)
            {
                $sort_column = $key;
                $sort_type = $value;
            }
        }

        $data = array();
        $data['current'] = intval($current);
        $data['rowCount'] = $rowCount;
        $data['searchPhrase'] = $searchPhrase;
        $data['rows'] = Vendor::join('vendor_types','vendor_types.vendor_type_id','=','vendors.vendor_type_id')
                            ->where('vendors.active','1')
                            ->where(function($query) use($searchPhrase) {
                                $query->where('vendor_type_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_email','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_phone','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_status','like','%' . $searchPhrase . '%');
                            })
                            ->skip($skip)->take($rowCount)
                            ->orderBy($sort_column, $sort_type)->get();
        $data['total'] = Vendor::join('vendor_types','vendor_types.vendor_type_id','=','vendors.vendor_type_id')
                            ->where('vendors.active','1')
                            ->where(function($query) use($searchPhrase) {
                                $query->where('vendor_type_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_email','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_phone','like','%' . $searchPhrase . '%')
                                        ->orWhere('vendor_status','like','%' . $searchPhrase . '%');
                            })->count();

        return response()->json($data);
    }

    public function apiDelete(Request $request)
    {
        if(Gate::denies('Vendor Management-Delete')) {
            abort(403, 'Unauthorized action.');
        }

        $vendor_id = $request->input('vendor_id');

        $obj = Vendor::find($vendor_id);

        $obj->active = '0';
        $obj->updated_by = $request->user()->user_id;

        if($obj->save())
        {
            return response()->json(100); //success
        }else{
            return response()->json(200); //failed
        }
    }
}
