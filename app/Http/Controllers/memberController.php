<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;


class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'Account' => 'required|unique:member',
            'Password' => 'required'
        ]);

        $member = new member();
        $member -> Account = $request->input('Account');
        $member -> Password = $request->input('Password');
        $member ->save();

        return response()->json([
            "Code"=>0,
            "Message"=>"",
            "Result"=>[
                'IsOK'=>true,
            ]

        ]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member)
    {
        //
        $request->validate([
            'Password' => 'required'
        ]);
        $member->update($request->all());

        return response()->json([
            "Code"=>0,
            "Message"=>"",
            "Result"=>[
                'IsOK'=>true,
            ]

        ]);
    }


    public function destroy(member $member)
    {
        //
        $member->delete();

        return response()->json([
            "Code"=>0,
            "Message"=>"",
            "Result"=>[
                'IsOK'=>true,
            ]

        ]);
    }
    public function loginAuth(Request $request){
        $input_account = $request->input('Account');
        $input_password = $request->input('Password');
        $hash_password = md5($input_password);
        $accs = member::where('Account','Like',"{$input_account}")->get();
        foreach ($accs as $acc) {
            if ($hash_password == $acc->Password) {
                return response()->json([
                    "Code" => 0,
                    "Message" => "",
                    "Result" => null
                ], 200);
            } else {
                return response()->json([
                    "Code" => 2,
                    "Message" => "Login Failed",
                    "Result" => null
                ], 400);
            }
        }
    }
    public function getLogin(){
         return 'null';
    }


}
