<?php

use App\Models\Globals;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JobBoard\Listing as Model;

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
            $table->foreignId(Model::FIELD_USER_ID)
                ->constrained(User::TABLE_NAME)->onDelete(Globals::ON_DELETE_CASCADE);
            $table->string(Model::FIELD_TITLE);
            $table->string(Model::FIELD_SLUG);
            $table->string(Model::FIELD_COMPANY);
            $table->string(Model::FIELD_LOCATION);
            $table->string(Model::FIELD_LOGO);
            $table->boolean(Model::FIELD_IS_HIGHLIGHTED);
            $table->boolean(Model::FIELD_IS_ACTIVE);
            $table->text(Model::FIELD_CONTENT);
            $table->integer(Model::FIELD_PRICE_VALUE);
            $table->integer(Model::FIELD_WORKING_HOURS);
            $table->string(Model::FIELD_APPLY_LINK);
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
