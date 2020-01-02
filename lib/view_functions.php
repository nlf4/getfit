<?php

function IsLoggedIn ()
{
    if ($_GET['id'] === null or $_GET['id'] == $_SESSION['id']){
        return true;
    } else {
        return false;
    }
}

function NavBar() {
    print LoadTemplate("navbar");
}

function Footer() {
    print LoadTemplate("footer");
}

function BasicHead( $css = "" )
{
    global $_application_folder;
    $str_stylesheets = "";
    if ( is_array($css) )
    {
        foreach( $css as $stylesheet )
        {
            $str_stylesheets .= '<link rel="stylesheet" href="' . $_application_folder . '/css/' . $stylesheet . '">' ;
        }
        $data = array("stylesheets" => $str_stylesheets );
    }
    $template = LoadTemplate("basic_head");
    print ReplaceContentOneRow($data, $template);
    $_SESSION["head_printed"] = true;
}

function LoadTemplate( $name )
{
    if ( file_exists("$name.html") ) return file_get_contents("$name.html");
    if ( file_exists("templates/$name.html") ) return file_get_contents("templates/$name.html");
    if ( file_exists("../templates/$name.html") ) return file_get_contents("../templates/$name.html");
}

/* Deze functie voegt data en template samen en print het resultaat */
function ReplaceContent( $data, $template_html )
{
    $returnval = "";

    foreach ( $data as $row )
    {
        //replace fields with values in template
        $content = $template_html;
        foreach($row as $field => $value)
        {
            $content = str_replace("@@$field@@", $value, $content);
        }

        $returnval .= $content;
    }

    return $returnval;
}

function ReplaceContentOneRow( $row, $template_html )
{
    //replace fields with values in template
    $content = $template_html;
    foreach($row as $field => $value)
    {
        $content = str_replace("@@$field@@", $value, $content);
    }

    return $content;
}