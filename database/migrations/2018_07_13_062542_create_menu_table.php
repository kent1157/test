<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable($value=true);
            $table->string('nameM')->nullable($value=true);
            $table->string('onOff')->nullable($value=true);
            $table->text('Onebigname')->nullable($value=true);
            $table->text('towbigname')->nullable($value=true);
            $table->text('text')->nullable($value=true);

            $table->text('title')->nullable($value=true);
            $table->text('discr')->nullable($value=true);


            $table->string('basic')->nullable($value=true);
            $table->string('img')->nullable($value=true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
