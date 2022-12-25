<?php

namespace App\Controllers;
use \Hermawan\DataTables\DataTable;
use App\Models\Users;
use App\Models\Schools;

class Home extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('select');
        // return view('welcome_message');
    }

    function add_school($id = null) {
        $data = [];

        if($id) {
            $schools = new Schools();
            $data = $schools->find($id);
        }

        return view('add_school', $data);
    }

    function store_school() {
        $schools = new Schools();
        
        $data = [
            'id'       => $this->request->getVar('school_id'),
            'name'     => $this->request->getVar('school_name'),
            'location' => $this->request->getVar('school_location')
        ];

        $schools->replace($data);

        if($this->request->getVar('redirect')){
            return 1;
        }
        

        return redirect()->to('/schools');
    }

    function remove_school($id = null) {
        $schools = new Schools();

        if($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
        }

        $schools->where('id', $id);
        $schools->delete();

        if($this->request->getVar('redirect')) {
            return 1;
        }

        return redirect()->to('/schools');
    }

    function school() {
        
        $pager   = \Config\Services::pager();
        $schools = new Schools();
        $search  = "";
        
        if($this->request->getVar('search')){
           $search   = $this->request->getVar('search');
           $paginate = $schools->select('*')->orLike('name', $search)->orLike('location', $search)->paginate(10);
        } else {
            $paginate = $schools->paginate(20);
        }
        
        $data = [
            'schools' => $paginate,
            'pager'   => $schools->pager,
            'search'  => $search
        ];

        return view('schools', $data);
    }
    function school_list() {
        return view('schools_list');
    }

    function fetch_data() {
        $schools = new Schools();
        return DataTable::of($schools)->toJson();
    }

    function fetch_school() {
        $schools = new Schools();
        $schools = $schools->find($this->request->getVar('id'));
        echo json_encode($schools);
    }
}