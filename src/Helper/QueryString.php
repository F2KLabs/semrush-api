<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 10/8/2015
 * Time: 10:52 AM
 */

namespace Silktide\SemRushApi\Helper;


class QueryString {
    private $parts = array();


    public function  __construct(Array $arr = [])
    {
        foreach($arr as $key=>$val)
        {
            $this->add($key,$val);
        }
    }

    public function add($key, $value) {
        $this->parts[] = array(
            'key'   => $key,
            'value' => $value
        );
    }

    public function build($separator = '&', $equals = '=') {
        $queryString = array();

        foreach($this->parts as $part) {
            $queryString[] = urlencode('display_filter') . $equals . urlencode($part['value']);
        }

        return implode($separator, $queryString);
    }

    public function __toString() {
        return $this->build();
    }
}