<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1ab4a19cf00RelationshipsToCrmNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_notes', function(Blueprint $table) {
            if (!Schema::hasColumn('crm_notes', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '4862_5b1a8f7dadb85')->references('id')->on('crm_customers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('crm_notes', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '4862_5b1ab4a1746ea')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('crm_notes', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '4862_5b1ab4a179f92')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('crm_notes', function(Blueprint $table) {
            
        });
    }
}
