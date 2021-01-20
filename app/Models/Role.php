<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Role extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',        
        'description',
        'created_by',
        'updated_by'
       ];

    
       public function users()
       {
           return $this->belongsToMany('App\Models\User');
       }



       public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $user = Auth::user();
           $model->created_by = $user->id;
           $model->updated_by = $user->id;
       });
       static::updating(function($model)
       {
           $user = Auth::user();
           $model->updated_by = $user->id;
       });
   }






}
