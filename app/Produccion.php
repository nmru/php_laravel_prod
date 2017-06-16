<?php

namespace produccion;

use Illuminate\Database\Eloquent\Model;
use DB;

class Produccion extends Model
{
    protected $connection = 'mysql_webfilter';
    protected $table = 'FLASHED';
    protected $primaryKey = 'Hardware_Id';
    public $timestamps = false;

    protected $fillable = [
      'Hardware_Id',
      'Saint_Release',
      'Saint_Version',
      'Update_Time',
      'Flashed_Times',
      'License_Status',
      'RPCD_Status',
      'Internet_Connectivity',
      'Filter_Test1_Status',
      'Filter_Test2_Status',
      'Filter_Test3_Status',
      'Filter_Test4_Status',
      'Filter_Test5_Status',
      'Comments'
      

    ];

    protected $guarded = [];

    public static function Firmado()
     {

        $firmado = new Produccion;
        $query = DB::connection($firmado->connection)
                        ->table($firmado->table)
                        ->select('Hardware_Id','Saint_Release','Saint_Version','Update_Time','Flashed_Times','License_Status',
                                 'RPCD_Status','Internet_Connectivity', 'Filter_Test1_Status','Filter_Test2_Status','Filter_Test3_Status',
                                 'Filter_Test4_Status','Filter_Test5_Status','Comments');
                        
            return $query;

     }

}
