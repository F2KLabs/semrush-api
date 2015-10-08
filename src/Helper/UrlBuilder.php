<?php

namespace Silktide\SemRushApi\Helper;

use Silktide\SemRushApi\Model\Request;

class UrlBuilder {

    /**
     * @var Request
     */
    protected $request;

    public function build(Request $request)
    {
        $this->request = $request;
        return $this->getUrl();
    }

    /**
     * Convert options to strings.  At the moment, it just implodes export
     * columns to be comma separated
     *
     * @return string[]
     */
    protected function getOptionsAsStrings()
    {
        $options = $this->request->getUrlParameters();
        if (isset($options['export_columns'])) {
            $options['export_columns'] = implode(",", $options['export_columns']);
        }
        return $options;
    }

    /**
     * Get the URL of this request
     *
     * @return string
     */
    protected function getUrl()
    {
        $params = $this->getOptionsAsStrings();
        $filterString = '';

        if(isset($params['display_filter']))
        {
            $qString = new QueryString($params['display_filter']);
            $filterString = $qString->build();

            //We know it has to be atleast 1. If it's more we need to concat the string with the ampersand.
            if(sizeof($params) > 1)
                $filterString .= "&";

            //Don't need to duplicate in http_build_query
            unset($params['display_filter']);
        }

        return $this->request->getEndpoint() . "?". $filterString . http_build_query($params);
    }

} 