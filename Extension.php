<?php

namespace Bolt\Extension\billbsing\Highlightjs;

use Bolt\Application;
use Bolt\BaseExtension;

class Extension extends BaseExtension
{
    public function initialize() 
    {
        $styleName = 'default';
        if ( $this->config and isset($this->config['highlightjs_style'] ) ) {
            $styleName = $this->config['highlightjs_style'];
        }      
        $path = $this->app['paths']['extensions'].'local/billbsing/'.$this->getName().'/'; 
        $this->addCss('assets/styles/'.$styleName.'.css');
//        $this->addJavascript($path.'assets/highlight.pack.js');
        $this->addSnippet('endofbody', '<script src="'.$path.'assets/highlight.pack.js"></script>' 
                 . '<script>hljs.initHighlightingOnLoad();</script>');
    }

    public function getName()
    {
        return "Highlightjs";
    }
    
}






