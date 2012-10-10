<?php
class Model_Tweet extends \Model_Crud
{

    protected static $_table_name = 'tweets';
    protected static $_primary_key = 'id';

    protected static $_properties = array(
        'id',
        'expanded_url',
        'text',
        'id_str',
        'created_at',
        'updated_at',
    );

    protected static $_created_at = 'created_at';
    protected static $_updated_at = 'updated_at';
    protected static $_mysql_timestamp = true;


    // Inside your model
    protected static function pre_find(&$query)
    {
        // alter the query
        $query->order_by('id_str', 'desc');
    }


    public static function getMaxIdStr()
    {
        $users = static::find(array(
            'select' => array('id_str'),
            'order_by' => array(
                'id_str' => 'desc',
            ),
            'limit' => 1,
        ));

        return $users[0]->id_str;
    }


    public static function addTweets($json_data)
    {

        $json = json_decode($json_data);
        $tweets = $json->results;

        foreach ($tweets as $tweet) {
            $expanded_url = $tweet->entities->urls[0]->expanded_url;
            $text = $tweet->text;
            $id_str = $tweet->id_str;
            static::forge()->set(array('expanded_url' => $expanded_url, 'text' => $text, 'id_str' => $id_str))->save();
        }


    }

    public static function getTweets()
    {

        $f = file_get_contents(APPPATH . "logs/data.txt");

        $tweets = array();
        $json = json_decode($f);
        return $json->results;

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
    }
}
