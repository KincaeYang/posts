<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Mockery\Exception;

class ESinit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'init elasticsearch';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 创建template
        $client = new Client();
        $url = config('scout.elasticsearch.hosts')[0].'/_template/tmp';
        $client->delete($url);
        $param = [
            'json' =>[
                'template' => config('scout.elasticsearch.index'),  //设置对哪个索引起作用
                'mappings' => [
                    '_default_' => [
                        'dynamic_templates' => [
                            'strings' => [
                                'match_mapping_type' => 'string',   //传入的所有string类型数据
                                'mapping' => [
                                    'type' => 'text',                //全都处理成文本
                                    'analyzer' => 'ik_smart',       //并且使用ik_smart进行分析
                                    'fields' => [
                                        'keyword' => [
                                            'type' => 'keyword'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $client->put($url,$param);

        $this->info("======================创建模板成功=========================");

        //创建index
        $url = config('scout.elasticsearch.hosts')[0].'/'.config('scout.elasticsearch.index');
        $client->delete($url);
        $param = [
            'json' => [
                'settings' => [
                    'refresh_interval' => '5s', //设置更新时间
                    'number_of_shards' => 1,
                    'number_of_replicas' => 0,
                ],
             'mappings' => [
                    '_default_' => [
                        '_all' => [
                            'enabled' => false
                        ]
                    ]
             ]
            ]
        ];
        $client->put($url,$param);
        $this->info("======================创建索引成功=========================");
    }
}
