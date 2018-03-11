<?php
    $xml = simplexml_load_file("https://www.bookbrowse.com/rss/book_news.rss") or die("Error: Cannot create object");
    $channel = $xml->channel;
    $final_str = '';
    $num_posts = 0;
    foreach($channel->item as $items)
    {
        // if($num_posts%3 == 0)
        // {
        //     $final_str .= '<div class="col-lg-1"></div>';
        // }
        $final_str .= '<div class="col-lg-4">';
        $final_str .= '<div class="rss-viewer">';
        $title = (strlen($items->title) > 60) ? substr($items->title,0,55).'...' : $items->title;
        $final_str .= '<a data-toggle="tooltip" title="'.$items->title.'" href="'.$items->link.'"><b>'.$title.'</b></a><br />';
        $final_str .= '<br />';
        $description = (strlen($items->description) > 135) ? substr($items->description,0,130).'...' : $items->description;
        $final_str .= $description;
        $final_str .= '<br /><br /><span class="news-date">';
        $final_str .= $items->pubDate.'</span>';
        $final_str .= '</div>';
        $final_str .= '</div>';
        $num_posts++;
        if($num_posts == 9)
        {
            break;
        }
        // if($num_posts%3 == 0)
        // {
        //     $final_str .= '<div class="col-lg-1"></div>';
        // }
    }
    echo $final_str;
?>