<?php

namespace Silktide\SemRushApi\Data;

abstract class Type
{

    use ConstantTrait;

    /* Domain Reports */
    const TYPE_DOMAIN_RANKS = "domain_ranks";
    const TYPE_DOMAIN_RANK = "domain_rank";
    const TYPE_DOMAIN_RANK_HISTORY = "domain_rank_history";
    const TYPE_DOMAIN_ORGANIC = "domain_organic";
    const TYPE_DOMAIN_ORGANIC_COMPETITORS = "domain_organic_organic";
    const TYPE_DOMAIN_ADWORDS_COMPEITITORS = "domain_adwords_adwords";
    const TYPE_DOMAIN_ADWORDS = "domain_adwords";
    const TYPE_DOMAIN_ADWORDS_UNIQUE = "domain_adwords_unique";

    /*Keyword Reports */
    const TYPE_ORGANIC_RESULTS                  = "phrase_organic";
    const TYPE_PHRASE_FULLSEARCH                = "phrase_fullsearch";
    const TYPE_PHRASE_ALL                       = "phrase_all";
    const TYPE_PHRASE_ADWORDS                   = "phrase_adwords";
    const TYPE_PHRASE_ADWORDS_HISTORICAL        = "phrase_adwords_historical";
    const TYPE_PHRASE_KDI                       = "phrase_kdi";
    const TYPE_PHRASE_RELATED                   = "phrase_related";
    const TYPE_PHRASE_THIS                      = "phrase_this";

    /* Display Advertising Reports */
    const TYPE_PUBLISHER_TEXT_ADS               = "publisher_text_ads";
    const TYPE_PUBLISHER_ADVERTISERS            = "publisher_advertisers";
    const TYPE_ADVERTISER_PUBLISHERS            = "advertiser_publishers";
    const TYPE_ADVERTISER_TEXT_ADS              = "advertiser_text_ads";
    const TYPE_ADVERTISER_LANDINGS              = "advertiser_landings";
    const TYPE_ADVERTISER_PUBLISHER_TEXT_ADS    = "advertiser_publisher_text_ads";
    const TYPE_ADVERTISER_RANK                  = "advertiser_rank";
    const TYPE_PUBLISHER_RANK                   = "publisher_rank";

    /* Backlinks */
    const TYPE_INDEXED_PAGES                    = "backlinks_pages";
    const TYPE_BACKLINKS_REFDOMAINS             = "backlinks_refdomains";



    /**
     * Get all the possible columns
     *
     * @return string[]
     */
    public static function getTypes()
    {
        return self::getConstants();
    }
} 