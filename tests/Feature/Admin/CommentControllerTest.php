<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Admin\CURD\TestDestroy;
use Tests\Feature\Admin\CURD\TestForceDelete;
use Tests\Feature\Admin\CURD\TestIndex;
use Tests\Feature\Admin\CURD\TestRestore;

class CommentControllerTest extends TestCase
{
    use TestIndex, TestDestroy, TestRestore, TestForceDelete;
    protected $urlPrefix = 'admin/comment/';
    protected $table = 'comments';
}
