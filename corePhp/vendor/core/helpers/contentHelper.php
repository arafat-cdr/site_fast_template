<?php
function get_excerpt($string, $length = 55){
    // strip tags to avoid breaking any html
    $string = strip_tags($string);
    if (strlen($string) > $length) {

        // truncate string
        $stringCut = substr($string, 0, $length);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        // $string .= '... <a href="/this/story">Read More</a>';

        return $string;
    }
}

function get_html_decoded_data($data){
    $data = trim($data, '"');
    $data = htmlspecialchars_decode($data);
    $data = html_entity_decode($data);
    return  $data;
}

function br(){
    return "<br/>";
}

function truncateHTML($html, $length)
{
    $truncatedText = substr($html, $length);
    $pos = strpos($truncatedText, ">");
    if($pos !== false)
    {
        $html = substr($html, 0,$length + $pos + 1);
    }
    else
    {
        $html = substr($html, 0,$length);
    }

    preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
    $openedtags = $result[1];

    preg_match_all('#</([a-z]+)>#iU', $html, $result);
    $closedtags = $result[1];

    $len_opened = count($openedtags);

    if (count($closedtags) == $len_opened)
    {
        return $html;
    }

    $openedtags = array_reverse($openedtags);
    for ($i=0; $i < $len_opened; $i++)
    {
        if (!in_array($openedtags[$i], $closedtags))
        {
            $html .= '</'.$openedtags[$i].'>';
        }
        else
        {
            unset($closedtags[array_search($openedtags[$i], $closedtags)]);
        }
    }


    return $html;
}
