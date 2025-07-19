<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{



    //! Campi scrivibili in massa (Mass Assignment)
    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'note',
        'date',
    ];






    //! Relazione: Ogni attività appartiene a un utente
    public function user()
    {
        return $this->belongsTo(User::class);   
    }

}
