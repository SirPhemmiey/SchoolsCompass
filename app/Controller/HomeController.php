<?php
class HomeController extends AppController{
    
    public $components = array('Auth');
    public $uses = array(
    'School',
    'Category',
    'All_review',
    'Parent_review',
    'Parentt');
    public function beforeFilter(){
        $this->Auth->loginAction = array('controller' => 'home', 'action' => 'login');
        $this->Auth->authError = array('Please login in');
        $this->Auth->loginRedirect = array('controller' => 'home', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'home', 'action' => 'login');
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'Parentt', 'fields' => array(
                    'username' => 'email', 'password' => 'password')));
        $this->Auth->allow('login', 'signup', 'logout');
    }
    
    public function index(){
        $this->layout = 'index';
        $schools = $this->School->find('all', array('order' => array('name' => 'ASC')));
        $id = $this->Auth->user('id');
        $parents = $this->Parentt->findById($id);
        $this->set(compact('schools', 'parents'));
        
        if($this->request->is('post')){
            if(!empty($this->data)){
               //debug($this->request->data); exit();
               $conditions = array(
                   'Parent_review.parent_id' => $this->Auth->user('id'));
                if($this->Parent_review->hasAny($conditions)){
                    $this->Flash->duplicate('You are not allowed to make a review again because you have done so previously. Thanks', array('key' => 'duplicate'));
                }
                else{
                    for($i=0; $i<count($this->request->data['All_review']['categories']); $i++){
                        $categories[$i] = $this->request->data['All_review']['categories'][$i];
                        $categories_options[$i] = $this->request->data['All_review']['categories_options'][$i];
                        $rate[$i] = $this->request->data['All_review']['rate'][$i];
                        $school_id = $this->request->data['All_review']['school_id'];
                        if($this->Parent_review->save($this->request->data)){
                            $lastId = $this->Parent_review->id;
                            $insert = $this->All_review->query('insert into all_reviews (categories, categories_options, rate, parent_reviews_id, school_id) values ("'.$categories[$i].'", "'.$categories_options[$i].'", "'.$rate[$i].'", "'.$lastId.'", "'.$school_id.'")');
                        }
                    }
                      if(isset($insert)){
                                $this->Flash->success('Your review has been recorded. Thank you.', array('key' => 'success'));
                            }
                            else{
                                $this->Flash->error('Oops! An error occured. Please try again.', array('key' => 'error'));
                            }
                    
                }
            }
        }
    }
    
    public function signup(){
        $this->layout = 'signup';
        if(!isset($_SESSION)){
            session_start();
        }
        if($this->request->is('post')){
            $first_name = $this->request->data['Parentt']['first_name'];
            $last_name = $this->request->data['Parentt']['last_name'];
            $email = $this->request->data['Parentt']['email'];
            $password = $this->request->data['Parentt']['password'];
            //confirm that none of the fields is empty
            if($first_name!='' && $last_name!='' && $email!='' && $password!=''){
                $conditions = array(
                    'Parentt.email' => $email);
                if($this->Parentt->hasAny($conditions)){
                    $this->Flash->duplicate('You already have an account with us. Please login.', array('key' => 'duplicate'));
                }
                else{
                    if($this->Parentt->save($this->request->data)){
                    $this->Flash->success('Registration is successful. Proceed to login', array('key' => 'success'));
                }
                else{
                    $this->Flash->success('Oops! An error occured. Please try again.', array('key' => 'error'));
                }
                }
            }
        }
        $this->set(compact('success', 'error'));
    }
    
    //This is the beginig of the file when you reopen it. Thanks!
    public function login(){
        $this->layout = 'signup';
        if($this->request->is('post')){
            //debug($this->data);
            $username = $this->request->data['Parentt']['email'];
            $password = $this->request->data['Parentt']['password'];
            if($username!='' && $password!=''){
                if($this->Auth->login()){
                    $this->redirect(array('action' => 'index'));
                }
                else{
                    $this->Flash->error('Username or Password is incorrect.', array('key' => 'error'));
                }
            }
        }
        $this->set(compact('error', 'loginUrl', 'logoutUrl'));
    }
    
    public function check_review(){
        $this->layout = false;
        if (!$this->request->is('post')) {
            throw new NotFoundException();
        }
        if($this->request->is('post')){
            $school_id = $_POST['school_id'];
            $id = $this->Auth->user('id');
            $parents = $this->Parentt->findById($id);
            $schools = $this->School->findById($school_id);
            $p_review = $this->Parent_review->find('count');
            
            //$all_reviews = $this->All_review->find('count');
            $comments_review = $this->Parent_review->query("select answer_1, answer_2, answer_3, Parentt.first_name, Parentt.last_name from parent_reviews as Parent_review join parentts as Parentt on Parent_review.parent_id=Parentt.id join schools as School on Parent_review.school_id=School.id where Parent_review.school_id='$school_id' order by rand() limit 2");
            $low_academics = $average_academics = $high_academics = 0;
            $low_management = $average_management = $high_management = 0;
            $low_co = $average_co = $high_co = 0;
            $academics = 'Academics';
            $management = 'Management';
            $co_curricular = 'Co-curricular';

            //for Academics
            $count_academics = $this->All_review->query("select categories_options from all_reviews as All_review join parent_reviews as Parent_review on All_review.parent_reviews_id=Parent_review.id where All_review.categories='$academics' and All_review.school_id='$school_id'");
            foreach($count_academics as $c_academics){
            if($c_academics['All_review']['categories_options'] == 'Low'){
                $low_academics++;
            }
            if($c_academics['All_review']['categories_options'] == 'Average'){
                $average_academics++;
            }
            if($c_academics['All_review']['categories_options'] == 'High'){
                    $high_academics++;
            }
            }

                //for Management
            $count_management = $this->All_review->query("select categories_options from all_reviews as All_review join parent_reviews as Parent_review on All_review.parent_reviews_id=Parent_review.id where All_review.categories='$management' and All_review.school_id='$school_id'");
            foreach($count_management as $c_management){
            if($c_management['All_review']['categories_options'] == 'Low'){
                $low_management++;
            }
            if($c_management['All_review']['categories_options'] == 'Average'){
                $average_management++;
            }
            if($c_management['All_review']['categories_options'] == 'High'){
                    $high_management++;
            }
            }
                //For Co-curricular
            $count_co = $this->All_review->query("select categories_options from all_reviews as All_review join parent_reviews as Parent_review on All_review.parent_reviews_id=Parent_review.id where All_review.categories='$co_curricular' and All_review.school_id='$school_id'");
            foreach($count_co as $c_co){
            if($c_co['All_review']['categories_options'] == 'Low'){
                $low_co++;
                //echo $low_co++;
            }
            if($c_co['All_review']['categories_options'] == 'Average'){
                $average_co++;
            }
            if($c_co['All_review']['categories_options'] == 'High'){
                    $high_co++;
            }
        }

            //Calculating the percentage of the categories(academics, management and co-curricular)
            if($p_review != 0){
                 //To calculate for Academics
                $academics_low_percent = ($low_academics/$p_review)*100;
                $academics_average_percent = ($average_academics/$p_review)*100;
                $academics_high_percent = ($high_academics/$p_review)*100;
                

                //To calculate for Management
                $management_low_percent = ($low_management/$p_review)*100;
                $management_average_percent = ($average_management/$p_review)*100;
                $management_high_percent = ($high_management/$p_review)*100;

              //To calculate for Co-curricular
                $co_low_percent = ($low_co/$p_review)*100;
                $co_average_percent = ($average_co/$p_review)*100;
                $co_high_percent = ($high_co/$p_review)*100;
            }
            
            //For aggregating the Academics Rate
            $rates_academics = $this->All_review->query("select rate from all_reviews as All_review join schools as School on All_review.school_id=School.id where All_review.categories='$academics' and School.id='$school_id'");
            $sum = 0;
            foreach($rates_academics as $rate){
                $sum+=$rate['All_review']['rate'];
            }
            if(!empty($rates_academics)){
                $academics_rating = ($sum/count($rates_academics));
            }
            else{
                $academics_rating = 0;
            }
            
            //For aggregating the Management Rate
            $rates_mgt = $this->All_review->query("select rate from all_reviews as All_review join schools as School on All_review.school_id=School.id where All_review.categories='$management' and School.id='$school_id'");
            $sum2 = 0;
            foreach($rates_mgt as $rate){
                $sum2+=$rate['All_review']['rate'];
            }
            if(!empty($rates_mgt)){
                $management_rating = ($sum2/count($rates_mgt));
            }
            else{
                $rates_mgt = 0;
            }
            
            //For aggregating the Co_curricular Rate
            $rates_co = $this->All_review->query("select rate from all_reviews as All_review join schools as School on All_review.school_id=School.id where All_review.categories='$co_curricular' and School.id='$school_id'");
            $sum3 = 0;
            foreach($rates_co as $rate){
                $sum3+=$rate['All_review']['rate'];
            }
            if(!empty($rates_co)){
                $co_rating = ($sum3/count($rates_co));
            }
            else{
                $co_rating = 0;
            }
        }
        $this->set(compact('parents', 'p_review', 'academics_low_percent', 'academics_average_percent', 'academics_high_percent', 'management_low_percent', 'management_average_percent', 'management_high_percent', 'co_low_percent', 'co_high_percent' , 'co_average_percent', 'schools', 'count_academics', 'comments_review', 'academics_rating', 'management_rating', 'co_rating', 'comments_review', 'school_id', 'academics_low_percent', 'average_academics'));
        }
    
    public function comments(){
        $this->layout = 'index';
        $school_id = $this->request->query('s_id');
        $id = $this->Auth->user('id');
        $parents = $this->Parentt->findById($id);
        //$school = $this->School->findById($school_id);
         $comments_review = $this->Parent_review->query("select first_name, last_name, Parent_review.id, School.id, answer_1, answer_2, answer_3, School.name from parent_reviews as Parent_review join schools as School on Parent_review.school_id=School.id join parentts as Parentt on Parent_review.parent_id=Parentt.id where Parent_review.school_id='$school_id' order by Parent_review.id DESC limit 2");
        $this->set(compact('parents', 'category', 'comments_review'));
    }
    
    public function loadMore(){
        $this->layout = false;
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = $_POST['id'];
            $school_id = $_POST['school_id'];
            $comments_review = $this->Parent_review->query("select first_name, last_name, Parent_review.id, School.id, answer_1, answer_2, answer_3, School.name from parent_reviews as Parent_review join schools as School on Parent_review.school_id=School.id join parentts as Parentt on Parent_review.parent_id=Parentt.id where Parent_review.id <".$id." and Parent_review.school_id='$school_id' ORDER BY Parent_review.id DESC LIMIT 2");
        }
        $this->set(compact('comments_review'));
    }
    public function profile(){
        $this->layout = 'index';
        $id = $this->Auth->user('id');
        //$schools = $this->School->find('all', array('order' => array('name' => 'ASC')));
        //This checks for only schools that have been review
        $schools = $this->School->query("select School.name, Parent_review.school_id from schools as School join parent_reviews as Parent_review on School.id=Parent_review.school_id group by Parent_review.school_id");
        $parents = $this->Parentt->findById($id);
        $this->set(compact('parents', 'schools'));
    }
    
    public function refer(){
        $this->layout = 'index';
        $id = $this->Auth->user('id');
        $parents = $this->Parentt->findById($id);
        //debug($parents);
        if($this->request->is('post')){
            $contact_email = $this->request->data['School']['contact_email'];
            $name = $this->request->data['School']['name'];
            $website = $this->request->data['School']['website'];
            $position = $this->request->data['School']['position'];
            $contact_name = $this->request->data['School']['contact_name'];
            $contact_number = $this->request->data['School']['contact_number'];
           $conditions = array(
               'School.name' => $name);
            if($this->School->hasAny($conditions)){
                $this->Flash->duplicate('This school is already added.', array('key' => 'duplicate'));
            }
            else{
                 if($contact_email != '' && $name !='' && $website !='' && $position !='' && $contact_name!='' && $contact_number!=''){
                if($this->School->save($this->request->data)){
                    //$this->Flash->success('School has been added successfully.', array('key' => 'success'));
                    //This sends an email to the proprietor/school owner involved
                    App::uses('CakeEmail', 'Network/Email');
                    $Email = new CakeEmail();
                    $Email->viewVars(array('first_name' => $parents['Parentt']['first_name'], 'last_name' => $parents['Parentt']['last_name']));
                    $Email->to($contact_email);
                    $Email->subject("Notification");
                    $Email->from(array("admin@schoolscompass.com.ng" => "SchoolsCompass"));
                    $Email->template("notification", null);
                    $Email->emailFormat("html");
                  try{
                        if($Email->send()){
                        $this->Flash->success('School has been added. And an Email notification has been sent to the contact also.', array('key' => 'success'));
                    }
                  }catch(Exception $e){
                      $this->Flash->error('School has been added successfully but an email notification was not sent.', array('key' => 'error'));
                  }
                }
                     else{
                         $this->Flash->error('Oops! An error occured. Please try again.', array('key' => 'error'));
                     }
            }
            else{
                $this->Flash->emptyy('Fields cannot be empty', array('key' => 'empty'));
            }
            }
        }
        $this->set(compact('parents'));
    }
    
    public function logout(){
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
}