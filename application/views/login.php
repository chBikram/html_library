<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<meta name="" content="">

</head>

<style>
	.form-control{
		margin-left: 50px;
	    width: 200px;
	    height: 30px;
	    padding: 10px;
	    margin-bottom: 10px;
	    border-radius: 3px;
	}
	.form-btn{
		margin-left: 150px;
	    width: 100px;
	    height: 30px;
	    background-color: rgba(7, 17, 248, 0.62);
	    color: #FFF;
	    border-radius: 6px;
	    border-collapse: collapse;
	}
</style>

<body>
	<!--<form method="post" action="<?php echo site_url("welcome/login"); ?>">
		User Name: <input type="text" class="text" name="name"/>
		Password: <input type="password" class="pass" name="password"/>
		<input type="submit" value="Submit" id="submit"/>
	</form>-->

	<?php 
		$user_span='';
		$email_span='';
		$pass_span='';
		$result_span='';
		
		if(!empty($result)){
			$result_span=$result;
		}
		if(!empty($user_error)){
			$user_span=$user_error;
		}
		if(!empty($email_error)){
			$email_span=$email_error;
		}
		if(!empty($pass_error)){
			$pass_span=$pass_error;
		}
		
		$attrib1=array(
					'class'=>'default form-control',
					'id'=>'text_amnt1',
					'placeholder'=>'minimum length 5',
					'maxlength'=>'10',
					'name'=>'username'
				);
		$attrib2=array(
					'class'=>'default form-control',
					'id'=>'text_amnt2',
					'maxlength'=>'10',
					'name'=>'password'
				);
		$attrib3=array(
					'class'=>'default form-control',
					'id'=>'text_amnt3',
					'placeholder'=>'xyz@zbc.qwe',
					'name'=>'email'
				);
				
		$attrib4=array(
					'class'=>'default form-btn',
					'id'=>'text_amnt4',
					'name'=>'submit_btn'
				);
				
		$attr=array(
				'method'=>'POST',
				'action'=>site_url("primary/form_validation")
				);
		
		echo $this->create_html->create_span($result_span,'')."<br><br><br>";
		
		echo $this->create_html->start_form($attr);
		
		echo $this->create_html->create_label(' Username ','');
		echo $this->create_html->input_type('text',$attrib1,'')."<br>";
		echo $this->create_html->create_span($user_span,'')."<br>";
		echo $this->create_html->create_label(' Password ','');
		echo $this->create_html->input_type('password',$attrib2,'')."<br>";
		echo $this->create_html->create_span($pass_span,'')."<br>";
		echo $this->create_html->create_label(' Email &ensp;&ensp; ','');
		echo $this->create_html->input_type('email',$attrib3,'')."<br>";
		echo $this->create_html->create_span($email_span,'')."<br>";
		echo $this->create_html->input_type('submit',$attrib4,'Submit')."<br>";
		echo $this->create_html->end_form();
			
	?>

</body>
</html>

