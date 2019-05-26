<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
    protected $fillable = ['title','body','user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addComment($body){

        $this->comments()->create([
            'body'=>$body,
            'user_id'=>auth()->id()
        ]);
    }

    public function scopeFilter($query, $filters){

        if(isset($filters['month'])){
            $month = $filters['month'];
            $query->whereMonth('created_at', Carbon::parse($month)->month );
        }
        if(isset($filters['year'])){
            $year = $filters['year'];
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives(){
        return static::selectRaw('monthname(created_at) as month, year(created_at) as year, count(*) as publised')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
