<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->text('hs_id')->nullable();
            $table->text('hs_path')->nullable();
            $table->text('hs_created_at')->nullable();
            $table->text('hs_name')->nullable();
            $table->text('hs_child_table_id')->nullable();
            $table->text('hs_updated_at')->nullable();
            $table->text('specialization')->nullable();
            $table->text('locationname')->nullable();
            $table->text('provider')->nullable();
            $table->text('group')->nullable();
            $table->text('condition')->nullable();
            $table->text('zip')->nullable();
            $table->text('gender')->nullable();
            $table->text('language')->nullable();
            $table->text('availability')->nullable();
            $table->text('accepting')->nullable();
            $table->text('location')->nullable();
            $table->text('doc_image')->nullable();
            $table->text('designation')->nullable();
            $table->text('hospital')->nullable();
            $table->text('button_two_text')->nullable();
            $table->text('button_two_url')->nullable();
            $table->text('contact_title')->nullable();
            $table->text('address')->nullable();
            $table->text('telephone')->nullable();
            $table->text('about_physician')->nullable();
            $table->text('video')->nullable();
            $table->text('location_title')->nullable();
            $table->text('monday_timing')->nullable();
            $table->text('tuesday_timing')->nullable();
            $table->text('wednesday_timing')->nullable();
            $table->text('thursday_timing')->nullable();
            $table->text('friday_timing')->nullable();
            $table->text('cne_doctor')->nullable();
            $table->text('integral_doctor')->nullable();
            $table->text('office_location')->nullable();
            $table->text('delete_record')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
