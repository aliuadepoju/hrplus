<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function getParent()
    {
    	return $this->belongsTo('\App\DocumentClassification', 'document_classification_id', 'id');
    }

    public function getPersonnel()
    {
    	return $this->belongsTo('\App\Personnel', 'personnel_id', 'id');
    }
}
