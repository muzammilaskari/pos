<?php class My_data_page extends CI_Controller{

    function __construct() {
        parent::__construct();
         $this->load->library('table');
       $this->load->helper('html');
       $this->load->library('Ajax_pagination');
       $this->load->database();
       $this->load->library('javascript');

    }
    function index(){


        $data['makeColums'] = $this->makeColumns();
        $data['getTotalData'] = $this->getTotalData();
        $data['perPage'] = $this->perPage();

        $this->load->view('my_data_page2', $data);
    }
    //Pull 'name' field records from table 'contact'
    function getData(){

        $page = $this->input->post('page'); //Look at $config['postVar']
        if(!$page):
        $offset = 0;
        else:            
        $offset = $page;
        endif;

        $sql = "SELECT * FROM registration LIMIT ".$offset.", ".$this->perPage();
        $q = $this->db->query($sql);

        return $q->result();

    }
    function getTotalData(){

      $sql = "SELECT * FROM registration";
      $q = $this->db->query($sql);

      return $q->num_rows();

    }

    function perPage(){
         return 5; //define total records per page
      }

    //Generate table from array
    function makeColumns(){

         $peoples = $this->getData();
         foreach($peoples as $pep):
         $data[] = $pep->id;
         $data[] = $pep->email;
         $data[] = $pep->password;
         $data[] = $pep->last_login;
         $data[] = $pep->name;
         endforeach;

         return  $this->table->make_columns($data, 5);
    }
} 
?>