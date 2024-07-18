<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallLogTbl;

class CdrController extends Controller
{
    public function show($id)
    {
        $cdr = CallLogTbl::findOrFail($id);
        return view('cdr.show', compact('cdr'));
    }
}
