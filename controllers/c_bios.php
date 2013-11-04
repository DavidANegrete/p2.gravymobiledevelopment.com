<?php
/**
 * Created by JetBrains PhpStorm.
 * User: David Negrete
 * Date: 10/29/13
 * Time: 11:10 AM
 */


class bios_controller extends base_controller {
    public $bio_created = 1;



    public function __construct() {

        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
    }#EO __construct()

    public function add() {





            # Setup view
            $this->template->content = View::instance('v_bios_add');
            $this->template->title   = "Bio";

            # Render template
            echo $this->template;



        Router::redirect("/bios/index");




    }#EO add

    public function p_add() {

        #querring the DB for a bio_id
        $q = "SELECT bio_id
	         FROM bios
	         WHERE user_id =".$this->user->user_id;

        $bio_id = DB::instance(DB_NAME)->select_field($q);


        #If the bio_id exists then redirect else allow user to create profile
        if(bio_id <= 1){
            Router::redirect("/bios/index");
        }
        else{
            # Associate this bio with this user
            $_POST['user_id']  = $this->user->user_id;

            # Unix timestamp of when this post was created / modified
            $_POST['created']  = Time::now();
            $_POST['modified'] = Time::now();

            # Insert
            DB::instance(DB_NAME)->insert('bios', $_POST);
        }

     }#EO p_add

    public function index(){

        # Setup view
        $this->template->content = View::instance('v_bios_index');

        #get the bio
        $q = 'SELECT bios . *
         FROM  `bios`
         INNER JOIN users ON bios.user_id = '.$this->user->user_id;

        $bios = DB::instance(DB_NAME)->select_rows($q);

        $this->template->content->bios = $bios;

        # Render template
        echo $this->template;
    }#EO edit

    public function edit(){

        # Setup view
        $this->template->content = View::instance('v_bios_edit');

        #get the bio
        $q = 'SELECT bios . *
         FROM  `bios`
         INNER JOIN users ON bios.user_id = '.$this->user->user_id;

        $bios = DB::instance(DB_NAME)->select_rows($q);

        $this->template->content->bios = $bios;

        # Render template
        echo $this->template;
    }#EO edit


   public function p_edit(){

       # Associate this bio with this user
       $_POST['user_id']  = $this->user->user_id;

       # Unix timestamp of when this post was  modified
       $_POST['modified'] = Time::now();

       DB::instance(DB_NAME)->update("bios", $_POST, "WHERE user_id =". $this->user->user_id);

       Router::redirect("/bios/index");

   }
























}