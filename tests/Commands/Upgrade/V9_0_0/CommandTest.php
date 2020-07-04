<?php

declare(strict_types=1);

namespace Tests\Commands\Upgrade\V9_0_0;

use DB;
use Schema;

class CommandTest extends \Tests\Commands\Upgrade\TestCase
{
    public function testCommand()
    {
        static::assertFalse(Schema::hasTable('comment_backups'));

        $this->artisan('upgrade:v9.0.0');

        static::assertTrue(Schema::hasTable('comment_backups'));

        $commentBackups = DB::table('comment_backups')->get();

        static::assertEquals($commentBackups->count(), DB::table('comments')->count());

        foreach ($commentBackups as $commentBackup) {
            static::assertDatabaseHas('comments', [
                'id'                => $commentBackup->id,
                'socialite_user_id' => $commentBackup->socialite_user_id,
                'article_id'        => $commentBackup->article_id,
                'content'           => $commentBackup->content,
                'is_audited'        => $commentBackup->is_audited,
                'parent_id'         => $commentBackup->parent_id === 0 ? null : $commentBackup->parent_id,
            ]);
        }
    }
}
