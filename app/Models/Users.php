<?php namespace App\Models;
use CodeIgniter\Model;

class Users extends Model
{
   protected $DBGroup = 'default';

   protected $table = 'user';
   protected $primaryKey = 'id';
   protected $returnType = 'array';
   protected $useTimestamps = true;
   protected $allowedFields = ['studentId','email','firstName','middleName','lastName','dateOfBirth','phoneNumber'];
   protected $createdField = ['date_created', 'update_at'];

}