<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
        ini_set('user_agent', 'User-Agent: xxx');
        $tweets = array();
        $f = file_get_contents(APPPATH . "logs/data.txt");

        $json = json_decode($f);
        foreach ($json->results as $tweet) {
            if (isset($tweet->entities->urls[0])) {
                $instagram_url = $tweet->entities->urls[0]->expanded_url;
                $thumbnail_url = $instagram_url . "/media/?size=t";
                $tweets[$instagram_url] = $thumbnail_url;
            }
        }

        $data['tweets'] = $tweets;
        
		return Response::forge(View::forge('welcome/index', $data));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(ViewModel::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}
}
