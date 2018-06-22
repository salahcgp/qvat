<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1ad3ac2b962RelationshipsToCreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('create_companies', function(Blueprint $table) {
            if (!Schema::hasColumn('create_companies', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '4858_5b1a8ec45a7fc')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('create_companies', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '4858_5b1a8ec46018e')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('create_companies', function(Blueprint $table) {
            
        });
    }
}
