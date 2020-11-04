<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PromoEtudiant extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_etudiant',
        'id_promotion',
        'id_annee_accademique',
    ];

    
    public function etudiant() 
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant');
    }

    public function promotion() 
    {
        return $this->belongsTo(Promotion::class, 'id_promotion');
    }

    public function anneeAccademique() 
    {
        return $this->belongsTo(AnneeAccademique::class, 'id_annee_accademique');
    }
}