<?php

/*
Project: Humna Resources Management Software - NOUN HR-Plus
File Name: Document Controller 
Description: Employees Document Management.
Author: Umoru Godfrey, E. 
Address: Natview Technology, Abuja Nigeria
godfrey.umoru@natviewtechnology.com
Date Created: 29th January, 2017.
*/

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
        // $param['personnel'] = \App\Personnel::all();
        $param['personnel'] = \App\Personnel::all()->take(27);
        $param['docs'] = \App\Document::all();
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
