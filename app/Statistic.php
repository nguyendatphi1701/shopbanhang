<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'oder_date', 'sales', 'profit', 'total_order'
    ];
    protected $primaryKey = 'id_statistical';
 	protected $table = 'tbl_statistical';
}
