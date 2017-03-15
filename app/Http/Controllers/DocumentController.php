<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function docCenter()
    {
        $param['personnel'] = \App\Personnel::all();
        $param['docClass'] = \App\DocumentClassification::all();
        $param['pageName'] = "Personnel Document Center";
        return view('pim.documentCenter.index', $param);
    }

    public function docUpload()
    {
    	$param['pageName'] = "Personnel Document Upload";
        return view('pim.documentCenter.upload', $param);
    }

    public function docs()
    {
        $param['docs'] = \App\Document::all();
        $param['pageName'] = "Personnel Document Center";
        return view('pim.documentCenter.list', $param);
    }

    public function oneDoc($id)
    {
        $id = \Crypt::decrypt($id);
        $param['doc'] = \App\Document::find($id);
        $param['pagseName'] = $param['doc'] . "'s Profile";
        return view('pim.documentCenter.oneDocument', $param);
    }
}
