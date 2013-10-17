<?php
class users_controller extends base_controller {
public $date = "12/12/12";
public function __construct() {
	parent::__construct();
	
}
public function index(){
	echo "This is the index page";
}
public function signup() {
	# Setup view
		$this->template->content = View::instance('v_users_signup');
		$this->template->title   = "Sign Up";

	# Render template
		echo $this->template;
}

public function p_signup(){
	
	#Adding time stamp to store with the users	
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();

	# Encrypting the password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

	# Create an encrypted token via their email address and a random string
    	$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

	# DB insertion
		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

	 # Confirmation
		#echo 'You\'re signed up';
		Router::redirect("/users/p_test/");



}
##used to test cookies
public function p_test() {
echo '<pre>';
print_r($this->user);
echo '</pre>';

}

public function login() {
	
    # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";

    # Render template
        echo $this->template;

} 

public function p_login(){
	
	# Sanitize the user entered data to keep hackers out
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

	# Hash submitted password to complete authentication
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

	# Search the db for this email and password
    # Retrieve the token if it's available
		$q = "SELECT token 
        FROM users 
        WHERE email = '".$_POST['email']."' 
        AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

    # If we didn't find a matching token in the database, it means the login failed
        if(!$token) {

        	# Send them back to the login page
        		Router::redirect("/users/login/");

    # But if we did, login succeeded! 
        } else {

        	# setting the cookie, cookie name: token, value: token, TTL:1 year, path: '/' the entire domain.
        		//echo "Logged IN";
        		setcookie("token", $token, strtotime('+1 year'), '/');
        		Router::redirect("/");
        }
 } #EO p_login


public function logout() {

	#generate and save new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

	#Create the data array to be used with the update method
	#Only saving one thing because there is only one thing to update
		$data = Array("token" => $new_token);

	#Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

	#Delete the users token cookie by setting it to a date in the past - (logging them out)
		setcookie("token", "", strtotime('-1 year'), '/');

	#Send them back to the main index
		Router::redirect("/");
} #EO logout 

public function profile($user_name = NULL) {

	# If user is blank, they're not logged in; redirect them to the login page
		if(!$this->user) {
        Router::redirect('/users/login');
        }

    # set up the view
        $this->template->content = View::instance('v_users_profile');
        
        $this->template->title = "Profile";

        $client_files_head = Array(
	'/css/prolie.css',
	'/css/master.css'
	);

        $this->template->client_files_head = Utils::load_client_files($client_files_head);

        $client_files_body = Array(
	'/js/prolie.js'
	);

        $this->template->client_files_body = Utils::load_client_files($client_files_body);

    #pass the data to the view
        $this->template->content->user_name = $user_name;

    #Display the view
        echo $this->template;
}#EO profile

}#EOC




