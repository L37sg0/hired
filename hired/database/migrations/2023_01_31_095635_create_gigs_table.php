<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JobBoard\Gig\Gig as Model;

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
            $table->string(Model::FIELD_USER_ID);
            $table->string(Model::FIELD_TITLE);
            $table->string(Model::FIELD_SLUG);
            $table->string(Model::FIELD_LOGO);
            $table->string(Model::FIELD_IS_HIGHLIGHTED);
            $table->string(Model::FIELD_IS_ACTIVE);
            $table->string(Model::FIELD_CONTENT);
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
