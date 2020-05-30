<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateResponsesTestIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('reponses', function (Blueprint $table) {
        $table->renameColumn('qcm_id', 'test_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('reponses', function (Blueprint $table) {
        $table->renameColumn('test_id', 'qcm_id');
      });
    }
}
