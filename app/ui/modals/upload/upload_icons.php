<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 12:32
 */
class Upload_Icons {

    /**
     * Upload: icons_bild
     *
     * @param $f3
     * @param $param
     */
    function uploadIconItem( $f3, $param ) {
        // vars
        $template = $param[ 'templ' ];
        $icon = $param[ 'icon' ];
        $path = 'app/data/' . $template . '/icons/icons_' . $icon;

        // speichere icon
        $this->save_icon( $path );

        // erstelle verbundenes Ultraschall Icon
        $this->generate_icons( $template, $icon );
    }

    /**
     * Helper function: speichert hochgeladenes Icon ab.
     *
     * @param $path
     *
     * @return string
     */
    public function save_icon( $path ) {
        //Überprüfung der Dateiendung
        $extension = strtolower( pathinfo( $_FILES[ 'files' ][ 'name' ][ 0 ], PATHINFO_EXTENSION ) );
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

    /**
     * Generiert neues Ultraschall Icon
     *
     * @param $templ
     * @param $generat_icon
     */
    public function generate_icons( $templ, $generat_icon ) {
        $template = $templ;
        $iconImage = $generat_icon;
        $setImage = $this->check_setImageName( $iconImage );
        $this->create_UltraschallIcon( $setImage, $iconImage, $template );
    }

    /**
     * Helper function: Datenset und Bestimmungen für merge der Icons.
     *
     * @param $icons
     *
     * @return string
     */
    function check_setImageName( $icons ) {
        $setup = '';

        //toolbar
        $tS = 'topStandalone';
        $tL = 'topLeft';
        $tM = 'topMiddle';
        $tR = 'topRight';

        $vT = 'viewTop';
        $vM = 'viewMiddle';
        $vD = 'viewDown';

        //top stanalone
        if ( $icons == "zoom" )
        {
            $setup = $tS;
        }
        //topLeft
        elseif ( $icons == "rippleon" or $icons == "marker" or $icons == "cut" )
        {
            $setup = $tL;
        }
        //topMiddle
        elseif ( $icons == "remove" )
        {
            $setup = $tM;
        }
        //topRight
        elseif ( $icons == "rippleall" or $icons == "glue" or $icons == "mute" )
        {
            $setup = $tR;
        }
        else
        {
            $setup = 'error';
        }

        return $setup;
    }

    /**
     * Helper function: erstellt nach merge von set & icon das button icon.
     *
     * @param $setImage
     * @param $iconImage
     * @param $templ
     */
    public function create_UltraschallIcon( $setImage, $iconImage, $templ ) {
        $findPath = 'app/data/' . $templ;
        // merge icons
        $set = imagecreatefrompng( $findPath . '/setup/setup_' . $setImage . '.png' );
        $icon = imagecreatefrompng( $findPath . '/icons/icons_' . $iconImage . '.png' );
        $this->merge_icons( $set, $icon, 0, 0, 0, 0, 300, 300, 100 );
        // save merge icons
        $savePath = 'app/data/' . $templ . '/generated/toolbar_' . $iconImage . '.png';
        imagepng( $set, $savePath );
    }

    /**
     * Helper function: schneidet und verbindet Background set mit Icons
     *
     * @param $dst_im
     * @param $src_im
     * @param $dst_x
     * @param $dst_y
     * @param $src_x
     * @param $src_y
     * @param $src_w
     * @param $src_h
     * @param $pct
     */
    function merge_icons( $dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct ) {
        $cut = imagecreatetruecolor( $src_w, $src_h );
        imagecopy( $cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h );
        imagecopy( $cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h );
        imagecopymerge( $dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct );
    }

}