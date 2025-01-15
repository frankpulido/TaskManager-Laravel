<?php

use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER update_task_status
            BEFORE UPDATE ON tasks
            FOR EACH ROW
            BEGIN
                IF NEW.date_approved IS NOT NULL AND OLD.date_approved IS NULL THEN
                    SET NEW.task_status = "RELEASED";
                ELSEIF NEW.date_delivered IS NOT NULL AND OLD.date_delivered IS NULL THEN
                    SET NEW.task_status = "DELIVERED";
                ELSEIF NEW.date_init IS NOT NULL AND OLD.date_init IS NULL THEN
                    SET NEW.task_status = "INIT";
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_task_status');
    }
};
