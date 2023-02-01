<?php

use App\Models\Globals;
use App\Models\JobBoard\Listing;
use App\Models\JobBoard\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JobBoard\ListingTag as Model;

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
            $table->foreignId(Model::FIELD_LISTING_ID)
                ->constrained(Listing::TABLE_NAME)->onDelete(Globals::ON_DELETE_CASCADE);
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
