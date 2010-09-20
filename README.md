RSSParser
=========

  This is a simple PHP class to parse RSS feeds.

Usage
=====

      <?php
 
         include('RSSParser.php');

         $rss = new RSSParser();

         $rss->load('http://feeds.feedburner.com/ajaxian');

         foreach($rss->getItems() as $item) {
 
            echo'<a href="'.$item->getLink().'">'.$item->getTitle().</a><br/>';
         }
      ?>