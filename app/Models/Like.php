<?php

namespace App\Models;

use App\Events\LikeCreated;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Like
 *
 * @property string $id ID
 * @property string $thing_id モノID
 * @property string $ip IPアドレス
 * @property Carbon $created_at 作成日時
 * @property Carbon $updated_at 最終更新日時
 * @property-read Thing $thing モノ
 * @property-read bookApp $id モノ
 */
class Like extends Model
{
    protected $fillable = ['book_app_id', 'ip'];

    protected $dispatchesEvents = [
        'created' => LikeCreated::class,
    ];

    /** [relation] {@see \App\Models\Like::$bookApp} */
    public function bookApp(): BelongsTo
    {
        return $this->belongsTo(bookApp::class);
    }
}
