<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1ab46f70e89RelationshipsToCrmStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_statuses', function(Blueprint $table) {
            if (!Schema::hasColumn('crm_statuses', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '4860_5b1ab46f48d51')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('crm_statuses', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '4860_5b1ab46f4eed8')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('crm_statuses', function(Blueprint $table) {
            
        });
    }
}
