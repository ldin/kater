<?php
/**
 * Created by PhpStorm.
 * User: ldinka
 * Date: 4/3/16
 * Time: 5:51 PM
 */

class ShowController extends \BaseController
{

    /**
     * Display a listing of the shows.
     *
     * @return Response::json
     */
    public function index()
    {
        $shows = array('Doctor Who', 'Stargate SG1', 'Once upon a time',
                       'The Blacklist', 'Prison Break', 'White Collar');


        return Response::json($shows);
  }
}