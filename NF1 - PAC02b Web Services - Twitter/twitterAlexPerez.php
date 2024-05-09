<?php
// ini_set('display_errors', 1);
// require_once('TwitterAPIExchange.php');
require("class.pdofactory.php");
$strDSN = "pgsql:dbname=database;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
// $settings = array(
//     'oauth_access_token' => "",
//     'oauth_access_token_secret' => "",
//     'consumer_key' => "",
//     'consumer_secret' => ""
// );

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
// $url = 'https://api.twitter.com/1.1/blocks/create.json';
// $requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
// $postfields = array(
//     'screen_name' => 'usernameToBlock', 
//     'skip_status' => '1'
// );

/** Perform a POST request and echo the response **/
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->buildOauth($url, $requestMethod)
//              ->setPostfields($postfields)
//              ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/

require('class.twitter.php');

$url = 'https://publish.twitter.com/oembed';
$getfield = 'https://twitter.com/Interior/status/507185938620219395';
$requestMethod = 'GET';

// Codigo que deberia hacer la petición del JSON, da error de curl
//  y esta habilitado correctamente
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->setGetfield($getfield)
//              ->buildOauth($url, $requestMethod)
//              ->performRequest();


$output;
$twitter = 'curl '. $url . '?url=' . $getfield;
exec($twitter, $output);

$json = json_decode($output[0]);

// print_r($json);

echo ('url:'. $json->url . '<br/>');
echo('author:'. $json->author_name . '<br/>');
echo('html:'. htmlspecialchars($json->html) . '<br/>');
echo('type:'. $json->type . '<br/>') ;

$objTwitter= new Twitter($objPDO);

$objTwitter->setUrl($json->url);
$objTwitter->setAuthor_name($json->author_name);
$objTwitter->setHtml(htmlspecialchars($json->html));
$objTwitter->setType($json->type);


// echo(htmlspecialchars_decode($objTwitter->getHtml()));
$objTwitter->save();

echo 'save succesful';