<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Gate;
use App\Http\Requests;
use App\Rule;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('Rules Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        return view('vendor.material.master.rule.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('Rules Management-Create')) {
            abort(403, 'Unauthorized action.');
        }

        return view('vendor.material.master.rule.create');
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
            'rule_name' => 'required|max:100',
        ]);

        $obj = new Rule;

        $obj->rule_name = $request->input('rule_name');
        $obj->rule_desc = $request->input('rule_desc');
        $obj->active = '1';
        $obj->created_by = $request->user()->user_id;

        $obj->save();

        $request->session()->flash('status', 'Data has been saved!');

        return redirect('master/rule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::denies('Rules Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['rule'] = Rule::where('active','1')->find($id);
        return view('vendor.material.master.rule.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('Rules Management-Update')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['rule'] = Rule::where('active','1')->find($id);
        return view('vendor.material.master.rule.edit', $data);
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
            'rule_name' => 'required|max:100',
        ]);

        $obj = Rule::find($id);

        $obj->rule_name = $request->input('rule_name');
        $obj->updated_by = $request->user()->user_id;

        $obj->save();

        $request->session()->flash('status', 'Data has been updated!');

        return redirect('master/rule');
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
        $rowCount = $request->input('rowCount') or 5;
        $skip = ($current==1) ? 0 : (($current - 1) * $rowCount);
        $searchPhrase = $request->input('searchPhrase') or '';
        
        $sort_column = 'rule_id';
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
        $data['rows'] = Rule::where('active','1')
                            ->where(function($query) use($searchPhrase) {
                                $query->where('rule_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('rule_desc','like','%' . $searchPhrase . '%');
                            })
                            ->skip($skip)->take($rowCount)
                            ->orderBy($sort_column, $sort_type)->get();
        $data['total'] = Rule::where('active','1')
                                ->where(function($query) use($searchPhrase) {
                                    $query->where('rule_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('rule_desc','like','%' . $searchPhrase . '%');
                                })->count();

        return response()->json($data);
    }


    public function apiDelete(Request $request)
    {
        if(Gate::denies('Rules Management-Delete')) {
            abort(403, 'Unauthorized action.');
        }

        $id = $request->input('rule_id');

        $obj = Rule::find($id);

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
