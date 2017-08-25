<?php

return [

    'replies_perpage'         => 200,
    'actived_time_for_update' => 'actived_time_for_update',
    'actived_time_data'       => 'actived_time_data',

    'winning_category_id'       => env('WINNING_CATEGORY_ID')?:3,

    'discussion_category_id'       => env('DISCUSSION_CATEGORY_ID')?:4,

    'follow_category_id'       => env('FOLLOW_CATEGORY_ID')?:7,
    'case_category_id'       => env('CASE_CATEGORY_ID')?:8,
    'stm_category_id'         => env('STM_CATEGORY_ID')?:9,
    'mad_category_id'       => env('MAD_CATEGORY_ID')?:10,
    'finch_category_id'       => env('FINCH_CATEGORY_ID')?:11,
    'charlesngo_category_id'         => env('CHARLESNGO_CATEGORY_ID')?:12,
    'malan_category_id'       => env('MALAN_CATEGORY_ID')?:13,

    'foreshow_category_id'         => env('FORESHOW_CATEGORY_ID')?:14,
    'recommend_category_id'         => env('RECOMMEND_CATEGORY_ID')?:15,

    'tutorial_category_id'       => env('TUTORIAL_CATEGORY_ID')?:16,

    'traffic_category_id'       => env('TRAFFIC_CATEGORY_ID')?:17,
    'network_category_id'         => env('NETWORK_CATEGORY_ID')?:18,
    'tracker_category_id'       => env('TRACKER_CATEGORY_ID')?:19,
    'tools_category_id'       => env('TOOLS_CATEGORY_ID')?:20,

    'wiki_topic_id'          => env('WIKI_TOPIC_ID') ?:1,
    'admin_board_cid'        => env('ADMIN_BOARD_CID') ?:0,

    'notify_delay'           => 180,
];
