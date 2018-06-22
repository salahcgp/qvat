<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1528467140CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('create_companies')) {
            Schema::create('create_companies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('company_name');
                $table->text('billing_address')->nullable();
                $table->text('shipping_address')->nullable();
                $table->string('mobile')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->string('trn');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_companies');
    }
}
