<?php
$xmlStr = <<<EOF
<person>
      <foo name="one" game="lonely">1</foo>
      <goo name="two" game="wage">1</goo>
</person>
EOF;

$xml = new SimpleXMLElement($xmlStr);
foreach ($xml->foo[0]->attributes() as $key => $value) {
    echo $key, '="', $value, "\"\n";
}

echo simpleXML . phpsprintf("get doc name space %s ", $xml->getDocNamespaces()) . PHP_EOL;
var_dump($xml->getNamespaces());

echo sprintf("has child %d \n", $xml->children()->count());

foreach ($xml->children() as $child) {
    echo sprintf("child name : %s \n", $child->getName());
}

$xml->addAttribute('type', 'documentary');
$xml->addChild('title', 'PHP2: More Parser Stories');

echo $xml->asXML();
