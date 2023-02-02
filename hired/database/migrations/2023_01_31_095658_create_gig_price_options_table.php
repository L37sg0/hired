<?php

use App\Models\Globals;
use App\Models\JobBoard\Gig\GigPrice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JobBoard\Gig\GigPriceOption as Model;

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
            $table->foreignId(Model::FIELD_GIG_PRICE_ID)
                ->constrained(GigPrice::TABLE_NAME)->onDelete(Globals::ON_DELETE_CASCADE);
            $table->string(Model::FIELD_KEY);
            $table->string(Model::FIELD_VALUE);
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
