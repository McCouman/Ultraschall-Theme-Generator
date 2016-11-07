<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 12:32
 */
class Upload_Setup {

    /**
     * upload eines set_bildes
     *
     * @param $f3
     */
    function uploadSetupItem( $f3, $param ) {
        // vars
        $template = $param[ 'templ' ];
        $setup = $param[ 'set' ];

        $path = 'app/data/' . $template . '/setup/setup_' . $setup;

        $extension = strtolower( pathinfo( $_FILES[ 'files' ][ 'name' ][ 0 ], PATHINFO_EXTENSION ) );

        //Überprüfung der Dateiendung
        $allowed_extensions = array( 'png' );
        if ( ! in_array( $extension, $allowed_extensions ) )
        {
            die( "Ungültige Dateiendung. Nur PNG-Dateien sind erlaubt!" );
        }

        //Überprüfung dass das Bild keine Fehler enthält
        $allowed_types = array( IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF );
        $detected_type = exif_imagetype( $_FILES[ 'files' ][ 'tmp_name' ][ 0 ] );
        if ( ! in_array( $detected_type, $allowed_types ) )
        {
            die( "Nur der Upload von Bilddateien ist gestattet" );
        }

        if ( @$_FILES[ 'files' ][ "type" ][ 0 ] != "" )
        {
            global $type;
            if ( @$_FILES[ 'files' ][ "type" ][ 0 ] == "image/png" )
            {
                $type = ".png";
            }

            $temp = (string) @$_FILES[ 'files' ][ 'tmp_name' ][ 0 ];
            move_uploaded_file( $temp, $path . $type );
        }
    }

}