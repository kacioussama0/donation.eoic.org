<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('campaign_id')->index();


            $table->decimal('amount', 12, 2);

            $table->string('currency', 3)->default('eur');

            $table->enum('status', ['pending', 'paid', 'failed', 'canceled', 'refunded'])
                ->default('pending')->index();

            $table->string('donor_name')->nullable();
            $table->string('donor_phone')->nullable();
            $table->string('donor_email')->nullable();
            $table->string('note')->nullable();


            $table->string('stripe_checkout_session_id')->nullable()->unique();
            $table->string('stripe_payment_intent_id')->nullable()->index();
            $table->string('stripe_customer_id')->nullable()->index();

            $table->string('stripe_event_id')->nullable()->unique();
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('campaign_id')
                ->references('id')->on('campaigns')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
