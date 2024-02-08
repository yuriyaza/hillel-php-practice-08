<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('urls', function (Blueprint $table) {
            // Початкове значення ID для подальшого перетворення
            // в shortUrl (з 10-ї до 36-ї системи числення)
            $table->id()->from(10000001);
            $table->string('url');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
