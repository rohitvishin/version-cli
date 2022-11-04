<?php

namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Database\Query;
class Home extends BaseController
{
    public function index()
    {
        return view('form');
    }
    public function data()
    {
        $data = $this->db->table('users')->get()->getResultArray();
        return view('data',['data'=>$data]);
    }
    public function modal(){
        $username=$this->request->getPost('username');
        $products=$this->db->table('products')->where('username',$username)->get()->getResult();
        $html='';
        foreach($products as $product){
            $html.='<tr>
            <td>'.$product->product_name.'</td>
            <td>'.$product->product_price.'</td>
            <td>'.$product->product_qty.'</td>
            <td>'.$product->product_type.'</td>
            <td>'.$product->product_discount.'</td>
            </tr>';
        }
        return $html;
    }
    public function addProducts(){
        $data=array();
        $user = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),   
        ];
        if ($this->db->table('users')->insert($user)) {
            foreach($this->request->getPost('p_name') as $key=>$product){
                
                $product = [
                    'username' => $this->request->getPost('username'),
                    'product_name' => $this->request->getPost('p_name')[$key],
                    'product_price' => $this->request->getPost('price')[$key],
                    'product_qty' => $this->request->getPost('qty')[$key],
                    'product_type' => $this->request->getPost('type')[$key],
                    'product_discount' => $this->request->getPost('discount')[$key]==''?0:$this->request->getPost('discount')[$key],
                ];
                $data[]=$product;
            }
            if($this->db->table('products')->insertBatch($data)){
                session()->setFlashdata('success', 'Data Inserted Successfully');
                return redirect()->to(base_url('/'));
            }
        }
        
        session()->setFlashdata('error', 'Operation Failed');
        return redirect()->to(base_url('/'));
    }
}
