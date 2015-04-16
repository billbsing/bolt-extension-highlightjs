<?php

namespace Bolt\Extension\billbsing\highlightjs;

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
        
        $assetsPath = $this->getBasePath().'/assets';

        // check to see if we can find the assets in our extension path
        if ( file_exists($assetsPath) ) {
            $this->addCss('assets/styles/'.$styleName.'.css');
    
            // need to make sure that the init script always runs after the js load script
            
//          $this->addJavascript($path.'assets/highlight.pack.js');
            $this->addSnippet('endofbody', '<script src="'.$this->getBaseUrl().'assets/highlight.pack.js"></script>' 
                     . '<script>hljs.initHighlightingOnLoad();</script>');
        }
    }

    public function getName()
    {
        return "highlightjs";
    }
    
}






