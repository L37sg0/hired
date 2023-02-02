<?php

use App\Models\Globals;
use App\Models\JobBoard\Gig\Gig;
use App\Models\JobBoard\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JobBoard\Gig\GigTag as Model;

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
            $table->foreignId(Model::FIELD_GIG_ID)
                ->constrained(Gig::TABLE_NAME)->onDelete(Globals::ON_DELETE_CASCADE);
            $table->foreignId(Model::FIELD_TAG_ID)
                ->constrained(Tag::TABLE_NAME)->onDelete(Globals::ON_DELETE_CASCADE);
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
