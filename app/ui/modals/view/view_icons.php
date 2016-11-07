<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 10:31
 */
class View_Icons {
    /**
     * HOME PAGE
     */
    function welcome( $f3 ) {
        //vars
        $f3->set( 'area', 'templates' );
        $f3->set( 'content', 'pages/view/icons.htm' );

        //output
        echo View::instance()->render( 'pages/layout.htm' );
    }
}