<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 05.11.16
 * Time: 22:52
 */
class View_Setup {
    /**
     * Setup PAGE
     */
    function welcome( $f3 ) {
        //vars
        $f3->set( 'content', 'pages/view/setup.htm' );

        //output
        echo View::instance()->render( 'pages/layout.htm' );
    }
}