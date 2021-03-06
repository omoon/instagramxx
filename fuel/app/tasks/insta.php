<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Fuel\Tasks;

/**
 * Robot example task
 *
 * Ruthlessly stolen from the beareded Canadian sexy symbol:
 *
 *		Derek Allard: http://derekallard.com/
 *
 * @package		Fuel
 * @version		1.0
 * @author		Phil Sturgeon
 */

class Insta
{

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r robots
	 *
	 * or
	 *
	 * php oil r robots "Kill all Mice"
	 *
	 * @return string
	 */
	public static function get($q)
	{
        echo $q .= '+AND+instagr.am';
        echo $api_url =
            "http://search.twitter.com/search.json?include_entities=t&since_id="
          . \Model_Tweet::getMaxIdStr()
          . "&rpp=50&result_type=mixed&q="
            . rawurlencode($q);

        $json_data = file_get_contents($api_url);

        \Model_Tweet::addTweets($json_data);


        //$tweet = Model_Tweet::forge()->set(array('expanded_url' => 'http://xxx.xx.xx', 'text' => 'aaatest'))->save();

        //$filedir = APPPATH . 'logs/';
        //$filename = 'data.txt';
        //\File::update($filedir, $filename, $f);
        
        //$f = '["http://instagr.am/p/PlB_MoFlb-//media/?size=t", "http://instagr.am/p/PlAUn0oyeR//media/?size=t"]';
        //
        //echo $f;
        //$new_data = json_decode($f);
        //$tweets = array();
        //foreach ($new_data->results as $tweet) {
        //    $instagram_url = $tweet->entities->urls[0]->expanded_url;
        //    $thumbnail_url = $instagram_url . "/media/?size=t";
        //    $tweets[$instagram_url] = $thumbnail_url;
        //}

        //print_r($tweets);

        //$filedir = APPPATH . 'logs/';
        //$filename = 'data.txt';

        ////try {
        ////    \File::get($filedir.$filename);

        ////} catch (Exception $e) {
        ////    \File::create($filedir, $filename, true);

        ////}
        ////$data = array();

        ////try {
        //    $data = \File::read($filedir, $filename, true);
        ////} catch (Exception $e) {

        ////}

        //$old_tweets = json_decode($data);
        //foreach ($old_tweets as $instagram_url => $thumbnail_url) {
        //    $tweets[$instagram_url] = $thumbnail_url;
        //}

        //\File::update($filedir, $filename, json_encode($tweets));

	}

	public static function test()
	{

        \Model_Tweet::getMaxIdStr();



    }
}

/* End of file tasks/robots.php */
