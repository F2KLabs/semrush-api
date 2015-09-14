<?php

namespace Silktide\SemRushApi\Data;

abstract class Column
{
    use ConstantTrait;

    const COLUMN_OVERVIEW_ADWORDS_BUDGET = "Ac";
    const COLUMN_OVERVIEW_ADWORDS_KEYWORDS = "Ad";
    const COLUMN_OVERVIEW_ADWORDS_TRAFFIC = "At";
    const COLUMN_OVERVIEW_DATABASE = "Db";
    const COLUMN_OVERVIEW_DOMAIN = "Dn";
    const COLUMN_OVERVIEW_ORGANIC_BUDGET = "Oc";
    const COLUMN_OVERVIEW_ORGANIC_KEYWORDS = "Or";
    const COLUMN_OVERVIEW_ORGANIC_TRAFFIC = "Ot";
    const COLUMN_OVERVIEW_SEMRUSH_RATING = "Rk";
    const COLUMN_OVERVIEW_DATE = "Dt";
    const COLUMN_DOMAIN_KEYWORD = "Ph";
    const COLUMN_DOMAIN_KEYWORD_ORGANIC_POSITION = "Po";
    const COLUMN_DOMAIN_KEYWORD_PREVIOUS_ORGANIC_POSITION = "Pp";
    const COLUMN_KEYWORD_AVERAGE_QUERIES = "Nq";
    const COLUMN_KEYWORD_AVERAGE_CLICK_PRICE = "Cp";
    const COLUMN_DOMAIN_KEYWORD_TRAFFIC_PERCENTAGE = "Tr";
    const COLUMN_KEYWORD_ESTIMATED_PRICE = "Tc";
    const COLUMN_KEYWORD_COMPETITIVE_AD_DENSITY = "Co";
    const COLUMN_KEYWORD_ORGANIC_NUMBER_OF_RESULTS = "Nr";
    const COLUMN_KEYWORD_INTEREST = "Td";
    const COLUMN_DOMAIN_KEYWORD_AD_TITLE = "Tt";
    const COLUMN_DOMAIN_KEYWORD_AD_TEXT = "Ds";
    const COLUMN_DOMAIN_KEYWORD_VISIBLE_URL = "Vu";
    const COLUMN_DOMAIN_KEYWORD_TARGET_URL = "Ur";
    const COLUMN_DOMAIN_KEYWORD_NUMBER = "Pc";
    const COLUMN_DOMAIN_KEYWORD_POSITION_DIFFERENCE = "Pd";
    const COLUMN_DOMAIN_ADWORD_POSITION = "Ab";
    const COLUMN_KEYWORD_DIFFICULTY = "Kd";
    const COLUMN_KEYWORD_COMPETITION_LEVEL = "Cr";
    const COLUMN_KEYWORDS_COMMON = "Np";

    /* Display Advertising Report Columns */
    const COLUMN_TITLE          = "title";
    const COLUMN_TEXT           = "text";
    const COLUMN_FIRST_SEEN     = "first_seen";
    const COLUMN_LAST_SEEN      = "last_seen";
    const COLUMN_TIMES_SEEN     = "times_seen";
    const COLUMN_AVG_POSITION   = "avg_position";
    const COLUMN_MEDIA_TYPE     = "media_type";
    const COLUMN_VISIBLE_URL    = "visible_url";
    const COLUMN_TARGET_URL     = "target_url";
    const COLUMN_ADS_COUNT      = "ads_count";
    const COLUMN_ADS_OVERALL    = "ads_overall";
    const COLUMN_PUBLISHERS_COUNT = "publishers_count";
    const COLUMN_PUBLISHERS_OVERALL = "publishers_overall";
    const COLUMN_MEDIA_ADS_COUNT = "media_ads_count";
    const COLUMN_MEDIA_ADS_OVERALL = "media_ads_overall";
    const COLUMN_TEXT_ADS_COUNT = "text_ads_count";
    const COLUMN_TEXT_ADS_OVERALL = "text_ads_overall";

    /* BACKLINKS COLUMNS */
    const COLUMN_DOMAIN         = "domain";
    const COLUMN_BACKLINKS      = "backlinks";
    const COLUMN_IP             = "ip";
    const COLUMN_COUNTRY        = "country";
    const COLUMN_RESPONSE_CODE  = "response_code";
    const COLUMN_BACKLINKS_NUM  = "backlinks_num";
    const COLUMN_DOMAINS_NUM    = "domains_num";
    const COLUMN_EXTERNAL_NUM   = "external_num";
    const COLUMN_INTERNAL_NUM   = "internal_num";
    const COLUMN_SOURCE_URL     = "source_url";
    const COLUMN_SOURCE_TITLE   = "source_title";


    /**
     * Get all the possible columns
     *
     * @return string[]
     */
    public static function getColumns()
    {
        return self::getConstants();
    }

    /**
     * Check if the given code is a valid column code
     *
     * @param string $code
     * @return bool
     */
    public static function isValidColumn($code)
    {
        return in_array($code, self::getColumns());
    }
} 