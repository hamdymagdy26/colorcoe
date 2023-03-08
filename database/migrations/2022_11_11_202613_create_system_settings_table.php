<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Setting::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->text('footer_info_ar')->nullable();
            $table->text('footer_info_en')->nullable();
            $table->text('who_are_we_ar')->nullable();
            $table->text('who_are_we_en')->nullable();
            $table->text('vision_ar')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('mission_ar')->nullable();
            $table->text('mission_en')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('about_us_ar')->nullable();
            $table->text('about_us_en')->nullable();
            $table->integer('testomnials_no')->nullable();
            $table->integer('clients_no')->nullable();
            $table->integer('projects_no')->nullable();
            $table->text('profile')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Setting::getTableName());
    }
};
