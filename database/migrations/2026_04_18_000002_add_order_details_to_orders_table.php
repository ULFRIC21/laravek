<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderDetailsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable()->after('volume');
            $table->string('contact_phone')->nullable()->after('price');
            $table->timestamp('scheduled_at')->nullable()->after('completed_at');
            $table->timestamp('arrival_at')->nullable()->after('scheduled_at');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['price', 'contact_phone', 'scheduled_at', 'arrival_at']);
        });
    }
}
