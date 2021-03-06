<?php

class ContactsController extends AppController {
	public $components = array('RequestHandler');

    public function index() {
        $contacts = $this->Contact->find('all');



        //echo "<pre>".print_r($contacts,true)."</pre>";

        foreach($contacts as $key=>$value)
        {
        	$contacts[$key]	=	$value['Contact'];
        }


        //Create JSON for graph test
        $response['data']['unique'] =   '23';
        $response['data']['engagements'] =   '67';

        $response['widget_data']['pie']['js'][]   =   "http://local.simplewidget.com/js/vendor/jqplot/jquery.jqplot.min.js";
        $response['widget_data']['pie']['js'][]   =   "http://local.simplewidget.com/js/vendor/jqplot/plugins/jqplot.pieRenderer.min.js";   
        $response['widget_data']['pie']['css'][]   =   "http://local.simplewidget.com/js/vendor/jqplot/jquery.jqplot.min.css";

        $response['widget_data']['bar']['js'][]  =   "http://local.simplewidget.com/js/vendor/jqplot/jquery.jqplot.min.js";
        $response['widget_data']['bar']['js'][]   =   "http://local.simplewidget.com/js/vendor/jqplot/plugins/jqplot.barRenderer.min.js";
        $response['widget_data']['bar']['css'][]   =   "http://local.simplewidget.com/js/vendor/jqplot/jquery.jqplot.min.css";

        //echo "<pre>".print_r($contacts,true)."</pre>";
        //$this->set(array('posts' => $posts, '_serialize' => 'posts'));
        $this->set(array(
            'response'  =>  $response,
            '_serialize' => 'response',
            '_jsonp'    =>  true
        ));
    }

    public function view($id) {

        $contact = $this->Contact->findById($id);
        $contact =	$contact['Contact'];	

        $this->set(array(
            'contact' => $contact
        ));
    }


    public function edit($id) {
        $this->Contact->id = $id;
        if ($this->Contact->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Contact->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function add() {
 
        if ($this->Contact->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

  
}
