<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'entreprise',
        'address',
        'code_postal',
        'ville',
        'status',
    ];


     /**
     * FORMATAGE DES DONNÉES
     * prénom, nom, entreprise, ville : UCWORD
     * @param string $value
     * @return void
     */
    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = ucwords(strtolower($value));
    }
    public function setPrenomAttribute($value)
    {
        $this->attributes['prenom'] = ucwords(strtolower($value));
    }
    public function setEntrepriseAttribute($value)
    {
        $this->attributes['entreprise'] = ucwords(strtolower($value));
    }
    public function setVilleAttribute($value)
    {
        $this->attributes['ville'] = ucwords(strtolower($value));
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value); // • e-mail : LOWERCASE
    }

}
