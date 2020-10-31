<?php

declare(strict_types=1);

namespace App\Console\Commands\Bjyblog;

use AipContentCensor;
use App\Models\Comment;
use Illuminate\Console\Command;

class AuditComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjyblog:audit-comment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Audit Comment';

    public function handle(): int
    {
        $baiduConfig = [
            config('services.baidu.appid'),
            config('services.baidu.appkey'),
            config('services.baidu.secret'),
        ];

        if (count(array_filter($baiduConfig)) === 3) {
            $comments = Comment::withTrashed()
                ->select('id', 'content', 'is_audited')
                ->get();

            $baiduClient = new AipContentCensor(config('services.baidu.appid'), config('services.baidu.appkey'), config('services.baidu.secret'));

            $bar = $this->output->createProgressBar($comments->count());
            $bar->start();
            $count = 0;

            foreach ($comments as $comment) {
                $bar->advance();

                /** @var \App\Models\Comment $comment */
                if ($comment->is_audited === 0) {
                    continue;
                }

                $count++;

                $content = $comment->getRawOriginal('content');
                $result  = $baiduClient->textCensorUserDefined($content);

                if (isset($result['error_code'])) {
                    $this->error('error: ' . $result['error_msg']);
                } else {
                    $comment->timestamps = false;
                    $comment->setAttribute('is_audited', $result['conclusionType'] === 1 ? 1 : 0);
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

            $bar->finish();
        } else {
            $this->error(translate('Please add Baidu key first'));
        }

        return 0;
    }
}
