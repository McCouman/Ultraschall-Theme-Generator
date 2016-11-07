<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 09:36
 */
class View_Index {

    /**
     * Index Page
     */
    function welcome( $f3 ) {
        //redirect: templates
        header( "location: " . Base::instance()->get( 'BASE' ) . 'templates' );
    }
}