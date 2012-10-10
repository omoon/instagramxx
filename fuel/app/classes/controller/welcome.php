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
        $f = file_get_contents(APPPATH . "logs/data.txt");

        $tweets = array();
        $json = json_decode($f);
        /**
    [0] => stdClass Object
        (
            [created_at] => Wed, 10 Oct 2012 04:35:20 +0000
            [entities] => stdClass Object
                (
                    [hashtags] => Array
                        (
                        )

                    [urls] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [url] => http://t.co/ljEgqLyS
                                    [expanded_url] => http://instagr.am/p/QlqsK7ATXE/
                                    [display_url] => instagr.am/p/QlqsK7ATXE/
                                    [indices] => Array
                                        (
                                            [0] => 17
                                            [1] => 37
                                        )

                                )

                        )

                    [user_mentions] => Array
                        (
                        )

                )

            [from_user] => michi_krst
            [from_user_id] => 88109359
            [from_user_id_str] => 88109359
            [from_user_name] => t＊child
            [geo] => 
            [id] => 255889228423118848
            [id_str] => 255889228423118848
            [iso_language_code] => ja
            [metadata] => stdClass Object
                (
                    [result_type] => recent
                )

            [profile_image_url] => http://a0.twimg.com/profile_images/1424688687/IMG_0889_normal.JPG
            [profile_image_url_https] => https://si0.twimg.com/profile_images/1424688687/IMG_0889_normal.JPG
            [source] => &lt;a href=&quot;http://instagr.am&quot;&gt;Instagram&lt;/a&gt;
            [text] => 旦那君とランチ。担々麺美味しい♡ http://t.co/ljEgqLyS
            [to_user] => 
            [to_user_id] => 0
            [to_user_id_str] => 0
            [to_user_name] => 
        )
         */
        $data['tweets'] = $json->results;
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
