<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatatableServersideExample extends Controller
{
    //
    public function getTable(Request $request){
        $table = '(select * from ma_user) as foo';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'first_name_en', 'dt' => 0 ),
            array( 'db' => 'last_name_en',  'dt' => 1 ),
            // array( 'db' => 'position',   'dt' => 2 ),
            // array( 'db' => 'office',     'dt' => 3 ),
            // array(
            //     'db'        => 'start_date',
            //     'dt'        => 4,
            //     'formatter' => function( $d, $row ) {
            //         return date( 'jS M y', strtotime($d));
            //     }
            // ),
            // array(
            //     'db'        => 'salary',
            //     'dt'        => 5,
            //     'formatter' => function( $d, $row ) {
            //         return '$'.number_format($d);
            //     }
            // )
        );

        echo json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
}
