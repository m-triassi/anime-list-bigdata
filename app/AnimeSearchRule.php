<?php

namespace App;

use ScoutElastic\SearchRule;

class AnimeSearchRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        return [
            'fields' => [
                'title' => [
                    'type' => 'plain'
                ],
                'background' => [
                    'type' => 'plain'
                ],
                'genre' => [
                    'type' => 'plain'
                ],
            ],
            'fragment_size' => 300,
            'pre_tags' => '<mark>',
            'post_tags' => '</mark>'
        ];
    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {
        return [
            'must' => [
                'query_string' => [
                    'query' => $this->builder->query,
                ],
            ],
        ];
    }
}
