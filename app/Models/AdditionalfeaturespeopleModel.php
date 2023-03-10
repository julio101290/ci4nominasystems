<?php

namespace App\Models;

use CodeIgniter\Model;

class AdditionalfeaturespeopleModel extends Model{

    protected $table      = 'additionalfeaturespeople';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','name','format','type','cid','code','created_at','updated_at','deleted_at','minimunValue','maximunValue'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [

    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
        