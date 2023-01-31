<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JobBoard\Gig\GigPrice as Model;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Model::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Model::FIELD_GIG_ID);
            $table->string(Model::FIELD_TYPE);
            $table->string(Model::FIELD_DESCRIPTION);
            $table->string(Model::FIELD_DELIVERY_DAYS);
            $table->string(Model::FIELD_NUMBER_OF_REVISIONS);
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
        Schema::dropIfExists(Model::TABLE_NAME);
    }
};
