<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChecklistDetail;
use App\Models\Documents;

class DocumentController extends Controller
{
    public function Showuserdocument (){
        $checklist=ChecklistDetail::get();
        $documents=Documents::get();
        return $checklist;
    }
}
