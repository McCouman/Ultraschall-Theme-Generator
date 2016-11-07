<?php


class Create_Templates {

    /**
     * Erstellen eines neuen Templates
     *
     * @param $f3
     */
    function templateItem( $f3 ) {
        $folder = $_POST[ 'templ' ];
        $path = $this->generate_templateFolder( $folder );
        $this->generate_imagesInFolders( $path, $folder );
        header( "location: " . '/templates' );
    }

    //----

    /**
     * Erstellt die Ordnerstruktur eines Templates.
     *
     * @param $folder
     *
     * @return string
     */
    public function generate_templateFolder( $folder ) {
        // 1. erstelle <template> ordner
        $path = 'app/data/' . $folder;
        if ( ! mkdir( $path, 0777, true ) )
        {
            die( 'Erstellung des Templates nicht möglich!' );
        }
        else
        {
            // 2. erstelle setup ordner unter templates
            $pathSet = 'app/data/' . $folder . '/setup';
            if ( ! mkdir( $pathSet, 0777, true ) )
            {
                die( 'Erstellung des Ordners "setup" nicht möglich!' );
            }
            else
            {
                // 3. erstelle icons ordner unter templates
                $pathSetIcons = 'app/data/' . $folder . '/icons';
                if ( ! mkdir( $pathSetIcons, 0777, true ) )
                {
                    die( 'Erstellung des Ordners "icons" nicht möglich!' );
                }
                else
                {
                    // 4. erstelle generated ordner unter templates
                    $pathSetIcons = 'app/data/' . $folder . '/generated';
                    if ( ! mkdir( $pathSetIcons, 0777, true ) )
                    {
                        die( 'Erstellung des Ordners "generated" nicht möglich!' );
                    }

                    return $path;
                }
            }
        }
    }

    /**
     * Generiert eine Kopie der standard bilder in die Unterordner von data.
     *
     * @param $path
     * @param $folder
     */
    public function generate_imagesInFolders( $path, $folder ) {
        $standardFile = 'app/ui/assets/standard/data.txt';
        $newFile = $path . '/generated/' . $folder . '.ReaperTheme';
        if ( ! copy( $standardFile, $newFile ) )
        {
            die ( 'Kopieren von: ' . $standardFile . 'nicht möglich!' );
        }
        else
        {
            // setup daten kopieren
            $this->copy_set( 'topLeft', $path, 'setup' );
            $this->copy_set( 'topMiddle', $path, 'setup' );
            $this->copy_set( 'topRight', $path, 'setup' );
            $this->copy_set( 'topStandalone', $path, 'setup' );
            $this->copy_set( 'viewDown', $path, 'setup' );
            $this->copy_set( 'viewMiddle', $path, 'setup' );
            $this->copy_set( 'viewTop', $path, 'setup' );

            // icons daten kopieren
            $this->copy_set( 'bier', $path, 'icons' );
            $this->copy_set( 'chapters', $path, 'icons' );
            $this->copy_set( 'cut', $path, 'icons' );
            $this->copy_set( 'export', $path, 'icons' );
            $this->copy_set( 'fade', $path, 'icons' );
            $this->copy_set( 'folder', $path, 'icons' );
            $this->copy_set( 'glue', $path, 'icons' );
            $this->copy_set( 'idee', $path, 'icons' );
            $this->copy_set( 'labels', $path, 'icons' );
            $this->copy_set( 'link', $path, 'icons' );
            $this->copy_set( 'marker', $path, 'icons' );
            $this->copy_set( 'mic', $path, 'icons' );
            $this->copy_set( 'music', $path, 'icons' );
            $this->copy_set( 'mute', $path, 'icons' );
            $this->copy_set( 'newitem', $path, 'icons' );
            $this->copy_set( 'newregion', $path, 'icons' );
            $this->copy_set( 'remove', $path, 'icons' );
            $this->copy_set( 'rippleon', $path, 'icons' );
            $this->copy_set( 'tape', $path, 'icons' );
            $this->copy_set( 'trim', $path, 'icons' );
            $this->copy_set( 'txt2', $path, 'icons' );
            $this->copy_set( 'unlink', $path, 'icons' );
            $this->copy_set( 'zoom', $path, 'icons' );

            // generated daten kopieren
            $this->copy_set( 'bier', $path, 'generated' );
            $this->copy_set( 'chapters', $path, 'generated' );
            $this->copy_set( 'cut', $path, 'generated' );
            $this->copy_set( 'export', $path, 'generated' );
            $this->copy_set( 'fade', $path, 'generated' );
            $this->copy_set( 'folder', $path, 'generated' );
            $this->copy_set( 'glue', $path, 'generated' );
            $this->copy_set( 'idee', $path, 'generated' );
            $this->copy_set( 'labels', $path, 'generated' );
            $this->copy_set( 'link', $path, 'generated' );
            $this->copy_set( 'marker', $path, 'generated' );
            $this->copy_set( 'mic', $path, 'generated' );
            $this->copy_set( 'music', $path, 'generated' );
            $this->copy_set( 'mute', $path, 'generated' );
            $this->copy_set( 'newitem', $path, 'generated' );
            $this->copy_set( 'newregion', $path, 'generated' );
            $this->copy_set( 'remove', $path, 'generated' );
            $this->copy_set( 'rippleon', $path, 'generated' );
            $this->copy_set( 'tape', $path, 'generated' );
            $this->copy_set( 'trim', $path, 'generated' );
            $this->copy_set( 'txt2', $path, 'generated' );
            $this->copy_set( 'unlink', $path, 'generated' );
            $this->copy_set( 'zoom', $path, 'generated' );
        }
    }

    /**
     * Helper function: Kopieren von standard image libs
     *
     * @param        $fileName
     * @param        $path
     * @param string $type
     */
    function copy_set( $fileName, $path, $type = 'setup' ) {
        $prefix = '';
        $folder = '';
        if ( $type == "icons" )
        {
            $folder = $type;
            $prefix = $type . '_';
        }
        elseif ( $type == "setup" )
        {
            $folder = $type;
            $prefix = $type . '_';
        }
        elseif ( $type == "generated" )
        {
            $folder = "icons";
            $prefix = 'toolbar_';
        }
        $copyFrom = 'app/ui/assets/standard/' . $folder . '/' . $fileName . '.png';
        $saveFile = $path . '/' . $type . '/' . $prefix . $fileName . '.png';
        if ( ! copy( $copyFrom, $saveFile ) )
        {
            die ( 'Kopieren von: ' . $copyFrom . 'nicht möglich!' );
        }
    }
}

