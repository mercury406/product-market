<?php

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();

            $table->json('conditions');

            $table->foreignIdFor(Product::class)
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->constrained();

            $table->boolean('is_valid')->default(true);
            $table->dateTimeTz('valid_from');
            $table->dateTimeTz('valid_till');

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
        Schema::dropIfExists('discounts');
    }
};
