<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    const STATUS = [
        false => ['label' => '未購入'],
        true => ['label' => '購入済み'],
    ];

    /**
     * 状態のラベル
     * @return string
     */
    public function getPurchaseStatusAttribute()
    {
        // 状態値
        $status = $this->attributes['purchase_status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }
}
