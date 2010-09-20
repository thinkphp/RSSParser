<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>RSSParser</title>
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css"/>
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/base/base.css" type="text/css">
   <link  href="//fonts.googleapis.com/css?family=Droid+Sans:regular,bold" rel="stylesheet" type="text/css" >  
   <style type="text/css"> 
    html,body{font-family: 'Droid Sans', serif;}  
    h1{color:#339933;font-size:400%;margin:0;padding-bottom:10px;}
    div#rssparser{background: none repeat scroll 0 0 #CCFFCC;}
    div#rssparser ul{margin-left: 2em;}
    div#rssparser p a {background:none repeat scroll 0 0 #FFFFFF;border-bottom:1px solid #000000;color:#000000;display:block;font-size:120%;font-weight:bold;padding:5px;text-decoration:none;}
    div#rssparser ul li p {position: absolute;left: -9999px;top:0}
    div#rssparser ul li.show p {position: relative;left: 0;top:0}
    div#rssparser ul li{padding: 2px}
    #ft{font-size:80%;color:#888;text-align:left;margin:2em 0;font-size: 12px}
    #ft p a{color:#93C37D;}
   </style>
</head>
<body>
<div id="doc2" class="yui-t7">
   <div id="hd" role="banner"><h1>RSSParser</h1></div>
   <div id="bd" role="main">
	<div class="yui-g">
    <div class="yui-u first">

<pre><code>
&lt;?php

include('RSSParser.php');

$rss = new RSSParser();

$rss->load('http://feeds.feedburner.com/ajaxian');

foreach($rss->getItems() as $item) {
 
    echo'&lt;a href="'.$item->getLink().'"&gt;'.

                    $item->getTitle().'&lt;/a&gt;<br/>';
}
?&gt;
</code></pre>
    </div>
    <div class="yui-u">
<div id="rssparser">
<p><a href="http://feeds.feedburner.com/ajaxian">ajaxian.com RSS</a></p>
<?php

include('RSSParser.php');

$rss = new RSSParser();

$rss->load('http://feeds.feedburner.com/ajaxian');

echo'<ul>';

foreach($rss->getItems() as $item) {
 
    echo'<li><a href="'.$item->getLink().'">'.$item->getTitle().'</a><p>'.$item->getDescription().'</p></li>';
}
echo'</ul>';
?>
</div>	
    </div>
</div>

	</div>
   <div id="ft" role="contentinfo"><p>created by@<a href="http://twitter.com/thinkphp">thinkphp</a></p></div>
</div>
<script type="text/javascript">
 DOMhelp = {
 
    addEvent: function(elem,evType,fn,useCapture){
              //if we have gecko
              if(elem.addEventListener) {
                 return elem.addEventListener(evType,fn,useCapture);
              //otherwise we have trident
              } else if(elem.attachEvent) {
                 var r = elem.attachEvent('on'+evType,fn);
                 return r;
              //other
              } else {
                 elem['on'+evType] = fn; 
              }
    },
    getTarget: function(e) {
              var target = window.event ? window.event.srcElement : e ? e.target : null;
              while(target.nodeType != 1 && target.nodeName.toLowerCase() != 'body') {
                    target = target.parentNode;
              } 
              if(!target) {return false;}
        return target;
    },
    cancelClick: function(e) {
             if(window.event) {
                window.event.returnValue = false;
                window.event.cancelBubble = true;
             }
             if(e && e.preventDefault && e.stopPropagation) {
                e.preventDefault();
                e.stopPropagation();
             }
    },
    addClass: function(elem,c) {
            if(!DOMhelp.hasClass(elem,c)) {
                elem.className += c; 
            }
    },
    removeClass: function(elem,c){
            if(DOMhelp.hasClass(elem,c)) {
                elem.className = elem.className.replace(DOMhelp.reg(c),''); 
            }
    },
    hasClass: function(elem,c) {
           return elem.className.match(DOMhelp.reg(c)); 
    },
    reg: function(c) {
         return new RegExp('(\\s|^)'+c+'(\\s|$)');
    }
 };

 var bd = document.getElementById('bd');

     DOMhelp.addEvent(bd,'click',function(e){
             var target = DOMhelp.getTarget(e);

             if(target.nodeName.toLowerCase() == 'a' && target.parentNode.nodeName.toLowerCase() == 'li') {
                       var dad = target.parentNode;
                       if(DOMhelp.hasClass(dad,'show')) {
                          DOMhelp.removeClass(dad,'show');
                       }  else  {
                          DOMhelp.addClass(dad,'show');
                       } 
                DOMhelp.cancelClick(e);  
             }
     },false);
</script>
</body>
</html>
