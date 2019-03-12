<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CompanyTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.company_table'));

        //Add the master administrator, user id of 1 
        $company = [
            [
                'company_name'        => 'Cygnet',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
 ];

        DB::table(config('access.company_table'))->insert($company);

        $this->enableForeignKeys();
    }
}