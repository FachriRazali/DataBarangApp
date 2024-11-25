<?php

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
        // Check if the 'users' table exists
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                // Add 'google_id' column if it doesn't already exist
                if (!Schema::hasColumn('users', 'google_id')) {
                    $table->string('google_id')->nullable()->after('password')->comment('Google ID for Socialite');
                }

                // Add 'avatar' column if it doesn't already exist
                if (!Schema::hasColumn('users', 'avatar')) {
                    $table->string('avatar')->nullable()->after('google_id')->comment('Profile picture URL from Google');
                }

                // Add 'provider' column if it doesn't already exist
                if (!Schema::hasColumn('users', 'provider')) {
                    $table->string('provider')->nullable()->after('avatar')->comment('Socialite provider (e.g., google)');
                }

                // Add 'provider_id' column if it doesn't already exist
                if (!Schema::hasColumn('users', 'provider_id')) {
                    $table->string('provider_id')->nullable()->after('provider')->comment('Provider ID for Socialite');
                }
            });
        } else {
            // Throw an exception if the 'users' table doesn't exist
            throw new Exception('The "users" table was not found. Please ensure the migration for creating the "users" table has been run.');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Check if the 'users' table exists
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                // Drop 'google_id' column if it exists
                if (Schema::hasColumn('users', 'google_id')) {
                    $table->dropColumn('google_id');
                }

                // Drop 'avatar' column if it exists
                if (Schema::hasColumn('users', 'avatar')) {
                    $table->dropColumn('avatar');
                }

                // Drop 'provider' column if it exists
                if (Schema::hasColumn('users', 'provider')) {
                    $table->dropColumn('provider');
                }

                // Drop 'provider_id' column if it exists
                if (Schema::hasColumn('users', 'provider_id')) {
                    $table->dropColumn('provider_id');
                }
            });
        } else {
            // Log or notify that the 'users' table was not found
            throw new Exception('The "users" table was not found. No changes were made.');
        }
    }
};
