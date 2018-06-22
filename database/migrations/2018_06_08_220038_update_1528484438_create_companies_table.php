<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1528484438CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('create_companies', function (Blueprint $table) {
            if(Schema::hasColumn('create_companies', 'created_by_id')) {
                $table->dropForeign('4858_5b1a8ec45a7fc');
                $table->dropIndex('4858_5b1a8ec45a7fc');
                $table->dropColumn('created_by_id');
            }
            if(Schema::hasColumn('create_companies', 'created_by_team_id')) {
                $table->dropForeign('4858_5b1a8ec46018e');
                $table->dropIndex('4858_5b1a8ec46018e');
                $table->dropColumn('created_by_team_id');
            }
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_companies', function (Blueprint $table) {
                        
        });

    }
}
