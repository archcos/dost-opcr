<?php
namespace App\Controllers;
use App\Models\Users;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class UserController extends Controller
{

   public function index()
   {
      $session = \Config\Services::session();
      $message = $session->getFlashdata('message');
      $std = new Users();
      $data['user'] = $std->findAll();
      $pager = \Config\Services::pager();
      $data['message'] = $message;
      echo view('user',$data);
   }

   public function newusers()
   {
      echo view('newusers');
      //echo ' new method';
   }

   public function addusers()
   {
      $request = \Config\Services::request();
      $session = \Config\Services::session();
      $studentId  = $request->getPost('studentId');
      $firstName  = $request->getPost('firstName');
      $middleName  = $request->getPost('middleName');
      $lastName  = $request->getPost('lastName');
      $dateOfBirth  = $request->getPost('dateOfBirth');
      $email  = $request->getPost('email');
      $phoneNumber  = $request->getPost('phoneNumber');
      $newUser = [
         'studentId'=>$studentId,
         'firstName'=>$firstName,
         'middleName'=>$middleName,
         'lastName'=>$lastName,
         'dateOfBirth'=>$dateOfBirth,
         'email'=>$email,
         'phoneNumber'=>$phoneNumber,
      ];
      $std = new Users();
      $result = $std->insert($newUser);
      if ($result) {
         $session->setFlashdata('message','You have successfully inserted the student.');
      }
      else{
         $session->setFlashdata('message','Oops something went wrong please try again.');
      }
      return redirect()->to(site_url('users'));
      //var_dump($result);
      //echo 'working..';
   }

   public function editUser($id)
   {
      $session = \Config\Services::session();
      if (!empty($id)) {
         $std = new Users();
         $result = $std->where('id',$id)->findAll();
         if (count($result) > 0) {
            $data['user'] = $result;
            echo view('update',$data);
         }
         else{
            $session->setFlashdata('message','The Student is not exist');
            return redirect()->to(site_url('users'));
         }
      }
      else{
         $session->setFlashdata('message','The id is not available, please try again.');
         return redirect()->to(site_url('users'));
      }

   }

   public function updateUsers($id)
   {
      $request = \Config\Services::request();
      $session = \Config\Services::session();
      $studentId  = $request->getPost('studentId');
      $firstName  = $request->getPost('firstName');
      $middleName  = $request->getPost('middleName');
      $lastName  = $request->getPost('lastName');
      $dateOfBirth  = $request->getPost('dateOfBirth');
      $email  = $request->getPost('email');
      $phoneNumber  = $request->getPost('phoneNumber');
      $updateUser = [
         'studentId'=>$studentId,
         'firstName'=>$firstName,
         'middleName'=>$middleName,
         'lastName'=>$lastName,
         'dateOfBirth'=>$dateOfBirth,
         'email'=>$email,
         'phoneNumber'=>$phoneNumber,
      ];
      //echo $studentId;
      //die();
      $std = new Users();
      $result = $std->update($updateUser) -> where('id',$id) -> findAll();
      if ($result) {
         $session->setFlashdata('message','You have successfully updated the student.');
      }
      else{
         $session->setFlashdata('message','Oops something went wrong please try again.');
      }
      return redirect()->to(site_url('users'));
   }

   public function delete($id)
   {
      $session = \Config\Services::session();
      if (!empty($id)) {
         $std = new Users();
         $result = $std->where('id',$id)->findAll();
         if (count($result) > 0) {
            //$result = $std->delete($userId);
            $result = $std->where('id',$id)->delete();
            if ($result){
               $session->setFlashdata('message','You have successfully deleted.');
               return redirect()->to(site_url('users'));
            }
            else{
               $session->setFlashdata('message','You can\'t delete the student right now.');
               return redirect()->to(site_url('users'));
            }
         }
         else{
            $session->setFlashdata('message','The Student is not exist');
            return redirect()->to(site_url('users'));
         }
      }
      else{
         $session->setFlashdata('message','The id is not available, please try again.');
         return redirect()->to(site_url('users'));
      }
   }
}//class