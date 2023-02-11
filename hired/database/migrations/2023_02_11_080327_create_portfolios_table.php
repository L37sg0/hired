<?php

use App\Models\Globals;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JobBoard\Portfolio\Portfolio as Model;

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
            $table->tinyInteger(Model::FIELD_PORTFOLIO_TYPE);
            $table->string(Model::FIELD_AVATAR_URL);
            $table->longText(Model::FIELD_ABOUT);
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
