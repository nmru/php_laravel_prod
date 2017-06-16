<?php

namespace produccion;

use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    protected $table = 'proceso';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
      'Serie',
      'Mac',
      'Lote',
      'Proceso',
      'Fecha',
      'Issue'
    ];

    protected $guarded = [];
}
