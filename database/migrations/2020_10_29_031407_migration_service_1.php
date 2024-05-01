<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationService1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $charsetType;

    public function up()
    {
        $this->charsetType = 'utf8';
        Schema::create('receipt',function (Blueprint $table){
            $headers = array('Content-type' => 'text/html','charset'=>'UTF-8');
            $table->charset = $this->charsetType;
            $table->bigIncrements('id');
            $table->string('hash',100)->index();
            $table->string('subject',100);
            $table->json('destination');
            $table->longText('body')->charset($this->charsetType)->collation('utf8_unicode_ci');
            $table->json('headers')->default($headers);
            $table->string('estatus',20)->default('QUEWED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('receipt');
    }
}
