<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Assuming passwords are in plain text
        DB::table('auth_users')->get()->each(function ($user) {
            DB::table('auth_users')->where('id', $user->id)->update([
                'password' => Hash::make($user->password)
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Handle if needed
    }
};