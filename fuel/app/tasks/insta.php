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
        $api_url = "http://twitter.com/search.json?include_entities=t&rpp=30&result_type=mixed&q=".urlencode($q);

        $f = file_get_contents($api_url);
        
        $f = '["http://instagr.am/p/PlB_MoFlb-//media/?size=t", "http://instagr.am/p/PlAUn0oyeR//media/?size=t"]';
        
        echo $f;
        $new_data = json_decode($f);
        $tweets = array();
        foreach ($new_data->results as $tweet) {
            $instagram_url = $tweet->entities->urls[0]->expanded_url;
            $thumbnail_url = $instagram_url . "/media/?size=t";
            $tweets[$instagram_url] = $thumbnail_url;
        }

        print_r($tweets);

        $filedir = DOCROOT . 'fuel/app/logs/';
        $filename = 'data.txt';

        //try {
        //    \File::get($filedir.$filename);

        //} catch (Exception $e) {
        //    \File::create($filedir, $filename, true);

        //}
        //$data = array();

        //try {
            $data = \File::read($filedir, $filename, true);
        //} catch (Exception $e) {

        //}

        $old_tweets = json_decode($data);
        foreach ($old_tweets as $instagram_url => $thumbnail_url) {
            $tweets[$instagram_url] = $thumbnail_url;
        }

        \File::update($filedir, $filename, json_encode($tweets));

	}

}

/* End of file tasks/robots.php */
