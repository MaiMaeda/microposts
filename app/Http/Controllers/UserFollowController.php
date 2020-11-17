<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    //follow @param $id 相手のid
    //      @return \Illuminate\Http\Response
    public function store($id)
    {
        \Auth::user()->follow($id);
        return back();
    }
    //unfollow
    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        return back();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['microposts','followings','followers']);
        
    }
}
