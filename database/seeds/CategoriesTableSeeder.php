<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            1 =>
            array(
                'id'          => 6,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 6,
                'name'        => '公告',
                'slug'        => 'announcement',
                'description' => '网站公告。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            2 =>
            array(
                'id'          => 7,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 7,
                'name'        => '实战记录',
                'slug'        => 'follow-along',
                'description' => '他山之石，可以攻玉，国际友人的 Follow Along 和相关讨论。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            3 =>
            array(
                'id'          => 8,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 8,
                'name'        => '案例学习',
                'slug'        => 'case-study',
                'description' => '他山之石，可以攻玉，国际友人的 Case Study 和相关讨论。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            4 =>
            array(
                'id'          => 9,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 9,
                'name'        => 'STM 论坛',
                'slug'        => 'stm',
                'description' => 'STM 付费论坛的文章和讨论。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            5 =>
            array(
                'id'          => 10,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 10,
                'name'        => 'Mad Society',
                'slug'        => 'mad-society',
                'description' => 'Mad Society 付费社区的文章和讨论。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            6 =>
            array(
                'id'          => 11,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 11,
                'name'        => 'Finch Sells',
                'slug'        => 'finch-sells',
                'description' => 'STM 大神 Finch 的博文和教程。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            7 =>
            array(
                'id'          => 12,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 12,
                'name'        => 'Charles Ngo',
                'slug'        => 'charles-ngo',
                'description' => 'Charles Ngo 的博文和教程。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            8 =>
            array(
                'id'          => 13,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 13,
                'name'        => 'Malan Darrass',
                'slug'        => 'malan-darrass',
                'description' => 'Malan Darrass 的博文和教程。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            9 =>
            array(
                'id'          => 15,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 15,
                'name'        => '推荐翻译',
                'slug'        => 'recommend',
                'description' => '如果你想早点看到某篇文章，请在此板块给它点赞，也欢迎推荐文章加入此板块，具体请联系 Affren。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            10 =>
            array(
                'id'          => 16,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 16,
                'name'        => '付费培训',
                'slug'        => 'tutorial',
                'description' => '付费培训。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            11 =>
            array(
                'id'          => 17,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 17,
                'name'        => '流量平台',
                'slug'        => 'traffic-source',
                'description' => '流量平台的介绍、注册和设置。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            12 =>
            array(
                'id'          => 18,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 18,
                'name'        => '联盟',
                'slug'        => 'affiliate-network',
                'description' => '联盟的介绍、注册和设置。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            13 =>
            array(
                'id'          => 19,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 19,
                'name'        => '追踪程序',
                'slug'        => 'tracker',
                'description' => '追踪程序的介绍、注册和设置。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            14 =>
            array(
                'id'          => 20,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 20,
                'name'        => '其他工具',
                'slug'        => 'tools',
                'description' => '各类工具的介绍、注册和设置。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            15 =>
            array(
                'id'          => 3,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 3,
                'name'        => '个人博客',
                'slug'        => 'blog',
                'description' => '欢迎记录和分享自己的想法。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            16 =>
            array(
                'id'          => 4,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 4,
                'name'        => '综合讨论',
                'slug'        => 'discussion',
                'description' => '综合讨论区。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            17 =>
            array(
                'id'          => 5,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 5,
                'name'        => '成长之路',
                'slug'        => 'winning',
                'description' => '个人成长的实战记录。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
        ));
    }
}
