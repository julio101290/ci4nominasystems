<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchofficesModel extends Model{

    protected $table      = 'branchoffices';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','key','name','cologne','city','postalCode','timeDifference','tax','dateAp','phone','fax','companie','created_at','deleted_at','updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [
         'key ' => 'is_unique[branchoffices.key]',

    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
        