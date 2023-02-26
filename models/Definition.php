<?php namespace Xeor\Sitemap\Models;

use DOMDocument;
use Winter\Sitemap\Models\Definition as WinterDefinition;

/**
 * Definition Model
 */
class Definition extends WinterDefinition
{

    public function generatePrettySitemap()
    {
        $xml = new DOMDocument;
        $xml->loadXML($this->generateSitemap());
        $xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="/plugins/xeor/sitemap/assets/xsl/sitemap.xsl"');
        $xml->insertBefore($xslt, $xml->firstChild);
        return $xml->saveXML();
    }
}
