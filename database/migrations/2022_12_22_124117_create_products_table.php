<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)
                ->cascaseOnUpdate()
                ->nullOnDelete()
                ->index();
            $table->string('name');
            $table->string('slug')
                ->unique()
                ->index();
            $table->text('description');
            $table->bigInteger('price');
            $table->jsonb('price_off')
                ->default(null)
                ->nullable();
            $table->softDeletesTz();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
