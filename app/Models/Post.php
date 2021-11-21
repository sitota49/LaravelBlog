<?php

namespace App\Models;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;

    protected $fillable = [
        'title',
        'body',
        'cat_id'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');
    }

      public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
