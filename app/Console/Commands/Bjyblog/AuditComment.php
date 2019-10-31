<?php

namespace App\Console\Commands\Bjyblog;

use AipImageCensor;
use App\Models\Comment;
use Illuminate\Console\Command;

class AuditComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjyblog/AuditComment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Audit Comment';

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
        $baiduConfig = [
            config('services.baidu.appid'),
            config('services.baidu.appkey'),
            config('services.baidu.secret'),
        ];

        if (count(array_filter($baiduConfig)) === 3) {
            $comments = Comment::select('id', 'content', 'is_audited')->withTrashed()->get();

            $baiduClient = new AipImageCensor(config('services.baidu.appid'), config('services.baidu.appkey'), config('services.baidu.secret'));

            $count = 0;
            foreach ($comments as $comment) {
                /** @var \App\Models\Comment $comment */

                if ($comment->is_audited === 0) {
                    continue;
                }

                $count++;

                $content = $comment->getOriginal('content');
                $result = $baiduClient->antiSpam($content);

                if (!isset($result['result']['spam'])) {
                    $this->error('error: '. json_encode($result));
                } else {
                    $comment->timestamps = false;
                    $comment->is_audited = $result['result']['spam'] === 0 ? 1 : 0;
                    $comment->save();

                    $message = 'id:' . $comment->id . ' is_audited:' . $comment->is_audited . ' content:' . $content;

                    if ($comment->is_audited === 1) {
                        $this->info($message);
                    } else {
                        $this->error($message);
                    }
                }

                if ($count === 5) {
                    sleep(1);
                    $count = 0;
                }
            }
        } else {
            $this->error('请先配置百度的 key ');
        }
    }
}
