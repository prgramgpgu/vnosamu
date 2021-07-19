<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUploadsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('uploads', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('section_id')->index();
                $table->string('filename');
                $table->string('title');
                $table->string('path');
//                $table->morphs('uploadable');
                $table->foreign('section_id')->references('id')->on('sections');
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
            Schema::dropIfExists('uploads');
        }
    }
