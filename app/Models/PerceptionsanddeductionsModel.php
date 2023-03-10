<?php

namespace App\Models;

use CodeIgniter\Model;

class PerceptionsanddeductionsModel extends Model{

    protected $table      = 'perceptionsanddeductions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','code','name','nameAbrev','type','Area','SATConcept','calc','orden','payType','ordinary','otherPay','created_at','updated_at','deleted_at','SATConceptPerceptions'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [

    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
        