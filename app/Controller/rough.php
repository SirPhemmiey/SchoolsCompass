<?php
class HomeController extends AppController{
    
    public $components = array('Auth');
    public function beforeFilter(){
        $this->Auth->loginAction = array('controller' => 'home', 'action' => 'login');
        $this->Auth->authError = array('Please login in');
        $this->Auth->loginRedirect = array('controller' => 'home', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'home', 'action' => 'login');
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'Parentt', 'fields' => array(
                    'username' => 'email', 'password' => 'password')));
        require APPLIBS.'Facebook'.DS.'autoload.php';
        require APPLIBS.'Facebook'.DS.'Facebook.php';
        $this->Auth->allow('login', 'signup', 'facebook', 'logout');
    }
    
    public function index(){
        $this->layout = 'index';
        $this->loadModel('School');
        $schools = $this->School->find('all');
         $this->loadModel('Category');
        $this->loadModel('Category_option');
        $this->loadModel('Parentt');
        $this->loadModel('All_review');
        $this->loadModel('Parent_review');
        $queCat = $this->Category->query("select * from categories as Category join questions as Question on Category.id=Question.categories_id ");
        $catOption = $this->Category_option->find('all');
        $id = $this->Auth->user('id');
        $parents = $this->Parentt->findById($id);
        $this->set(compact('queCat', 'catOption', 'schools', 'parents'));
        //$this->set(compact('schools'));
        
        if($this->request->is('post')){
            if(!empty($this->data)){
               debug($this->request->data['All_review']); exit();
               $conditions = array(
                   'Parent_review.parent_id' => $this->Auth->user('id'));
                if($this->Parent_review->hasAny($conditions)){
                    $this->Flash->duplicate('You review has been recorded previously. Thanks', array('key' => 'duplicate'));
                }
                else{
                    foreach($this->request->data['All_review']['categories_id'] as $c_id){
                        $this->request->data['All_review']['categories_id'] = $c_id;
                    foreach($this->request->data['All_review']['categories_options_id'] as $c_o_id){
                        $this->request->data['All_review']['categories_options_id'] = $c_o_id;
                    foreach($this->request->data['All_review']['rate'] as $rate){
                        $this->request->data['All_review']['rate'] = $rate;
                     if($this->All_review->saveAll($this->request->data)){
                        if($this->Parent_review->save($this->data)){
                            $this->Flash->success('Your review has been recorded. Thank you.', array('key' => 'success'));
                    }
                }
                    else{
                        $this->Flash->error('Oops! An error occured. Please try again.', array('key' => 'success'));
                    }
                    }
                    }
                }
//                    foreach($this->request->data['All_review']['categories_id'] as $c_id){
//                        debug($this->request->data['All_review']['categories_id']); exit();
//                        $this->request->data['All_review']['categories_id'] = $c_id;
//                        if($this->All_review->saveAll($this->request->data)){
//                            $this->Flash->success('Your review has been recorded. Thank you.', array('key' => 'success'));
//                        }
//                    }
                }
            }
        }
    }
    
    public function review(){
        $this->layout = false;
        $this->loadModel('Category');
        $this->loadModel('Category_option');
        $queCat = $this->Category->query("select * from categories as Category join questions as Question on Categories.id=Question.categories_id ");
        $catOption = $this->Category_option->find('all');
        
        if($this->request->is('post')){
            
        }
        $this->set(compact('queCat', 'catOption'));
    }
    public function facebook(){
        $this->layout = 'index';
        if(!isset($_SESSION)){
            session_start();
        }
         $fb = new Facebook\Facebook([
            'app_id' => '531414230531641',
            'app_secret' => '7fc7611c6ec3170512158b8d78352407',
            //'default_graph_version' => 'v2.4',
        ]);
        $helper = $fb->getRedirectLoginHelper();
       //$_SESSION['FBRLH_state']=$_GET['state'];
        try{
            $accessToken = $helper->getAccessToken();
        }
        catch(Facebook\Exceptions\FacebookResponseException $e){
            //When Graph returns error  
            echo 'Graph Returned error:'. $e->getMessage();
            exit;
        }
        catch(Facebook\Exceptions\FacebookSDKException $e){
            //When Validation fails or local issues
            echo 'Facebook Returned error:'. $e->getMessage();
            exit;
        }
        if(!isset($accessToken)){
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
        // Logged in
        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        $_SESSION['fb_access_token'] = (string) $accessToken;
        $response = $fb->get('/me?fields=id,first_name,last_name', $accessToken);
        //$requestPicture = $fb->get('/me/picture?redirect=false&type=large&height=128&width=128', $accessToken);
        $user = $response->getGraphUser();
        $userID = $user['id'];
        //$name = $user['name'];
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $this->Session->write(array(
            'access_token' => $accessToken,
            'user' => $user,
            'first_name' => $first_name,
            'last_name' => $last_name,
            //'name' => $name,
            //'picture' => $picture,
            'userID' => $userID));
    }
    public function signup(){
        $this->layout = 'signup';
        if(!isset($_SESSION)){
            session_start();
        }
        $this->loadModel('Parentt');
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
        //facebook authentication
        $fb = new Facebook\Facebook([
            'app_id' => '531414230531641',
            'app_secret' => '7fc7611c6ec3170512158b8d78352407',
            'default_graph_version' => 'v2.4',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $redirectUri = 'http://localhost/Schools/home/facebook';
        //$permissions = ['first_name', 'last_name', 'id'];
        $permissions = ['email'];
        //if(!isset($_SESSION['fb_access_token'])){
            $loginUrl = $helper->getLoginUrl($redirectUri, $permissions);
        //}
        //$params = array('next' => $redirectUri);
        //$logoutUrl = $fb->getLogoutUrl($params);
        $logoutUrl = 'http://localhost/Schools/home/logout';
        $this->set(compact('loginUrl', 'logoutUrl', 'success', 'error'));
    }
    public function login(){
        $this->layout = 'signup';
         //facebook authentication
        $fb = new Facebook\Facebook([
            'app_id' => '531414230531641',
            'app_secret' => '7fc7611c6ec3170512158b8d78352407',
            'default_graph_version' => 'v2.4',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $redirectUri = 'http://localhost/Schools/home/facebook';
        //$permissions = ['first_name', 'last_name', 'id'];
        $permissions = ['email'];
        //if(!isset($_SESSION['fb_access_token'])){
            $loginUrl = $helper->getLoginUrl($redirectUri, $permissions);
        //}
        //$params = array('next' => $redirectUri);
        //$logoutUrl = $fb->getLogoutUrl($params);
        $logoutUrl = 'http://localhost/Schools/home/logout';
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
    public function logout(){
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
}

//var data = [
//    {Browser: "IE", Share: 60.0},
//    {Browser: "Chrome", Share: 20.0},
//    {Browser: "Mozilla", Share: 10.0}
//]
//    var source = {
//        dataType: "array",
//        dataFields: [
//            {name: 'Browser'},
//            {name: 'Share'}
//        ],
//        localdata: data
//    };
//    var dataAdapter = new $.jqx.dataAdapter(source);
//    
//    var settings = {
//        title: "",
//        description: "",
//        //showLegend:true,
////        legendPosition: {left:520, top:140, width:100, height:100},
////        padding: {left:5, top:5, right:5, bottom:5},
////        titlePadding: {left:0, top:0, right: 0, bottom:10},
//        source: dataAdapter,
//        //colorScheme: 'scheme02',
//         //colorScheme: 'scheme05',
//         //colorScheme: 'scheme06',
//         colorScheme: 'scheme13',
//        seriesGroups: [
//            {
//                type: "donut",
//                showLabels: true,
//                series: [
//                    {
//                        dataField: 'Share',
//                        displayText: 'Browser',
//                        //labelRadius: 100,
//                        initialAngle: 15,
//                        //radius: 100,
//                        innerRadius: 50,
//                        //centerOffset: 0,
//                        formatSettings: {sufix: '%', decimalPlaces:1}
//                    }
//                ]
//            }
//        ]
//    };
//    $("#jqxChat").jqxChart(settings);