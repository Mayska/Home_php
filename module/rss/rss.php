<?php 
    $dataFlux = getFlux();

    function getFlux(){
        $rssData = array();
        (string) $today = date("d-m-Y");
        $urlFlux = 'https://webnext.fr/epg_cache/programme-tv-rss_'.$today.'.xml';
        $rss = simplexml_load_file($urlFlux);
        $i=0;
        foreach ($rss->channel->item as $item){
            $rssData[$i] = [ 
                title => (string) $item->title,
                link => (string) $item->link,
                category => (string) $item->category , 
                description => (string) $item->description,
                comments => (string) $item->comments
            ];
            $i++;
        }
        return $rssData;
    }
?>