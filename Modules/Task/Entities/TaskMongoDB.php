<?php

namespace Modules\Task\Entities;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskMongoDB extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'log_tasks';

    protected $fillable = [
        'user_id',
        'name'
    ];
    protected static function newFactory()
    {
        return \Modules\Task\Database\factories\TaskMongoDBFactory::new();
    }
}
