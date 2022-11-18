<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'title', 'description', 'venue', 'image'
    ];

    protected $dates = [
        'start_date', 'end_date',
    ];
    public function setEventStatus()
    {
        if($this->end_date < now()->toDateString()){
            return "Finished";
        }elseif(($this->end_date < now()->subWeek()->toDateString())&&($this->end_date <= now()->toDateString())){
            return "Finished in past 7 days";
        }elseif($this->start_date > now()->toDateString()){
            return "Upcoming";
        }elseif(($this->start_date < now()->addWeek()->toDateString()) && ($this->start_date >= now()->toDateString())){
            return "Upcoming within 7 days";
        }
    }
}
