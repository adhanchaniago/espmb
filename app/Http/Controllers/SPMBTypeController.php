<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Gate;
use App\Http\Requests;
use App\Rule;
use App\SPMBType;

class SPMBTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('SPMB Types Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        return view('vendor.material.master.spmbtype.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('SPMB Types Management-Create')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['rules'] = Rule::where('active','1')->orderBy('rule_name')->get();
        return view('vendor.material.master.spmbtype.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'spmb_type_name' => 'required|max:100',
            'rule_id[]' => 'array',
        ]);

        $obj = new SPMBType;

        $obj->spmb_type_name = $request->input('spmb_type_name');
        $obj->active = '1';
        $obj->created_by = $request->user()->user_id;

        $obj->save();

        SPMBType::find($obj->spmb_type_id)->rules()->sync($request->input('rule_id'));

        $request->session()->flash('status', 'Data has been saved!');

        return redirect('master/spmbtype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::denies('SPMB Types Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['spmbtype'] = SPMBType::with('rules')->where('active','1')->find($id);
        return view('vendor.material.master.spmbtype.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('SPMB Types Management-Update')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['rules'] = Rule::where('active','1')->orderBy('rule_name')->get();
        $data['spmbtype'] = SPMBType::with('rules')->where('active','1')->find($id);
        return view('vendor.material.master.spmbtype.edit', $data);
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
        $this->validate($request, [
            'spmb_type_name' => 'required|max:100',
            'rule_id[]' => 'array',
        ]);

        $obj = SPMBType::find($id);

        $obj->spmb_type_name = $request->input('spmb_type_name');
        $obj->updated_by = $request->user()->user_id;

        $obj->save();

        SPMBType::find($id)->rules()->sync($request->input('rule_id'));

        $request->session()->flash('status', 'Data has been updated!');

        return redirect('master/spmbtype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apiList(Request $request)
    {
        $current = $request->input('current') or 1;
        $rowCount = $request->input('rowCount') or 10;
        $skip = ($current==1) ? 0 : (($current - 1) * $rowCount);
        $searchPhrase = $request->input('searchPhrase') or '';
        
        $sort_column = 'spmb_type_id';
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
        $data['rows'] = SPMBType::where('active','1')
                            ->where(function($query) use($searchPhrase) {
                                $query->where('spmb_type_name','like','%' . $searchPhrase . '%');
                            })
                            ->skip($skip)->take($rowCount)
                            ->orderBy($sort_column, $sort_type)->get();
        $data['total'] = SPMBType::where('active','1')
                            ->where(function($query) use($searchPhrase) {
                                $query->where('spmb_type_name','like','%' . $searchPhrase . '%');
                            })->count();

        return response()->json($data);
    }


    public function apiDelete(Request $request)
    {
        if(Gate::denies('SPMB Types Management-Delete')) {
            abort(403, 'Unauthorized action.');
        }

        $id = $request->input('spmb_type_id');

        $obj = SPMBType::find($id);

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
