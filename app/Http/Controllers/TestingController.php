<?php

namespace App\Http\Controllers;
use App\Models\Testing;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function testing()
    {
        // $data = Testing::orderBy("salary","DESC")->skip(6)->limit(1)->get();
        $data = Testing::orderBy("salary","DESC")->skip(6)->limit(1)->get();
        $data = Testing::find(3);
        $data = Testing::pluck("name");

        return $data;
    }
}