<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sitepage;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{ 

public function getArchive()
{

return view('Archive.Archive');
}

}