<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Primary extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
		}
		
		public function index(){
			
			/*$attrib1=array(
						'class'=>'default form-control',
						'id'=>'text_amnt',
						'style'=>'margin-left:50px',
						'name'=>'username'
					);
			$attrib2=array(
						'class'=>'default form-control',
						'id'=>'text_amnt',
						'maxlength'=>'10',
						'name'=>'password',
						'style'=>'margin-left:50px'
					);
			
			$attr=array(
					'method'=>'POST',
					'action'=>'<?php echo site_url("primary/form_validation"); ?>'
					);
			echo $this->create_html->start_form($attr);
			
			echo $this->create_html->create_label(' Username ','');
			echo $this->create_html->input_type('text',$attrib1,'')."<br>";
			echo $this->create_html->create_label(' Password ','');
			echo $this->create_html->input_type('password',$attrib2,'')."<br>";
			echo $this->create_html->input_type('submit','','Submit')."<br>";
			echo $this->create_html->end_form();
			
			*/
			
			$this->load->view('login');
		}
		
		public function form_validation(){
			if($_POST){
				
				$json_string=json_encode($_POST);
				$this->validate_formjson($json_string);
			}
		}
		public function validate_formjson($json_string){
			
			$data='';
			$error=0;
			$str_array=json_decode($json_string);
			
			if(!filter_var($str_array->email, FILTER_VALIDATE_EMAIL)){
				$data['email_error']="Email is not matching";
				$error=1;
			}
			
			if(strlen($str_array->username)<5){
				$data['user_error']="Username is less than minimum length(5)";
				$error=1;
			}
			
			if(strlen($str_array->password)<7){
				$data['pass_error']="Password is less than minimum length(7)";
				$error=1;
			}
			
			if($error==0){
				$data['result']="Success";
			}
			else{
				$data['result']="Failed";
			}
			
			$this->load->view('login',$data);
			
			/*if(preg_match('/^([A-Za-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',$str_array->username)){
				echo '2';
			}
			else{
				echo '3';
			}*/
			
		}
		
		public function task1(){
			
			//$result['data']='';
			$result['insert_id']='';
			$result['affected_row']='';
			$result['edit']='';
			$result['join_table']='';
			if($this->input->POST()){
				
				$name=$this->input->POST('name');
				$select=$this->input->POST('select');
				$email=$this->input->POST('email');
				$mobile=$this->input->POST('mobile');
			
				$data=array('name'=>$name,'dept_id'=>$select,'email'=>$email,'mobile'=>$mobile);
				print_r($data);
			//for insert
				$result['insert_id']=$this->model->insert_table('student',$data);
				
				redirect('primary/task1');
			}
			
			
			//for select group......
				
				$result['select_dept']=$this->model->get_result("select * from department");
			
			
			// for getting the total table of students we use bellow one
			$result['data']=$this->model->get_result("select * from student");
			//$this->load->view('task1',$result);
			
			//for join two tables and need to show in view page
$result['join_table']=$this->model->get_result("select* from student join department on student.dept_id=department.id");
			//print_r($result['join_table']);
			$this->load->view('task1',$result);
			
			
		}
		
		public function delete($id=''){
			echo $id;
			
			///$result['insert_id']='';
			$data=array('id'=>$id);
			$result['affected_row']=$this->model->delete_row_from_table('student',$data);
			
			$result['data']=$this->model->get_result("select * from student");
			
			//$this->load->view('task1',$result);
			redirect('primary/task1');
		}
		
		public function update($id=''){
			echo $id;
			
			
			$result['insert_id']='';
			$result['affected_row']='';
			$result['data']='';
			
			//print_r($result);
			
			if($this->input->POST()){
				
				$data=array('id'=>$this->input->POST('id'));
				
				$name=$this->input->POST('name');
				$pass=$this->input->POST('pass');
				$email=$this->input->POST('email');
				$mobile=$this->input->POST('mobile');
			
				$update_data=array('name'=>$name,'dept_id'=>$pass,'email'=>$email,'mobile'=>$mobile);
				print_r($update_data);
				print_r($data);
				$this->model->update_table('student',$update_data,$data);
				
				redirect('primary/task1');
			}
			
			$data=array('id'=>$id);
			$result['edit']=$this->model->get_row("select * from student where id=$id");
			
			$this->load->view('task1',$result);
			
		}
	}

?>