<?php

use App\Models\Globals;
use App\Models\JobBoard\Gig\Gig;
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
            $table->foreignId(Model::FIELD_GIG_ID)
                ->constrained(Gig::TABLE_NAME)->onDelete(Globals::ON_DELETE_CASCADE);
            $table->string(Model::FIELD_TYPE);
            $table->string(Model::FIELD_DESCRIPTION);
            $table->string(Model::FIELD_DELIVERY_DAYS);
            $table->string(Model::FIELD_NUMBER_OF_REVISIONS);
            $table->integer(Model::FIELD_VALUE);
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
