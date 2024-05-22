<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function index()
    {
        return view('report');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'place_url' => 'required'
        ]);
        $data = $request->all();
        Report::create($data);
        Mail::send(new ReportMail($data));
        return redirect()->back()->with('success', 'تم الإرسال بنجاح شكرا لإبلاغنا');
    }
}
