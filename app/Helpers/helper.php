<?php
use Illuminate\Support\Facades\DB;

function getCompany($id){
    return DB::table('company')->where('id',$id)->first();
}

function getProfileImage($id){
    return DB::table('users')->where('id',$id)->first();
}